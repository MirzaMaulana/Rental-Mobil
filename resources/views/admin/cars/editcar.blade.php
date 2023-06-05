@extends("admin.layouts.app")

@section("content")
    <section class="container row justify-content-center mt-4">
        <form
            class="col-md-10 card p-4"
            action=""
            method="POST"
            enctype="multipart/form-data"
        >
            @method("put")
            @csrf
            <h4 class="fw-semibold d-flex justify-content-between">
                Edit Mobil
                <i class="fa fa-car text-success"></i>
            </h4>

            <div class="row">
                <div class="mb-2 col-md-6">
                    <small for="name" class="fw-semibold">Name Mobil</small>
                    <input
                        type="text"
                        class="form-control @error("name")  is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old("name", $car->name) }}"
                    />
                    @error("name")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2 col-md-4">
                    <small for="type" class="fw-semibold">Bahan Bakar</small>
                    <select
                        class="form-select @error("type")  is-invalid @enderror"
                        name="type"
                        aria-label="Default select example"
                    >
                        <option value="Sedan">Sedan</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="SUV">SUV</option>
                        <option value="MPV">MPV</option>
                    </select>
                    @error("type")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2 col-md-2">
                    <small for="type" class="fw-semibold">Seats</small>
                    <input
                        type="number"
                        class="form-control d-block @error("seats")  is-invalid @enderror"
                        id="seats"
                        name="seats"
                        value="{{ old("seats", $car->seats) }}"
                    />
                    @error("seats")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-2 col-md-8">
                    <small for="type" class="fw-semibold">Foto Mobil</small>
                    <input
                        type="file"
                        class="form-control d-block @error("image")  is-invalid @enderror"
                        id="image"
                        name="image"
                    />
                </div>
                <div class="mb-2 col-md-4">
                    <small for="status" class="fw-semibold">Status</small>
                    <div>
                        <input
                            type="radio"
                            class="btn-check"
                            name="status"
                            id="status1"
                            autocomplete="off"
                            value="Tersedia"
                            checked
                        />
                        <label class="btn btn-outline-success" for="status1">
                            Tersedia
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="status"
                            id="status2"
                            value="Disewa"
                            autocomplete="off"
                        />
                        <label class="btn btn-outline-warning" for="status2">
                            Disewakan
                        </label>
                        @error("status")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-2 col-md-8">
                    <small for="price" class="fw-semibold">
                        Harga Sewa/hari
                    </small>
                    <input
                        type="number"
                        class="form-control @error("price")  is-invalid @enderror"
                        id="price"
                        name="price"
                        value="{{ old("price", $car->price) }}"
                    />
                    @error("price")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2 col-md-4">
                    <small for="jumlah_unit" class="fw-semibold">
                        Jumlah Unit
                    </small>
                    <input
                        type="text"
                        class="form-control @error("jumlah_unit")  is-invalid @enderror"
                        id="jumlah_unit"
                        disabled
                        name="jumlah_unit"
                        value="{{ old("jumlah_unit", $car->jumlah_unit) }}"
                    />
                    @error("jumlah_unit")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-2 col-md-8">
                    <small for="bensin" class="fw-semibold">Bahan Bakar</small>
                    <select
                        class="form-select @error("bensin")  is-invalid @enderror"
                        name="bensin"
                        aria-label="Default select example"
                    >
                        <option value="Pertalite" class="text-success">
                            Pertalite
                        </option>
                        <option value="Pertamax" class="text-primary">
                            Pertamax
                        </option>
                        <option value="Solar">Solar</option>
                    </select>
                    @error("bensin")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2 col-md-4">
                    <small for="gear" class="fw-semibold">Type Gear</small>
                    <select
                        class="form-select @error("gear")  is-invalid @enderror"
                        name="gear"
                        aria-label="Default select example"
                    >
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                    @error("gear")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">
                Update Data Mobil
            </button>
        </form>
    </section>
@endsection
