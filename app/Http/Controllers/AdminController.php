<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\CategoryNews;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $categorynews = CategoryNews::with('news_lists')->where('nama', \Carbon\Carbon::now()->year)->first();
        $dataNews = News::with('category', 'create_user')
        ->where('is_publish', 1)
        ->orderBy('updated_at', 'DESC')
        ->get();
        $dataNews = News::with('category', 'create_user')
        ->where('is_publish', 1)
        ->orderBy('updated_at', 'DESC')
        ->paginate(3);
        return view('layoutsnew.main', compact('dataNews','categorynews'));
    }
}
