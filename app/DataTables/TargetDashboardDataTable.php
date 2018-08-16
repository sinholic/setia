<?php

namespace App\DataTables;

use App\TargetDashboard;
use Yajra\DataTables\Services\DataTable;

class TargetDashboardDataTable extends DataTable
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
     * @param \App\TargetDashboard $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TargetDashboard $model)
    {
        return $model->newQuery()->select(
            'id',
            \DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'),
            'year',
            'month',
            'target'
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
            'year',
            'month',
            'target'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TargetDashboard_' . date('YmdHis');
    }
}