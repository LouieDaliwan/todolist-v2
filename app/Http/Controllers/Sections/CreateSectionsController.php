<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use Domain\Sections\Actions\CreateSectionActions;
use Illuminate\Http\Request;


class CreateSectionsController extends Controller
{
    public function __construct(public CreateSectionActions $createSectionsAction) {}

    public function __invoke(Request $request)
    {
        return ($this->createSectionsAction)($request->all());
    }
}
