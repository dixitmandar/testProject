<?php

use App\Http\Controllers\Api\FeedController;

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/feed',[FeedController::class,'feed']);

});