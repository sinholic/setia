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
        ->addColumn('action', function ($kotas) {
            return '
            <a href="'. route('kota.edit', $kotas->id).'" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form method="POST" action="'.route('kota.destroy', $kotas->id).'" accept-charset="UTF-8" style="display:inline">
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
     * @param \App\Kota $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Kota $model)
    {
        return $model->newQuery()
            ->join('a_regional', 'a_kota.id_regional', '=', 'a_regional.id')
            ->select('a_kota.id', \DB::raw('a_regional.nama as regional'), \DB::raw('a_kota.nama as kota'));
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
            'id',
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
