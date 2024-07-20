<div class="filterDropdown">
    <button type="button" wire:click="toggleShowDropdown"
            class="filterDropdown__button @if($showDropdown)filterDropdown__button--active @endif">
        <span>{{ $label }}</span>
        @if ($this->getCheckedIdCount() > 0)
            <span class="filterDropdown__button__indicator">{{ $this->getCheckedIdCount() }}</span>
        @endif
        <svg class="w-2 h-2 fill-blue-700">
            <use xlink:href="{{ asset('images/sprite.svg#arrow-down') }}"></use>
        </svg>
    </button>

    @if ($showDropdown)
        <ul class="filterDropdown__dropdown" wire:click.outside="toggleShowDropdown">
            <li class="filterDropdown__dropdown__item">
                <input type="checkbox" id="unCheckedAll"
                       name="unCheckedAll"
                       wire:model.live="unCheckedAll" />
                <label for="unCheckedAll">
                    {{ __('filters.unchecked-all') }}
                </label>
            </li>
            @foreach($items as $item)
                <li class="filterDropdown__dropdown__item">
                    <input type="checkbox"
                           id="values.{{ is_array($item) ? $item['id'] : $item->id }}"
                           name="values[{{ is_array($item) ? $item['id'] : $item->id }}]"
                           wire:model.live="values.{{ is_array($item) ? $item['id'] : $item->id }}" />
                    <label for="values.{{ is_array($item) ? $item['id'] : $item->id }}">
                        @if ($itemsLabel)
                            @if (is_array($item))
                                {{ __($itemsLabel . "." . $item['id']) }}
                            @else
                                {{ __($itemsLabel . "." . $item->id) }}
                            @endif
                        @else
                            @if (is_array($item))
                                {{ $item['label'] }}
                            @else
                                {{ $item->label }}
                            @endif
                        @endif
                    </label>
                </li>
            @endforeach
        </ul>
    @endif
</div>
