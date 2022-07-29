<?php

namespace Domain\Projects\Models;

use Domain\Teams\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
