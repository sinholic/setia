<?php

namespace App\DataTables;

use App\Negara;
use Yajra\DataTables\Services\DataTable;

class NegaraDataTable extends DataTable
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
            ->addColumn('action', function ($negaras) {
                return '
                <a href="'. route('negara.edit', $negaras->id).'" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form method="POST" action="'.route('negara.destroy', $negaras->id).'" accept-charset="UTF-8" style="display:inline">
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
     * @param \App\Negara $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Negara $model)
    {
        // \DB::statement(\DB::raw('DECLARE rownum integer DEFAULT 0'));
        return $model->newQuery()
            ->join('a_continent', 'a_negara.id_continent', '=', 'a_continent.id')
            ->select(
                'a_negara.id',
                \DB::raw('a_negara.nama as nama_negara'),
                \DB::raw('a_continent.nama as nama_continent'),
                'mcc',
                'iso3',
                'a_negara.created_at',
                'a_negara.updated_at'
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
            'nama_negara',
            'nama_continent',
            'mcc',
            'iso3'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Negara_' . date('YmdHis');
    }
}
