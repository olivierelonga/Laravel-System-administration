<?php

namespace App\Http\Controllers;
use Auth;
use App\SalesOrder;
use App\customers;
use App\Invoices;
use DB;


use Illuminate\Http\Request;

class CustomersAuthController extends Controller
{
    public function index(){
        return view('customers.home');
    }

    public function login(){
        return view('customers.login');
    }


    public function handLogin(Request $req){
        if(Auth::guard('webcustomers')->attempt($req->only(['username', 'password']))){
            return redirect()->route('customers.home');
        }
        return redirect()->back()->with('error', "Incorrect Crendentials");
    }


    public function logout(){
        Auth::guard('webcustomers')->logout();
        return redirect()->route('customers.login');
    }

    public function viewInvoice(){

        $sales_orders = SalesOrder::all();

        $invoiceId =  Invoices::all();

        $inv_d = $invoiceId->toArray();
        $shift = array_column( $inv_d  , 'sales_ref');

        $data = [
            'sales_orders' => $sales_orders,
            'shift' => $shift,
        ];
        
        return view('customers.index')->with($data);

        // $customer = customers::orderBy('date_created','desc')->get();
        // return view('customers.index', compact('customer'));
    }

    public function Invoices(){
        

        $invoicesview = DB::table('invoices')->where('invoices.customer_id', Auth::id())
        ->leftjoin('customers', 'customers.id', '=', 'invoices.customer_id')
        ->select('invoices.*','customers.balance')
        ->orderBy('invoices.date_created', 'desc')
        ->get();
        
        return view('customers.InvoiceView', compact('invoicesview'));
    }
}
