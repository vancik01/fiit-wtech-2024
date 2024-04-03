<div class="row row-cols-3 column-gap-3 gx-1 gy-1">
    {{-- "All" brand button --}}
    <div class="col">
        <button onclick="setActiveBrand(event, this)" data-manufacturer-id="all"
            class="p-0 active overflow-hidden !bg-backgroundColor">
            Všetky
        </button>
    </div>

    {{-- Brand buttons with images --}}
    @foreach ($brands as $brand)
        <div class="col">
            <button onclick="setActiveBrand(event, this)" data-manufacturer-id="{{ $brand->id }}"
                class="p-0 overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ $brand->imageUrl }}" alt="{{ $brand->name }}" />
            </button>
        </div>
    @endforeach
</div>
