<?php

namespace App\Client;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class WhisperClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
           'base_uri' => 'http://whisper:9000',
            'timeout' => 100.0
        ]);
    }

    public function audioText($path)
    {
//        return $this->client->request('POST', 'http://whisper:9000/asr', [
//
//                'audio_file' => '/var/www/laravel/storage/app/public/audio/test2.mp3'
//
//
//        ]);
        return Http::accept('application/json')->bodyFormat('multipart/form-data')->
        post('http://whisper:9000/asr?encode=true&task=transcribe&language=ru&word_timestamps=false&output=txt', [
            'audio_file' => '@/var/www/laravel/storage/app/public/audio/test2.mp3'
        ])->body();
    }

}
