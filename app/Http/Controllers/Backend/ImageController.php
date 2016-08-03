<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(storage_path().'/upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->allFiles();
        Log::info($files);
        $uploadedFiles = [];
        foreach($files as $file=>$value){
            $filename =str_random(5).'_'.$value->getClientOriginalName();
            $imgUrl = '/storage/upload/'.$filename;

            Log::info($filename);

            $resource = Resource::create([
                'name' => $filename,
                'path' => $imgUrl,
                'mime_type' => $value->getMimeType()
            ]);

            $result = $request->file($file)->move(storage_path().'/app/upload',$filename);
            //insert into $resource table


            $uploadedFiles[] = $resource;
            Log::info($result);
//            dd($uploadedFiles);
        }
        return response()->json($uploadedFiles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
