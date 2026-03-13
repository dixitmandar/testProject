<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AISummaryService
{
    public function summarize($text)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('OPENAI_API_KEY')
        ])->post('https://api.openai.com/v1/chat/completions',[
            "model"=>"gpt-4o-mini",
            "messages"=>[
                [
                    "role"=>"user",
                    "content"=>"Summarize this article in 3 lines: ".$text
                ]
            ]
        ]);

        return $response['choices'][0]['message']['content'];
    }
}