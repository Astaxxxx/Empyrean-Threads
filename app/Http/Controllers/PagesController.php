<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home() {
        $product = Product::with('category', 'colours')->orderBy('created_at', 'desc')->get();
        return view('pages.home', ['products'=>$product]);
    }

    public function basket() {
       return view('pages.basket');
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

    public function productPage() {
        return view('pages.productPage');
    }

    public function wishlist() {
        $productsMade = Auth::User()->wishlist;
        return view('pages.wishlist', ['products'=>$productsMade]);
    }

    public function accountPage() {
        return view('pages.accountPage');
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
