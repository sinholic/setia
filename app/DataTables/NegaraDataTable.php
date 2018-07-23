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
        ->filterColumn('nama_negara', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_negara.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('nama_continent', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_continent.nama) like ?", ["%$keyword%"]);
        })
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        })
        ->addColumn('details_url', function($items) {
            return route('api.admin.negara.detail', $items->id);
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
        // \DB::statement(\DB::raw('DECLARE no integer DEFAULT 0'));
        return $model->newQuery()
            ->join('a_continent', 'a_negara.id_continent', '=', 'a_continent.id')
            ->select(
                'a_negara.id',
                \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_negara.id DESC) as no'),
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
                "className"         => 'details-control',
                "orderable"         => false,
                "searchable"        => false,
                "data"              => null,
                "defaultContent"    => '<i class="fas fa-plus font-blue" style="cursor: pointer; font-size: 16px;"></i>',
                "title"             => '',
                "width"             => '0px',
            ],
            [
                "searchable"    => false,
                "data"          => 'no',
                "title"         => 'No',
            ],
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
