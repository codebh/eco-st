<?php

namespace App\DataTables\Store;

use App\Models\OrderProduct;
use App\Store\OrdersDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDatatables extends DataTable
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
            ->addColumn('view', 'store.orders.btn.view')
            ->addColumn('image', 'store.orders.btn.image')
            // ->addColumn('date', 'store.orders.btn.date')
            ->addColumn('created_at', function ($request) {
                return $request->created_at->toDayDateTimeString();
            })
            ->rawColumns([
                'view',
                'image',
                // 'date',
            ]);

            // $dataTable = new EloquentDataTable($query);

            // return $dataTable->addColumn('action', 'requests.datatables_actions')
            //     /** @see https://datatables.yajrabox.com/eloquent/carbon */
            //     ->editColumn('created_at', function ($request) {
            //         return $request->created_at->toDayDateTimeString();
            //     });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Store\OrdersDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $shop = shop()->user()->id;
        return
        $orders=  OrderProduct::query()
            ->with('store', 'order', 'product')
            ->select('order_product.*')
            // ->select([ 'order.billing_name', ' order.billing_phone',  'order.billing_email','created_at'])
            ->where('store_id', $shop)
            ->where('confirm', 'yes');
            return $this->applyScopes($orders);




            // $orders = OrderProduct::queryddd()
            // ->with(['store', 'order', 'product'])
            // ->select(['order.id', 'orders.subtotal', 'orders.tax', 'orders.total', 'orders.customer_id', 'orders.created_at']);

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
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
                'buttons' => [


                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> ' . trans('admin.ex_excel')],
                    ['extend' => 'reload', 'className' => 'btn btn-primary', 'text' => '<i class="fas fa-sync-alt"></i>'],


                ],
                'initComplete' => " function () {
		            this.api().columns([]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

                'language' => datatable_lang(),


            ])->orderBy(7);


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
                'name'  => 'id',
                'data'  => 'id',
                'title' => trans('shop.order_id'),
            ],

            [

                'name'       => 'view',
                'data'       => 'view',
                'title'      => trans('shop.view'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],


            [

                'name'       => 'image',
                'data'       => 'image',
                'title'      => trans('shop.order_status'),

                'searchable' => false,
                'orderable' => false

            ],
            // [

            //     'name'       => 'price',
            //     'data'       => 'price',
            //     'title'      => trans('shop.price'),

            // ],


            [
                'name'  => 'product.title',
                'data'  => 'product.title',
                'title' => trans('shop.title'),

                'searchable' => false,
                'orderable' => false
            ],

            [
                'name'  => 'order.billing_name',
                'data'  => 'order.billing_name',
                'title' => trans('shop.billing_name'),

                'searchable' => false,
                'orderable' => false
            ],
            [
                'name'  => 'order.billing_phone',
                'data'  => 'order.billing_phone',
                'title' => trans('shop.billing_phone'),

                'searchable' => false,
                'orderable' => false
            ], [
                'name'  => 'order.billing_email',
                'data'  => 'order.billing_email',
                'title' => trans('shop.billing_email'),

                'searchable' => false,
                'orderable' => false
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('shop.order_date'),


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
        return 'OrdersDatatables_' . date('YmdHis');
    }
}
