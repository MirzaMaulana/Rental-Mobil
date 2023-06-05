<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Car rental") }}</title>
        <link
            rel="shortcut icon"
            href="{{ asset("car-icon.png") }}"
            type="image/x-icon"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />

        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK"
            crossorigin="anonymous"
        ></script>
        {{-- icon --}}
        <link
            rel="stylesheet"
            href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}"
        />
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
        <script>
            $(document).ready(function () {
                $("form").submit(function () {
                    $("button[type='submit']").attr("disabled", true);
                });
            });

            $(document).ready(function () {
                // Menampilkan loading screen saat halaman sedang dimuat
                $(window).on("load", function () {
                    $(".loader-wrapper").fadeOut("slow");
                });
            });
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        @stack("scripts")

        <footer class="mt-5 bg-light text-center text-white">
            <div class="container p-4 pb-0">
                <section class="mb-4">
                    <!-- Facebook -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #3b5998"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <!-- Twitter -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #55acee"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-twitter"></i>
                    </a>

                    <!-- Google -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #dd4b39"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-google"></i>
                    </a>

                    <!-- Instagram -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #ac2bac"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-instagram"></i>
                    </a>

                    <!-- Linkedin -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #0082ca"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <!-- Github -->
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #333333"
                        href="#!"
                        role="button"
                    >
                        <i class="fab fa-github"></i>
                    </a>
                </section>
            </div>
            <div class="text-center p-3 bg-success">
                © 2023 Copyright: Design by
                <a
                    class="text-primary text-decoration-none fw-bold"
                    href="https://www.figma.com/@bunyodboss"
                >
                    bunnyodboss
                </a>
                , Code by
                <a
                    class="text-primary text-decoration-none fw-bold"
                    href="https://www.github.com/MirzaMaulana"
                >
                    MirzaMaulana
                </a>
            </div>
        </footer>
    </body>
</html>
