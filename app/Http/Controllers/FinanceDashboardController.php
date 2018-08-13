<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FinanceDashboardDataTable;
use App\FinanceDashboard;

class FinanceDashboardController extends Controller
{
    private $title = 'Finance';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(FinanceDashboardDataTable $dataTable)
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
        return view('admin.crud.financedashboard.add', compact('fields'))
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
            'finance' => 'required',
        ]);
        FinanceDashboard::create($request->all());

        return redirect(route('finance.index'))
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
        $financedashboard = FinanceDashboard::find($id);
        return view('admin.crud.financedashboard.show',compact('financedashboard'))
        ->with('title', $financedashboard->id);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $financedashboard = FinanceDashboard::find($id);
        return view('admin.crud.financedashboard.edit', compact('financedashboard'))->with('title', $this->title);
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
            'finance' => 'required',
        ]);
        FinanceDashboard::find($id)->update($request->all());
        return redirect()->route('finance.index')
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
        FinanceDashboard::find($id)->delete();
        return redirect()->route('finance.index')
        ->with('message',$this->title.' deleted successfully');
    }
}
