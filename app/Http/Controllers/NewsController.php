<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.main', compact('activities'));
    }
    public function detail(Request $request)
    {
        return view('frontend.detail', compact('activities'));
    }
}
