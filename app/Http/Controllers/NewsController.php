<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $dataAll=News::where('is_publish', '1')
                ->get()->toJson();
        return view('frontend.main', compact('dataAll'));
    }
    public function detail($id)
    {
      $dataDetail=News::where('is_publish', '1')
              ->where('id', $id)
              ->get()->toJson();
        return view('frontend.detail', compact('dataDetail'));
    }
}
