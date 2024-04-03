@extends('layouts.app')

@section('title', config('urls.shop.title'))

<?php
$brands = collect([
    (object) [
        'id' => 'brand-1',
        'name' => 'Brand One',
        'imageUrl' => 'https://picsum.photos/300?image=10',
    ],
    (object) [
        'id' => 'brand-2',
        'name' => 'Brand Two',
        'imageUrl' => 'https://picsum.photos/300?image=20',
    ],
    (object) [
        'id' => 'brand-3',
        'name' => 'Brand Three',
        'imageUrl' => 'https://picsum.photos/300?image=30',
    ],
    (object) [
        'id' => 'brand-4',
        'name' => 'Brand Four',
        'imageUrl' => 'https://picsum.photos/300?image=40',
    ],
    // ... Add more brands as needed
]);
?>

@section('content')
    <script>
        function updatePriceFilter(e) {
            const val = e.value;
            document.querySelector(
                ".price-filter span"
            ).textContent = `0€ - ${val}€`;
        }

        function setActiveAvaliability(e, element) {
            e = e || window.event;
            e.preventDefault();

            const allButtons = document.querySelectorAll(
                ".avaliability-filter button"
            );
            console.log(allButtons);
            document
                .querySelector(".avaliability-filter button.active")
                .classList.remove("active");

            element.classList.add("active");
        }

        function setActiveBrand(event, element) {
            event.preventDefault();
            document
                .querySelector(".brand-filter button.active")
                .classList.remove("active");
            element.classList.add("active");
        }

        function applyFilter(event) {}

        function resetFilter(event) {
            event.preventDefault();
            const priceRange = document.getElementById("priceRange");
            const maxPrice = priceRange.attributes.max.nodeValue;
            priceRange.value = maxPrice;
            updatePriceFilter(priceRange);

            setActiveAvaliability(
                event,
                document.querySelector(
                    ".avaliability-filter button:first-of-type"
                )
            );

            setActiveBrand(
                event,
                document.querySelector(".brand-filter button:first-of-type")
            );
        }

        function myCustomJsFunction(pageNumber) {
            console.log("Load page", pageNumber);
            // Add your logic to handle page click here
        }


        window.onload = (event) => {
            const width = window.innerWidth;
            if (width > 920) {
                console.log(document.getElementById("filter"));
                document.getElementById("filter").classList.add("show");
            }
        };
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
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-solid fa-filter fs-6"></i>
                                <p class="mb-0">Filter</p>
                            </div>
                            <i class="fas fa-solid fa-chevron-down fs-6"></i>
                        </div>
                    </a>

                    <div class="collapse" id="filter">
                        <form>
                            <div class="d-flex flex-column gap-5 mt-0 mt-md-4 mt-md-0">
                                <div class="price-filter">
                                    <label for="priceRange" class="form-label fs-4">Cena</label>
                                    <input type="range" class="form-range" id="priceRange" max="123" value="123"
                                        onchange="updatePriceFilter(this)" oninput="updatePriceFilter(this)" />
                                    <span>0€ - 123€</span>
                                </div>
                                <div class="row avaliability-filter">
                                    <h4 class="fs-4 fw-semibold">
                                        Dostupnosť
                                    </h4>
                                    <div class="btn-group w-100" role="group">
                                        <button data-avaliability="all" type="button"
                                            class="btn btn-sm btn-outline-dark active"
                                            onclick="setActiveAvaliability(event, this)">
                                            Všetky
                                        </button>
                                        <button data-avaliability="sklad" type="button" class="btn btn-sm btn-outline-dark"
                                            onclick="setActiveAvaliability(event, this)">
                                            Na sklade
                                        </button>
                                        <button data-avaliability="predajna" class="btn btn-sm btn-outline-dark"
                                            onclick="setActiveAvaliability(event, this)">
                                            V predajni
                                        </button>
                                    </div>
                                </div>

                                <div class="brand-filter">
                                    <h4 class="fs-4 fw-semibold p-0">
                                        Značky produktov
                                    </h4>
                                    @component('components.categories_filter', ['brands' => $brands])
                                    @endcomponent

                                </div>
                                <div class="action-buttons">
                                    <div class="row g-2">
                                        <div class="col-6 col-md-12">
                                            <button type="button" class="btn btn-primary w-100">
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
                        </form>
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
                                    <select class="form-select form-select-sm w-auto" aria-label="Vyberte poradie">
                                        <option selected>
                                            Open this select menu
                                        </option>
                                        <option value="1">
                                            Order by name ascending
                                        </option>
                                        <option value="2">
                                            Order by 1
                                        </option>
                                        <option value="3">
                                            Order by 2
                                        </option>
                                        <option value="4">
                                            Order by 3
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Použiť
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-3 g-3">
                        <!-- Product Card -->
                        @foreach ($products as $product)
                            @component('components.product_card', [
                                'product' => $product,
                            ])
                            @endcomponent
                        @endforeach

                    </div>

                    @component('components.pagination', [
                        'totalPages' => 4,
                        'currentPage' => 2,
                        'onClickFunction' => 'myCustomJsFunction',
                    ])
                    @endcomponent

                </div>
            </div>
        </div>
    </main>

@endsection
