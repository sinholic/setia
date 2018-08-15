<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UploadHistoryDataTable;
use App\UploadHistory;
use App\ImportData;

class UploadCsvController extends Controller
{
    private $title = 'Upload CSV';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(UploadHistoryDataTable $dataTable)
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
        $manages = ImportData::pluck('label', 'id');
        return view('admin.crud.uploadcsv.add', compact('manages'))
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
        $request->validate([
            'manage_id' => 'required',
            'file_input' => 'required|mimes:csv,txt'
        ]);
        // dd($request);
        $file = $request->file('file_input');
        $name = \Carbon\Carbon::now().'_'.$file->getClientOriginalName();
        $destinationPath = public_path('/uploaded_file');
        $file->move($destinationPath, $name);
        // dd($destinationPath);
        // $path = $request->file('file_input')->getRealPath();
        $path = $destinationPath."/".$name;
        $manage = ImportData::find($request->manage_id);
        $fields = explode("\n", $manage->fields);

        $data = \Excel::load($path)->get();
        \DB::statement("
            COPY ".$manage->targettable." FROM '".$destinationPath."/".$name."' (DELIMITER(','))
        ");
        // if($data->count()){
        //     foreach ($data as $key => $value) {
        //         $insert_data = array();
        //         foreach ($fields as $key => $field) {
        //             $insert_field = explode("=", $field);
        //             $target_field = trim($insert_field[0]);
        //             $target_csv = trim($insert_field[1]);
        //             $insert_data[$target_field] = $value->$target_csv;
        //         }
        //         $arr[] = $insert_data;
        //
        //     }
        //     if(!empty($arr)){
        //         \DB::table($manage->targettable)->insert($arr);
        //
        //     }
        // }
        $data_history = [
            'importdata_id' => $request->manage_id,
            'filename' => $name,
            'filepath' => $destinationPath,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ];
        UploadHistory::create($data_history);
        return redirect()->route('uploaddata.index')
        ->with('message','Data from CSV inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
