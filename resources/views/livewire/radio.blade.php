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
            @foreach($items as $item)
                <li class="filterDropdown__dropdown__item">
                    <input type="radio"
                           id="radio_{{ $id }}"
                           name="radio_{{ $id }}"
                           wire:model.live="value" />
                    <label for="value">
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

<style>
    .filterDropdown {
        position: relative;
        width: fit-content;
    }

    .filterDropdown__button {
        width: 100%;
        min-height: 50px;
        padding: 10px 20px;
        color: #121212;

        background-color: #FFF;
        border-radius: 5px;
        border: 2px solid rgba(0, 0, 0, .05);
        box-shadow: 0 0 1em rgba(0, 0, 0, .05);

        display: flex;
        align-items: center;
    }

    .filterDropdown__button svg {
        width: 16px;
        height: 16px;
        fill: #121212;
        margin-left: auto;
    }

    .filterDropdown__button--active {
        border-color: #7180ef;

        svg {
            transform: rotate(180deg);
        }
    }

    .filterDropdown__button__indicator {
        margin-left: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #7180ef;
        color: #FFF;
        font-size: 12px;
        font-weight: 700;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .filterDropdown__dropdown {
        position: absolute;
        top: 120%;
        z-index: 9999;

        width: fit-content;
        min-width: 100%;
        max-height: 250px;
        overflow-y: scroll;
        list-style-type: none;
        padding: 5px;

        background-color: #FFF;
        border-radius: 5px;
        border: 2px solid rgba(#000, .05);
        box-shadow: 0 0 1em rgba(#000, .05);

        display: flex;
        flex-direction: column;
        row-gap: 5px;
    }

    .filterDropdown__dropdown__item {
        width: 100%;
        padding: 10px;
        border-radius: 5px;

        display: flex;
        align-items: center;
        column-gap: 5px;

        transition: background-color ease-in .3s;
    }

    .filterDropdown__dropdown__item:hover {
        background-color: #f5f5f5;
    }

    .filterDropdown__dropdown__item input[type=radio] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #f8f8f8;

        transition: background-color ease-in .2s;
    }

    .filterDropdown__dropdown__item input[type=radio]:checked {
        background-repeat: no-repeat;
        background-position: center;
        border-color: #fff;
        background-color: #7180ef;
        outline: 2px solid #7180ef;
    }
</style>
