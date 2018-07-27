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
        ->filterColumn('kota', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_kota.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('msc', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_msc.nama) like ?", ["%$keyword%"]);
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
        ->join('a_kota', 'a_msc.id_kota', '=', 'a_kota.id')
        ->select('a_msc.id', \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_msc.id DESC) as no'), \DB::raw('a_kota.nama as kota'), \DB::raw('a_msc.nama as msc'));
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
            'kota',
            'msc',
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
