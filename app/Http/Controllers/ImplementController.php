<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ImplementDataTable;
use App\Implement;
use App\Operator;

class ImplementController extends Controller
{
    private $title = 'Implement';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(ImplementDataTable $dataTable)
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
        $operators = Operator::pluck('nama','id');
        return view('admin.crud.implement.add', compact('operators'))->with('title', $this->title);
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
            'operator_id'   => 'required',
            'skema'         => 'required',
            'years'         => 'required',
            'status'        => 'required',
        ]);
        Implement::create($request->all());

        return redirect(route('implement.index'))
        ->with('message','Implement added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $implement = Implement::find($id);
        $operators = Operator::pluck('nama','id');
        return view('admin.crud.implement.show', compact('implement','operators'))->with('title',$implement->operator->nama);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $implement = Implement::find($id);
        $operators = Operator::pluck('nama','id');
        return view('admin.crud.implement.edit', compact('implement','operators'))->with('title',$implement->operator->nama);
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
            'operator_id'   => 'required',
            'skema'         => 'required',
            'years'         => 'required',
            'status'        => 'required',
        ]);
        Implement::find($id)->update($request->all());
        return redirect()->route('implement.index')
        ->with('message','Implement updated successfully');
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
        Implement::find($id)->delete();
        return redirect()->route('implement.index')
        ->with('message','Implement deleted successfully');
    }
}
