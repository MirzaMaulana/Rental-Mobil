@extends("layouts.app")

@section("content")
    <section class="container mt-3">
        @if(!auth()->check())
            <div class="alert alert-danger col-md-7 mx-auto" role="alert">
                Anda Perlu Login Atau Register Sebelum Memesan Rental
            </div>
        @endif

        <div class="row">
            <div class="col-md-5">
                <div>
                    <div
                        class="card p-4 border-0 shadow-sm"
                        style="widht: 20rem"
                    >
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
                                <small class="fw-semibold mb-2">
                                    <i class="bi bi-person-fill"></i>
                                    {{ $car->seats }}
                                    Seats
                                </small>
                                <small
                                    class="fw-semibold {{ $car->status == "Tersedia" ? "text-success" : "text-warning" }}"
                                >
                                    <i class="bi bi-car-front"></i>
                                    {{ $car->status }}
                                </small>
                            </span>
                            <span class="d-flex flex-column">
                                <small class="mb-2 fw-semibold">
                                    <i class="bi bi-gear-fill"></i>
                                    {{ $car->gear }}
                                </small>
                                <small class="fw-semibold mb-2">
                                    <i class="bi bi-fuel-pump-fill"></i>
                                    {{ $car->bensin }}
                                </small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 p-3 card mx-auto border-0 shadow-sm">
                <p class="fw-semibold text-center">
                    Isi Lengkap Formulir Dibawah Ini!
                </p>
                <form
                    class="row"
                    action="{{ route("booking.input") }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="mb-2 col-md-8">
                        <small for="name" class="fw-semibold">Nama</small>
                        <input
                            type="text"
                            class="form-control @error("name")  is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old("name") }}"
                        />
                        @error("name")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input
                            type="hidden"
                            name="car_id"
                            value="{{ $car->id }}"
                        />
                        {{-- Mengambil id mobil dan user --}}
                    </div>
                    <div class="mb-2 col-md-4">
                        <small for="days" class="fw-semibold">Hari</small>
                        <input
                            type="number"
                            class="form-control @error("days")  is-invalid @enderror"
                            id="days"
                            name="days"
                            value="{{ old("days") }}"
                        />
                        @error("days")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 col-md-8">
                        <small for="alamat" class="fw-semibold">Alamat</small>
                        <input
                            type="text"
                            class="form-control @error("alamat")  is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                            value="{{ old("alamat") }}"
                        />
                        @error("alamat")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 col-md-4 mt-3">
                        <small for="driver" class="fw-semibold">
                            Dengan Supir
                        </small>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="driver"
                                    id="driver1"
                                    value="1"
                                />
                                <label class="form-check-label" for="driver1">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="driver"
                                    id="driver2"
                                    onchange="Price()"
                                    value="0"
                                />
                                <label class="form-check-label" for="driver2">
                                    Tidak
                                </label>
                            </div>
                        </div>

                        @error("driver")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-2 col-md-8">
                        <small for="total_price" class="fw-semibold">
                            Total Biaya
                        </small>
                        <input
                            type="number"
                            class="form-control @error("total_price")  is-invalid @enderror"
                            id="total_price"
                            name="total_price"
                            value="{{ $car->price }}"
                            readonly
                        />
                        @error("total_price")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 col-md-4">
                        <small for="nomer_hp" class="fw-semibold">
                            Nomer Hp
                        </small>
                        <input
                            type="number"
                            class="form-control @error("nomer_hp")  is-invalid @enderror"
                            id="nomer_hp"
                            name="nomer_hp"
                            value="{{ old("nomer_hp") }}"
                        />
                        @error("nomer_hp")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 col-md-8">
                        <small for="bukti_image" class="fw-semibold">
                            Bukti Transfer Pembayaran
                        </small>
                        <input
                            type="file"
                            class="form-control @error("bukti_image")  is-invalid @enderror"
                            id="bukti_image"
                            name="bukti_image"
                            onchange="loadFile(event)"
                            value="{{ old("bukti_image") }}"
                        />
                        @error("bukti_image")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <small for="bukti" class="fw-semibold">Preview</small>
                        <img id="bukti" src="" class="mx-2" width="150" />
                    </div>
                    <div class="col-md-12 my-2">
                        <button
                            class="btn btn-success w-100"
                            type="submit"
                            {{ !auth()->check() ? "disabled" : "" }}
                        >
                            Pesan Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        //Menghitung otomatis price dari input hari
        const daysInput = document.getElementById("days");
        const totalPriceInput = document.getElementById("total_price");
        const driverInput = document.getElementById("driver1");
        const carPrice = {{ $car->price }};

        //fungsi untuk menghitung otomatis price
        function Price() {
            const days = daysInput.value;
            const addCost = driverInput.checked ? 200000 : 0;
            const totalPrice = carPrice * days + addCost;
            totalPriceInput.value = totalPrice;
        }

        //menambahkan event ke input dengan id total_price
        daysInput.addEventListener("input", Price);
        driverInput.addEventListener("input", Price);

        let loadFile = function (event) {
            var image = document.getElementById("bukti");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
