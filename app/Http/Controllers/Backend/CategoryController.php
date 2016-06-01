<?php

namespace App\Http\Controllers\Backend;

use App\Base\Controllers\BackendController;
use App\Forms\Backend\CategoryForm;
use App\Http\Requests\CategoryRequest;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;

class CategoryController extends BackendController
{
    /**
     * Display a listing of the category.
     *
     * @param Category $category
     * @return Response
     * @internal param CategoryDataTable $dataTable
     */
    public function index(Category $category)
    {
        $categories = $category->paginate();
        return view($this->viewPath("index"), compact('categories'));
    }

    /**
     * Store a newly created category in storage
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function store(CategoryRequest $request,Category $category)
    {
        $resource = $this->saveImageFromRequest($request,$category);
        if(!is_null($resource)){
            $request['image_id'] = $resource->id;
        }
        return $this->createFlashRedirect(Category::class, $request);
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return $this->viewPath("show", $category);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return $this->getForm($category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param Category $category
     * @param CategoryRequest $request
     * @return Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $resource = $this->saveImageFromRequest($request,$category);
        if(!is_null($resource)){
            $request['image_id'] = $resource->id;
        }

        return $this->saveFlashRedirect($category, $request);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        return $this->destroyFlashRedirect($category);
    }
}
