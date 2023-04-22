<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TopicController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('v1/topic', TopicController::class);

// Route::apiResource('v1/status', TopicController::class)
//       ->only(['GetStatus']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {
    Route::get('/topic',[TopicController::class, 'index'])->name('index');
    Route::get('/status',[TopicController::class, 'getStatus'])->name('status');
    Route::get('/getmessage',[TopicController::class, 'getMessage'])->name('getmessage');
    Route::post('/savemessage',[TopicController::class, 'saveMessage'])->name('savemessage');

});
