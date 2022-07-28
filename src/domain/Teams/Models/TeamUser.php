<?php

namespace Domain\Teams\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamUser extends Pivot
{
    protected $casts = [
        'is_owner' => 'boolean',
    ];

}
