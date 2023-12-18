<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReportsApiController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('reports/date-wise-generate', [ReportsApiController::class, 'dateWiseGenerate'])
        ->name('api.reports.date_wise_generate');

    Route::post('reports/generate-month-wise-report', [ReportsApiController::class, 'generateMonthWiseReport']);
    Route::get('reports/not-returned', [ReportsApiController::class, 'notReturned']);
});
