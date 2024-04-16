<div class="hidden">
  {{ $total = 0}}
</div>
@extends('layouts.app')

@section('title', config('urls.checkout.url'))

@section('content')
<main class="container-fluid gap-3 pt-5">
    <div class="gap-5 w-full max-w-[1200px] mx-auto">
      <div class="flex flex-col gap-4">

        <!-- Pokladna uvodny text-->
        <div>
          <h1 class="fs-1">Pokladňa</h1>
          <p class="text-sm">Máte účet?<a href="{{config('urls.log_in.url')}}" class="text-black text-decoration-underline fw-bold">Prihláste sa</a>
          </p>
        </div>
        <!-- Pokladna uvodny text -->
        <div class="row gap-5 flex justify-between">
          <div class="col-12 col-md-6 md:max-w-[600px] flex flex-col gap-8 bg-gray-50 h-fit p-8">
            <!-- Formular -->
            <div class="row flex cart-card gap-3 align-items-start bg-gray-50">
              <div class="d-flex flex-col  w-full h-full justify-between gap-2">
                <div class="d-flex flex-column gap-2">
                  <h2 class="fs-2">Dodacie údaje</h2>
                </div>
                <div class="d-flex flex-column w-100 align-content-between ">
                  <form action="/login" class="d-flex flex-column gap-2">
                    <div class="d-flex flex-row gap-2 ">
                      <input required type="text" class="form-control rounded-0" id="name" aria-describedby="Meno"
                        placeholder="Vaše meno" />
                      <input required type="text" class="form-control rounded-0" id="surname"
                        aria-describedby="Priezvisko" placeholder="Vaše priezvisko" />
                    </div>
                    <div class="d-flex flex-row gap-2 "> <input required type="email" class="form-control rounded-0"
                        id="email" aria-describedby="Email" placeholder="Váš email" />
                      <input required type="tel" class="form-control rounded-0" id="phone" aria-describedby="Telefon"
                        placeholder="Váš telefón" />
                    </div>
                    <div class="d-flex flex-row gap-2 "> <input required type="text"
                        class="form-control d-flex w-75 rounded-0" id="address" aria-describedby="Adresa"
                        placeholder="Adresa" />
                      <input required type="text" class="form-control d-flex w-25 rounded-0" id="homenumber"
                        aria-describedby="Cislo" placeholder="Číslo domu" />
                    </div>
                    <div class="d-flex flex-row gap-2 "> <input required type="text"
                        class="form-control d-flex w-75 rounded-0 " id="city" aria-describedby="Mesto"
                        placeholder="Mesto" />
                      <input required type="text" class="form-control d-flex w-25 rounded-0" id="zip"
                        aria-describedby="PSC" placeholder="PSČ" />
                    </div>
                    <div class="d-flex">
                      <textarea type="text" class="form-control d-flex w-100 rounded-0" id="note"
                        aria-describedby="Poznamka" placeholder="Poznámka k objednávke"></textarea>
                    </div>
                  </form>
                </div>

                <div class="col-12 col-md-12 flex flex-col gap-4 bg-gray-50 p-6">
                  <h2 class="text-2xl font-semibold">
                    Výber dopravy
                  </h2>
                  <div class="d-flex flex-column column-gap-2 ">
                    <div class="form-check d-flex justify-content-between ">
                      <div>
                        <input class="form-check-input" type="radio" name="doprava" id="kurier">
                        <label class="form-check-label" for="doprava">
                          Kuriér
                        </label>
                      </div>
                      <div id="kurierPrice">4.90€</div>
                    </div>
                    <div class="form-check d-flex justify-content-between ">
                      <div>
                        <input class="form-check-input" type="radio" name="doprava" id="osobnyOdber">
                        <label class="form-check-label" for="doprava">
                          Osobný odber
                        </label>
                      </div>
                      <div id="osobnyOdberPrice">0.00€</div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-12 flex flex-col gap-4 bg-gray-50 p-6">
                  <h2 class="text-2xl font-semibold">
                    Spôsob platby
                  </h2>
                  <div class="d-flex flex-column column-gap-2 ">
                    <div class="form-check d-flex justify-content-between ">
                      <div>
                        <input class="form-check-input" type="radio" name="doprava" id="kurier">
                        <label class="form-check-label" for="doprava">
                          Karta
                        </label>
                      </div>
                    </div>
                    <div class="form-check d-flex justify-content-between ">
                      <div>
                        <input class="form-check-input" type="radio" name="doprava" id="osobnyOdber">
                        <label class="form-check-label" for="doprava">
                          Hotovosť
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-12 flex flex-col gap-4 bg-gray-50 p-6">
                  <h2 class="text-2xl font-semibold">
                    Detail objednávky
                  </h2>
                  <div class="flex flex-col gap-3">
                    <div class="flex justify-between items-center">
                      <div>Medzisúčet</div>
                      <div>{{ $total }}€</div>
                    </div>
                    <div class="flex justify-between items-center">
                      <div>Doprava</div>
                      <div>4.50€</div>
                    </div>
                    <div class="h-[1px] bg-black"></div>
                    <div class="flex justify-between items-center">
                      <div>Spolu</div>
                      <div>{{ $total += 4.50 }}€</div>
                    </div>
                  </div>
                  <button type="submit" class="p-[10px] bg-black text-white">
                    Pokračovať k platbe
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 md:max-w-[450px] flex flex-col gap-8 bg-gray-50 h-fit p-8">
            <h2 class="text-2xl font-semibold">
              Objednávka
            </h2>
            <!-- Produkty -->
            <div class="flex flex-col gap-3">
              @for ($i = 0; $i < 5; $i++)
              <div class="flex flex-col justify-between items-start">
                <div>Názov produktu</div>
                <div>Počet kusov: {{ $i }} </div>
                <div>12.90€</div>
              </div>
              <div class="h-[1px] bg-secondary"></div>
              <div class="hidden">
                {{ $total  }}
              </div>
              @endfor
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection