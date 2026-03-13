<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NewsService;

class FetchNews extends Command
{
    protected $signature = 'news:fetch';

    protected $description = 'Fetch latest news';

    public function handle()
    {
        $service = new NewsService();
        $service->fetch();

        $this->info('News fetched successfully');
    }
}
