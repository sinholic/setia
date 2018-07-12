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
        return Datatables::of($continents)
            ->addColumn('action', function ($continents) {
                return '
                <a href="#edit-'.$continents->id.'" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#delete-'.$continents->id.'" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Delete
                </a>';
            })
            ->make();
    }

}
