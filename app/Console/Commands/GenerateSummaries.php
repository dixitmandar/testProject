<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Summary;
use App\Services\AISummaryService;

class GenerateSummaries extends Command
{
    protected $signature = 'news:summarize';

    public function handle()
    {
        $articles = Article::doesntHave('summary')->get();

        $ai = new AISummaryService();

        foreach ($articles as $article) {

            $summary = $ai->summarize($article->content);

            Summary::create([
                'article_id'=>$article->id,
                'summary'=>$summary
            ]);
        }

        $this->info('Summaries generated');
    }
}
