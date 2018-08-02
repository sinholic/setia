<?php

namespace App\DataTables;

use App\SettlementCnInvoice;
use Yajra\DataTables\Services\DataTable;

class SettlementCnInvoiceDataTable extends DataTable
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
     * @param \App\SettlementCnInvoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SettlementCnInvoice $model)
    {
        return $model->newQuery()->select(
            'id',
            \DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'),
            "tapcode",
            "invoicetype",
            "periode",
            "processdate",
            "status",
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
            "invoicetype",
            "periode",
            "processdate",
            "status",
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
        return 'SettlementCnInvoice_' . date('YmdHis');
    }
}
