<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\Category;

class CategoryDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['id', 'name'];

    /**
     * Columns to show
     *
     * @var array
     */
    protected $eager_columns = ['parent_category.name'];
    /**
     * Columns to show
     *
     * @var array
     */
    protected $boolean_columns = ['has_sub_category'];

    /**
     * Columns to show relations count
     *
     * @var array
     */
    protected $count_columns = [];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $categories = Category::select();
        return $this->applyScopes($categories);
    }
}
