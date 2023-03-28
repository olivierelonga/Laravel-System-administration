<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\customers;
use Illuminate\Support\Facades\Hash;
use Carbon;




use Auth;
use Session;


class OperatorsAuthController extends Controller
{
    public function index(){
        // return "hi";
        return view('operators.home');
    }

    public function login(){
        return view('operators.login');
    }


    public function handLogin(Request $req){
        if(Auth::guard('weboperators')->attempt($req->only(['username', 'password']))){
            return redirect()->route('operators.home');
        }
        return redirect()->back()->with('error', "Incorrect Crendentials");

        return redirect()->back()->withInput($req->only('email', 'remember'))->withErrors(['approve' => 'Wrong password or this account not approved yet.',
        ]);
    }


    public function logout(){
        Auth::guard('weboperators')->logout();
        return redirect()->route('operators.login');
    }

    public function create(){
        $foods = DB::table('food_type')->select('*')->get();
        $data = [
            'food_type' => $foods
        ];

        return view('operators.create')->with($data);
    }

    public function get_drop_id(Request $request)
    {
        // echo "test";
        $drop_id = $request->post('drop_id');
        $foodcats = DB::table('fruits')->where('food_id',$drop_id)->select('*')->get();

        $html = '<option id="" value="" disabled>Food List</option>';
        foreach($foodcats as $list){
            $html.='<option id="'.$list->id.'" value="'.$list->name.'">'.$list->name.'</option>';
        }

        echo $html;
        echo $foodcats;
    }

    public function AddCustomers()
    {
        return view('operators.addcustomers');
    }

    public function AddCustomer(Request $req)
    {
        request()->validate([
            'username'=>'unique:customers,username'
        ]);

        $customer = new customers;

        $customer->name= $req->ur_name;
        $customer->address= $req->address;
        $customer->username = $req->username;
        $customer->password = Hash::make($req->upass);
        $customer->save();
        return redirect('/AddCustomers')->with('message', 'Customer Added successfully created');
    }

    public function view()
    {
        $customer = customers::orderBy('date_created','desc')->get();
        return view('operators.viewcustomers',compact('customer'));
    }

    public function update(Request $req, $id){
        $id = $req->valId;
        $customerinfo = customers::find($id);
        $customerinfo->name = $req->u_name;
        $customerinfo->address = $req->address;
        $customerinfo->username = $req->u_name;
        $customerinfo->password = Hash::make($req->pass_w);

        $this->validate($req, [
            'username'=>'unique:customers,username'
        ]);
        // dd($customerinfo);
        $customerinfo->save();
        return redirect('/viewCustomers')->with('message', 'Info Updated');
    }


    public function destroy($id)
    {
        customers::where('id',$id)->delete();
        return back()->with('message', 'User Deleted');
    }

}
