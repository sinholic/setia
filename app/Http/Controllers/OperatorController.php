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
use App\OpsiUnitService;
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
        $this->validate($request, [
            'nama'      => 'required',
            'kode'      => 'required',
            'id_negara' => 'required'
        ]);
        Operator::create($request->all());

        return redirect(route('operator.index'))
        ->with('message','Operator added successfully');
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
        $opsiunitservices       = OpsiUnitService::all();
        // dd($operator->roamingpartners[0]->nama);
        return view('admin.crud.operator.edit', compact('operator', 'rates', 'services', 'roamingpartners', 'opsiroamingpartners', 'opsiunitservices', 'negaras', 'tipe_organisasis', 'group_operators'))->with('title', $this->title);
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

        $data_operator = array(
            "nama"                  => $request->nama,
            "kode"                  => $request->kode,
            "mnc"                   => $request->mnc,
            "network_display"       => $request->network_display,
            "parentorg"             => $request->parentorg,
            "comments"              => $request->comments,
            "address"               => $request->address,
            "phone"                 => $request->phone,
            "contact_person_nama"   => $request->contact_person_nama,
            "contact_person_email"  => $request->contact_person_email,
            "contact_person_phone"  => $request->contact_person_phone,
            "register_date"         => $request->register_date,
            "kategori"              => $request->kategori,
            "building"              => $request->building,
            "kota"                  => $request->kota,
            "id_negara"             => $request->id_negara,
            "id_tipe_organisasi"    => $request->id_tipe_organisasi,
            "notes"                 => $request->notes,
            "updated_by"            => $request->updated_by
        );
        $operator = Operator::find($id);
        $operator->update($data_operator);
        if (isset($request->partner)) {
            $sync_data = array();
            foreach ($request->partner as $key => $partner) {
                $sync_data[$partner['id_roaming_partner']] = [
                        'id_opsi_roaming_partner'   => $partner['id_opsi_roaming_partner'],
                        'launching_date_tsel'       => $partner['launching_date_tsel'],
                        'launching_date_rp'         => $partner['launching_date_rp'],
                    ];
            }
            $operator->roamingpartners()->sync($sync_data);
        }
        // dd($operator->roamingpartners);
        if (isset($request->rates)) {
            foreach ($request->rates as $key => $rate) {
                if (isset($rate['delete']) && $rate['delete'] == 'yes') {
                    RateInterkoneksiOperator::find($rate['id_rate'])->delete();
                }else {
                    $data_rate = array(
                        'id_operator'           => $id,
                        'id_service'            => $rate['id_service'],
                        'id_opsi_unit_service'  => $rate['id_opsi_unit_service'],
                        'nilai_unit'            => $rate['nilai_unit'],
                        'nilai_rate'            => $rate['nilai_rate'],
                        'tgl_berlaku'           => $rate['tgl_berlaku'],
                        'notes'                 => null,
                        'updated_by'            => $request->updated_by
                    );
                    if (!isset($rate['id_rate'])) {
                        $data_rate['created_by'] = $request->created_by;
                    }
                    RateInterkoneksiOperator::updateOrCreate(
                        ['id_operator' => $id, 'id_service' => $rate['id_service']],
                        $data_rate
                    );
                }
            }
        }
        return redirect()->route('operator.index')
                ->with('message','Operator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = Operator::find($id);
        RateInterkoneksiOperator::where('id_operator', $id)->delete();
        $operator->roamingpartners->sync([]);
        $operator->delete();
        return redirect()->route('operator.index')
                        ->with('message','Operator deleted successfully');
    }

    public function detailOperator(Request $request, $id)
    {
        $rates = Operator::find($id)->rateinterkoneksioperators()->with('negara','service', 'unit_service')->where('id_service', '!=', 6);
        return Datatables::of($rates)->make(true);
    }
}
