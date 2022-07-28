<?php

namespace Domain\Teams\Models;

use App\Models\User;
use Domain\Teams\Events\TeamCreatedEvent;
use Domain\Teams\Events\TeamDeletingEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Teams\Models\TeamUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory,
    SoftDeletes;

    protected $guarded = [];

    protected $table = 'teams';

    protected $dispatchesEvents = [
        'created' => TeamCreatedEvent::class,
        'deleting' => TeamDeletingEvent::class,
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(TeamUser::class)
        ->withPivot('team_id', 'user_id', 'is_owner');
    }

    public function isOwner(User $user)
    {
        return $this->users()
        ->wherePivot('user_id', $user->id)
        ->first()
        ->pivot
        ->is_owner ?? false;
    }
}
