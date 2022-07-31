<?php

namespace Domain\Projects\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{

    protected $casts = [
        'is_restricted' => 'boolean'
    ];

}
