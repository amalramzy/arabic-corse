<?php

namespace App\DataTables;

use App\Models\Quiz;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class QuizzesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'backend.quizzes.action')
            ->addColumn('name', function($quiz){
                return view('backend.quizzes.name', compact('quiz'));
                })
            ->addColumn('course name', function($quiz){
                return view('backend.quizzes.course', compact('quiz'));
                })
            ->addColumn('no questions', function($quiz){
                return view('backend.quizzes.question', compact('quiz'));
                });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Quiz $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quiz $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('quizzes-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->ajax('')
                    ->dom('frtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::computed('course name'),
            Column::computed('no questions'),
            Column::computed('action')
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
        return 'Quizzes_' . date('YmdHis');
    }
}
