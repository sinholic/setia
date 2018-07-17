<?php

namespace App\DataTables;

use App\GroupOperator;
use Yajra\DataTables\Services\DataTable;

class GroupoperatorDataTable extends DataTable
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
        ->addColumn('action', function ($groupoperators) {
            return '
            <a href="'. route('groupoperator.edit', $groupoperators->id).'" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form class="delete-me" method="POST" action="'.route('groupoperator.destroy', $groupoperators->id).'" accept-charset="UTF-8" style="display:inline" onsubmit="return ConfirmDelete()">
                <input name="_method" value="DELETE" type="hidden">
                <input name="_token" value="'.csrf_token().'" type="hidden">
                <input class="btn btn-sm btn-danger" value="Delete" type="submit">
            </form>
            ';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\GroupOperator $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GroupOperator $model)
    {
        return $model->newQuery()->select('id', \DB::raw('ROW_NUMBER () OVER (ORDER BY id DESC) as no'), 'nama', 'created_at', 'updated_at');
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
                    ->addAction(['width' => '180px'])
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
            'no',
            'nama'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Groupoperator_' . date('YmdHis');
    }
}
