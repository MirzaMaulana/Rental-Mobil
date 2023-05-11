<div
    class="modal fade"
    id="ModalEdit{{ $unit->id }}"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Update Status Unit Mobil
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{ route("unit.update", $unit->id) }}" method="POST">
                @csrf
                @method("put")
                <input
                    type="hidden"
                    name="car_id"
                    value="{{ $unit->car->id }}"
                />
                <div class="modal-body">
                    <div class="mb-3">
                        <p for="status" class="form-label">Status</p>
                        <select
                            class="form-select"
                            id="status"
                            name="status"
                            aria-label="Default select example"
                        >
                                <option value="Tersedia">
                                    Tersedia
                                </option>
                                <option value="Disewa">
                                    Disewa
                                </option>
                        </select>
                        @error("status")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small>Ubah status mobil jika ada orderan</small>
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
