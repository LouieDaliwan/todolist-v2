<?php

namespace Database\Factories\Contract;

use Illuminate\Support\Collection;

abstract class Factory
{
    abstract public function create(array $extra = []);

    public function times(int $times, array $extra = []): Collection
    {
        return collect()
            ->times($times)
            ->map(fn() => $this->create($extra));
    }
}
