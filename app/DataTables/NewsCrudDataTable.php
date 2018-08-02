<?php

namespace App\DataTables;

use App\News;
use Yajra\DataTables\Services\DataTable;

class NewsCrudDataTable extends DataTable
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
        ->filterColumn('title', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_news.title) like ?", ["%$keyword%"]);
        })
        ->filterColumn('category', function ($query, $keyword) {
           $query->whereRaw("LOWER(a_category_news.nama) like ?", ["%$keyword%"]);
        })
        ->filterColumn('publish', function ($query, $keyword) {
           $query->whereRaw("(a_news.is_publish) like ?", ["%$keyword%"]);
        })
        ->addColumn('action', function ($items) {
            return view('admin.crud.buttons', compact('items'))->render();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\NewsCrud $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
    {
        return $model->newQuery()
            ->join('a_category_news', 'a_news.id_category', '=', 'a_category_news.id')
            ->select('a_news.id', \DB::raw('ROW_NUMBER () OVER (ORDER BY a_news.id DESC) as no'), \DB::raw('a_news.title as title'), \DB::raw('a_category_news.nama as category'), \DB::raw('a_news.is_publish as publish'));
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
            'title',
            'category',
            'publish'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'NewsCrud_' . date('YmdHis');
    }
}
