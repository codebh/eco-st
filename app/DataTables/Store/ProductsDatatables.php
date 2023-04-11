<?php

namespace App\DataTables\Store;

use App\Models\Product;
use App\Models\Store\ProductsDatatable;
use Illuminate\Support\Facades\DB;
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
            ->addColumn('edit', 'store.product.btn.edit')
            ->addColumn('view', 'store.product.btn.view')
            ->addColumn('image', 'store.product.btn.image')
            ->addColumn('delete', 'store.product.btn.delete')
            ->addColumn('size', 'store.product.btn.size')
            ->rawColumns([
                'view',
                'image',
                'edit',
                'delete',
                'size',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Store\ProductsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    { $shop = shop()->user()->id;
        // return Product::query()->where(
        //     [ 'show','!=','pending'],
        //     [ 'show','!=','delete'],


        //    )->where('store_id', $shop);


           return DB::table('products')
           ->where('store_id', '=', $shop)
           ->where(function ($query) {
               $query->where('show', '!=', 'pending')
                     ->where('show', '!=', 'delete');
           })
           ->orderByDesc('id')->get();
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

            ])
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

            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => '#',
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

                'name'       => 'title',
                'data'       => 'title',
                'title'      => trans('shop.title'),

            ],
            [

                'name'       => 'image',
                'data'       => 'image',
                'title'      => trans('shop.image'),

            ],
            [

                'name'       => 'size',
                'data'       => 'size',
                'title'      => trans('shop.req_mag'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],



            [
                'name'  => 'price',
                'data'  => 'price',
                'title' => trans('shop.price'),
            ],

            [
                'name'  => 'price_offer',
                'data'  => 'price_offer',
                'title' => trans('shop.price_offer'),
            ],
            [
                'name'  => 'status',
                'data'  => 'status',
                'title' => trans('shop.status'),
            ], [
                'name'  => 'show',
                'data'  => 'show',
                'title' => trans('shop.show'),
            ],
            [

                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => trans('shop.edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [

                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => trans('shop.delete'),
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
        return 'ProductsDatatables_' . date('YmdHis');
    }
}
