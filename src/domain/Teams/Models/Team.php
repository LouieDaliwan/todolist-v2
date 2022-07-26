<?php

namespace Domain\Teams\Models;

use App\Models\User;
use Domain\Teams\Events\TeamCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Teams\Models\TeamUser;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams';

    protected $dispatchesEvents = [
        'created' => TeamCreatedEvent::class
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(TeamUser::class);
    }
}
