<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\News;
use App\user;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
class NewsController extends Controller
{
    /*public function index(Request $request)
    {
        $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
        ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
        ->where('a_menu.is_public', '1')
        ->get()->toJson();
        $categorynews = CategoryNews::get();
        $dataAll=News::select('a_news.*', 'xuser.name')
        ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
        ->where('a_news.is_publish', '1')
        ->orderBy('updated_at', 'DESC')
        ->get()->toJson();
        return view('frontend.main', compact('dataAll','categorynews','menu_bi'));
    }*/

    public function index(Request $request)
    {
        $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
        ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
        ->where('a_menu.is_public', '1')
        ->get();
        $categorynews = CategoryNews::get();
        $dataAll=News::where('is_publish', 1)
        ->orderBy('updated_at', 'DESC')
        ->get();
        return view('layoutsnew.main', compact('dataAll','categorynews','menu_bi'));
    }

    public function searching(Request $request)
    {
      $q=$request->q;

      $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
      ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
      ->where('a_menu.is_public', '1')
      ->get()->toJson();
      $categorynews = CategoryNews::get();
      $dataAll=News::select('a_news.*', 'xuser.name')
              ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
              ->where('a_news.is_publish', '1')
              ->where('a_news.title', 'LIKE','%'.$q.'%')->orWhere('xuser.name','LIKE','%'.$q.'%')
              ->orderBy('updated_at', 'DESC')
              ->get();
        return view('layoutsnew.main', compact('dataAll','categorynews','menu_bi'));
    }
    public function detail($id,$slug)
    {
      $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
      ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
      ->where('a_menu.is_public', '1')
      ->get()->toJson();
      $categorynews = CategoryNews::get();
      $dataDetail=News::select('a_news.*', 'xuser.name')
              ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
              ->where('a_news.is_publish', '1')
              ->where('a_news.id', $id)
              ->where('a_news.slug', $slug)
              ->get()->toJson();
        return view('layoutsnew.detail', compact('dataDetail','categorynews','menu_bi'));
    }
    public function bycategory($id){
      $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
                      ->where('a_menu.is_public', '1')
                      ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')->get();
        $title = CategoryNews::find($id);
        $categorynews = CategoryNews::get();
        // $dataAll=News::select('a_news.*', 'xuser.name')
        //           ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
        //           ->where('a_news.is_publish', '1')
        //           ->orderBy('updated_at', 'DESC')
        //           ->get()->toJson();
        $dataAll = News::select('a_news.*', 'xuser.name')
                    ->join('xuser', 'a_news.updated_by', '=', 'xuser.id')
                    ->where('a_news.is_publish','1')
                    ->where('a_news.id_category',$id)->get();
        return view('layoutsnew.main', compact('categorynews','menu_bi','dataAll'))->with('title', $title->nama);
    }
}
