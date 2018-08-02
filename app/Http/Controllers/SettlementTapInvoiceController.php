<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SettlementTapInvoiceDataTable;
use App\SettlementTapInvoice;

class SettlementTapInvoiceController extends Controller
{
    private $title = 'Settlement Tap Invoice';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettlementTapInvoiceDataTable $dataTable)
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
        return view('admin.crud.settlementtapinvoice.add', compact('groups'))
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
        SettlementTapInvoice::create($request->all());

        return redirect(route('settlementtapinvoice.index'))
                        ->with('message','Settlement Tap Invoice added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settlementtapinvoice = SettlementTapInvoice::find($id);
        return view('admin.crud.settlementtapinvoice.show',compact('settlementtapinvoice'))
            ->with('title', $settlementtapinvoice->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settlementtapinvoice = SettlementTapInvoice::find($id);
        return view('admin.crud.settlementtapinvoice.edit', compact('settlementtapinvoice', 'groups'))->with('title', $this->title);
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
        SettlementTapInvoice::find($id)->update($request->all());
        return redirect()->route('settlementtapinvoice.index')
                ->with('message','Settlement Tap Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SettlementTapInvoice::find($id)->delete();
        return redirect()->route('settlementtapinvoice.index')
                        ->with('message','Settlement Tap Invoice deleted successfully');
    }
}
