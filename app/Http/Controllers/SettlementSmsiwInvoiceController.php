<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SettlementSmsiwInvoiceDataTable;
use App\SettlementSmsiwInvoice;

class SettlementSmsiwInvoiceController extends Controller
{
    private $title = 'Settlement SMS IW Invoice';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettlementSmsiwInvoiceDataTable $dataTable)
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
        return view('admin.crud.settlementsmsiw.add', compact('groups'))
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
        SettlementSmsiwInvoice::create($request->all());

        return redirect(route('settlementsmsiw.index'))
                        ->with('message','Settlement SMS IW Invoice added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settlementsmsiwinvoice = SettlementSmsiwInvoice::find($id);
        return view('admin.crud.settlementsmsiw.show',compact('settlementsmsiwinvoice'))
            ->with('title', $settlementsmsiwinvoice->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settlementsmsiwinvoice = SettlementSmsiwInvoice::find($id);
        return view('admin.crud.settlementsmsiw.edit', compact('settlementsmsiwinvoice', 'groups'))->with('title', $this->title);
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
        SettlementSmsiwInvoice::find($id)->update($request->all());
        return redirect()->route('settlementsmsiw.index')
                ->with('message','Settlement SMS IW Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SettlementSmsiwInvoice::find($id)->delete();
        return redirect()->route('settlementsmsiw.index')
                        ->with('message','Settlement SMS IW Invoice deleted successfully');
    }
}
