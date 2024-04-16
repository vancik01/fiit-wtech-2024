<div class="bg-secondaryColor">
    <div class="bg-primaryColor">
        <div class="py-2 container">
            <p class="container m-0 p-0 text-md fw-semibold text-sm font-semibold">
                Doprava ZADARMO pri nákupe nad 50€
            </p>
        </div>
    </div>

    <div class="d-none d-lg-flex container py-4 justify-content-between align-items-center ">
        <a href="/">
            <div>
                <img src="/logo.svg" width="32" alt="" />
            </div>
        </a>

        <form action={{ config('urls.search_results.url') }} class="d-none d-lg-block w-[350px]">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" name="hladat" placeholder="Hladajte produkty..."
                    aria-label="Hladajte produkty..." aria-describedby="search-addon" />
                <button class="input-group-text border-0" id="search-addon" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="d-flex align-items-center gap-5">
            <div>
                <ul class="nav">
                    @foreach (['homepage', 'about', 'shop'] as $navItem)
                        <li class="nav-item">
                            <a class="nav-link" href={{ config('urls')[$navItem]['url'] }}>
                                {{ config('urls')[$navItem]['title'] }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="d-flex flex-row gap-2 justify-content-center align-items-center">
                <a href={{ config('urls.cart.url') }} class="text-decoration-none position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <div id="cardInfoBadge">
                        @if ($totalQuantity > 0)
                            <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $totalQuantity }}
                            </div>
                        @endif
                    </div>
                </a>

                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <span class="mr-2 ml-2">
                            {{ Auth::user()->name }}
                        </span>
                        <!-- Authentication -->
                        <button href="route('logout')" type="submit">
                            Odhlásiť sa
                        </button>
                    </form>
                @else
                    <a class="nav-link" href={{ config('urls.log_in.url') }}>
                        Prihlásiť sa
                    </a>
                @endif


            </div>
        </div>
    </div>

    <div class="d-flex w-100 d-lg-none container py-4 justify-content-between align-items-center">
        <a href="/">
            <div class="">
                <img src="/logo.svg" height="32px" width="32px" alt="" />
            </div>
        </a>

        <div class="d-flex justify-content-start align-items-center gap-3">
            <button class="btn p-1 border-0" data-bs-toggle="modal" data-bs-target="#search-modal">
                <i class="fas fa-search"></i>
            </button>

            <a href={{ config('urls.cart.url') }} class="text-decoration-none position-relative">
                <i class="fas fa-shopping-cart"></i>
                <div class="position-absolute kosik">
                </div>
            </a>
            <div>
                <button class="btn p-1 border-0" data-bs-toggle="modal" data-bs-target="#mobile-menu">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="modal fade" id="mobile-menu" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen m-0">
                        <div class="modal-content rounded-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Menu
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                    <i class="fas fa-window-close"></i>
                                </button>
                            </div>
                            <div class="modal-body flex justify-center items-center">

                                <ul class="nav flex-column align-content-center text-center gap-4 fs-4">
                                    @foreach (['homepage', 'about', 'shop'] as $navItem)
                                        <li class="nav-item">
                                            <a class="nav-link" href={{ config('urls')[$navItem]['url'] }}>
                                                {{ config('urls')[$navItem]['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                    @if (Auth::check())
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="m-3">
                                                {{ Auth::user()->name }}
                                            </div>
                                            <!-- Authentication -->
                                            <button href="route('logout')" type="submit">
                                                Odhlásiť sa
                                            </button>
                                        </form>
                                    @else
                                        <a class="nav-link" href={{ config('urls.log_in.url') }}>
                                            Prihlásiť sa
                                        </a>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered p-4">
                        <div class="modal-content rounded-2">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Vyhladávať
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form name="hladat" action={{ config('urls.search_results.url') }} class="w-100">
                                    <div class="input-group rounded">
                                        <input type="search" class="form-control rounded"
                                            placeholder="Hladajte produkty..." aria-label="Hladajte produkty..."
                                            aria-describedby="search-addon" />
                                        <button class="input-group-text border-0" id="search-addon" type="submit">
                                            <i class="fas fa-search text-black"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
