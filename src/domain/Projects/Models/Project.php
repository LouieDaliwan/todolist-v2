<?php

namespace Domain\Projects\Models;

use App\Models\User;
use Domain\Projects\Events\ProjectCreatedEvent;
use Domain\Teams\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => ProjectCreatedEvent::class,
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
        ->using(ProjectUser::class)
        ->withPivot('project_id', 'user_id', 'is_restricted');;
    }
}
