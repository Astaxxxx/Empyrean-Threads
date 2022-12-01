<?php

namespace App\Http\Controllers;

use index;
use App\Models\Colour;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // admin panel
    //display products table

    public function index() {
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view("admin.pages.products.index", ['products' => $products]);
    }

    public function create(){
        $categories = Category::all();
        $colours = Colour::all();
        return view("admin.pages.products.create", ['categories' => $categories, 'colours' => $colours]);
    }

    public function store(Request $request){
        //validate
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colours' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //store image
        $image_name = 'products/' . time() . '.' . $request ->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);
        //store
        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price*100,
            'description' => $request->description,
            'image' => $image_name
        ]);

        $product->colours()->attach($request->colours);

        //response

        return back()->with('success', 'Product Saved!');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colours = Colour::all();
        return view("admin.pages.products.edit", ['categories' => $categories, 'colours' => $colours, 'products' => $product]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colours' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $product = Product::findOrFail($id);
        $image_name = $product->image;

        //store image
        if($request->image){
            $image_name = 'products/' . time() . '.' . $request ->image->getClientOriginalExtension();
            $request->image->storeAs('public', $image_name);
        }
        //store
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price*100,
            'description' => $request->description,
            'image' => $image_name
        ]);

        $product->colours()->sync($request->colours);

        //response

        return back()->with('success', 'Product updated!');
    }

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product Deleted');
    }
}
