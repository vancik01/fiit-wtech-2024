<div class="bg-secondaryColor">
    <div class="container d-flex flex-column py-4 gap-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <div class="fs-3 fw-bold">LOGO</div>
            </div>
            <div class="d-flex">
                <div class="text-center">
                    <small>Created by Vančo & Truhlář</small>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="d-flex flex-column">
                <h5 class="font-semibold">Kontaktné údaje</h5>
                <ul class="list-unstyled">
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                </ul>
            </div>
            <div class="d-flex flex-column">
                <h5 class="font-semibold">Lorem ipsum</h5>
                <ul class="list-unstyled">
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                </ul>
            </div>
            <div class="d-flex flex-column">
                <h5 class="font-semibold">Rýchle odkazy</h5>
                <ul class="list-unstyled">
                    @foreach (['homepage', 'about', 'shop'] as $navItem)
                        <li>
                            <a href={{ config('urls')[$navItem]['url'] }}>
                                {{ config('urls')[$navItem]['title'] }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
