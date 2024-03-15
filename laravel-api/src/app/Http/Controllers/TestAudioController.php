<?php

namespace App\Http\Controllers;

use App\Client\OpenAiClient;
use App\Client\WhisperClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestAudioController extends Controller
{
    public function __invoke()
    {
        $client = new OpenAiClient();
        $path = Storage::path('public/audio/test2.mp3');
        dd($client->audioText($path));
    }
}
