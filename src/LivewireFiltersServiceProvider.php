<?php

namespace RobinThijsen\LivewireFilters;

use Livewire\Livewire;
use RobinThijsen\LivewireFilters\Http\Livewire\Filters\Checkbox;
use RobinThijsen\LivewireFilters\Http\Livewire\Filters\Radio;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireFiltersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('livewire-filters')
            ->hasViews()
            ->hasTranslations();
    }

    public function bootingPackage(): void
    {
        Livewire::component('radio', Radio::class);
        Livewire::component('checkbox', Checkbox::class);
    }
}
