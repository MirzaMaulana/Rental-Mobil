@extends("layouts.app")
@section("content")
    <section class="container mt-4">
        @if(session()->has("success"))
            <div
                class="alert alert-success absolute alert-dismissible fade show container"
                role="alert"
            >
                {{ session("success") }}
                Atau
                <a href="{{ route("pesanan") }}">Cek Pesananmu Disini</a>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        @endif

        <div class="jumbotron text-center">
            <h3 class="fw-bold lh-md">Choose the car of your dreams</h3>
            <p class="text-secondary">
                We provide our customers with the most incredible driving
                emotions.
                <br />
                That is why there are only world-class cars in our fleet
            </p>
        </div>
        <form
            action="/cars"
            method="GET"
            class="w-50 d-flex my-4 bg-light rounded-5 mx-auto shadow"
        >
            <input
                class="form-control border-0 me-2 rounded-5"
                type="text"
                name="search"
                placeholder="Find the car of your dreams"
                placeholder="{{ old("search") }}"
            />
            <button class="btn btn-lg btn-success rounded-5" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div class="row my-3 justify-content-between">
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
    </section>
@endsection
