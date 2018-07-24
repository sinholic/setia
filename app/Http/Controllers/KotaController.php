<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KotaDataTable;
use App\Kota;
class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KotaDataTable $dataTable)
    {
        $title = 'Kota';
        return $dataTable->render('admin.crud.lists', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         $kota = Kota::pluck('nama','id');
         return view('admin.crud.kota.add', compact('kota'))->with('title', $this->title);
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
          'id_kota'          => 'required',
          'nama'         => 'required',

      ]);
      Kota::create($request->all());

      return redirect(route('kota.index'))
                      ->with('message','Kota added successfully');
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
      $kota         = Kota::find($id);
      // $continents     = Continent::pluck('nama','id');
      // $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
      // $services       = Service::pluck('nama', 'id');
      return view('admin.crud.kota.edit', compact('kota'))->with('title', $kota->nama);
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
      //RateInterkoneksiNegara::where('id_negara', $id)->delete();
      Kota::find($id)->delete();
      return redirect()->route('kota.index')
                      ->with('message','Kota deleted successfully');
    }
}
