<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryNews;
use App\Menu;
use App\GroupMenu;
use App\Counter;
use DB;
// use Illuminate\Support\Str;
class DataBIController extends Controller
{

    public function handset(Request $request,$id,$nama)
    {
        if($nama=='Handset Display'||$nama=='Operator Code'||$nama=='Roaming Exchange Rate'||$nama=='Roaming Partner'){
            // $param=$this->form_validation->set_rules('username', 'Username', 'strtolower');
            $param=strtolower($nama);
            $namae=str_replace(' ','',$param);
            $table='v_'.$namae;
            $request->session()->put('status', $nama);

            $categorynews = CategoryNews::get();
            $data=DB::table($table)->select('*')->get();
            return view('frontend.dataTable', compact('categorynews','data','param'));
        }else{

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

    public function adminBI($slug)
    {
        $data_bi = Menu::where('link_slug',$slug)->first();
        // dd();
        $cx=Counter::find(0);

        $cx->counter=$cx->counter + 1;
        // $cx->counter=  1 ;
        //$data_counter = array('counter' => $cx->counter );
        $cx->save();
        $master['username']= (($cx->counter % 12)+1);
        return view('admin.dataBI', compact('categorynews','data_bi','master'));
    }

}
