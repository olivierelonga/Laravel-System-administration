<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoices;
use Auth;
use DB;
use App\invoice_items;
use App\SalesOrder;


class InvoiceController extends Controller
{
    public function store(Request $request){

        $lastIdInserted = SalesOrder::where('id', $request->sale_id)->select('id', 'sales_ref')->get();

        $invoice = new Invoices;
        $invoice->customer_id = Auth::id();
        $invoice->description = $request->description;
        $invoice->amount= $request->amount;
        $invoice->sales_reference= $request->sales_reference;
        $invoice->sale_order_id= $request->sale_id;
        // dd($invoice);
        if ($invoice->save()) {
            //Add Invoice Items for invoice line display
                $invoice_items = new invoice_items;

                $invoice_items->amount = $request->amount;
                $invoice_items->user_id = Auth::id();
                $invoice_items->sales_ref = $lastIdInserted[0]->sales_ref;
                // dd($invoice_items);
                $invoice_items->save();

                // Set current Invoice id where null and ref is same
                DB::table('invoice_item_list')
                ->where('sales_ref',  $lastIdInserted[0]->sales_ref)
                ->update(['invoice_id' =>  $invoice->id]);
        }
        return back()->with("message","Invoice Added Created");
    }

    public function invoice_items(Request $req){
        $invoice_items = new invoice_items;

        $invoice_items->invoice_id = null;
        $invoice_items->sales_ref = $req->sales_ref;
        $invoice_items->amount = $req->amount;
            if ($invoice_items->save()) {
                $id = $invoice_items->id;
               return $id;
            }

    }


    public function view($id){

        // return $id;
        $invoice = DB::table('invoices')->where('invoices.id', $id)->where('customer_id', Auth::id())
            ->join('sale_order', 'sale_order.id', '=', 'invoices.sale_order_id')
            ->join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->select('invoices.id', 'invoices.sale_order_id', 'invoices.sales_reference', 'customers.address', 'invoices.date_created', 'customers.name', 'invoices.amount')
            ->orderBy('invoices.date_created', 'desc')
            ->get();

        $invoice_items = DB::table('invoice_item_list')->where('invoice_id', $id)
            ->join('sale_order', 'sale_order.sales_ref', '=', 'invoice_item_list.sales_ref')
            ->select('*')
            ->orderBy('invoice_item_list.created_at', 'desc')
            ->get();

        // dd($invoice_items);
        // return $invoice_items;
        $data = [
            'invoice' => $invoice,
            'invoice_items' => $invoice_items,

        ];
        return view('finance.invoice')->with($data);

    }
}
