<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index(){
        $carts = cart::all();
        return view('carts.index',[
            'carts' => $carts,
        ]);
    }
    public function create(){
        return view('carts.create');
    }
    public function edit($CartID){
        
        $cart = cart::find($CartID);

        return view('carts.edit')->with('cart', $cart);
    }
    public function update(Request $request, $CartID){
        $cart = cart::where('CartID',$CartID)
        ->update([
            'Quantity' => $request->input('Quantity'),
    
        ]);
        return redirect('/carts');
    }
    
    public function store(Request $request){
        // dd('This is store function');
        $cart = new cart();
        $cart->Quantity = $request->input('Quantity');

        $cart->save();
        return redirect('/carts');


    }
    public function destroy($CartID){
        $cart= cart::find($CartID);
        $cart->delete();
        return redirect('/carts');
    }


}
