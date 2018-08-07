<?php

namespace App\DataTables;

use App\MSC;
use Yajra\DataTables\Services\DataTable;

class MscDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->filterColumn('recentity', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_msc.recentity) like ?", ["%$keyword%"]);
        })
        ->filterColumn('gt', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_msc.gt) like ?", ["%$keyword%"]);
        })
        ->filterColumn('nama', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_msc.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('regional', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_regional.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('namakota', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_kota.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('filename', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_msc.filename) like ?", ["%$keyword%"]);
        })
        ->filterColumn('status', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_status_data_switch.nama) like ?", ["%$keyword%"]);
        })
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();

        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\MSC $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MSC $model)
    {
        return $model->newQuery()
        ->join('a_regional', 'a_regional.id', '=', 'a_msc.id_regional')
        ->join('a_kota', 'a_kota.id', '=', 'a_msc.id_kota')
        ->join('a_status_data_switch', 'a_status_data_switch.id', '=', 'a_msc.id_status')
        ->select(
            'a_msc.id',
            \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_msc.id DESC) as no'),
            \DB::raw('a_msc.recentity as recentity'),
            \DB::raw('a_msc.gt as gt'),
            \DB::raw('a_msc.nama as nama'),
            \DB::raw('a_regional.nama as regional'),
            \DB::raw('a_kota.nama as namakota'),
            \DB::raw('a_msc.filename as filename'),
            \DB::raw('a_status_data_switch.nama as status'));
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                "searchable"    => false,
                "data"          => 'no',
                "title"         => 'No',
            ],
            'recentity',
            'gt',
            'nama',
            'regional',
            'namakota',
            'filename',
            'status',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Msc_' . date('YmdHis');
    }
}
