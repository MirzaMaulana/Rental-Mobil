<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Tambah Unit Mobil
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{ route("unit.input") }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="plat_nomer" class="form-label">
                            Plat Nomer
                        </label>
                        <input
                            type="text"
                            class="form-control @error("plat_nomer")  is-invalid @enderror"
                            name="plat_nomer"
                            id="plat_nomer"
                        />
                        @error("plat_nomer")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="car_id" class="form-label">
                            List Type Mobil
                        </label>
                        <select
                            class="form-select"
                            id="car_id"
                            name="car_id"
                            aria-label="Default select example"
                        >
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}">
                                    {{ $car->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("car_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
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
                            <label
                                class="btn btn-outline-success"
                                for="status1"
                            >
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
                            <label
                                class="btn btn-outline-warning"
                                for="status2"
                            >
                                Disewakan
                            </label>
                            @error("status")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
