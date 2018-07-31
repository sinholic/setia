<?php

namespace App\DataTables;

use App\Menu;
use Yajra\DataTables\Services\DataTable;

class MenuDataTable extends DataTable
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
        ->filterColumn('nama_group', function ($query, $keyword) {
           $query->whereRaw("LOWER(xgroup_user.nama) like ?", ["%$keyword%"]);
        })
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Menu $model)
    {
        return $model->newQuery()
            ->join('a_group_menu', 'a_group_menu.id', '=', 'a_menu.id_group_menu')
            ->select(
                'a_menu.id',
                \DB::raw(' ROW_NUMBER () OVER (ORDER BY a_menu.id DESC) as no'),
                \DB::raw('a_menu.link_label as label'),
                \DB::raw('a_menu.link_url as url'),
                \DB::raw('a_menu.link_desc as desc'),
                \DB::raw('a_group_menu.nama as nama'),
                \DB::raw('a_menu.is_frame as frame'),
                \DB::raw('a_menu.is_public as public'),
                \DB::raw('a_menu.is_show_on_sidebar as sidebar')
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
            'label',
            'url',
            'desc',
            'nama',
            'frame',
            'public',
            'sidebar',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Menu_' . date('YmdHis');
    }
}
