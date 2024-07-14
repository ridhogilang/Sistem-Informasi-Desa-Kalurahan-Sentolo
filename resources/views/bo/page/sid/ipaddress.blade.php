@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>IP Address User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">IP Address User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Informasi IP Address</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable responsive-table w-100" id="online-users-table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Device Name</th>
                                    <th scope="col">IP Address</th>
                                    <th scope="col">Sistem Operasi</th>
                                    <th scope="col">Browser</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script>
        $(document).ready(function() {
            $('#online-users-table').DataTable({
                ajax: '{{ route("bo.sid.onlineuser") }}',
                columns: [{
                        data: 'no',
                        name: 'no',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'ipAddress'
                    },
                    {
                        data: 'browser'
                    },
                    {
                        data: 'os'
                    },
                    {
                        data: 'device'
                    }
                ],
                rowCallback: function(row, data, index) {
                    $('td:eq(0)', row).html(index + 1);
                }
            });
        });
    </script>
@endpush
