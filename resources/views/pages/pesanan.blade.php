@extends("layouts.app")
@section("content")
    <section class="container">
        @foreach($bookings as $booking)
            <div class="card mb-3 mx-auto" style="max-width: 540px">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td>
                                        Dengan Sopir:
                                        {{ $booking->driver == "1" ? "Ya" : "Tidak" }}
                                    </td>
                                    <td>
                                        Rp.
                                        {{ $booking->total_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>HP: {{ $booking->nomer_hp }}</td>
                                    <td colspan="2">
                                        Hari Sewa:
                                        {{ $booking->days }}
                                        Hari
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">{{ $booking->alamat }}</td>
                                </tr>
                            </table>
                            <small
                                class="text-muted d-flex justify-content-between"
                            >
                                {{ $booking->created_at }}

                                <small
                                    class="btn btn-sm {{ $booking->status == "Selesai" ? "btn-success" : "btn-warning" }}"
                                >
                                    {{ $booking->status }}
                                </small>
                            </small>
                            @if($booking->status == "Disewa")
                                <form
                                    action="{{ route("booking.update", $booking->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method("put")
                                    <input
                                        type="hidden"
                                        name="car_id"
                                        value="{{ $booking->car_id }}"
                                    />
                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Selesai"
                                    />
                                    <button class="btn-primary btn btn-sm px-5">
                                        Kembalikan
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
