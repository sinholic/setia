<?php

namespace App\DataTables;

use App\MSC;
use Yajra\DataTables\Services\DataTable;

class MscDataTable extends DataTable
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
        ->addColumn('action', function ($mscs) {
            return '
            <a href="'. route('msc.edit', $mscs->id).'" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form class="delete-me" method="POST" action="'.route('msc.destroy', $mscs->id).'" accept-charset="UTF-8" style="display:inline" onsubmit="return ConfirmDelete()">
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
     * @param \App\MSC $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MSC $model)
    {
        return $model->newQuery()
        ->join('a_kota', 'a_msc.id_kota', '=', 'a_kota.id')
        ->select('id', \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_msc.id DESC) as no'), \DB::raw('a_kota.nama as kota'), \DB::raw('a_msc.nama as msc'));
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
            'kota',
            'msc',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Msc_' . date('YmdHis');
    }
}
