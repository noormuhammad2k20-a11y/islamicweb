<?php

namespace App\Http\Controllers;

use App\Services\BedrockService;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function __construct(protected BedrockService $bedrock) {}

    public function generateIslamicNameMeaning(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        $prompt = "Explain the Islamic meaning of the name '{$request->name}' in Urdu and English. Include origin and significance.";

        $response = $this->bedrock->chat($prompt);

        return response()->json(['meaning' => $response]);
    }

    public function generateDreamInterpretation(Request $request)
    {
        $request->validate(['symbol' => 'required|string']);

        $prompt = "What is the Islamic interpretation (Tabeer) of seeing '{$request->symbol}' in a dream? Answer in Urdu.";

        $response = $this->bedrock->chat($prompt);

        return response()->json(['tabeer' => $response]);
    }
}
