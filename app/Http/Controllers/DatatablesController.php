<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Negara;
use App\Continent;

class DatatablesController extends Controller
{
    public function getContinentList(Request $request)
    {
        $continents = Continent::select(['id', 'nama'])->orderBy('id', 'DESC');
        return Datatables::of($continents)->make();
    }

}
