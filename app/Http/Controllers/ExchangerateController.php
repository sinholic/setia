<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ExchangerateDataTable;
use App\RoamingExchangeRate;
class ExchangerateController extends Controller
{
    private $title = 'Roaming Exchange Rate';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(ExchangerateDataTable $dataTable)
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
      return view('admin.crud.exchangerate.add', compact('fields'))
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
          'nilai' => 'required',
      ]);
      RoamingExchangeRate::create($request->all());

      return redirect(route('exchangerate.index'))
      ->with('message','Roaming Exchange Rate added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $exchangerate = RoamingExchangeRate::find($id);
      return view('admin.crud.exchangerate.show',compact('exchangerate'))
      ->with('title', $exchangerate->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $exchangerate = RoamingExchangeRate::find($id);
      return view('admin.crud.exchangerate.edit', compact('exchangerate'))->with('title', $this->title);
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
          'nilai' => 'required',
      ]);
      RoamingExchangeRate::find($id)->update($request->all());
      return redirect()->route('exchangerate.index')
      ->with('message','Roaming Exchange Rate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      RoamingExchangeRate::find($id)->delete();
      return redirect()->route('exchangerate.index')
      ->with('message','Roaming Exchange Rate deleted successfully');
    }
}
