<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AA14DataTable;
use App\AA14;

class AA14Controller extends Controller
{
    private $title = 'AA14';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(AA14DataTable $dataTable)
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
        return view('admin.crud.aa14.add', compact('regional'))->with('title', $this->title);
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
        AA14::create($request->all());

        return redirect(route('aa14.index'))
        ->with('message','AA14 added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $aa14 = AA14::find($id);
        return view('admin.crud.aa14.show', compact('aa14','regionals'))->with('title',$aa14->aa14);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $aa14 = AA14::find($id);
        return view('admin.crud.aa14.edit', compact('aa14','regional'))->with('title',$aa14->aa14);
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
        AA14::find($id)->update($request->all());
        return redirect()->route('aa14.index')
        ->with('message','AA14 updated successfully');
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
        AA14::find($id)->delete();
        return redirect()->route('aa14.index')
        ->with('message','AA14 deleted successfully');
    }
}
