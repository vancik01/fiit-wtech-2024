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

        <form action="/search" class="d-none d-lg-block w-[350px]">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Hladajte produkty..."
                    aria-label="Hladajte produkty..." aria-describedby="search-addon" />
                <button class="input-group-text border-0" id="search-addon" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="d-flex align-items-center gap-5">
            <div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/domov">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/o-nas">O nás</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/obchod">Obchod</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex flex-row gap-2 justify-content-center align-items-center">
                <a href="/kosik.html" class="text-decoration-none position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <div id="cardInfoBadge">
                        3
                    </div>
                </a>
                <a class="nav-link" href="/prihlasit-sa">
                    Prihlásiť sa
                </a>
            </div>
        </div>
    </div>

    <div class="d-flex w-100 d-lg-none container py-4 justify-content-between align-items-center">
        <a href="/">
            <div>
                <img src="/logo.svg" height="48px" alt="" />
            </div>
        </a>

        <div class="d-flex justify-content-start align-items-center gap-3">
            <button class="btn p-1 border-0" data-bs-toggle="modal" data-bs-target="#search-modal">
                <i class="fas fa-search"></i>
            </button>

            <a href="/kosik.html" class="text-decoration-none position-relative">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <ul class="nav flex-column align-content-center text-center gap-4 fs-4">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/domov">Domov</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/o-nas">O nás</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/obchod">Obchod</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/kontakt">Kontakt</a>
                                        </li>
                                    </ul>
                                </div>
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
                                <form action="/search" class="w-100">
                                    <div class="input-group rounded">
                                        <input type="search" class="form-control rounded"
                                            placeholder="Hladajte produkty..." aria-label="Hladajte produkty..."
                                            aria-describedby="search-addon" />
                                        <button class="input-group-text border-0" id="search-addon" type="submit">
                                            <i class="fas fa-search"></i>
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
