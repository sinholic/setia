<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\GroupUserDataTable;
use App\XGroupUser;

class GroupUserController extends Controller
{
    private $title = 'Group User';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(GroupUserDataTable $dataTable)
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
        return view('admin.crud.groupuser.add', compact('fields'))
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
        XGroupUser::create($request->all());

        return redirect(route('groupuser.index'))
        ->with('message','Group user added successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $groupuser = XGroupUser::find($id);
        return view('admin.crud.groupuser.show',compact('groupuser'))
        ->with('title', $groupuser->nama);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $groupuser = XGroupUser::find($id);
        return view('admin.crud.groupuser.edit', compact('groupuser'))->with('title', $this->title);
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
        XGroupUser::find($id)->update($request->all());
        return redirect()->route('groupuser.index')
        ->with('message','Group user updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        XGroupUser::find($id)->delete();
        return redirect()->route('groupuser.index')
        ->with('message','Group user deleted successfully');
    }
}
