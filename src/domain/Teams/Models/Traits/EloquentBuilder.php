<?php

namespace Domain\Teams\Models\Traits;

use Domain\Teams\QueryBuilders\TeamQueryBuilder;

trait EloquentBuilder
{
    public function newEloquentBuilder($query): TeamQueryBuilder
    {
        return new TeamQueryBuilder($query);
    }
}
