<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function feed(Request $request)
    {
        $user = $request->user();

        $topics = $user->topics->pluck('id');

        $articles = Article::whereIn('topic_id',$topics)
            ->with('summary')
            ->latest()
            ->limit(20)
            ->get();

        return response()->json($articles);
    }
}