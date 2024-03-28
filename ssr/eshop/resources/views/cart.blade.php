@extends('layouts.app')

@section('title', config('urls.cart.title'))

@section('content')
    <div class="container mt-16 flex flex-col gap-3">
        <div class="gap-5 w-full max-w-[1200px] mx-auto">
            <div>
                <h1 class="fs-1">Košík</h1>
                <p class="text-sm">
                    Chcete pokračovať v nákupe?
                    <a
                        href="/obchod"
                        class="text-black text-decoration-underline fw-bold"
                    >
                        Pozrite si najpredávanejšie produkty
                    </a>
                </p>
            </div>

            <div class="row gap-5 flex justify-between">
                <div
                    class="col-12 col-md-6 max-w-[600px] flex flex-col gap-10 p-0"
                >
                    <!-- Cart card -->
                    <div
                        class="flex cart-card gap-3 align-items-start bg-gray-50"
                    >
                        <div class="flex h-full w-full bg-black">
                            <img
                                src="https://picsum.photos/id/237/1200/900"
                                alt="product image"
                                class="object-cover h-full w-full"
                            />
                        </div>
                        <div
                            class="d-flex flex-col py-3 pe-4 w-full h-full justify-between gap-2"
                        >
                            <div class="flex flex-col gap-2">
                                <h3
                                    class="text-base md:text-xl font-semibold"
                                >
                                    This is product name thas is even
                                    longer
                                </h3>
                                <p class="text-sm">
                                    Výrobca:
                                    <a
                                        class="text-blue-500"
                                        href="/obchod?znacka=oral-b"
                                    >Oral-B</a
                                    >
                                </p>
                            </div>
                            <div class="flex w-fit gap-2">
                                <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input
                                    id="form1"
                                    min="0"
                                    name="quantity"
                                    value="2"
                                    type="number"
                                    class="w-[30px] -mr-2 text-center bg-transparent"
                                />

                                <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                >
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div
                                class="flex justify-between items-center"
                            >
                                <div class="fs-5">12.99€</div>
                                <button type="button" class="underline">
                                    Odstrániť
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-md-6 md:max-w-[450px] flex flex-col gap-8 bg-gray-50 h-fit p-8"
                >
                    <h2 class="text-2xl font-semibold">
                        Detail objednávky
                    </h2>

                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-center">
                            <div>Medzisúčet</div>
                            <div>200.00€</div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>Doprava</div>
                            <div>4.50€</div>
                        </div>
                        <div class="h-[1px] bg-black"></div>
                        <div class="flex justify-between items-center">
                            <div>Spolu</div>
                            <div>204.50€</div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="p-[10px] bg-black text-white"
                    >
                        Pokračovať k objednávke
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
