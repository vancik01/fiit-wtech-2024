@extends('layouts.app')

@section('title', config('urls.product_detail.getPathBuilder')('QWER'))

@section('content')
<div class="container pt-5">
        <div class="detail d-flex gap-5 flex-column flex-md-row">
            <div class="d-flex flex-column p-0 w-100">
                <img src="https://picsum.photos/1024" alt="" />
            </div>
            <div class="d-flex flex-column gap-5 p-0">
                <div class="d-flex flex-column h-100 justify-content-center gap-6">
                    <div class="d-flex flex-column">
                        <img src="https://picsum.photos/400" alt="výrobca" class="max-w-[100px] h-[70px] object-cover">
                        <h2 class="text-4xl mb-2 font-semibold">Názov produktu</h2>
                        <p class="">Na sklade</p>
                    </div>
                    
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <h4 class="text-secondary text-2xl mb-2">99.99€</h4>
                        </div>
                        <p>
                            Renew your style with the latest designer trends
                            in men's clothing or achieve a perfectly curated
                            wardrobe thanks to our line of timeless pieces.
                        </p>
                    </div>
                    <div class="d-flex flex-row align-items-between">
                        <div class="d-flex flex-row border-1">
                            <button onclick="changeCount(-1)" class="w-[30px] focus:outline-none hover:text-blue-500">
                                -
                            </button>
                            <input id="inputNumber" type="number" min="1" class="d-flex text-center max-w-[60px]" value="2" />
                            <button onclick="changeCount(1)" class="w-[30px] focus:outline-none  hover:text-blue-500">
                                +
                            </button>
                        </div>
                        <button class="btn btn-primary rounded-none">
                            Pridať do košíka
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex product-detail pt-5">
            <div class="d-flex flex-column gap-4">
                <div class="d-flex flex-column">
                    <h2 class="text-4xl mb-2 font-semibold">Informácie o produkte</h2>
                    <p>
                        lorem, laoreet volutpat elit. Sed scelerisque nibh
                        nisl, in bibendum nibh maximus tempor. Cras volutpat
                        volutpat nisi, vel egestas neque pharetra id.
                        Curabitur eget luctus justo, eget ullamcorper
                        turpis. Duis at dolor vel turpis accumsan vulputate.
                        Maecenas iaculis sit amet urna ut ullamcorper.
                        Quisque a placerat eros. Morbi sed rutrum dolor. Sed
                        eleifend erat lectus, ultrices tempus arcu laoreet
                        in. Sed ac magna a felis varius euismod quis ut
                        libero. Morbi ac ex at metus ultrices tincidunt.
                        Curabitur cursus, eros eu tincidunt dignissim,
                        lectus ante tempor lectus, nec faucibus nulla sapien
                        a odio. Vestibulum a varius nulla, eu interdum nunc.
                        Sed scelerisque mi at blandit consequat. Proin
                        gravida augue nec augue faucibus pulvinar. Quisque
                        tincidunt dapibus congue. Orci varius natoque
                        penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Nunc sit amet iaculis nibh. Phasellus
                        non pretium felis, in maximus est. Vestibulum
                        interdum eget purus ut porta. Curabitur tortor elit,
                        luctus vel justo eu, pellentesque congue ligula.
                        Nulla facilisi. Nulla facilisi. Nulla facilisi.
                        Nulla facilisi.
                    </p>
                </div>
                <div class="d-flex flex-column">
                    <h2 class="text-4xl mb-2 font-semibold">Galéria</h2>
                    <div class="row row-cols-md-3 row-cols-2 g-2 ">
                        <img src="https://picsum.photos/200" alt="Product Image" class="img-fluid col" />
                        <img src="https://picsum.photos/200" alt="Product Image" class="img-fluid col" />
                        <img src="https://picsum.photos/200" alt="Product Image" class="img-fluid col" />
                        <img src="https://picsum.photos/200" alt="Product Image" class="img-fluid col" />
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <h2 class="text-3xl mb-2 font-semibold">Ďalšie informácie</h2>
                            <p>
                                <strong>Kategória produktu:</strong>
                                Category XYZ
                            </p>
                            <p><strong>Výrobca:</strong> XYZ</p>
                            <!-- Add more details as required -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- najpredavanejsie produkty -->
        <div class="d-flex justify-content-between mt-5">
            <h2 class="text-2xl font-semibold">Podobné produkty</h2>
            <button class="btn btn-link">Zobraziť všetky</button>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 justify-content-between">
            @for ($i = 0; $i < 4; $i++)
                @component('components.product_card', [
                    'product' => (object) [
                        'name' => 'Wocap',
                        'slug' => 'product-slug-123',
                        'thumbnail' => 'https://picsum.photos/300',
                        'status' => 'Na sklade',
                        'manufacturer' => 'Oral-B',
                        'manufacturerSlug' => 'vyrobca-123',
                        'price' => '12.90',
                    ],
                ])
                @endcomponent
            @endfor
        </div>
</div>
@endsection

