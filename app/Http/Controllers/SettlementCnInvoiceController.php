<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SettlementCnInvoiceDataTable;
use App\SettlementCnInvoice;

class SettlementCnInvoiceController extends Controller
{
    private $title = 'Settlement Cn Invoice';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettlementCnInvoiceDataTable $dataTable)
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
        return view('admin.crud.settlementcninvoice.add', compact('groups'))
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
            'id_group'  => 'required',
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        // $request->password = Hash::make($request->password);
        SettlementCnInvoice::create($request->all());

        return redirect(route('settlementcninvoice.index'))
                        ->with('message','Settlement Cn Invoice added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settlementcninvoice = SettlementCnInvoice::find($id);
        return view('admin.crud.settlementcninvoice.show',compact('settlementcninvoice'))
            ->with('title', $settlementcninvoice->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settlementcninvoice = SettlementCnInvoice::find($id);
        $groups = XGroupSettlementCnInvoice::pluck('nama','id');
        return view('admin.crud.settlementcninvoice.edit', compact('settlementcninvoice', 'groups'))->with('title', $this->title);
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
            'id_group'  => 'required',
            'name'      => 'required',
            'email'     => 'required|email'
        ]);
        SettlementCnInvoice::find($id)->update($request->all());
        return redirect()->route('settlementcninvoice.index')
                ->with('message','Settlement Cn Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SettlementCnInvoice::find($id)->delete();
        return redirect()->route('settlementcninvoice.index')
                        ->with('message','Settlement Cn Invoice deleted successfully');
    }
}
