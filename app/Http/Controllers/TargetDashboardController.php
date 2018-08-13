<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TargetDashboardDataTable;
use App\TargetDashboard;

class TargetDashboardController extends Controller
{
    private $title = 'Target';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(TargetDashboardDataTable $dataTable)
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
        return view('admin.crud.targetdashboard.add', compact('fields'))
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
            'month' => 'required',
            'year' => 'required',
            'target' => 'required',
        ]);
        TargetDashboard::create($request->all());

        return redirect(route('target.index'))
        ->with('message',$this->title.' added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $targetdashboard = TargetDashboard::find($id);
        return view('admin.crud.targetdashboard.show',compact('targetdashboard'))
        ->with('title', $targetdashboard->id);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $targetdashboard = TargetDashboard::find($id);
        return view('admin.crud.targetdashboard.edit', compact('targetdashboard'))->with('title', $this->title);
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
            'month' => 'required',
            'year' => 'required',
            'target' => 'required',
        ]);
        TargetDashboard::find($id)->update($request->all());
        return redirect()->route('target.index')
        ->with('message',$this->title.' updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        TargetDashboard::find($id)->delete();
        return redirect()->route('target.index')
        ->with('message',$this->title.' deleted successfully');
    }
}
