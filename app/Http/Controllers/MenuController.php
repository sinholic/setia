<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MenuDataTable;
use App\Menu;
use App\GroupMenu;
use App\XGroupUser;
use App\GroupUserMenuRelation;

class MenuController extends Controller
{
    private $title = 'Menu';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MenuDataTable $dataTable)
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
        $groups = GroupMenu::pluck('nama','id');
        $groupusers = XGroupUser::get();
      //  $menu = Menu::pluck('is_public','id','is_frame','link_url');

        return view('admin.crud.menu.add', compact('groups','groupusers'))
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
            'link_label'  => 'required',
            'link_url'      => 'required',

        ]);
        $slug=$this->slug->createSlug($request->link_label);
        $data_menu= array(
            "link_label"                    => $request->link_label,
            "link_url"                      => $request->link_url,
            "link_desc"                     => $request->link_desc,
            "is_frame"                      => $request->is_frame,
            "is_public"                     => $request->is_public,
            "is_show_on_sidebar"            => $request->is_show_on_sidebar,
            "id_group_menu"                 => $request->id_group_menu,
            "updated_by"                    => $request->updated_by,
            "created_by"                    => $request->created_by,
            "link_slug"                     => $slug
        );
        $menu=Menu::create($data_menu);
        if (isset($request->group_user)) {
            foreach ($request->group_user as $key=>$group_user) {
              if($group_user!=0){
                $data_group_menu_user = array(
                    "id_menu"                  => $menu->id,
                    "id_group_user"            => $group_user,
                    "updated_by"               => $request->updated_by,
                    "created_by"               => $request->created_by
                );
                 GroupUserMenuRelation::create($data_group_menu_user);
             }
            }

            return redirect(route('menu.index'))
                            ->with('message','Menu added successfully');
                          }
        //foreach ($request->id as $key) {
          ///  print_r($request->group_user);
        //  }
        //}
        // $data_group_menu_user = array(
        //     "id_menu"                  => $menu->id,
        //     "id_group_user"            => $request->id_group_user,
        //     "updated_by"               => $request->updated_by
        //     "created_by"               => $request->created_by
        // );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        $groups = GroupMenu::pluck('nama','id');
        $groupusers = XGroupUser::join('a_menu_and_group_user','a_menu_and_group_user.id_group_user', '=', 'xgroup_user.id')
                      ->select(
                            \DB::raw('xgroup_user.id as id'),
                            \DB::raw('xgroup_user.nama as nama'),
                            \DB::raw('a_menu_and_group_user.id_group_user as group_user_id')
                          )
                      ->where('a_menu_and_group_user.id_menu','=',$id)
                      ->get();

        return view('admin.crud.menu.show',compact('menu','groups','groupusers'))
            ->with('title', $menu->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $groups = GroupMenu::pluck('nama','id');
        $groupusers = XGroupUser::leftjoin('a_menu_and_group_user','xgroup_user.id', '=', 'a_menu_and_group_user.id_group_user')
                      ->leftjoin('a_menu','a_menu.id', '=', 'a_menu_and_group_user.id_menu')
                      ->select(
                            \DB::raw('xgroup_user.id as id'),
                            \DB::raw('xgroup_user.nama as nama'),
                            \DB::raw('a_menu_and_group_user.id_group_user as group_user_ID')
                          )
                        ->where('a_menu_and_group_user.id_menu','=',$id)
                      ->get();
        $groupuser_all= XGroupUser::get();
                    //  return $groupusers;
        //$groupuserrelat = GroupUserMenuRelation::get();
       return view('admin.crud.menu.edit', compact('menu', 'groups','groupusers','groupuser_all'))->with('title', $this->title);
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
          'link_label'  => 'required',
          'link_url'      => 'required',

      ]);
      $data_menu= array(
          "link_label"                  => $request->link_label,
          "link_url"            => $request->link_url,
          "link_desc"            => $request->link_desc,
          "is_frame"            => $request->is_frame,
          "is_public"            => $request->is_public,
          "is_show_on_sidebar"            => $request->is_show_on_sidebar,
          "id_group_menu"            => $request->id_group_menu,
          "updated_by"               => $request->updated_by,
          "created_by"               => $request->created_by
      );
      $menu=Menu::find($id)->update($data_menu);
      if (isset($request->group_user)) {
          GroupUserMenuRelation::where('id_menu', $id)->delete();
          foreach ($request->group_user as $key=>$group_user) {
            $select=GroupUserMenuRelation::where('id_menu', '=', $id)->where('id_group_user', '=', $group_user)->count();
            $data_group_menu_user = array(
                "id_menu"                  => $id,
                "id_group_user"            => $group_user,
                "updated_by"               => $request->updated_by,
                "created_by"               => $request->created_by
            );
            if($select>0){

           }else{
              GroupUserMenuRelation::create($data_group_menu_user);
           }
          }

        }else{
            GroupUserMenuRelation::where('id_menu', $id)->delete();
          }
        return redirect(route('menu.index'))
                        ->with('message','Menu update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Menu::find($id)->delete();
        if($delete){
            GroupUserMenuRelation::where('id_menu', $id)->delete();
        }

        return redirect()->route('menu.index')
                        ->with('message','Menu deleted successfully');
    }
}
