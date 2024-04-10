@extends('layouts.app')

@section('title', config('urls.shop.title'))

@section('content')
    <script>
        const minPrice = {{ $selectedFilters->minPrice }}
        const maxPrice = {{ $selectedFilters->maxPrice }}

        function updatePriceFilter(e) {
            const val = e.value;

            document.querySelector(
                ".price-filter span"
            ).textContent = `${minPrice}€ - ${val}€`;

            document.getElementById('priceInput').value = val;
        }

        function setActiveAvaliability(e, element) {
            e = e || window.event;
            e.preventDefault();

            const allButtons = document.querySelectorAll(
                ".avaliability-filter button"
            );

            document
                .querySelector(".avaliability-filter button.active")
                .classList.remove("active");

            document.getElementById('availabilityInput').value = element.getAttribute('data-avaliability');
            element.classList.add("active");
        }

        function setActiveManufacturer(event, element) {
            event.preventDefault();
            document.querySelectorAll(".manufacturer-filter button").forEach((e) => e.classList.remove("active"))

            element.classList.add("active");
            document.getElementById('manufacturerInput').value = element.getAttribute('data-manufacturer-id');
        }

        function setActiveCategory(event, element) {
            event.preventDefault();
            document.querySelectorAll(".category-filter input").forEach((e) => e.checked = false)
            console.log(element.getAttribute('data-category-id'))
            element.checked = true;
            document.getElementById('categoryInput').value = element.getAttribute('data-category-id');
        }

        function applyOrderBy(event) {
            var selectedValue = document.getElementById('select-order').value;
            var url = new URL(window.location.href);
            url.searchParams.set('zoradit-podla', selectedValue);

            window.location.href = url.toString();
        }


        function resetFilter(event) {

            window.location.href = `/obchod`;
        }

        function onApplyFilter() {
            event.preventDefault();
            const price = document.getElementById('priceInput').value;
            const availability = document.getElementById('availabilityInput').value;
            const manufacturer = document.getElementById('manufacturerInput').value;
            const category = document.getElementById('categoryInput').value;

            // Create an instance of URLSearchParams based on the current URL's query string
            let queryParams = new URLSearchParams(window.location.search);

            // Update the query parameters based on the form inputs
            if (price && price != maxPrice) {
                queryParams.set('cena', price); // Using set instead of append to update the value if it already exists
            } else {
                queryParams.delete('cena'); // Remove the parameter if the condition is not met
            }

            if (availability && availability != "all") {
                queryParams.set('dostupnost', availability);
            } else {
                queryParams.delete('dostupnost');
            }

            if (manufacturer && manufacturer != "all") {
                queryParams.set('vyrobca', manufacturer);
            } else {
                queryParams.delete('vyrobca');
            }

            if (category && category != "all") {
                queryParams.set('kategoria', category);
            } else {
                queryParams.delete('kategoria');
            }

            // The 'zoradit-podla' parameter will be maintained as is, no need to explicitly set it

            // Redirect the browser to the new URL
            window.location.href = `/obchod?${queryParams.toString()}`;
        }


        document.addEventListener("DOMContentLoaded", (event) => {
            const width = window.innerWidth;
            if (width > 920) {
                console.log(document.getElementById("filter"));
                document.getElementById("filter").classList.add("show");
            }
        });

        function changePage(page) {
            const url = new URL(window.location);
            url.searchParams.set('page', page);
            window.location.href = url.href; // This will reload the page with the new parameter
        }
    </script>

    <main class="container">
        <div class="d-flex flex-column gap-3">
            <div class="row g-0 g-md-1 g-lg-5">
                <div class="col-12 col-lg-3 filter-col filter mt-0">
                    <div class="d-none d-md-flex mb-3">
                        <h2 class="fw-bold mb-0">Filter</h2>
                    </div>
                    <a class="d-block d-md-none text-black link-light text-decoration-none fs-6" data-bs-toggle="collapse"
                        href="#filter" role="button" aria-expanded="false" aria-controls="filter">
                        <div class="d-flex justify-content-between align-items-center bg-primary rounded-2 p-2 pe-3">
                            <div class="d-flex align-items-center gap-1 text-white">
                                <i class="fas fa-solid fa-filter fs-6"></i>
                                <p class="mb-0">Filter</p>
                            </div>
                            <i class="fas fa-solid fa-chevron-down fs-6 text-white"></i>
                        </div>
                    </a>

                    <div class="collapse" id="filter">
                        <form class="hidden">
                            <input type="hidden" value="{{ $selectedFilters->price }}" name="price" id="priceInput">
                            <input type="hidden" value="{{ $selectedFilters->availability }}" name="availability"
                                id="availabilityInput">
                            <input type="hidden" value="{{ $selectedFilters->manufacturer }}" name="manufacturer"
                                id="manufacturerInput">
                            <input type="hidden" value="{{ $selectedFilters->category }}" name="category"
                                id="categoryInput">
                        </form>

                        <div class="d-flex flex-column gap-5 mt-0 mt-md-4 mt-md-0">
                            <div class="price-filter">
                                <label for="priceRange" class="form-label fs-4">Cena</label>
                                <input type="range" class="form-range" id="priceRange"
                                    max="{{ $selectedFilters->maxPrice }}" min="{{ $selectedFilters->minPrice }}"
                                    step="1" value="{{ $selectedFilters->price }}" onchange="updatePriceFilter(this)"
                                    oninput="updatePriceFilter(this)" />
                                <span>
                                    {{ $selectedFilters->minPrice }}€ - {{ $selectedFilters->price }}€
                                </span>
                            </div>
                            <div class="row avaliability-filter">
                                <h4 class="fs-4 fw-semibold mb-2">
                                    Dostupnosť
                                </h4>
                                <div class="btn-group w-100" role="group">
                                    <button data-avaliability="all" type="button"
                                        class="btn btn-sm btn-outline-dark  @if ($selectedFilters->availability == 'all') active @endif"
                                        onclick="setActiveAvaliability(event, this)">
                                        Všetky
                                    </button>
                                    <button data-avaliability="sklad" type="button"
                                        class="btn btn-sm btn-outline-dark @if ($selectedFilters->availability == 'sklad') active @endif"
                                        onclick="setActiveAvaliability(event, this)">
                                        Na sklade
                                    </button>
                                    <button data-avaliability="predajna"
                                        class="btn btn-sm btn-outline-dark @if ($selectedFilters->availability == 'predajna') active @endif"
                                        onclick="setActiveAvaliability(event, this)">
                                        V predajni
                                    </button>
                                </div>
                            </div>

                            <div class="category-filter">
                                <h4 class="fs-4 fw-semibold p-0 mb-2">
                                    Kategórie produktov
                                </h4>
                                @component('components.categories_filter', [
                                    'categories' => $categories,
                                    'activeCategory' => $selectedFilters->category,
                                ])
                                @endcomponent

                            </div>

                            <div class="manufacturer-filter">
                                <h4 class="fs-4 fw-semibold p-0 mb-2">
                                    Značky produktov
                                </h4>
                                @component('components.manufacturers_filter', [
                                    'manufacturers' => $manufacturers,
                                    'activeManufacturer' => $selectedFilters->manufacturer,
                                ])
                                @endcomponent
                            </div>

                            <div class="action-buttons">
                                <div class="row g-2">
                                    <div class="col-6 col-md-12">
                                        <button onclick="onApplyFilter(event)" class="btn btn-primary w-100">
                                            Aplikovať filter
                                        </button>
                                    </div>

                                    <div class="col-6 col-md-12">
                                        <button onclick="resetFilter(event)" type="button"
                                            class="btn btn-outline-secondary w-100">
                                            Resetovať filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-9 product-grid mt-4 mt-lg-0">
                    <div class="row mb-3 justify-content-between align-items-center gap-3">
                        <div class="col-12 col-lg-auto">
                            <h2 class="fw-bold mb-0">Produkty</h2>
                        </div>
                        <div class="col-12 col-lg-auto d-flex justify-content-between justify-content-md-start">
                            <form action="/obchod/" class="order-by">
                                <div class="input-group">
                                    <select id="select-order" class="form-select form-select-sm w-auto"
                                        aria-label="Vyberte poradie">
                                        <option value="default" @if ($orderBy == 'default') selected @endif>
                                            Vyberte zoradenie...
                                        </option>
                                        <option value="nazov-vzostupne" @if ($orderBy == 'nazov-vzostupne') selected @endif>
                                            Podľa názvu vzostupne
                                        </option>
                                        <option value="nazov-zostupne" @if ($orderBy == 'nazov-zostupne') selected @endif>
                                            Podľa názvu zostupne
                                        </option>
                                        <option value="cena-najlacnejsie" @if ($orderBy == 'cena-najlacnejsie') selected @endif>
                                            Od najlacnejších
                                        </option>
                                        <option value="cena-najdrahsie" @if ($orderBy == 'cena-najdrahsie') selected @endif>
                                            Od najdrahšie
                                        </option>
                                    </select>
                                    <button type="button" onclick="applyOrderBy(event)" class="btn btn-sm btn-primary">
                                        Použiť
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (sizeof($products) > 0)
                        <div class="row row-cols-2 row-cols-lg-3 g-3">
                            <!-- Product Card -->
                            @foreach ($products as $product)
                                @component('components.product_card', [
                                    'product' => $product,
                                ])
                                @endcomponent
                            @endforeach

                        </div>
                    @else
                        <div>Žiadne produkty sa nenašli</div>
                    @endif


                    @component('components.pagination', [
                        'totalPages' => $totalPages,
                        'currentPage' => $currentPage,
                        'onClickFunction' => 'changePage',
                    ])
                    @endcomponent

                </div>
            </div>
        </div>
    </main>

@endsection
