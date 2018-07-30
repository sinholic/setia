<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\user;
use App\CategoryNews;
class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categorynews = CategoryNews::get();
        $dataAll=News::select('a_news.*', 'xuser.name')
                ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
                ->where('a_news.is_publish', '1')
                ->get()->toJson();
        return view('frontend.main', compact('dataAll','categorynews'));
    }
    public function detail($id)
    {
      $dataDetail=News::select('a_news.*', 'xuser.name')
              ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
              ->where('a_news.is_publish', '1')
              ->where('a_news.id', $id)
              ->get()->toJson();
        return view('frontend.detail', compact('dataDetail'));
    }
}
