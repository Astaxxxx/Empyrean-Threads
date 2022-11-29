<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Home
    public function home() {
        $products = Product::with('category', 'colours')->orderBy('created_at', 'desc')->get();
        return view('pages.home', ['products'=>$products]);
    }

    //Cart
    public function cart() {
       return view('pages.cart');
    }

    public function contactUs() {
        return view('pages.contactUs');
     }

    public function aboutUs() {
        return view('pages.aboutUs');
    }

    public function orderHistory() {
        return view('pages.orderHistory');
    }

    public function productsm() {
        return view('pages.productsm');
    }

    public function wishlist() {
        return view('pages.wishlist');
     }


    public function account() {
        return view('pages.account');
    }

    public function checkout() {
        return view('pages.checkout');
    }

    public function success() {
        return "successfully Done";
    }

    public function product($id) {
        $product = Product::with('category', 'colours')->findOrFail($id);
        return view('pages.product', ['product' => $product]);
    }
}
