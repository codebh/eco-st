<?php

namespace App\DataTables\Admin;

use App\Admin\AdminDatatable;
use App\Models\Report;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportsDatatables extends DataTable
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
            ->addColumn('total', 'admin.reports.btn.total')
            ->addColumn('percentage', 'admin.reports.btn.percentage')
            ->addColumn('cost', 'admin.reports.btn.cost')
            ->addColumn('netPrice', 'admin.reports.btn.netPrice')
            ->addColumn('view', 'admin.reports.btn.view')
            ->addColumn('pdf', 'admin.reports.btn.pdf')
            ->addColumn('payment_status', 'admin.reports.btn.payment_status')
            ->addColumn('checkbox', 'admin.reports.btn.checkbox')
            ->addColumn('edit', 'admin.reports.btn.edit')
            ->addColumn('delete', 'admin.reports.btn.delete')
            ->rawColumns([
                'total',
                'percentage',
                'cost',
                'netPrice',
                'view',
                'pdf',
                'payment_status',
                'edit',
                'delete',
                'checkbox',
            ]);
    }

        /**
         * Get query source of dataTable.
         *
         * @param \App\Admin\AdminDatatable $model
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public
        function query()
        {
            return Report::query()->with('store')->select('reports.*');
        }

        /**
         * Optional method if you want to use html builder.
         *
         * @return \Yajra\DataTables\Html\Builder
         */
        public
        function html()
        {
            return $this->builder()
//                    ->setTableId('admin\admindatatables-table')
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->parameters([
                    'lengthMenu' => [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    'initComplete' => " function () {
                                this.api().columns([1]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                                });
		                     });
		                     }",
                    'buttons' => [
                        ['text' => '<i class="fa fa-plus"></i>' . trans('admin.create_admin'),
                            'className' => 'btn btn-info', "action" => "function(){
                                    window.location.href = '" . \URL::current() . "/create';
                                    }"],
                        ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print">  Print</i>'],
                        ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<li class="fa fa-file"></li>' . trans('admin.ex_csv')],
                        ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<li class="fa fa-file"></li>' . trans('admin.ex_excel')],
                        ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<li class="fa fa-refresh"> Reload</li>'],
                        ['text' => '<i class="fa fa-trash"></i>', 'className' => 'delBtn btn btn-danger  ']
                    ],
                ])
                ->language(datatable_lang())
                ->dom('Blfrtip')
                ->orderBy(1);
//            ->buttons(
//                Button::make('create'),
//                Button::make('export'),
//                Button::make('print'),
//                Button::make('reset'),
//                Button::make('reload')
//            );
        }

        /**
         * Get columns.
         *
         * @return array
         */
        protected
        function getColumns()
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
                    'name'  => 'id',
                    'data'  => 'id',
                    'title' => '#',
                ],
                [
                    'name'  => 'store.name',
                    'data'  => 'store.name',
                    'title' => trans('admin.shops'),
                ],
                [
                    'name'  => 'date',
                    'data'  => 'date',
                    'title' => trans('admin.report_month'),
                ],
                [
                    'name'  => 'total',
                    'data'  => 'total',
                    'title' => trans('admin.report_total'),
                ],
                [
                    'name'  => 'percentage',
                    'data'  => 'percentage',
                    'title' => trans('admin.report_percentage'),
                ],
                [
                    'name'  => 'cost',
                    'data'  => 'cost',
                    'title' => trans('admin.report_cost'),
                ],
                [
                    'name'  => 'netPrice',
                    'data'  => 'netPrice',
                    'title' => trans('admin.report_netPrice'),
                ],

                [
                    'name'  => 'payment_status',
                    'data'  => 'payment_status',
                    'title' => trans('admin.report_payment_status'),
                ], [
                    'name'  => 'created_at',
                    'data'  => 'created_at',
                    'title' => trans('admin.created_at'),
                ], [
                    'name'  => 'updated_at',
                    'data'  => 'updated_at',
                    'title' => trans('admin.updated_at'),
                ], [
                    'name'       => 'view',
                    'data'       => 'view',
                    'title'      => trans('admin.report_view'),
                    'exportable' => false,
                    'printable'  => false,
                    'orderable'  => false,
                    'searchable' => false,
                ],[
                    'name'       => 'pdf',
                    'data'       => 'pdf',
                    'title'      => trans('admin.report_pdf'),
                    'exportable' => false,
                    'printable'  => false,
                    'orderable'  => false,
                    'searchable' => false,
                ],[
                    'name'       => 'edit',
                    'data'       => 'edit',
                    'title'      => trans('admin.edit'),
                    'exportable' => false,
                    'printable'  => false,
                    'orderable'  => false,
                    'searchable' => false,
                ], [
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
        protected
        function filename()
        {
            return 'MonthDatatables_' . date('YmdHis');
        }
    }
