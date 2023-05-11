@extends("admin.layouts.app")

@section("content")
    <div class="container mt-2">
        <button
            type="button"
            class="btn btn-success my-3"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
        >
            <i class="fa fa-plus"></i>
            Add Unit
        </button>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mobil</th>
                                    <th>Nomer Plat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($units as $unit)
        @include("admin.cars.modal.unitedit")
    @endforeach

    @include("admin.cars.modal.unit")
    <script>
        $(document).ready(function () {
            $("table").DataTable({
                dom:
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route("unit.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "car_name" },
                    { data: "plat_nomer" },
                    { data: "status" },
                    { data: "action", sortable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
