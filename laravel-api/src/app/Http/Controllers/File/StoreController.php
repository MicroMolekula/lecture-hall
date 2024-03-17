<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $uploadedFile = $request->file('file');
        $filename = $uploadedFile->getClientOriginalName();
        $path = Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );
        $path = Storage::path($path);
        return response()->json(['message' => 'successful']);
        //$created_file = File::create($request->validated());
        //return new FileResource($created_file);
    }
}
