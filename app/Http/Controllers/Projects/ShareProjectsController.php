<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Domain\Projects\Actions\ShareProjectsActions;
use Domain\Projects\Models\Project;
use Illuminate\Http\Request;

class ShareProjectsController extends Controller
{
    public function __construct(public ShareProjectsActions $shareProjectsActions){}

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        return ($this->shareProjectsActions)($project, $request->toArray());
    }
}
