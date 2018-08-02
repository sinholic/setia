<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\user;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
class NewsController extends Controller
{
    public function index(Request $request)
    {
        $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.link_url')
        ->where('a_menu.is_public', '1')
        ->join('a_group_menu', 'a_group_menu.id', '=', 'a_menu.id_group_menu')->get();
        $categorynews = CategoryNews::get();
        $dataAll=News::select('a_news.*', 'xuser.name')
        ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
        ->where('a_news.is_publish', '1')
        ->get()->toJson();
        return view('frontend.main', compact('dataAll','categorynews','menu_bi'));
    }

    public function detail($id)
    {
        $categorynews = CategoryNews::get();
      $dataDetail=News::select('a_news.*', 'xuser.name')
              ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
              ->where('a_news.is_publish', '1')
              ->where('a_news.id', $id)
              ->get()->toJson();
        return view('frontend.detail', compact('dataDetail','categorynews'));
    }
    public function bycategory($id){
        $title = CategoryNews::find($id);
        $categorynews = CategoryNews::get();
        $datanews = News::where('a_news.id_category','=',$id)->get();
        return view('frontend.category', compact('datanews','categorynews'))->with('title', $title->nama);
    }
}
