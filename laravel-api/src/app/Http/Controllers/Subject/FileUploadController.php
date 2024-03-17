<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use App\Models\File;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{

    public function __invoke(Subject $subject, Request $request)
    {
        $uploadedFile = $request->file('file');
        $filename = $uploadedFile->getClientOriginalName();
        $ext = $uploadedFile->getClientOriginalExtension();
        $path = Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );
        $path = Storage::path($path);

        $fileText = $ext === 'mp3' ? null : file_get_contents($path);

        $file = File::create([
            'title' => $filename,
            'path' => $path,
            'description' => $fileText,
            'type' => $ext,
            'user_id' => auth()->user()->id,
            'subject_id' => $subject->id,
        ]);
        return new FileResource($file);
    }
}
