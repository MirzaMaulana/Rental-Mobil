<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ config("app.name", "Car rental") }}</title>
        <link
            rel="shortcut icon"
            href="{{ asset("car-icon.png") }}"
            type="image/x-icon"
        />

        <!-- Styles -->
        <link
            href="{{ asset("vendor/adminlte/dist/css/adminlte.min.css") }}"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.3/datatables.min.css"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap"
            rel="stylesheet"
        />
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"
        ></script>
        @yield("styles")
        <style>
            * {
                font-family: "Open sans";
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini">
        @include("admin.layouts.navbar")
        @include("admin.layouts.sidebar")
        <div class="content-wrapper">
            <div class="content">
                @yield("content")
            </div>
        </div>
        <!-- ./wrapper -->

        <!-- Scripts -->
        <script>
            $(document).ready(function () {
                $("form").submit(function () {
                    $("button[type='submit']")
                        .html(
                            '<i class="fa fa-spinner fa-spin"></i> Loading...'
                        )
                        .attr("disabled", true);
                });
            });
        </script>
        <script
            type="text/javascript"
            src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.3/datatables.min.js"
        ></script>
        <script src="{{ asset("vendor/adminlte/dist/js/adminlte.min.js") }}"></script>

        @yield("scripts")
    </body>
</html>
