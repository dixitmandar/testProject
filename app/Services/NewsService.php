<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Article;

class NewsService
{
    public function fetch()
    {
        $response = Http::get(
            'https://newsapi.org/v2/top-headlines',
            [
                'country' => 'us',
                'apiKey' => env('NEWS_API_KEY')
            ]
        );

        $articles = $response->json()['articles'];

        foreach ($articles as $item) {

            Article::create([
                'title' => $item['title'],
                'content' => $item['description'],
                'url' => $item['url'],
                'source' => $item['source']['name'],
                'topic_id' => 1
            ]);
        }
    }
}