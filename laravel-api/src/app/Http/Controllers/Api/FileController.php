<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FileResource::collection(File::all());
        //return FileResource::collection(File::with('user')->get());
        //return FileResource::collection(File::all());
        //return File::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $uploadedFile = $request->file();
        dd($uploadedFile);
        $created_file = File::create($request->validated());
        return new FileResource($created_file);
    }


    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return new FileResource($file);
        //return new FileResource(File::with('user')->findOrFail($id));
        //return File::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, File $file)
    {
        $file->update($request->validated());
        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
