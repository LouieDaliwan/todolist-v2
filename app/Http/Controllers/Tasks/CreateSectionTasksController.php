<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Domain\Sections\Models\Section;
use Domain\Tasks\Models\Task;
use Illuminate\Http\Request;

class CreateSectionTasksController extends Controller
{
    public function __invoke(Request $request, Section $section) : Section
    {
        $section->tasks()->create([
            'name' => 'test',
            'description' => 'test',
            'project_id' => $section->project_id
        ]);

        return $section;
    }
}
