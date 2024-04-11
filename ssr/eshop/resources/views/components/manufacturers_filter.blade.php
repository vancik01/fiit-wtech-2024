<div class="row row-cols-3 column-gap-3 gx-1 gy-1">
    {{-- "All" manufacturers button --}}
    <div class="col">
        <button onclick="setActiveManufacturer(event, this)" data-manufacturer-id="all"
            class="p-0 overflow-hidden !bg-backgroundColor @if ($activeManufacturer == 'all') active @endif">
            Všetky
        </button>
    </div>




    {{-- Manufacturer buttons with images --}}
    @foreach ($manufacturers as $manufacturer)
        <div class="col">
            <button onclick="setActiveManufacturer(event, this)" data-manufacturer-id="{{ $manufacturer->slug }}"
                class="p-0 overflow-hidden @if ($activeManufacturer == $manufacturer->slug) active @endif">
                <img class="w-full h-full object-cover aspect-square " src="{{ $manufacturer->image }}"
                    alt="{{ $manufacturer->name }}" />
            </button>
        </div>
    @endforeach
</div>
