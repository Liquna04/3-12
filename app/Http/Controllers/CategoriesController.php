<?php

namespace App\Http\Controllers;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = categories::all();
        return view('categories.index',[
            'categories' => $categories,
        ]);
    }
    public function create(){
        return view('categories.create');
    }
    public function edit($CategoryID){
        
        $category = categories::find($CategoryID);

        return view('categories.edit')->with('category', $category);
    }
    public function update(Request $request, $CategoryID){
        $category = categories::where('CategoryID',$CategoryID)
        ->update([
            'CategoryName' => $request->input('CategoryName'),
            
            'IsVisible' => $request->input('IsVisible'),
        ]);
        return redirect('/categories');
    }
    
    public function store(Request $request){
        // dd('This is store function');
        $category = new categories();
        $category->CategoryName = $request->input('CategoryName');
        
        $category->IsVisible = $request->input('IsVisible');
        $category->save();
        return redirect('/categories');


    }
    public function destroy($CategoryID){
        $category= categories::find($CategoryID);
        $category->delete();
        return redirect('/categories');
    }
}
