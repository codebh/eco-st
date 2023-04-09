<?php

namespace App\DataTables\Admin;

use App\Admin\AdminDatatable;
use App\Models\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminDatatables extends DataTable
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
//            ->eloquent($query)
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\AdminDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
//                    ->setTableId('admin\admindatatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'lengthMenu' => [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
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
                'buttons'=> [
                    ['text'=> '<i class="fa fa-plus"></i>'.trans('admin.create_admin'),
                        'className'=>'btn btn-info',"action"=>"function(){
                                    window.location.href = '".\URL::current()."/create';
                                    }"],
                    ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print">  Print</i>'],
                    ['extend'=>'csv','className'=>'btn btn-info','text'=>'<li class="fa fa-file"></li>'. trans('admin.ex_csv')],
                    ['extend'=>'excel','className'=>'btn btn-success','text'=>'<li class="fa fa-file"></li>'.trans('admin.ex_excel')],
                    ['extend'=>'reload','className'=>'btn btn-default','text'=>'<li class="fa fa-refresh"> Reload</li>'],
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
    protected function getColumns()
    {
        return [
            [   'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()">',
                'exportable'=> false,
                'printable' => false,
                'orderable'=> false,
                'searchable'=> false,
            ],
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
//            Column::make('password'),
            Column::make('created_at',trans('admin.order_address')),
            Column::make('updated_at'),
            Column::computed('edit')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('delete')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AdminDatatables_' . date('YmdHis');
    }
}
