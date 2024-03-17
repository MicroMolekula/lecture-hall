<?php

namespace App\Http\Controllers\File;

use App\Client\OpenAiClient;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhisperController extends Controller
{
    public function __invoke(File $file)
    {
        if($file->description === null){
            $client = new OpenAiClient();
            $path = $file->path;
            $text = $client->audioText($path);
            $file->update(['description' => $text]);
        }
        return response()->json(['text' => $file->fresh()->description]);
    }
}
