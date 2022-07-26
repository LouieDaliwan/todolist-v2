<?php

namespace Domain\Teams\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Teams\Models\TeamUser;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($team) {
            $team->users()->attach(auth()->user()->id);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(TeamUser::class);
    }
}
