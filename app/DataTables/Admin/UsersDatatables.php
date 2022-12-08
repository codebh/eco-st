<?php

namespace App\DataTables\Admin;

use App\Admin\UsersDatatable;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDatatables extends DataTable
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
            ->addColumn('checkbox', 'admin.users.btn.checkbox')
            ->addColumn('edit', 'admin.users.btn.edit')
            ->addColumn('delete', 'admin.users.btn.delete')
            // ->addColumn('level', '           admin.users.btn.level')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\UsersDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query()->where(function ($q) {
            if (request()->has('level')) {
                return $q->where('level', request('level'));
            }
        });
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
                'lengthMenu' => [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                'initComplete' => " function () {
                                this.api().columns([2,3]).every(function () {
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
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="check_all()">',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [   'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            Column::computed('name')
                ->title(trans('admin.name'))
                ->addClass('text-center'),
            Column::computed('email')
                ->title(trans('admin.email'))
                ->addClass('text-center'),
            Column::computed('email_verified_at')
                ->title(trans('admin.verify_date'))
                ->addClass('text-center'),


            [   'name'=>'created_at',
                'data'=>'created_at',
                'title'=>trans('admin.created_at'),
            ],
            [   'name'=>'updated_at',
                'data'=>'updated_at',
                'title'=>trans('admin.updated_at'),

            ],
            [   'name'=>'edit',
                'data'=>'edit',
                'title'=> trans('admin.edit'),
                'exportable'=> false,
                'printable' => false,
                'orderable'=> false,
                'searchable'=> false,
            ],
            [   'name'=>'delete',
                'data'=>'delete',
                'title'=>trans('admin.delete'),
                'exportable'=> false,
                'printable' => false,
                'orderable'=> false,
                'searchable'=> false,
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
        return 'UsersDatatables_' . date('YmdHis');
    }
}
