<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\Store;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use PDF;

final class AdminReportTable extends PowerGridComponent
{
    use ActionButton;
    use LivewireAlert;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;


    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
                'rowActionEvent',
                'rowActionBackEvent',
                'rowActionPdfEvent',
                'rowActionDeleteEvent',
                'bulkActionEvent',
                'rowActionEditEvent',
            ]);
    }

    // public function rowActionEvent(array $data): void
    // {
    //     $message = 'You have clicked #' . $data['id'];

    //     $this->dispatchBrowserEvent('showAlert', ['message' => $message]);
    // }

    public function bulkActionEvent(): void
    {

        // dd($this->checkboxValues);
        if (count($this->checkboxValues) == 0) {
            $this->dispatchBrowserEvent('showAlert', ['message' => 'You must select at least one item!']);



            return;
        }

        $ids = implode(', ', $this->checkboxValues);
        foreach($this->checkboxValues as $item){
            $report =Report::where('id', '=', $item)->update(['payment_status' => 1]);
        }
        $this->alert('success', trans('admin.uploaded_successfully'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

    }

    public function rowActionEvent(array $data): void
    {
        // dd($data['id']);
        $report =Report::where('id', '=', $data['id'])->update(['payment_status' => '1']);

        $this->alert('success', trans('admin.uploaded_successfully'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);


    }


    public function rowActionBackEvent(array $data): void
    {

        $report =Report::where('id', '=', $data['id'])->update(['payment_status' => '0']);
        $this->alert('success', trans('admin.uploaded_successfully'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
    }
    public function rowActionPdfEvent(array $data)
    {
        return redirect()->route('months.show', $data['id']);

    }
    public function rowActionEditEvent(array $data)
    {
        return redirect()->route('months.edit', $data['id']);

    }

    public function rowActionDeleteEvent(array $data): void
    {

// $messageConfirm =$this->dispatchBrowserEvent('showConfirm', ['message' => 'You must select at least one itemssss!']);

// dd($messageConfirm);

            $report =Report::where('id', '=', $data['id'])->delete();
            $this->alert('success', trans('admin.uploaded_successfully'), [
                'position' => session('lang')=='ar'? 'top-start':'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Cancel',
                'showCancelButton' => false,
                'showConfirmButton' => false,
            ]);



    }




    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox() //Adds checkboxes to each table row
        ->showRecordCount() //Display: Showing 1 to 10 of 20 Results
        ->showPerPage() //Shows per page option
        ->showSearchInput() //Show search input on page top.
        ->showToggleColumns()
        ->showExportOption('download', ['excel', 'csv']); //Enables export feature and show button on page top.
    }


    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Report>|null
    */
    public function datasource(): ?Builder
    {
        return Report::query()->with('store')->select('reports.*');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('date')
            ->addColumn('store_id')
            ->addColumn('store.name')
            ->addColumn('count')
            ->addColumn('total', function (Report $model) {
                return presentPrice($model->total);
              })
            ->addColumn('percentage', function (Report $model) {
                return $model->percentage*100 .'%';
              })

            ->addColumn('cost', function (Report $model) {
                return presentPrice($model->cost);
              })
              ->addColumn('net_price', function (Report $model) {
                return presentPrice($model->net_price);
              })

            // ->addColumn('payment_status')
            ->addColumn('payment_status', function (Report $model) {
                return ($model->payment_status ? 'yes' : 'no');
            })
            ->addColumn('created_at_formatted', function(Report $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function(Report $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Table header
    |--------------------------------------------------------------------------
    | Configure Action Buttons for your table header.
    |

    */
     /**
     * PowerGrid Header
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */
    // public function header(): array
    // {
    //     return [
    //         Button::add('bulk-demo')
    //             ->caption('button')
    //             ->class('btn')
    //             ->emit('bulkActionEvent', [])
    //     ];
    // }



    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        $canEdit = true;
        $canCopy = true;
        $trueLabel = true;
        return [
            Column::add()
                ->title('#')
                ->field('id')
                ->makeInputRange(),



                Column::add()
                ->title(trans('admin.shop_id'))
                ->field('store_id')
                ->makeInputRange(),

                Column::add()
                ->title(trans('admin.shops'))
                ->field('store.name'),

                Column::add()
                ->title(trans('admin.report_count'))
                ->field('count')
                ->sortable()
                ->searchable()
                ->makeInputRange(),


            Column::add()
                ->title(trans('admin.report_month'))
                ->field('date')
                ->sortable()
                ->searchable()
                ->makeInputText(),


            Column::add()
                ->title(trans('admin.report_total'))
                ->field('total')
                ->sortable()
                ->searchable()
                ->makeInputText(),

                Column::add()
                    ->title(trans('admin.report_percentage'))
                    ->field('percentage')
                    ->sortable()
                    ->editOnClick($canEdit)
                    ->searchable(),
                    // ->editOnClick($canEdit)


                    Column::add()
                    ->title(trans('admin.report_cost'))
                    ->field('cost')
                    ->sortable()
                    ->searchable()
                    ->makeInputText(),
                    Column::add()
                    ->title(trans('admin.report_netPrice'))
                    ->field('net_price')
                    ->sortable()
                    ->searchable()
                    ->makeInputText(),








            Column::add()
                ->title(trans('admin.report_payment_status'))
                ->field('payment_status')
                ->searchable()
                ->sortable()
                // ->toggleable($canEdit, 'yes', 'no')
                ->makeBooleanFilter('payment_status','yes', 'no'),





            Column::add()
                ->title(trans('admin.created_at'))
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title(trans('admin.updated_at'))
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Report Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
       return [
            Button::add('add')
                // ->caption('button')
                ->class('btn btn-danger far fa-newspaper')
                ->emit('bulkActionEvent',[]),

                Button::add('edit')
                ->caption(trans('admin.fees_no'))
                ->class('btn btn-warning')
                ->emit('rowActionEvent', ['id' => 'id']),

                Button::add('show')
                // ->caption(trans('admin.pdf'))
                ->class('btn btn-warning fa fa-edit')
                ->emit('rowActionEditEvent', ['id' => 'id']),

                Button::add('pdf')
                // ->caption(trans('admin.pdf'))
                ->class('btn btn-info far fa-file-pdf')
                ->emit('rowActionPdfEvent', ['id' => 'id']),
                Button::add('delete')
                // ->caption(trans('admin.delete'))
                ->class('btn btn-danger fas fa-trash-alt')
                ->emit('rowActionDeleteEvent', ['id' => 'id']),
                // ->emit('rowActionEvent',[]),
        //    Button::add('edit')
        //        ->caption(trans('admin.edit'))
        //        ->class('btn btn-success')
        //        ->route('months.edit', ['id']),

        //        Button::add('view')
        //        ->caption(trans('admin.view'))
        //        ->class('btn btn-info')
        //        ->route('months.edit', ['id']),

            //    Button::add('pdf')
            //    ->caption(trans('admin.pdf'))
            //    ->class('btn btn-warning')
            //    ->route('month.pdf', ['id']),

        //    Button::add('destroy')
        //        ->caption(trans('admin.delete'))
        //        ->class('btn btn-danger')
        //        ->route('months.destroy', ['id'])
        //        ->method('delete'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Report Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */


    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($report) => $report->payment_status === 1)
                ->setAttribute('class', 'btn btn-success')
                ->caption(trans('admin.fees_yes'))
                ->emit('rowActionBackEvent', ['id' => 'id']),

                Rule::rows()
                ->when(fn($report) => $report->payment_status === 0)
                ->setAttribute('class', 'bg-secondary'),
                // Rule::rows()
                // ->when(fn($report) => $report->payment_status === 'yes')
                // ->setAttribute('class', 'bg-warning'),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Report Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data ): bool
    {
       try {
           $updated = Report::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }




    public function template(): ?string
    {
        return null;
    }


}
