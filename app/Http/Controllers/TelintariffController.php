<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TelintariffDataTable;
use Yajra\Datatables\Datatables;
use App\TelinTarif;
use App\TelinTarifLog;

class TelintariffController extends Controller
{
    private $title = 'Telin Tarif';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(TelintariffDataTable $dataTable)
    {
        return $dataTable->render('admin.crud.telintarif.index', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.telintarif.add', compact('continents'))->with('title', $this->title);
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
            'nama'          => 'required',
            'tarif'         => 'required',
            'tgl_berlaku'   => 'required'
        ]);
        TelinTarif::create($request->all());

        return redirect(route('telintarif.index'))
                        ->with('message','Tarif added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarif          = TelinTarif::find($id);
        return view('admin.crud.telintarif.show', compact('tarif'))->with('title', $tarif->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarif          = TelinTarif::find($id);
        return view('admin.crud.telintarif.edit', compact('tarif'))->with('title', $tarif->nama);
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
        $this->validate($request, [
            'nama'          => 'required',
            'tarif'         => 'required',
            'tgl_berlaku'   => 'required'
        ]);
        $tarif  = TelinTarif::find($id);
        $log    = TelinTarifLog::where('id_telin_tarif', $id)->get()->last();
        // dd($log);
        $data_log = array(
            'id_telin_tarif'    => $id,
            'tarif'             => $request->tarif,
            'tarif_previous'    => $tarif->tarif,
            'notes'             => $request->notes,
            'tgl_berlaku'       => $tarif->tgl_berlaku,
            'created_by'        => \Auth::user()->id,
            'updated_by'        => \Auth::user()->id
        );
        $tarif->update($request->all());
        TelinTarifLog::create($data_log);

        return redirect()->route('telintarif.index')
                ->with('message','Tarif updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TelinTarifLog::where('id_telin_tarif', $id)->delete();
        TelinTarif::find($id)->delete();
        return redirect()->route('telintarif.index')
                        ->with('message','Tarif deleted successfully');
    }

    public function detailTarif(Request $request, $id)
    {
        $tarifs = TelinTarif::find($id)->logs()->select(
            \DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'),
            'tarif',
            'tgl_berlaku'
        );
        return Datatables::of($tarifs)->make(true);
    }
}
