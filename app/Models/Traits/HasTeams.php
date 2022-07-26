<?php

namespace App\Models\Traits;


use Domain\Teams\Models\Team;
use Domain\Teams\Models\TeamUser;

trait HasTeams
{
    public function teams()
    {
        return $this->belongsToMany(Team::class)->using(TeamUser::class);
    }
}
