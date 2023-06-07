<div
    class="modal fade"
    id="ModalConfirm{{ $booking->id }}"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Konfirmasi Pesanan
                    <b class="text-primary">{{ $booking->name }}</b>
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form
                action="{{ route("booking.confirm", $booking->id) }}"
                method="POST"
            >
                @csrf
                @method("put")
                <input type="hidden" name="status" id="status" value="Disewa" />
                <input
                    type="hidden"
                    name="car_id"
                    id="car_id"
                    value="{{ $booking->car_id }}"
                />
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="unit_id" class="form-label">
                            List Unit Tersedia
                        </label>
                        <select
                            class="form-select"
                            id="unit_id"
                            name="unit_id"
                            aria-label="Default select example"
                        >
                            @foreach($units as $unit)
                                @if($unit->car_id == $booking->car_id)
                                    <option value="{{ $unit->id }}">
                                        {{ $unit->plat_nomer }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error("unit_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if($booking->driver == 1)
                        <div class="mb-3">
                            <label for="driver_id" class="form-label">
                                List Driver Tersedia
                            </label>
                            <select
                                class="form-select"
                                id="driver_id"
                                name="driver_id"
                                aria-label="Default select example"
                            >
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}">
                                        {{ $driver->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error("driver_id")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
