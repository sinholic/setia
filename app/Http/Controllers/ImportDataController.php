<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ImportDataDataTable;
use App\ImportData;

class ImportDataController extends Controller
{
    private $title = 'Manage CSV Target';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(ImportDataDataTable $dataTable)
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
        return view('admin.crud.manage.add', compact('regional'))->with('title', $this->title);
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
            'label'         => 'required',
            'targettable'   => 'required',
            'fields'        => ['required','regex:(([a-z|A-Z]|\s)\=([a-z|A-Z]|\s))']
        ]);
        ImportData::create($request->all());

        return redirect(route('manage.index'))
        ->with('message','Manage CSV added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $manage = ImportData::find($id);
        return view('admin.crud.manage.show', compact('manage','regionals'))->with('title',$manage->label);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $manage = ImportData::find($id);
        return view('admin.crud.manage.edit', compact('manage','regional'))->with('title',$manage->label);
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
        ImportData::find($id)->update($request->all());
        return redirect()->route('manage.index')
        ->with('message','Manage CSV updated successfully');
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
        ImportData::find($id)->delete();
        return redirect()->route('manage.index')
        ->with('message','Manage CSV deleted successfully');
    }
}
