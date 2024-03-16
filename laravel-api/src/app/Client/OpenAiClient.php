<?php


namespace App\Client;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;


class OpenAiClient
{

    private $openaiClient;

    public function __construct()
    {
        $this->openaiClient = OpenAI::audio();
    }

    public function audioText($path)
    {
        $response = $this->openaiClient->transcribe([
            'model' => 'whisper-1',
            'file' => fopen($path, 'r'),
            'response_format' => 'verbose_json',
        ]);
        return $response->text;
    }
}
