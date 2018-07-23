<?php

namespace App\DataTables;

use App\Operator;
use Yajra\DataTables\Services\DataTable;

class OperatorDataTable extends DataTable
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
     * @param \App\Operator $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Operator $model)
    {
        return $model->newQuery()
            ->leftjoin('a_negara', 'a_operator.id_negara', '=', 'a_negara.id')
            ->leftjoin('a_tipe_organisasi', 'a_operator.id_tipe_organisasi', '=', 'a_tipe_organisasi.id')
            ->select(
                'a_operator.id',
                \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_operator.id DESC) as no'),
                'a_operator.nama', 'a_operator.kode', 'mnc', 'network_display', 'a_negara.nama as negara', 'a_tipe_organisasi.nama as tipe_organisasi');
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
            'nama',
            'kode',
            'mnc',
            'network_display',
            'negara',
            'tipe_organisasi'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Operator_' . date('YmdHis');
    }
}
