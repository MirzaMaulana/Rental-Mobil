@extends("admin.layouts.app")

@section("content")
    <div class="container mt-2">
        <a
            href="{{ route("car.create") }}"
            type="button"
            class="btn btn-success my-2"
        >
            <i class="fa fa-plus"></i>
            Add Car
        </a>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Seats</th>
                                    <th>Price</th>
                                    <th>Bensin</th>
                                    <th>Gear</th>
                                    <th>Unit</th>
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
    <script>
        $(document).ready(function () {
            $("table").DataTable({
                dom:
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route("car.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "name" },
                    { data: "type" },
                    { data: "seats" },
                    { data: "price" },
                    { data: "bensin", sortable: false },
                    { data: "gear" },
                    { data: "jumlah_unit" },
                    { data: "status" },
                    { data: "action", sortable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
