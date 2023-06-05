@extends("admin.layouts.app")

@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
                ajax: "{{ route("user.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "name" },
                    { data: "email" },
                    { data: "role" },
                    { data: "action", sortable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
