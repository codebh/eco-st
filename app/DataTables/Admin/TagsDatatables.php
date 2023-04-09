<?php

namespace App\DataTables\Admin;

use App\Admin\TagsDatatable;
use App\Models\Tag;
use App\Models\TagData;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TagsDatatables extends DataTable
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
            ->addColumn('checkbox', 'admin.tag.btn.checkbox')
            ->addColumn('edit', 'admin.tag.btn.edit')
            ->addColumn('delete', 'admin.tag.btn.delete')
            ->rawColumns([
                'edit',
                'delete',

                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\TagsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
//        return Tag::query()->orderBy('shipped', 'DESC')
//            ->with('shop', 'order', 'product')
//            ->select('order_product.*');

        return Tag::query();
//            ->with( 'tag', 'product')
//            ->select('tag_data.*');



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
//            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){

							window.location.href = '" . \URL::current() . "/create';
						}"],

                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> ' . trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> ' . trans('admin.ex_excel')],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                    [
                        'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],

                ],
                'initComplete' => " function () {
		            this.api().columns([2 ]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

                'language' => datatable_lang(),

            ]);
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
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
            ],
            [
                'name' => 'name_ar',
                'data' => 'name_ar',
                'title' => trans('admin.name_ar'),
            ],
            [
                'name' => 'name_en',
                'data' => 'name_en',
                'title' => trans('admin.name_en'),
            ],
            [
                'name' => 'slug',
                'data' => 'slug',
                'title' => trans('admin.name_en'),
            ],


            [
                'name' => 'des_ar',
                'data' => 'des_ar',
                'title' => trans('admin.des_ar'),
            ],
            [
                'name' => 'des_en',
                'data' => 'des_en',
                'title' => trans('admin.des_en'),
            ],
            [
                'name' => 'collection',
                'data' => 'collection',
                'title' => trans('admin.collection'),
            ],
            [
                'name' => 'c_show',
                'data' => 'c_show',
                'title' => trans('admin.active'),
            ],
            [
                'name' => 'started_at',
                'data' => 'started_at',
                'title' => trans('admin.start_at'),
            ],
            [
                'name' => 'ended_at',
                'data' => 'ended_at',
                'title' => trans('admin.end_at'),
            ],
//            [
//                'name' => 'created_at',
//                'data' => 'created_at',
//                'title' => trans('admin.created_at'),
//            ],
//            [
//                'name' => 'updated_at',
//                'data' => 'updated_at',
//                'title' => trans('admin.updated_at'),
//            ],

            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('admin.edit'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ], [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('admin.delete'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TagsDatatables_' . date('YmdHis');
    }
}