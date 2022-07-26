<?php

use App\Http\Controllers\Teams\CreateTeamController;
use App\Http\Controllers\Teams\UpdateTeamController;
use App\Http\Controllers\Teams\DeleteTeamController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/teams-create', CreateTeamController::class);
Route::put('/teams-update/{team}', UpdateTeamController::class);
Route::delete('/teams-delete/{team}', DeleteTeamController::class);
