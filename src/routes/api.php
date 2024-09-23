<?php

use Illuminate\Support\Facades\Route;
use JJCS\CMS\Http\Controllers\ArticleController;

Route::middleware('api')->prefix('/api/cms')->group(function () {
    Route::apiResource('articles', ArticleController::class);
});
