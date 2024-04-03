@extends('layouts.app')

@section('title', config('urls.register.title'))

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document
                .getElementById("togglePassword")
                .addEventListener("click", function(e) {
                    const password = document.getElementById("password");
                    const type =
                        password.getAttribute("type") === "password" ?
                        "text" :
                        "password";
                    password.setAttribute("type", type);

                    // Optional: Toggle the icon class
                    this.classList.toggle("fa-eye-slash");
                });
        });
    </script>
    <main class="container">
        <div class="flex flex-col justify-center items-center">
            <div class="min-h-[400px] md:min-h-[600px] flex flex-col justify-center items-center gap-8">
                <div class="p-6 bg-backgroundColor md:min-w-[450px] flex flex-column gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold">
                            Vytvoriť účet
                        </h1>
                        <p class="text-secondary">
                            Zadajte prihlasovacie údaje do svojho účtu
                        </p>
                    </div>
                    <form action="/login">
                        <div class="flex flex-col gap-2">
                            <did>
                                <input required type="text" class="form-control" id="name" aria-describedby="Meno"
                                    placeholder="Vaše meno" />
                            </did>
                            <did>
                                <input required type="email" class="form-control" id="email" aria-describedby="email"
                                    placeholder="Váš email" />
                            </did>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input required class="form-control" id="password" name="password" placeholder="Password"
                                    type="password" value="" autocomplete="current-password" />
                                <span class="input-group-text">
                                    <i class="fa fa-eye w-[20px]" id="togglePassword" style="cursor: pointer"></i>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary w-fit">
                                Vytvoriť účet
                                <i class="fas fa-solid fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    Už máte účet?
                    <a class="font-bold underline" href="{{ config('urls.log_in.url') }}">Prihláste sa</a>
                </div>
            </div>
        </div>
    </main>

@endsection
