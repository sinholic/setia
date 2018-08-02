<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
use App\Counter;
class DataBIController extends Controller
{

    public function handset(Request $request,$id)
    {
        $data_bi = Menu::find($id);
        $cx=Counter::find(0);

        $cx->counter=$cx->counter + 1;
        // $cx->counter=  1 ;
        //$data_counter = array('counter' => $cx->counter );
        $cx->save();
        $master['username']= (($cx->counter % 12)+1);
        $categorynews = CategoryNews::get();
        return view('frontend.dataBI', compact('categorynews','data_bi','master'));
    }

}
