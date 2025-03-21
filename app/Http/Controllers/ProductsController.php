<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    public function index(){
        $products = products::all();
        $categories = categories::all();
        return view('products.index',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function create(){
        $categories = categories::all();
        return view('products.create',compact('categories'));
    }
    public function edit($productID){
        
        $product = products::find($productID);
        $categories = categories::all();

        return view('products.edit',compact('product','categories'));
    }
    public function update(Request $request, $productID){
        $categories = categories::all();
        $product = products::where('productID',$productID)
        ->update([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
            'Price' => $request->input('Price'),
            'Stock' => $request->input('Stock'),
            'CategoryID' => $request->input('CategoryID'),
            'IsVisible' => $request->input('IsVisible'),
            'SalesCount' => $request->input('SalesCount'),

        ]);
            if($request->hasFile('image')) {
                $imagePath =$request->file('image')->store('products','public');
                $product->image_url = $imagePath;
                $product->save();
            }
        return redirect('/products');
    }
    
    public function store(Request $request){
        // dd('This is store function');
        $categories = categories::all();
        $product = new products();
        $product->Name = $request->input('Name');
        $product->Description  = $request->input('Description');
        $product->Price = $request->input('Price');
        $product->Stock = $request->input('Stock');
        $product->CategoryID = $request->input('CategoryID');
        $product->IsVisible  = $request->input('IsVisible');
        $product->SalesCount = $request->input('SalesCount');
        
        if($request->hasFile('image')) {
            $imagePath =$request->file('image')->store('products','public');
            $product->image_url = $imagePath;
        }

        $product->save();
        return redirect('/products');


    }
    public function destroy($productID){
        $product= products::find($productID);
        $product->delete();
        return redirect('/products');
    }


}

