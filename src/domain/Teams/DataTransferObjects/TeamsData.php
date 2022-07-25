<?php

namespace Domain\Teams\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class TeamData extends DataTransferObject
{
    public function __construct(
        public string $name,
        public string $description,
    ){}

    public static function formRequest(Request $request): self
    {
        return new self(...$request->validated());
    }
}
