<?php

namespace App\DataTables\Admin;

use App\Admin\OrderDatatable;
use App\Models\OrderProduct;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDatatables extends DataTable
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
            ->addColumn('checkbox', 'admin.orderProduct.btn.checkbox')
            ->addColumn('orderDetails', 'admin.orderProduct.btn.orderDetails')
            ->addColumn('edit', 'admin.orderProduct.btn.edit')
            ->addColumn('delete', 'admin.orderProduct.btn.delete')
            ->addColumn('price', 'admin.orderProduct.btn.price')
            ->addColumn('shipped', 'admin.orderProduct.btn.shipped')
            ->addColumn('confirm', 'admin.orderProduct.btn.confirm')
            ->addColumn('orderStep', 'admin.orderProduct.btn.orderStep')
            ->rawColumns([
                'checkbox',
                'orderDetails',
                'edit',
                'delete',
                'price',
                'shipped',
                'confirm',
                'orderStep',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\OrderDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return OrderProduct::query()
        ->orderBy('id', 'DESC')
            ->with('store', 'order', 'product')
            ->select('order_product.*');
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
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fas fa-redo-alt"></i>'],
                    [
                        'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],

                ],
                'initComplete' => " function () {
		            this.api().columns([2]).every(function () {
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
                'name'       => 'orderDetails',
                'data'       => 'orderDetails',
                'title'      => trans('admin.orderDetails'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],


            [
                'name'  => 'order.id',
                'data'  => 'order.id',
                'title' => trans('admin.order_id'),
            ],
            [
                'name'  => 'product.title',
                'data'  => 'product.title',
                'title' => trans('admin.title'),
            ],

            [
                'name'  => 'price',
                'data'  => 'price',
                'title' => trans('admin.price'),
            ],

            [
                'name'  => 'shipped',
                'data'  => 'shipped',
                'title' => trans('admin.state'),
            ],




            [
                'name'  => 'store.name',
                'data'  => 'store.name',
                'title' => trans('admin.shop_name'),
            ],

            [
                'name'  => 'order.billing_name',
                'data'  => 'order.billing_name',
                'title' => trans('admin.billing_name'),
            ],

            [
                'name'  => 'order.billing_total',
                'data'  => 'order.billing_total',
                'title' => trans('admin.billing_total'),
            ],
            [
                'name'  => 'order.payment_gateway',
                'data'  => 'order.payment_gateway',
                'title' => trans('admin.payment_gateway'),
            ],

            [
                'name'  => 'confirm',
                'data'  => 'confirm',
                'title' => trans('admin.confirm'),
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
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => trans('admin.edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'orderStep',
                'data'       => 'orderStep',
                'title'      => trans('admin.orderState'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
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
        return 'OrderDatatables_' . date('YmdHis');
    }
}
