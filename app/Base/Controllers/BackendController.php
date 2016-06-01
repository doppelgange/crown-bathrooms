<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use App\Resource;
use FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

abstract class BackendController extends Controller
{
    /**
     * Model name
     *
     * @var string
     */
    protected $model = "";

    /**
     * Form class path
     *
     * @var string
     */
    protected $formPath = "";

    /**
     * Upload path
     *
     * @var string
     */
    protected $uploadPath = "uploads";

    /**
     * BackendController constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
        $this->formPath = $this->getFormPath();
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->getForm();
    }

    /**
     * Get form
     *
     * @param null $object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getForm($object = null)
    {
        if ($object) {
            $url =  $this->urlRoutePath("update", $object);
            $method = 'PATCH';
            $path = $this->viewPath("edit");
        } else {
            $url =  $this->urlRoutePath("store", $object);
            $method = 'POST';
            $path = $this->viewPath("create");
        }
        $form = $this->createForm($url, $method, $object);
        return view($path, compact('form', 'object'));
    }

    /**
     * Create, flash success or error then redirect
     *
     * @param $class
     * @param $request
     * @param bool|false $imageColumn
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createFlashRedirect($class, $request, $imageColumn = false, $path = "index")
    {
        $model = $class::create($this->getData($request, $imageColumn));
        $model->id ? Flash::success(trans('backend.create.success')) : Flash::error(trans('backend.create.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Save, flash success or error then redirect
     *
     * @param $model
     * @param $request
     * @param bool|false $imageColumn
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveFlashRedirect($model, $request, $imageColumn = false, $path = "index")
    {
        $model->fill($this->getData($request, $imageColumn));
        $model->save() ? Flash::success(trans('backend.update.success')) : Flash::error(trans('backend.update.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Delete and flash success or fail then redirect to path
     *
     * @param $model
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyFlashRedirect($model, $path = "index")
    {
        $model->delete() ?
            Flash::success(trans('backend.delete.success')) :
            Flash::error(trans('backend.delete.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Returns redirect url path, if error is passed, show it
     *
     * @param string $path
     * @param null $error
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectRoutePath($path = "index", $error = null)
    {
        if ($error) {
            Flash::error(trans($error));
        }
        return redirect($this->urlRoutePath($path));
    }

    /**
     * Returns route path as string
     *
     * @param string $path
     * @return string
     */
    public function routePath($path = "index")
    {
        return 'backend.' . snake_case($this->model) . '.' . $path;
    }

    /**
     * Returns view path for the Backend
     *
     * @param string $path
     * @param bool|false $object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function viewPath($path = "index", $object = false)
    {
        $path = 'backend.' . str_plural(snake_case($this->model))  . '.' . $path;
        if ($object !== false) {
            return view($path, compact('object'));
        } else {
            return $path;
        }
    }

    /**
     * Create form
     *
     * @param $url
     * @param $method
     * @param $model
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function createForm($url, $method, $model)
    {
        return FormBuilder::create($this->formPath, [
            'method' => $method,
            'url' => $url,
            'model' => $model
        ]);
    }

    /**
     * Get data, if image column is passed, upload it
     *
     * @param $request
     * @param $imageColumn
     * @return mixed
     */
    protected function getData($request, $imageColumn)
    {
        return $imageColumn === false ? $request->all() : $this->uploadImage($request, $imageColumn);
    }

    /**
     * Upload the image and return the data
     *
     * @param $request
     * @param string $field
     * @return mixed
     */
    protected function uploadImage($request, $field)
    {
        $data = $request->except($field);
        if ($request->file($field)) {
            $file = $request->file($field);
            $request->file($field);
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $path = $this->getUploadPath($field);
            $move_path = public_path($path);
            $file->move($move_path, $fileName);
            $data[$field] = $path . $fileName;
        }
        return $data;
    }

    /**
     * Return upload path
     *
     * @param $field
     *
     * @return string
     */
    protected function getUploadPath($field)
    {
        return $this->uploadPath . "/" . str_plural($field);
    }

    /**
     * Returns full url
     *
     * @param string $path
     * @param bool|false $model
     * @return string
     */
    protected function urlRoutePath($path = "index", $model = false)
    {
        if ($model) {
            return route($this->routePath($path), ['id' => $model->id]);
        } else {
            return route($this->routePath($path));
        }
    }

    /**
     * Get model name, if isset the model parameter, then get it, if not then get the class name, strip "Controller" out
     *
     * @return string
     */
    protected function getModel()
    {
        return empty($this->model) ?
            explode('Controller', substr(strrchr(get_class($this), '\\'), 1))[0]  :
            $this->model;
    }

    /**
     * Returns fully class name for form
     *
     * @return string
     */
    protected function getFormPath()
    {
        $model =  title_case($this->model);
        return 'App\Forms\Backend\\' . $model . 'Form';
    }


    /**
     * @param Request $request
     * @param $model
     * @return static
     */
    public function saveImageFromRequest(Request $request,$model){
        //Save image first
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = strtolower($this->model).'/'.$model->id.'/'.$file->getClientOriginalName();

            if(!Storage::has($path)){
                if(Storage::put($path,file_get_contents($file ->getRealPath()))){
                    return Resource::create([
                        'name'=>$file->getClientOriginalName(),
                        'path'=>$path,
                        'mime_type'=>$file->getMimeType()
                    ]);
                }
            }
        }
    }
}