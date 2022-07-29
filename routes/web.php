<?php

use App\Http\Controllers\Projects\CreateProjectsController;
use App\Http\Controllers\Projects\ShareProjectsController;
use App\Http\Controllers\Projects\UpdateProjectsController;
use App\Http\Controllers\Teams\CreateTeamController;
use App\Http\Controllers\Teams\UpdateTeamController;
use App\Http\Controllers\Teams\DeleteTeamController;
use App\Http\Controllers\Teams\InviteTeamUsersController;
use App\Http\Controllers\Teams\LeaveTeamUsersController;
use App\Http\Controllers\Teams\RemoveTeamUsersController;
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


Route::middleware(['auth'])->group(function() {
    //for teams
    Route::post('/teams-create', CreateTeamController::class);
    Route::put('/teams-update/{team}', UpdateTeamController::class);
    Route::delete('/teams-delete/{team}', DeleteTeamController::class);

    //for team users
    Route::post("/teams/{team}/invite-users", InviteTeamUsersController::class);
    Route::put("/teams/{team}/remove-users", RemoveTeamUsersController::class)->middleware('check.owner')
    ->name('team-users-remove');
    Route::delete("/teams/{team}/leave-users/{user}", LeaveTeamUsersController::class)
    ->middleware('auth.leaveTeam')
    ->name('leave-team');


    //for projects
    Route::post('/projects', CreateProjectsController::class);
    Route::put('/projects/{project}', UpdateProjectsController::class);
    Route::post('/projects/{project}/share', ShareProjectsController::class);
});

