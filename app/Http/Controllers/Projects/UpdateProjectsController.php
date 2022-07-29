<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Domain\Projects\Models\Project;
use Illuminate\Http\Request;

class UpdateProjectsController extends Controller
{

    public function __invoke(Request $request, Project $project)
    {

        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->save();

        return $project;
    }
}
