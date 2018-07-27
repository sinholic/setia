<?php

namespace App\Http\Controllers;
use App\MSC;
use App\Kota;
use App\Regional;
use App\StatusDataSwitch;
use Illuminate\Http\Request;
use App\DataTables\MscDataTable;

class MscController extends Controller
{
    private $title = 'MSC';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MscDataTable $dataTable)
    {

        return $dataTable->render('admin.crud.lists', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $regional         = Regional::pluck('nama','id');
      $kota             = Kota::pluck('nama','id');
      $status           = StatusDataSwitch::pluck('nama','id');
      return view('admin.crud.msc.add', compact('regional','kota','status'))->with('title', $this->title);
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
          'kode'          => 'required',
          'nama'         => 'required',

      ]);
      MSC::create($request->all());

      return redirect(route('msc.index'))
                      ->with('message','MSC added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $msc              = MSC::find($id);
      $kota             = Kota::pluck('nama','id');
      $regional         = Regional::pluck('nama','id');
      $status           = StatusDataSwitch::pluck('nama','id');
      // $continents     = Continent::pluck('nama','id');
      // $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
      // $services       = Service::pluck('nama', 'id');
      return view('admin.crud.msc.show', compact('msc','kota','regional','status'))->with('title',$msc->nama)->with('notes',$msc->notes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $msc              = MSC::find($id);
      $kota             = Kota::pluck('nama','id');
      $regional         = Regional::pluck('nama','id');
      $status           = StatusDataSwitch::pluck('nama','id');
      // $continents     = Continent::pluck('nama','id');
      // $rates          = RateInterkoneksiNegara::where('id_negara', $id)->get();
      // $services       = Service::pluck('nama', 'id');
      return view('admin.crud.msc.edit', compact('msc','kota','regional','status'))->with('title',$msc->nama)->with('notes',$msc->notes);
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
      $data_msc = array(
          'nama'          => $request->nama,
          'id_regional'   => $request->id_regional,
          'id_kota'   => $request->id_kota,
          'id_status'   => $request->id_status,
          'gt'   => $request->gt,
          'kode'   => $request->kode,
          'filename'   => $request->filename,
          'recentity'   => $request->recentity,
          'notes'         => $request->notes,
          'updated_by'    => $request->updated_by
      );
      MSC::find($id)->update($data_msc);
      return redirect()->route('msc.index')
              ->with('message','MSC updated successfully');
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
}
