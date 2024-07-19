<?php

namespace RobinThijsen\LivewireFilters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RobinThijsen\LivewireFilters\LivewireFilters
 */
class LivewireFilters extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \RobinThijsen\LivewireFilters\LivewireFilters::class;
    }
}
