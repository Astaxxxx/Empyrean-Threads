<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistForProductController extends Controller
{
    public function posting($id){

       Auth::user()->wishlistForProduct()->attach($id);
       return back();

    }

    public function removing(){

        return "remove";
    }
}
