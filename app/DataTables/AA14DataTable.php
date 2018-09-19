<?php

namespace App\DataTables;

use App\AA14;
use Yajra\DataTables\Services\DataTable;

class AA14DataTable extends DataTable
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
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AA14 $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AA14 $model)
    {
        return $model->newQuery()->select(
            \DB::raw('id_countrycode as id'),
            \DB::raw('ROW_NUMBER () OVER (ORDER BY id_countrycode DESC) as no'),
            'iso3',
            'country_name',
            'calltype',
            'aa14',
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
            'iso3',
            'country_name',
            'calltype',
            'aa14',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AA14_' . date('YmdHis');
    }
}
