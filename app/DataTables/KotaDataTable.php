<?php

namespace App\DataTables;

use App\Kota;
use Yajra\DataTables\Services\DataTable;

class KotaDataTable extends DataTable
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
     * @param \App\Kota $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Kota $model)
    {
        return $model->newQuery()
            ->join('a_regional', 'a_kota.id_regional', '=', 'a_regional.id')
            ->select('id', \DB::raw('ROW_NUMBER () OVER (ORDER BY a_kota.id DESC) as no'), \DB::raw('a_regional.nama as regional'), \DB::raw('a_kota.nama as kota'));
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
            'regional',
            'kota'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Kota_' . date('YmdHis');
    }
}
