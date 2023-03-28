<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesOrder;

class SalesOrderAuthController extends Controller
{
    public function store(Request $req)
    {
        $latestReqId = SalesOrder::orderBy('created_at','DESC')->first();

        $SalesOrder = new SalesOrder;

        $SalesOrder->order_reason= $req->order_reason;
        $SalesOrder->description= $req->short_description;
        $SalesOrder->food_category = $req->foodcats;
        $SalesOrder->u_price = $req->product_price;
        if($latestReqId == null){
            $SalesOrder->sales_ref =  'SO-'.str_pad( 1, 4, "0", STR_PAD_LEFT);
        }else{
            $SalesOrder->sales_ref =  'SO-'.str_pad($latestReqId->id + 1, 4, "0", STR_PAD_LEFT);
        }
        // dd($SalesOrder);
        $SalesOrder->save();
        return redirect('/create')->with('message', 'Sales Order successfully created');
    }
}
