@extends("layouts.app")

@section("content")
    <section class="container mx-auto row">
        <div class="col-md-8">
            <h2 class="mt-5 fw-semibold">Car rental keeps you safe</h2>
            <p class="mt-3">
                The safety of our employees and renters is our number one
                priority. In addition to being confident your vehicle is cleaned
                and sanitized every time you rent, you can also feel confident
                that we will take every opportunity to enhance the health and
                safety measures currently practiced in our operations.
            </p>
        </div>
        <div class="col-md-4">
            <div
                class="background-lingkaran ms-3 bg-success rounded-circle position-absolute"
            ></div>
            <img
                src="{{ asset("images/main-about.png") }}"
                class="img-fluid rounded-3 m-3"
            />
        </div>
    </section>
@endsection
