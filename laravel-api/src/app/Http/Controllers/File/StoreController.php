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
        $subject_id = $request->string('subject_id');
        $filename = $uploadedFile->getClientOriginalName();
        $ext = $uploadedFile->getClientOriginalExtension();
        $path = Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );
        $path = Storage::path($path);

        $file = File::create([
            'title' => $filename,
            'path' => $path,
            'type' => $ext === 'mp3' ? 'audio' : 'text',
            'user_id' => auth()->user()->id,
            'subject_id' => $subject_id->toInteger(),
        ]);
        return new FileResource($file);

        //$created_file = File::create($request->validated());
        //return new FileResource($created_file);
    }
}
