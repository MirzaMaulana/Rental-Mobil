<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Car rental") }}</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        {{-- icon --}}
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        />
        {{-- font --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
            rel="stylesheet"
        />
        {{-- css --}}
        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" />
    </head>

    <body>
        @include("include.navbar")
        <div>
            @yield("content")
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        @stack("scripts")

        <footer class="bg-light text-center text-lg-start mt-5 bottom-0">
            <div class="text-center p-3" style="background-color: #f5f5f5">
                © 2023 Copyright: Design by
                <a
                    class="text-primary text-decoration-none"
                    href="https://www.figma.com/@bunyodboss"
                >
                    bunnyodboss
                </a>
                , Code by
                <a
                    class="text-primary text-decoration-none"
                    href="https://www.github.com/MirzaMaulana"
                >
                    MirzaMaulana
                </a>
            </div>
        </footer>
    </body>
</html>
