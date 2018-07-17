<?php

namespace App\DataTables;

use App\Continent;
use Yajra\DataTables\Services\DataTable;

class ContinentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // dd($query);
        return datatables($query)
            ->addColumn('action', function ($continents) {
                return '
                <a href="'. route('continent.show', $continents->id).'" class="btn btn-sm btn-secondary">
                    <i class="fas fa-eye"></i> Detail
                </a>
                <a href="'. route('continent.edit', $continents->id).'" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form class="delete-me" method="POST" action="'.route('continent.destroy', $continents->id).'" accept-charset="UTF-8" style="display:inline">
                    <input name="_method" value="DELETE" type="hidden">
                    <input name="_token" value="'.csrf_token().'" type="hidden">
                    <input class="btn btn-sm btn-danger" value="Delete" type="submit">
                </form>
                ';
            });
            // ->addColumn('intro', 'Hi '.);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Continent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Continent $model)
    {
        return $model->newQuery()->select('id',\DB::raw(' ROW_NUMBER () OVER (ORDER BY id DESC) as no'), 'nama', 'created_at', 'updated_at');
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
                    ->addAction(['width' => '280px'])
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
            // 'created_at',
            // 'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Continent_' . date('YmdHis');
    }
}
