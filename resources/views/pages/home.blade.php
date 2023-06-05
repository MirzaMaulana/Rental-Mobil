@extends("layouts.app")
@section("content")
    <section id="header" class="container mx-auto mt-2">
        <div class="loader-wrapper">
            <div class="loader"></div>
            <span class="ms-2 fw-semibold fs-4">Loading..</span>
        </div>
        @if(session()->has("success"))
            <div
                class="alert alert-success absolute alert-dismissible fade show container"
                role="alert"
            >
                {{ session("success") }}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        @endif

        <div
            id="carouselExampleLight"
            class="carousel slide"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div
                        class="position-absolute text-light text-center mx-auto mt-5 w-100"
                    >
                        <h2 class="fw-bold lh-md">Compact cars</h2>
                        <p>
                            Rent cars as you are comfortable and where you are
                            <br />
                            comfortable.
                        </p>
                    </div>
                    <img
                        src="{{ asset("images/main.jpg") }}"
                        class="d-block w-100 rounded-4"
                        alt="..."
                    />
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <div
                        class="position-absolute text-light text-center mx-auto mt-5 w-100"
                    >
                        <h2 class="fw-bold lh-md">Family cars</h2>
                        <p>
                            Rent cars as you are comfortable and where you are
                            <br />
                            comfortable.
                        </p>
                    </div>
                    <img
                        src="{{ asset("images/main 2.jpg") }}"
                        class="d-block w-100 rounded-4"
                        alt="..."
                    />
                </div>
            </div>
            <form
                action="/cars"
                method="GET"
                class="w-50 d-flex bg-light rounded-5 position-absolute start-50 translate-middle shadow"
            >
                <input
                    class="form-control border-0 me-2 rounded-5"
                    type="text"
                    name="search"
                    placeholder="Find the car of your dreams"
                />
                <button class="btn btn-lg btn-success rounded-5">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </section>

    <section class="container" style="margin-top: 120px">
        <div class="jumbotron text-center">
            <h3 class="fw-bold lh-md">Choose the car of your dreams</h3>
            <p class="text-secondary">
                We provide our customers with the most incredible driving
                emotions.
                <br />
                That is why there are only world-class cars in our fleet
            </p>
            <div class="d-flex justify-content-center mt-3">
                <a
                    class="btn btn-success btn-lg rounded-5 mx-2"
                    href="#"
                    role="button"
                >
                    Compact
                </a>
                <a
                    class="btn btn-light rounded-5 btn-lg mx-2"
                    href="#"
                    role="button"
                >
                    Sports cars
                </a>
                <a
                    class="btn btn-light rounded-5 btn-lg mx-2"
                    href="#"
                    role="button"
                >
                    Vans
                </a>
            </div>
        </div>
        <div class="row mt-3 mb-5 justify-content-between">
            @foreach($cars as $car)
                <div class="card col-md-4 py-4 border-0 shadow-sm">
                    <h5 class="fw-bold">{{ $car->name }}</h5>
                    <small class="fw-semibold lh-md text-secondary">
                        {{ $car->type }}
                    </small>
                    <img
                        src="{{ asset("/storage/cars/" . $car->image) }}"
                        class="card-img-top"
                        alt="{{ $car->name }}"
                    />
                    <div class="mt-3 d-flex justify-content-between">
                        <span class="d-flex flex-column">
                            <small class="mb-2 fw-semibold">
                                Rp.
                                {{ $car->price }}
                                / day
                            </small>
                            <small class="fw-semibold">
                                <i class="bi bi-person-fill"></i>
                                {{ $car->seats }}
                                Seats
                            </small>
                        </span>
                        <span class="d-flex flex-column">
                            <small class="mb-2 fw-semibold">
                                <i class="bi bi-gear-fill"></i>
                                {{ $car->gear }}
                            </small>
                            <small class="fw-semibold">
                                <i class="bi bi-fuel-pump-fill"></i>
                                {{ $car->bensin }}
                            </small>
                        </span>
                    </div>
                    {!! $car->jumlah_unit == 0 ? '<button class="mt-3 btn btn-success" disabled>Tidak Tersedia</button>' : '<a href="' . route("order", $car->id) . '" class="mt-3 btn btn-success">Rental Now</a>' !!}
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4 mb-5">
            <a
                href="{{ route("cars") }}"
                class="btn btn-lg btn-success rounded-5"
            >
                View All
            </a>
        </div>
    </section>
    <section class="bg-success w-100">
        <div class="row container mx-auto py-5 my-5">
            <h4 class="text-center fw-bold text-light mb-4">
                What Costumer Are Saying
            </h4>
            <div class="col-md-3">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header border-0 text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Tenetur tempora repudiandae officia, aut
                            doloribus vero?
                        </p>
                        <div class="d-flex">
                            <img
                                src="https://sp-images.summitpost.org/1038746.jpg?auto=format&fit=max&h=800&ixlib=php-2.1.1&q=35&s=1685bd4ce0f5d871bb859c2eccaf8d03"
                                height="50"
                                class="rounded-circle"
                            />
                            <p class="fw-bold ms-2 mt-3">Johan Liebert</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header border-0 text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Tenetur tempora repudiandae officia, aut
                            doloribus vero?
                        </p>
                        <div class="d-flex">
                            <img
                                src="https://sp-images.summitpost.org/1038746.jpg?auto=format&fit=max&h=800&ixlib=php-2.1.1&q=35&s=1685bd4ce0f5d871bb859c2eccaf8d03"
                                height="50"
                                class="rounded-circle"
                            />
                            <p class="fw-bold ms-2 mt-3">Johan Liebert</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header border-0 text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Tenetur tempora repudiandae officia, aut
                            doloribus vero?
                        </p>
                        <div class="d-flex">
                            <img
                                src="https://sp-images.summitpost.org/1038746.jpg?auto=format&fit=max&h=800&ixlib=php-2.1.1&q=35&s=1685bd4ce0f5d871bb859c2eccaf8d03"
                                height="50"
                                class="rounded-circle"
                            />
                            <p class="fw-bold ms-2 mt-3">Johan Liebert</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header border-0 text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Tenetur tempora repudiandae officia, aut
                            doloribus vero?
                        </p>
                        <div class="d-flex">
                            <img
                                src="https://sp-images.summitpost.org/1038746.jpg?auto=format&fit=max&h=800&ixlib=php-2.1.1&q=35&s=1685bd4ce0f5d871bb859c2eccaf8d03"
                                height="50"
                                class="rounded-circle"
                            />
                            <p class="fw-bold ms-2 mt-3">Johan Liebert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row my-5 container mx-auto">
        <h5 class="my-4 fw-semibold">More than 50 brands of cars</h5>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/toyota.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/nissan.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/dodge.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/ford.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/hyundai.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/jeep.png") }}" alt="..." />
        </div>
    </section>
    <section class="container mb-5" style="margin-top: 120px">
        <div class="jumbotron text-center mb-5">
            <h3 class="fw-bold lh-md">Unparalleled service</h3>
            <p class="text-secondary">
                Whether you are looking for Newark Airport car rental, an
                insurance replacement
                <br />
                vehicle or minivan to take on vacation Car rental has it all.
            </p>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div
                    class="card border-0 my-3"
                    style="background-color: #f5f5f5"
                >
                    <div class="card-body row p-4">
                        <div class="col-md-9">
                            <h4 class="fw-bold">
                                Book online,
                                <br />
                                pay online
                            </h4>
                            <p class="text-secondary">
                                Complete the booking process A-Z, with our easy
                                online system
                            </p>
                        </div>
                        <div class="col-md-3 text-success display-3 text-end">
                            <i class="bi bi-display"></i>
                        </div>
                    </div>
                </div>
                <div
                    class="card border-0 my-3"
                    style="background-color: #f5f5f5"
                >
                    <div class="card-body row p-4">
                        <div class="col-md-9">
                            <h4 class="fw-bold">
                                Unparalleled
                                <br />
                                customer service
                            </h4>
                            <p class="text-secondary">
                                We're here to help. We pride ourselves in our
                                customer service
                            </p>
                        </div>
                        <div class="col-md-3 text-success display-3 text-end">
                            <i class="bi bi-person-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="card border-0 my-3"
                    style="background-color: #f5f5f5"
                >
                    <div class="card-body row p-4">
                        <div class="col-md-9">
                            <h4 class="fw-bold">
                                Guaranteed car
                                <br />
                                reservation
                            </h4>
                            <p class="text-secondary">
                                When you book with Car rental, you can be
                                confident your car will be waiting for you
                            </p>
                        </div>
                        <div class="col-md-3 text-success display-3 text-end">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                    </div>
                </div>
                <div
                    class="card border-0 my-3"
                    style="background-color: #f5f5f5"
                >
                    <div class="card-body row p-4">
                        <div class="col-md-9">
                            <h4 class="fw-bold">
                                No reservation or
                                <br />
                                booking fees
                            </h4>
                            <p class="text-secondary">
                                No cancellation fees if cancelled 24 hours prior
                                to booking time
                            </p>
                        </div>
                        <div class="col-md-3 text-success display-3 text-end">
                            <i class="bi bi-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
