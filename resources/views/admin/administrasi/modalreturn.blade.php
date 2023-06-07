<div
    class="modal fade"
    id="ModalReturn{{ $booking->id }}"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Kembalikan Pesanan
                    <b class="text-primary">{{ $booking->name }}</b>
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body">
                <input
                    type="hidden"
                    name="status"
                    id="status"
                    value="Selesai"
                />
                @if($booking->driver_id != null)
                    <input
                        type="hidden"
                        name="driver_id"
                        id="driver_id"
                        value="{{ $booking->driver_id }}"
                    />
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <label for="car_id" class="form-label">
                            Nama Mobil
                        </label>
                        <input
                            type="text"
                            disabled
                            class="form-control @error("car_id")  is-invalid @enderror"
                            name="car_id"
                            id="car_id"
                            value="{{ $booking->car->name }}"
                        />
                        @error("car_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="unit_id" class="form-label">
                            Plat Unit
                        </label>
                        <input
                            type="text"
                            disabled
                            class="form-control @error("unit_id")  is-invalid @enderror"
                            name="unit_id"
                            id="unit_id"
                            value="{{ $booking->unit->plat_nomer }}"
                        />
                        @error("unit_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <form
                action="{{ route("booking.return", $booking->id) }}"
                method="POST"
            >
                @csrf
                @method("put")
                <input
                    type="hidden"
                    name="status"
                    id="status"
                    value="Selesai"
                />
                <input
                    type="hidden"
                    name="car_id"
                    id="car_id"
                    value="{{ $booking->car_id }}"
                />
                <input
                    type="hidden"
                    name="unit_id"
                    id="unit_id"
                    value="{{ $booking->unit_id }}"
                />
                @if($booking->driver == 1)
                    <input
                        type="hidden"
                        name="driver_id"
                        id="driver_id"
                        value="{{ $booking->driver_id }}"
                    />
                @endif

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        Kembalikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
