<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryNews;
use App\Menu;
use App\Implement;
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
            $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
            ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
            ->where('a_menu.is_public', '1')
            ->get();
            $data_bi = Menu::find($id);
            $categorynews = CategoryNews::get();
            $data=DB::table($table)->select('*')->get();
            return view('layoutsnew.dataTable', compact('categorynews','data','param','menu_bi'));
        }else{

            $data_bi = Menu::find($id);
            $cx=Counter::find(0);

            $cx->counter=$cx->counter + 1;
            // $cx->counter=  1 ;
            //$data_counter = array('counter' => $cx->counter );
            $cx->save();
            $master['username']= (($cx->counter % 12)+1);
            $categorynews = CategoryNews::get();
            $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
            ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
            ->where('a_menu.is_public', '1')
            ->get();
            return view('layoutsnew.dataBI', compact('categorynews','data_bi','master','menu_bi'));
        }
    }

    public function adminBI(Request $request,$slug)
    {
        $data_bi = Menu::where('link_slug',$slug)->first();
        if ($data_bi->link_label == 'IOT Status') {
            $nama = $data_bi->link_label;
            $param=strtolower($nama);
            $request->session()->put('status', $nama);
            $menu_bi = Menu::select('a_group_menu.id','a_group_menu.nama', 'a_menu.link_label','a_menu.id as id_menu','a_menu.link_url')
            ->leftjoin('a_group_menu', 'a_menu.id_group_menu', '=', 'a_group_menu.id')
            ->where('a_menu.is_public', '1')
            ->get();
            $categorynews = CategoryNews::get();
            $data_year = array(
                \Carbon\Carbon::now()->subYears(5)->year,
                \Carbon\Carbon::now()->year,
            );
            $data=Implement::select('operator_id','skema')->groupBy('operator_id')->groupBy('skema')->get();
            return view('layoutsnew.dataTable', compact('categorynews','data','param','menu_bi', 'data_year', 'data_bi'));
        }else {
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

}
