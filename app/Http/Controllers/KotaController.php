<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KotaDataTable;
use App\Kota;
use App\Regional;
class KotaController extends Controller
{
    private $title = 'Kota';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KotaDataTable $dataTable)
    {
        // $title = 'Kota';
        return $dataTable->render('admin.crud.lists', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         // $title = 'Kota';
         $regional = Regional::pluck('nama','id');
         return view('admin.crud.kota.add', compact('regional'))->with('title', $this->title);
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
          'id_regional'          => 'required',
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
      $kota             = Kota::find($id);
      $regionals        = Regional::pluck('nama','id');
      // $continents     = Continent::pluck('nama','id');
      // $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
      // $services       = Service::pluck('nama', 'id');
      return view('admin.crud.kota.show', compact('kota','regionals'))->with('title',$kota->nama)->with('notes',$kota->notes);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $kota             = Kota::find($id);
      $regional         = Regional::pluck('nama','id');
      // $continents     = Continent::pluck('nama','id');
      // $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
      // $services       = Service::pluck('nama', 'id');
      return view('admin.crud.kota.edit', compact('kota','regional'))->with('title',$kota->nama)->with('notes',$kota->notes);
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
      $data_kota = array(
          'nama'          => $request->nama,
          'id_regional'   => $request->id_regional,
          'notes'         => $request->notes,
          'updated_by'    => $request->updated_by
      );
      Kota::find($id)->update($data_kota);
      return redirect()->route('kota.index')
              ->with('message','Kota updated successfully');
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
