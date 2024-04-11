<div class="flex flex-col gap-2">
    <div class="form-check">
        <input onchange="setActiveCategory(event, this)" class="form-check-input" type="radio" name="category-filter"
            id="all" data-category-id="all" @if ($activeCategory == 'all') checked @endif>
        <label class="form-check-label text-md" for="all">
            Všetky kategórie
        </label>
    </div>

    {{-- Category buttons with images --}}
    @foreach ($categories as $category)
        <div class="form-check">
            <input onchange="setActiveCategory(event, this)" class="form-check-input" type="radio"
                name="category-filter" id="{{ $category->slug }}" data-category-id="{{ $category->slug }}"
                @if ($activeCategory == $category->slug) checked @endif>
            <label class="form-check-label" for="{{ $category->slug }}">
                {{ $category->name }}
            </label>
        </div>
    @endforeach
</div>
