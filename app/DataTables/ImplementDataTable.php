<?php

namespace App\DataTables;

use App\Implement;
use Yajra\DataTables\Services\DataTable;

class ImplementDataTable extends DataTable
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
        ->filterColumn('nama', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_operator.nama) like ?", ["%$keyword%"]);
        })
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Implement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Implement $model)
    {
        return $model->newQuery()
        ->join('a_operator', 'a_implement.operator_id', '=', 'a_operator.id')
        ->select(
            'a_implement.id',
            \DB::raw('ROW_NUMBER () OVER (ORDER BY a_implement.id DESC) as no'),
            'years',
            'nama',
            'skema',
            'status',
            'a_implement.created_at',
            'a_implement.updated_at'
        );
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
            [
                "data"          => 'years',
                "title"         => 'Tahun',
            ],
            'nama',
            'skema',
            'status'

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Implement_' . date('YmdHis');
    }
}
