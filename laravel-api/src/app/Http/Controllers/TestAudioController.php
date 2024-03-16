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
        ini_set('memory_limit', '1024M');
        $client = new OpenAiClient();
        $path = Storage::disk('local')->path('public/audio/test_audio.mp3');
        dd($client->audioText($path));
    }
}
