<?php

namespace RobinThijsen\LivewireFilters\Http\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class Checkbox extends Component
{
    #[Modelable]
    public array $values = [];
    public string $label = "";
    public string $itemsLabel = "";
    public bool $showDropdown = false;
    public object|array $items;
    public bool $uncheckedAll = false;
    public function toggleShowDropdown(): void
    {
        $this->showDropdown = !$this->showDropdown;
    }

    public static function getCheckedId($values): array
    {
        $arr = [];

        foreach ($values as $key => $value)
            if ($value) $arr[] = $key;

        return $arr;
    }

    public function getCheckedIdCount(): int
    {
        return count($this->getCheckedId($this->values));
    }

    public function updatedUncheckedAll(): void
    {
        if ($this->uncheckedAll) {
            foreach ($this->values as $key => $value)
                $this->values[$key] = false;
        } else {
            foreach ($this->values as $key => $value)
                $this->values[$key] = true;
        }
    }

    public function updatedValues(): void
    {
        $this->uncheckedAll = false;
    }

    public function render(): View
    {
        return view('livewire-filters::livewire.checkbox');
    }
}
