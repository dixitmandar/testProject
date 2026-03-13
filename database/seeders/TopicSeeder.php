<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run()
    {
        Topic::insert([
            ['name'=>'Technology'],
            ['name'=>'AI'],
            ['name'=>'Sports'],
            ['name'=>'Finance']
        ]);
    }
}