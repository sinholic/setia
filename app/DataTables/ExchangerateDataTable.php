<?php

namespace App\DataTables;

use App\RoamingExchangeRate;
use Yajra\DataTables\Services\DataTable;

class ExchangerateDataTable extends DataTable
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
        ->addColumn('action', function ($exchangerates) {
            return '
            <a href="'. route('exchangerate.edit', $exchangerates->id).'" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form class="delete-me" method="POST" action="'.route('exchangerate.destroy', $exchangerates->id).'" accept-charset="UTF-8" style="display:inline" onsubmit="return ConfirmDelete()">
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
     * @param \App\RoamingExchangeRate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RoamingExchangeRate $model)
    {
        return $model->newQuery()->select('id', \DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'), \DB::raw('kode1 as kode_1'), \DB::raw('kode2 as kode_2'), \DB::raw('kode3 as kode_3'), \DB::raw('nilai as rate'), 'ymd', 'created_at', 'updated_at');
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
            'kode_1',
            'kode_2',
            'kode_3',
            'rate',
            'ymd'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Exchangerate_' . date('YmdHis');
    }
}
