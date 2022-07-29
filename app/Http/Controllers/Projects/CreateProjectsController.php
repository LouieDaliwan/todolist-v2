<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreateProjectRequest;
use Domain\Projects\Actions\CreateProjectsAction;
use Domain\Projects\DataTransferObjects\ProjectData;
use Illuminate\Http\Request;

class CreateProjectsController extends Controller
{
    public function __construct(
        public CreateProjectsAction $createProjectsAction
    ){}
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateProjectRequest $request)
    {
        return ($this->createProjectsAction)(new ProjectData(...$request->validated()));
    }
}
