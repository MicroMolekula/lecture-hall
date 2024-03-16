<?php


namespace App\Client;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;


class OpenAiClient
{

    private $openaiClient;

    public function __construct()
    {
        $this->openaiClient = \Tectalic\OpenAi\Manager::build(
            new Client(),
            new \Tectalic\OpenAi\Authentication(getenv('IGNITION_OPEN_AI_KEY'))
        );
    }

    public function audioText($path)
    {
        $response = $this->openaiClient->audioTranscriptions()->create(
            new \Tectalic\OpenAi\Models\AudioTranscriptions\CreateRequest([
                'file' => $path,
                'model' => 'whisper-1',
            ])
        )->toModel();

        return $response->text;
    }
}
