<?php

namespace RobinThijsen\LivewireFilters\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class Radio extends Component
{
    #[Locked]
    public int $id;

    #[Modelable]
    public mixed $value = null;
    public string $search = "";
    public string $label = "";
    public string|bool $itemsLabel = false;
    public bool $showDropdown = false;
    public object|array $items;

    public function mount(): void
    {
        $this->id = fake()->randomNumber(6, true);
    }

    public function toggleShowDropdown(): void
    {
        $this->showDropdown = !$this->showDropdown;
    }

    public function render(): View|Factory|Application
    {
        return view('livewire-filters::livewire.checkbox');
    }
}
