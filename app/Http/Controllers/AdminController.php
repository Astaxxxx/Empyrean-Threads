<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // dashboard

    public function AdminHomepage(){
        return view('admin.pages.dashboard');
    }
}
