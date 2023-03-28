<?php

namespace App\Http\Controllers;
use App\payment;
use Illuminate\Http\Request;
use Auth;
use DB;


class PaymentController extends Controller
{
    //
    public function store(Request $request){

        // return "!";
        $payments = new payment;
        $payments->customer_id = Auth::id();
        $payments->amount= $request->amount;
        $payments->invoice_id = $request->invoice_id;
        if($payments->save()){
            DB::table('invoices') ->where('id',  $payments->invoice_id)->update(['status' => 1]);
            return back()->with("message","Transcation Successful");
        }

    }
}
