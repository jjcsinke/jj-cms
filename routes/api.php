<?php

use Illuminate\Support\Facades\Route;
use JJCS\CMS\Http\Controllers\ArticleController;

Route::middleware(config('cms.route.middleware'))->prefix(config('cms.route.prefix'))->group(function () {
    Route::apiResource('articles', ArticleController::class);
});
