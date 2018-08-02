<?php

namespace App\DataTables;

use App\SettlementSmsiwInvoice;
use Yajra\DataTables\Services\DataTable;

class SettlementSmsiwInvoiceDataTable extends DataTable
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
        ->addColumn('details_url', function($items) {
            return route('api.admin.operator.detail', $items->id);
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\SettlementSmsiwInvoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SettlementSmsiwInvoice $model)
    {
        return $model->newQuery()->select(
            'id',
            \DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'),
            "tapcode",
            "periode",
            "nodindate",
            "receivedate",
            "nodinno",
            "discrep",
            "exp",
            "nodinreply",
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
            "tapcode",
            "periode",
            "nodindate",
            "receivedate",
            "nodinno",
            "discrep",
            "exp",
            "nodinreply",
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SettlementSmsiwInvoice_' . date('YmdHis');
    }
}
