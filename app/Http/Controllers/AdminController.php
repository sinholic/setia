<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard.index', compact('activities'));
    }
    public function login(Request $request)
    {
        //tinggal ubah pointer page nya ya @mahar
        return view('admin.main', compact('activities'));
    }
}
