<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('user.blog.index');
    }

    public function detail(Request $request, $slug)
    {
        return view('user.blog.detail');
    }
}
