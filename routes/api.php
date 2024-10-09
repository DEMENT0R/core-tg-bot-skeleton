<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/set', function (Request $request) {
    $setWebhookAction = new \App\Actions\SetWebhookAction();
    return $setWebhookAction();
});

Route::get('/unset', function (Request $request) {
    $unsetWebhookAction = new \App\Actions\UnsetWebhookAction();
    return $unsetWebhookAction();
});

Route::any('/hook', function () {
    $handleWebhookAction = new \App\Actions\HandleWebhookAction();
    return $handleWebhookAction();
});
