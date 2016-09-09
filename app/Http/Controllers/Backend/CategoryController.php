<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Resource;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kris\LaravelFormBuilder\FormBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     *
     * @param Category $category
     * @param Request $request
     * @return Response
     * @internal param CategoryDataTable $dataTable
     */
    public function index(Category $category, Request $request)
    {
        $query = $request->get('query');
        $categories = $category
            ->where('name','like','%'.$query.'%')
            ->paginate();
        return view("backend.categories.index", compact('categories'));
    }

    public function create(){
        $view = 'create';
        $parentCategories = Category::all()->pluck('name','id')->all();
        return view("backend.categories.create", compact('parentCategories','view'));
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
        $category->fill($this->saveImage($request));
        $category->save();

        if($category->id){
            return redirect()
                ->route('backend.category.edit',$category->id)
                ->with('Category is created successfully!');
        }else{
            return redirect()
                ->route('backend.category.index')
                ->with('Failed to create category!');
        }

    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return view("backend.categories.show", compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $view = 'edit';
        $parentCategories = Category::all()->pluck('name','id')->all();
        return view("backend.categories.edit", compact('parentCategories','category','view'));
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
        $category->fill($this->saveImage($request));

        if($category->save()){
            return redirect()
                ->route('backend.category.edit',$category->id)
                ->with('Category is updated successfully!');
        }else{
            return redirect()
                ->route('backend.category.edit',$category->id)
                ->with('Failed to update category!');
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete() ?
            Flash::success('Category is deleted successfully.') :
            Flash::error('Failed to delete category.');
        return $this->redirect()
            ->route('backend.category.edit',$category->id);
    }

    /**
     * @param CategoryRequest $request
     * @return static
     */
    public function saveImage(CategoryRequest $request)
    {
        $data = $request->except(['category_image']);
        //Save image first
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $filename =str_random(5).'_'.$file->getClientOriginalName();

            $path = '/storage/upload/' .$filename;
//            if (!Storage::has($path)) {
                if (Storage::put('upload/'.$filename, file_get_contents($file->getRealPath()))) {
                    $resource = Resource::create([
                        'name' => $file->getClientOriginalName(),
                        'path' => $path,
                        'mime_type' => $file->getMimeType()
                    ]);
                    $data['image_id'] = $resource->id;
                }
//            }
        }
        return $data;
    }
}
