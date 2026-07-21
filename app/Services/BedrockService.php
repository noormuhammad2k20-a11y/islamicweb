<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BedrockService
{
    protected string $baseUrl;
    protected string $bearerToken;
    protected string $region;

    public function __construct()
    {
        $this->bearerToken = config('bedrock.bearer_token');
        $this->region      = config('bedrock.region');
        $this->baseUrl     = config('bedrock.base_url');
    }

    /**
     * Claude Model ko message bhejo
     * eu-north-1 mein Claude models ko inference profile chahiye
     * Default: Claude Fable 5
     * Alternative: eu.anthropic.claude-haiku-4-5-20251001-v1:0
     */
    public function chat(string $userMessage, string $model = 'global.anthropic.claude-fable-5'): string
    {
        $url = "{$this->baseUrl}/model/{$model}/invoke";

        $payload = [
            'anthropic_version' => 'bedrock-2023-05-31',
            'max_tokens'        => 1000,
            'messages'          => [
                [
                    'role'    => 'user',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => $userMessage,
                        ]
                    ],
                ]
            ],
        ];

        $response = Http::timeout(30)->withHeaders([
            'Authorization'          => 'Bearer ' . $this->bearerToken,
            'Content-Type'           => 'application/json',
            'anthropic-workspace-id' => 'default',
        ])->post($url, $payload);

        if ($response->failed()) {
            Log::error('Bedrock API Error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            throw new \Exception('Bedrock API Error: ' . $response->body());
        }

        $data = $response->json();

        return $data['content'][0]['text'] ?? 'No response';
    }

    /**
     * Available models list karo (eu-north-1 mein)
     */
    public function listModels(): array
    {
        $url = "https://bedrock.{$this->region}.amazonaws.com/foundation-models";

        $response = Http::withHeaders([
            'Authorization'          => 'Bearer ' . $this->bearerToken,
            'Content-Type'           => 'application/json',
            'anthropic-workspace-id' => 'default',
        ])->get($url);

        if ($response->failed()) {
            throw new \Exception('Models fetch failed: ' . $response->body());
        }

        return $response->json('modelSummaries', []);
    }
}
