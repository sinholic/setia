<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
class DataBIController extends Controller
{

    public function handset(Request $request)
    {
        $menu_bi = Menu::join('a_group_menu', 'a_group_menu.id', '=', 'a_menu.id_group_menu')->get();
        $categorynews = CategoryNews::get();
        return view('frontend.handset', compact('categorynews','menu_bi'));
    }

}
