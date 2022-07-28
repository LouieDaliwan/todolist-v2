<?php

use App\Http\Controllers\Teams\CreateTeamController;
use App\Http\Controllers\Teams\UpdateTeamController;
use App\Http\Controllers\Teams\DeleteTeamController;
use App\Http\Controllers\Teams\InviteTeamUsersController;
use App\Http\Controllers\Teams\LeaveTeamUsersController;
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


Route::middleware('auth')->group(function() {
    Route::post('/teams-create', CreateTeamController::class);
    Route::put('/teams-update/{team}', UpdateTeamController::class);
    Route::delete('/teams-delete/{team}', DeleteTeamController::class);

    Route::post("/teams/{team}/invite-users", InviteTeamUsersController::class);
    Route::delete("/teams/{team}/leave-users/{user}", LeaveTeamUsersController::class);
});

