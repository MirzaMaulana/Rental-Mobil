@extends("admin.layouts.app")
@section("content")
    <section class="row container mt-4">
        @if($new_order > 0)
            <div
                class="alert alert-danger col-md-12 mx-2 alert-dismissible fade show"
                role="alert"
            >
                Ada Pesanan Baru, Segera Konfirmasi!!
                <a href="{{ route("booking.index") }} " class="text-info">
                    Cek Langsung
                </a>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        @endif

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h5>{{ $booking->count() }}</h5>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a
                    href="{{ route("booking.index") }}"
                    class="small-box-footer"
                >
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h5>{{ $users->count() }}</h5>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h5>{{ $units->count() }}</h5>
                    <p>Car Units</p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="{{ route("unit.index") }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h5>Rp. {{ $pendapatan }}</h5>
                    <p>Total Pendapatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="{{ route("unit.index") }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
