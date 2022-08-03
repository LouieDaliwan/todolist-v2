<?php

namespace Domain\Sections\Models;

use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];

    protected $table = 'sections';

    public function tasks()
    {
        return $this->hasMany(Task::class, 'section_id', 'id');
    }

}
