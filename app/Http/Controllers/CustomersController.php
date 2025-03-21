<?php

namespace App\Http\Controllers;
use App\Models\customers;
use Illuminate\Http\Request;

class customersController extends Controller
{
    public function index(){
        $customers = customers::all();
        return view('customers.index',[
            'customers' => $customers,
        ]);
    }
    public function create(){
        return view('customers.create');
    }
    public function edit($CustomerID){
        
        $customer = customers::find($CustomerID);

        return view('customers.edit')->with('customer', $customer);
    }
    public function update(Request $request, $CustomerID){
        $customer = customers::where('CustomerID',$CustomerID)
        ->update([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password_hash' => $request->input('password_hash'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'profile_picture' => $request->input('profile_picture'),
        ]);
        return redirect('/customers');
    }
        
    public function store(Request $request){
        // dd('This is store function');
        $customer = new customers();
        $customer->full_name = $request->input('full_name');
        $customer->email  = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->password_hash = $request->input('password_hash');
        $customer->gender = $request->input('gender');
        $customer->address  = $request->input('address');
        $customer->profile_picture = $request->input('profile_picture');

        $customer->save();
        return redirect('/customers');


    }
    public function destroy($CustomerID){
        $customer= customers::find($CustomerID);
        $customer->delete();
        return redirect('/customers');
    }


}
