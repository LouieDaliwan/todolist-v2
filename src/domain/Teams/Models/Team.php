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
        return $this->belongsToMany(User::class)->using(TeamUser::class);
    }
}
