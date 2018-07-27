<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Menu;
use App\XGroupMenu;

class MenuController extends Controller
{
    private $title = 'Menu';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
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
        $groups = XGroupUser::pluck('nama','id');
        return view('admin.crud.user.add', compact('groups'))
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
        User::create($request->all());

        return redirect(route('user.index'))
                        ->with('message','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.crud.user.show',compact('user'))
            ->with('title', $user->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $groups = XGroupUser::pluck('nama','id');
        return view('admin.crud.user.edit', compact('user', 'groups'))->with('title', $this->title);
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
        User::find($id)->update($request->all());
        return redirect()->route('user.index')
                ->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
                        ->with('message','User deleted successfully');
    }
}
