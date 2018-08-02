<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CategoryNewsDataTable;
use App\CategoryNews;

class CategoryNewsController extends Controller
{
    private $title = 'Category News';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryNewsDataTable $dataTable)
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
        return view('admin.crud.categorynews.add', compact('fields'))
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
        $data_category=array(
          "nama" =>$request->nama,
          "notes" =>$request->notes
        );
        CategoryNews::create($data_category);

        return redirect(route('categorynews.index'))
                        ->with('message','Category News added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorynews = CategoryNews::find($id);
        return view('admin.crud.categorynews.show',compact('categorynews'))
            ->with('title', $categorynews->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorynews = CategoryNews::find($id);
        return view('admin.crud.categorynews.edit', compact('categorynews'))->with('title', $this->title);
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
        CategoryNews::find($id)->update($request->all());
        return redirect()->route('categorynews.index')
                ->with('message','Category News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryNews::find($id)->delete();
        return redirect()->route('categorynews.index')
                        ->with('message','Category News deleted successfully');
    }
}
