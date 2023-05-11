@extends("admin.layouts.app")
@section("content")
    <section class="row container mt-4">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $booking->count() }}</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route("booking.list") }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{ $users->count() }}</h3>
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
        <div class="col-md-4">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $units->count() }}</h3>
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
    </section>
@endsection
