<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\GroupMenuDataTable;
use App\GroupMenu;

class GroupMenuController extends Controller
{
    private $title = 'Group Menu';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(GroupMenuDataTable $dataTable)
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
        return view('admin.crud.groupmenu.add', compact('fields'))
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
        GroupMenu::create($request->all());

        return redirect(route('groupmenu.index'))
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
        $groupmenu = GroupMenu::find($id);
        return view('admin.crud.groupmenu.show',compact('groupmenu'))
        ->with('title', $groupmenu->nama);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $groupmenu = GroupMenu::find($id);
        return view('admin.crud.groupmenu.edit', compact('groupmenu'))->with('title', $this->title);
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
        GroupMenu::find($id)->update($request->all());
        return redirect()->route('groupmenu.index')
        ->with('message','Group menu updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        GroupMenu::find($id)->delete();
        return redirect()->route('groupmenu.index')
        ->with('message','Group user deleted successfully');
    }
}
