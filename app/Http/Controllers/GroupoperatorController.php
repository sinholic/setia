<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\GroupoperatorDataTable;
use App\GroupOperator;

class GroupoperatorController extends Controller
{
    private $title = 'Group Operator';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(GroupoperatorDataTable $dataTable)
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
        return view('admin.crud.groupoperator.add', compact('fields'))
        ->with('title', $this->title);
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
            'nama' => 'required',
        ]);
        GroupOperator::create($request->all());

        return redirect(route('groupoperator.index'))
        ->with('message','Group Operator added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $groupoperator = GroupOperator::find($id);
        return view('admin.crud.groupoperator.show',compact('groupoperator'))
        ->with('title', $groupoperator->nama);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $groupoperator = GroupOperator::find($id);
        return view('admin.crud.groupoperator.edit', compact('groupoperator'))->with('title', $this->title);
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
            'nama' => 'required',
        ]);
        GroupOperator::find($id)->update($request->all());
        return redirect()->route('groupoperator.index')
        ->with('message','Group Operator updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        GroupOperator::find($id)->delete();
        return redirect()->route('groupoperator.index')
        ->with('message','Group Operator deleted successfully');
    }
}
