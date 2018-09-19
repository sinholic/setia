<?php

namespace App\DataTables;

use App\IotImplement;
use Yajra\DataTables\Services\DataTable;

class IotImplementDataTable extends DataTable
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
     * @param \App\IotImplement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IotImplement $model)
    {
        return $model->newQuery()->select(
            \DB::raw('id_iot as id'),
            \DB::raw('ROW_NUMBER () OVER (ORDER BY id_iot DESC) as no'),
            'tapcode',
            'start_date',
            'end_date',
            'v_unit',
            'g_unit_byte',
            'moc_lo',
            'moc_bh',
            'moc_ot',
            'mtc',
            'sms_mo',
            'gprs',
            'premium',
            'satelite',
            'exc_oth',
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
            'tapcode',
            'start_date',
            'end_date',
            'v_unit',
            'g_unit_byte',
            'moc_lo',
            'moc_bh',
            'moc_ot',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'IotImplement_' . date('YmdHis');
    }
}
