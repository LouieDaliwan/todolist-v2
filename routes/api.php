<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Projects\CreateProjectsController;
use App\Http\Controllers\Projects\ShareProjectsController;
use App\Http\Controllers\Projects\UpdateProjectsController;
use App\Http\Controllers\Sections\CreateSectionsController;
use App\Http\Controllers\Tasks\CreateSectionTasksController;
use App\Http\Controllers\Teams\CreateTeamController;
use App\Http\Controllers\Teams\UpdateTeamController;
use App\Http\Controllers\Teams\DeleteTeamController;
use App\Http\Controllers\Teams\InviteTeamUsersController;
use App\Http\Controllers\Teams\LeaveTeamUsersController;
use App\Http\Controllers\Teams\RemoveTeamUsersController;


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

Route::prefix('api')->middleware('auth:api')->group(function() {


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

     //for sections
     Route::post('/sections', CreateSectionsController::class);

     //for tasks
     Route::post('/sections/{section}/tasks', CreateSectionTasksController::class);
});
