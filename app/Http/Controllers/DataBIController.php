<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
class DataBIController extends Controller
{

    public function handset(Request $request,$id)
    {
        $menu_bi = Menu::leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')->where('a_menu.id','=',$id)->get();
        $categorynews = CategoryNews::get();
        return view('frontend.dataBI', compact('categorynews','menu_bi'));
    }

}
