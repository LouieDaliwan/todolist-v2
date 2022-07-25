<?php

namespace Domain\Teams;

use App\Models\Teams;
use Illuminate\Http\Request;

class CreateTeamsActions
{
    public function __construct() {}

    public function execute(Request $request)
    {
        return Teams::firstOrCreate([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
    }
}
