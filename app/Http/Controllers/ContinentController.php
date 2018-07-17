<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ContinentDataTable;
use App\Continent;

class ContinentController extends Controller
{
    private $title = 'Continent';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContinentDataTable $dataTable)
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
        return view('admin.crud.continent.add', compact('fields'))
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
        Continent::create($request->all());

        return redirect(route('continent.index'))
                        ->with('message','Continent added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $continent = Continent::find($id);
        return view('admin.crud.continent.show',compact('continent'))
            ->with('title', $continent->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $continent = Continent::find($id);
        return view('admin.crud.continent.edit', compact('continent'))->with('title', $this->title);
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
        Continent::find($id)->update($request->all());
        return redirect()->route('continent.index')
                ->with('message','Continent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Continent::find($id)->delete();
        return redirect()->route('continent.index')
                        ->with('message','Continent deleted successfully');
    }
}
