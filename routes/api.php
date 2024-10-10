<?php

use Illuminate\Support\Facades\Route;
use JJCS\CMS\Http\Controllers\ContentController;

Route::middleware(config('cms.route.middleware'))->prefix(config('cms.route.prefix'))->group(function () {
    Route::apiResource('content', ContentController::class);
});
