<?php

namespace App\DataTables\Admin;

use App\Admin\ProductsDatatable;
use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDatatables extends DataTable
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
            ->addColumn('checkbox', 'admin.products.btn.checkbox')
            ->addColumn('status','admin.products.btn.status')
            ->addColumn('show','admin.products.btn.show')
            ->addColumn('price','admin.products.btn.price')
            ->addColumn('price_offer','admin.products.btn.price_offer')
            ->addColumn('edit', 'admin.products.btn.edit')
            ->addColumn('delete','admin.products.btn.delete')
            ->addColumn('view','admin.products.btn.view')
            ->rawColumns([
                'checkbox',
                'status',
                'show',
                'price',
                'price_offer',
                'edit',
                'delete',
                'view',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin\ProductsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return  Product::query()->with('store','category')->select('products.*');

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
            ->parameters(
                [
                    'dom'=>'Blfrtip',
                    'lengthMenu'=>[[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                    'buttons'=> [
                        ['text'=> '<i class="fa fa-plus"></i>'.trans('admin.add'),
                            'className'=>'btn btn-info',"action"=>"function(){
                                    window.location.href = '".\URL::current()."/create';
                                    }"],
                        ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print">  Print</i>'],
                        ['extend'=>'csv','className'=>'btn btn-info','text'=>'<li class="fa fa-file"></li>'. trans('admin.ex_csv')],
                        ['extend'=>'excel','className'=>'btn btn-success','text'=>'<li class="fa fa-file"></li>'.trans('admin.ex_excel')],
                        ['extend'=>'reload','className'=>'btn btn-default','text'=>'<li class="fa fa-refresh"> Reload</li>'],
                        ['text' => '<i class="fa fa-trash"></i>', 'className' => 'delBtn btn btn-danger  ']
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

                    'language'=>datatable_lang(),
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
            [   'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()">',
                'exportable'=> false,
                'printable' => false,
                'orderable'=> false,
                'searchable'=> false,
            ],
            [   'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            [   'name'=>'title',
                'data'=>'title',
                'title'=>trans('admin.title'),
            ],
            [
                'name'=>'view',
            'data'=>'view',
            'title'=>trans('admin.view'),
            'exportable'=> false,
            'printable' => false,
            'orderable'=> false,
            'searchable'=> false,
        ],
            // [   'name'=>'content',
            //     'data'=>'content',
            //     'title'=>trans('admin.content'),
            // ],
            // [   'name'=>'store.name',
            //     'data'=>'store.name',
            //     'title'=>trans('admin.shop_id'),
            // ],
            ['name'=>'store.name',
            'data'=>'store.name',
            'title'=>trans('admin.shop_name'),
        ],
            [   'name'=>'category.name_ar',
                'data'=>'category.name_ar',
                'title'=>trans('admin.category'),
            ],

            [  'name'=>'price',
                'data'=>'price',
                'title'=>trans('admin.price'),
            ],
            [  'name'=>'price_offer',
                'data'=>'price_offer',
                'title'=>trans('admin.price_offer'),
            ],
            [  'name'=>'show',
                'data'=>'show',
                'title'=>trans('admin.show'),
            ],
            [  'name'=>'status',
                'data'=>'status',
                'title'=>trans('admin.offer_state'),
            ],
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
        return 'ProductsDatatables_' . date('YmdHis');
    }
}
