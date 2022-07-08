<?php

use App\Models\JobOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\JobOfferController;

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

Route::apiResource("joboffers", JobOfferController::class);
Route::apiResource("companies", CompanyController::class);
Route::apiResource("answers", AnswerController::class);

