<?php

namespace App\Http\Controllers;
use App\DataTables\NegaraDataTable;
use App\Continent;
use App\Negara;
use App\RateInterkoneksiNegara;
use App\Service;
use App\OpsiUnitService;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class NegaraController extends Controller
{
    private $title = 'Negara';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NegaraDataTable $dataTable)
    {
        return $dataTable->render('admin.crud.negara.index', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::pluck('nama','id');
        return view('admin.crud.negara.add', compact('continents'))->with('title', $this->title);
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
            'id_continent'  => 'required',
            'nama'          => 'required'
        ]);
        Negara::create($request->all());

        return redirect(route('negara.index'))
                        ->with('message','Negara added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negara         = Negara::find($id);
        $continents     = Continent::pluck('nama','id');
        $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
        $services       = Service::pluck('nama', 'id');
        return view('admin.crud.negara.show', compact('negara', 'continents', 'rates', 'services'))->with('title', $negara->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negara             = Negara::find($id);
        $continents         = Continent::pluck('nama','id');
        $rates              = RateInterkoneksiNegara::where('id_negara', $id)->get();
        $services           = Service::pluck('nama', 'id');
        $opsiunitservices   = OpsiUnitService::all();
        return view('admin.crud.negara.edit', compact('negara', 'continents', 'rates', 'services', 'opsiunitservices'))->with('title', $negara->nama);
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
        // dd($request->all());
        // $this->validate($request, [
        //     'nama' => 'required',
        // ]);
        $data_negara = array(
            'nama'          => $request->nama,
            'id_continent'  => $request->id_continent,
            'mcc'           => $request->mcc,
            'iso3'          => $request->iso3,
            'notes'         => $request->notes,
            'updated_by'    => $request->updated_by
        );
        Negara::find($id)->update($data_negara);
        if (isset($request->rates)) {
            foreach ($request->rates as $key => $rate) {
                if (isset($rate['delete']) && $rate['delete'] == 'yes') {
                    RateInterkoneksiNegara::find($rate['id_rate'])->delete();
                }else {
                    $data_rate = array(
                        'id_negara'             => $id,
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
                    RateInterkoneksiNegara::updateOrCreate(
                        ['id_negara' => $id, 'id_service' => $rate['id_service']],
                        $data_rate
                    );
                }
            }
        }
        return redirect()->route('negara.index')
                ->with('message','Negara updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RateInterkoneksiNegara::where('id_negara', $id)->delete();
        Negara::find($id)->delete();
        return redirect()->route('negara.index')
                        ->with('message','Negara deleted successfully');
    }

    public function detailNegara(Request $request, $id)
    {
        $rates = Negara::find($id)->rateinterkoneksinegaras()->with('negara','service', 'unit_service');
        return Datatables::of($rates)->make(true);
    }
}
