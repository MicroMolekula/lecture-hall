<?php

namespace App\Http\Controllers;

use App\Client\OpenAiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestAudioController extends Controller
{
    public function __invoke()
    {
        ini_set('memory_limit', '1024M');
        $client = new OpenAiClient();
        $path = Storage::path('public/test3.mp4');
        dd($client->audioText($path));
    }
}
