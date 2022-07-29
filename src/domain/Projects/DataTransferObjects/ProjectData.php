<?php

namespace Domain\Projects\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ProjectData extends DataTransferObject
{
    public function __construct(
        public string $name,
        public string $description,
    ){}
}
