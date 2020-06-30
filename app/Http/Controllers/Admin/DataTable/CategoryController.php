<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Category;
use App\Http\Controllers\Controller;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return Datatables::of(Category::orderBy('name', 'asc')->get())
        ->addColumn('action', 'admin.templates.components.DT-action')
        ->addIndexColumn()
        ->toJson();
    }
}
