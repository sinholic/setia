<?php

namespace App\DataTables;

use App\RateInterkoneksiNegara;
use Yajra\DataTables\Services\DataTable;

class RateInterkoneksiNegaraDataTable extends DataTable
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
            ->addColumn('action', 'rateinterkoneksinegara.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\RateInterkoneksiNegara $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RateInterkoneksiNegara $model)
    {
        return $model->newQuery()
            ->join('a_negara', 'a_rate_interkoneksi_negara.id_negara', '=', 'a_negara.id')
            ->join('a_service', 'a_rate_interkoneksi_negara.id_service', '=', 'a_service.id')
            ->join('a_opsi_unit_service', 'a_rate_interkoneksi_negara.id_opsi_unit_service', '=', 'a_opsi_unit_service.id')
            ->select(
                'a_rate_interkoneksi_negara.id',
                \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_rate_interkoneksi_negara.id DESC) as no'),
                \DB::raw('a_negara.nama as negara'),
                \DB::raw('a_service.nama as service'),
                \DB::raw('a_opsi_unit_service.nama as unit'),
                'nilai_unit',
                \DB::raw('nilai_rate as rate'),
                \DB::raw('tgl_berlaku as start'),
                'created_at',
                'updated_at'
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
            'no',
            'negara',
            'service',
            'unit',
            'nilai_unit',
            'rate',
            'start'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'RateInterkoneksiNegara_' . date('YmdHis');
    }
}
