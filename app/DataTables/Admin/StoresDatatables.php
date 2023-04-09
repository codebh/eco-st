<?php

namespace App\DataTables\Admin;

use App\Admin\StoresDatatable;
use App\Models\Store;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StoresDatatables extends DataTable
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
            ->addColumn('checkbox', 'admin.stores.btn.checkbox')
            ->addColumn('edit', 'admin.stores.btn.edit')
            ->addColumn('delete', 'admin.stores.btn.delete')
            ->addColumn('close', 'admin.stores.btn.close')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
                'close',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\StoresDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Store::query();
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
                    ->orderBy(1)
            ->parameters([

                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],

                'buttons'    => [
                    [
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){

							window.location.href = '".\URL::current()."/create';
						}"],

                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                    [
                        'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],

                ],
                'initComplete' => " function () {
		            this.api().columns([3,4,5 ]).every(function () {
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
                'name'       => 'checkbox',
                'data'       => 'checkbox',
                'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => trans('admin.edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'close',
                'data'       => 'close',
                'title'      => trans('admin.close'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],

            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => '#',
            ],
            [
                'name'  => 'f_name',
                'data'  => 'f_name',
                'title' => trans('admin.f_name'),
            ],

            [
                'name'  => 'l_name',
                'data'  => 'l_name',
                'title' => trans('admin.l_name'),
            ],
            [
                'name'  => 'name',
                'data'  => 'name',
                'title' => trans('admin.shop_name'),
            ],
            [
                'name'  => 'slug',
                'data'  => 'slug',
                'title' => trans('admin.shop_name'),
            ],
            [
                'name'  => 'mobile',
                'data'  => 'mobile',
                'title' => trans('admin.phone'),
            ],
            [
                'name'  => 'email',
                'data'  => 'email',
                'title' => trans('admin.email'),
            ],
            [
                'name'  => 'percentage',
                'data'  => 'percentage',
                'title' => trans('admin.percentage'),
            ],
            [
                'name'  => 'i_account',
                'data'  => 'i_account',
                'title' => trans('admin.i_account'),
            ],
            [
                'name'  => 'address',
                'data'  => 'address',
                'title' => trans('admin.address'),
            ],
            [
                'name'  => 'cr',
                'data'  => 'cr',
                'title' => trans('admin.cr'),
            ],
            [
                'name'  => 'cpr',
                'data'  => 'cpr',
                'title' => trans('admin.cpr'),
            ],

            [
                'name'  => 'new',
                'data'  => 'new',
                'title' => trans('admin.new_cost'),
            ],
            [

                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ],
            [
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.updated_at'),
            ],

             [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => trans('admin.delete'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StoresDatatables_' . date('YmdHis');
    }
}
