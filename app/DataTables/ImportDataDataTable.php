<?php

namespace App\DataTables;

use App\ImportData;
use Yajra\DataTables\Services\DataTable;

class ImportDataDataTable extends DataTable
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
        ->editColumn('fields', function(ImportData $data) {
            return view('admin.crud.manage.fields', compact('data'))->render();
        })
        ->rawColumns(['fields', 'action'])
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ImportData $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ImportData $model)
    {
        return $model->newQuery()->select(
            'id',
            \DB::raw('ROW_NUMBER () OVER (ORDER BY id DESC) as no'),
            'label',
            'targettable',
            'fields',
            'created_at',
            'updated_at');
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
            'label',
            'targettable',
            'fields'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ImportData_' . date('YmdHis');
    }
}
