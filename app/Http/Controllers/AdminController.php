<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $news = News::select('a_news.*', 'xuser.name')
                ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
                ->where('a_news.is_publish', '1')
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        return view('admin.dashboard.index', compact('news'));
    }
}
