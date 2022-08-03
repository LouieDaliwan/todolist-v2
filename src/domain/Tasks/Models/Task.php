<?php

namespace Domain\Tasks\Models;

use Domain\Sections\Models\Section;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $table = 'section_tasks';

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
