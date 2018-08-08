<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\ClassHelper\Slug;
use App\DataTables\NewsCrudDataTable;
use App\News;
use App\CategoryNews;
class NewsCrudController extends Controller
{
    private $title = 'News';

    protected $slug;

    public function __construct(Slug $slug) {
    $this->slug = $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsCrudDataTable $dataTable)
    {
        // $title = 'Kota';
        return $dataTable->render('admin.crud.lists', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         // $title = 'Kota';
         $categorynews = CategoryNews::pluck('nama','id');
         return view('admin.crud.newscrud.add', compact('categorynews'))->with('title', $this->title);
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
          'id_category'          => 'required',
          'title'                => 'required',
      ]);
      $name='';

      if ($request->hasFile('img')) {
          $this->validate($request, [
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        $image = $request->file('img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

      }
      $slug=$this->slug->createSlug($request->title);
      $data_news = array(
          'title'          => $request->title,
          'id_category'   => $request->id_category,
          'slug'          =>$slug,
          'konten'   => $request->konten,
          'img'       => $name,
          'is_publish'   => $request->is_publish,
          'notes'         => $request->notes,
          'updated_by'    => $request->updated_by,
          'created_by'    => $request->created_by
      );
      News::create($data_news);
      return redirect(route('newscrud.index'))
                      ->with('message','News added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $news             = News::find($id);
      $category         = CategoryNews::pluck('nama','id');

      return view('admin.crud.newscrud.show', compact('news','category'))->with('title',$news->nama)->with('notes',$news->notes)->with('konten',$news->konten);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $news             = News::find($id);
      $category         = CategoryNews::pluck('nama','id');

      return view('admin.crud.newscrud.edit', compact('news','category'))->with('title',$news->nama)->with('notes',$news->notes)->with('konten',$news->konten);
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
      $name='';


      if ($request->hasFile('img')) {
        $this->validate($request, [
          'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

      }
      if($name==''){
        $slug=$this->slug->createSlug(strtolower($request->title));
        $data_news = array(
            'title'          => $request->title,
            'id_category'   => $request->id_category,
            'slug'        =>$slug,
            'konten'   => $request->konten,
            'is_publish'   => $request->is_publish,
            'notes'         => $request->notes,
            'updated_by'    => $request->updated_by,
            'updated_at'    => $request->updated_at
        );
      }else{
        $slug=$this->slug->createSlug(strtolower($request->title));
        $data_news = array(
            'title'          => $request->title,
            'id_category'   => $request->id_category,
            'slug'        =>$slug,
            'konten'   => $request->konten,
            'img'       => $name,
            'is_publish'   => $request->is_publish,
            'notes'         => $request->notes,
            'updated_by'    => $request->updated_by,
            'updated_at'    => $request->updated_at
        );
      }

      News::find($id)->update($data_news);
      return redirect()->route('newscrud.index')
              ->with('message','News updated successfully');
    //   if ($request->hasFile('img')) {
    //     if($request->file('img')->isValid()) {
    //         try {
    //             $file = $request->file('img');
    //             $name = time() . '.' . $file->getClientOriginalExtension();
    //
    //             $request->file('img')->move("fotoupload", $name);
    //
    //             $data_news = array(
    //                 'title'          => $request->title,
    //                 'id_category'   => $request->id_category,
    //                 'konten'   => $request->konten,
    //                 'img'       => $request->img,
    //                 'is_publish'   => $request->is_publish,
    //                 'notes'         => $request->notes,
    //                 'updated_by'    => $request->updated_by
    //             );
    //             News::find($id)->update($data_news);
    //             return redirect()->route('newscrud.index')
    //                     ->with('message','News updated successfully');
    //         } catch (Illuminate\Filesystem\FileNotFoundException $e) {
    //
    //         }
    //     }
    // }else{
    //   $data_news = array(
    //       'title'          => $request->title,
    //       'id_category'   => $request->id_category,
    //       'konten'   => $request->konten,
    //       'is_publish'   => $request->is_publish,
    //       'notes'         => $request->notes,
    //       'updated_by'    => $request->updated_by
    //   );
    //   News::find($id)->update($data_news);
    //   return redirect()->route('newscrud.index')
    //           ->with('message','News updated successfully');
    // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //RateInterkoneksiNegara::where('id_negara', $id)->delete();
      News::find($id)->delete();
      return redirect()->route('newscrud.index')
                      ->with('message','News deleted successfully');
    }
}
