<?php

namespace App\DataTables\Store;

use App\Models\Report;
use App\Store\MonthsDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MonthsDatatables extends DataTable
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
            ->addColumn('total', 'store.reports.btn.total')
            ->addColumn('percentage', 'store.reports.btn.percentage')
            ->addColumn('cost', 'store.reports.btn.cost')
            ->addColumn('netPrice', 'store.reports.btn.netPrice')
            ->addColumn('view', 'store.reports.btn.view')
            ->addColumn('pdf', 'store.reports.btn.pdf')
            ->addColumn('payment_status', 'store.reports.btn.payment_status')
            ->rawColumns([

                'total',
                'percentage',
                'cost',
                'netPrice',
                'view',
                'pdf',
                'payment_status',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Store\MonthsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $store = shop()->user()->id;
        return Report::query()->where('store_id', $store)->with('store')->select('reports.*');

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
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fas fa-sync-alt"></i>'],


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
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
            ],
//            [
//                'name' => 'store.name',
//                'data' => 'store.name',
//                'title' => trans('admin.shops'),
//            ],
            [
                'name' => 'date',
                'data' => 'date',
                'title' => trans('shop.report_month'),
            ],
            [
                'name' => 'count',
                'data' => 'count',
                'title' => trans('shop.orders_count'),
            ],
            [
                'name' => 'total',
                'data' => 'total',
                'title' => trans('shop.report_profit'),
            ],
//            [
//                'name' => 'percentage',
//                'data' => 'percentage',
//                'title' => trans('admin.report_percentage'),
//            ],
            [
                'name' => 'cost',
                'data' => 'cost',
                'title' => trans('shop.report_cost'),
            ],
            [
                'name' => 'netPrice',
                'data' => 'netPrice',
                'title' => trans('shop.report_netPrice'),
            ],

            [
                'name' => 'payment_status',
                'data' => 'payment_status',
                'title' => trans('shop.report_payment_status'),
            ],

            [
                'name' => 'view',
                'data' => 'view',
                'title' => trans('shop.report_view'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            // [
            //     'name' => 'pdf',
            //     'data' => 'pdf',
            //     'title' => trans('shop.report_pdf'),
            //     'exportable' => false,
            //     'printable' => false,
            //     'orderable' => false,
            //     'searchable' => false,
            // ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'MonthsDatatables_' . date('YmdHis');
    }
}
