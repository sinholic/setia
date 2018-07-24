<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OperatorDataTable;
use App\Operator;
use App\Negara;
use App\TipeOrganisasi;
use App\GroupOperator;
use App\Service;
use App\RateInterkoneksiOperator;
use App\RoamingPartner;
use App\OpsiRoamingPartner;
use Yajra\Datatables\Datatables;

class OperatorController extends Controller
{
    private $title = 'Operator';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(OperatorDataTable $dataTable)
    {
        return $dataTable->render('admin.crud.operator.index', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $negaras = Negara::pluck('nama','id');
        $tipe_organisasis = TipeOrganisasi::pluck('nama','id');
        $group_operators = GroupOperator::pluck('nama','id');
        return view('admin.crud.operator.add', compact('negaras', 'tipe_organisasis', 'group_operators'))->with('title', $this->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operator               = Operator::find($id);
        $negaras                = Negara::pluck('nama','id');
        $tipe_organisasis       = TipeOrganisasi::pluck('nama','id');
        $group_operators        = GroupOperator::pluck('nama','id');
        $rates                  = RateInterkoneksiOperator::where('id_operator', $id)->get();
        $services               = Service::pluck('nama', 'id');
        $roamingpartners        = RoamingPartner::with('group_roaming')->get();
        $opsiroamingpartners    = OpsiRoamingPartner::all();
        // dd($operator->roamingpartners[0]->nama);
        return view('admin.crud.operator.edit', compact('operator', 'rates', 'services', 'roamingpartners', 'opsiroamingpartners', 'negaras', 'tipe_organisasis', 'group_operators'))->with('title', $this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detailOperator(Request $request, $id)
    {
        $rates = Operator::find($id)->rateinterkoneksioperators()->with('negara','service', 'unit_service')->where('id_service', '!=', 6);
        return Datatables::of($rates)->make(true);
    }
}
