<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    function index()
    {
        return view('user.vendors.index');
    }

    function detail($slug) {
        
    }
}
