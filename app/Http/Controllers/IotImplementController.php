<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\IotImplementDataTable;
use App\IotImplement;

class IotImplementController extends Controller
{
    private $title = 'IOT Implement';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(IotImplementDataTable $dataTable)
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
        return view('admin.crud.iotimplement.add', compact('regional'))->with('title', $this->title);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'label'         => 'required',
        //     'targettable'   => 'required',
        //     'fields'        => ['required','regex:(([a-z|A-Z]|\s)\=([a-z|A-Z]|\s))']
        // ]);
        IotImplement::create($request->all());

        return redirect(route('iotimplement.index'))
        ->with('message','IOT Implement added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $iotimplement = IotImplement::find($id);
        return view('admin.crud.iotimplement.show', compact('iotimplement','regionals'))->with('title',$iotimplement->tapcode);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $iotimplement = IotImplement::find($id);
        return view('admin.crud.iotimplement.edit', compact('iotimplement','regional'))->with('title',$iotimplement->tapcode);
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
        IotImplement::find($id)->update($request->all());
        return redirect()->route('iotimplement.index')
        ->with('message','IOT Implement updated successfully');
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
        IotImplement::find($id)->delete();
        return redirect()->route('iotimplement.index')
        ->with('message','IOT Implement deleted successfully');
    }
}
