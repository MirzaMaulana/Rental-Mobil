@extends("admin.layouts.app")

@section("content")
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mobil</th>
                                    <th>Nama User</th>
                                    <th>Hari</th>
                                    <th>Alamat</th>
                                    <th>Nomer HP</th>
                                    <th>Total</th>
                                    <th>Bukti</th>
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
    {{-- @include("admin.administrasi.modaledit") --}}
    <script>
        $(document).ready(function () {
            $("table").DataTable({
                dom:
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route("booking.selesai.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "car_name" },
                    { data: "name" },
                    { data: "days" },
                    { data: "alamat" },
                    { data: "nomer_hp" },
                    { data: "total_price" },
                    { data: "bukti_image", sortable: false, searchable: false },
                    { data: "status" },
                    { data: "action", sortable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
