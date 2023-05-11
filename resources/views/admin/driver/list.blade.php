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
            Add Driver
        </button>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomer HP</th>
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
    @foreach($drivers as $driver)
        @include("admin.driver.modaledit")
    @endforeach

    @include("admin.driver.modal")
    <script>
        $(document).ready(function () {
            $("table").DataTable({
                dom:
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route("driver.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "name" },
                    { data: "alamat" },
                    { data: "jenis_kelamin" },
                    { data: "nomer_hp", sortable: false },
                    { data: "status" },
                    { data: "action", sortable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
