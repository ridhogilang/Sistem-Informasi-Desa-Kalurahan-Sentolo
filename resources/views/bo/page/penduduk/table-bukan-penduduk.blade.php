@extends('bo.layout.master')

@push('header')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Data Bukan Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/kependudukan/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Bukan Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Bukan Penduduk</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover responsive-table data-table-bukan-penduduk w-100">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table-bukan-penduduk').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('bo.penduduk.data.bukan') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nik', name: 'nik'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'tempat_lahir', name: 'tempat_lahir'},
                    {data: 'tanggal_lahir', name: 'tanggal_lahir', render: function(data, type, row) {
                        return formatDate(data);
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            function formatDate(dateString) {
                var dateArray = dateString.split('-');
                var day = dateArray[2];
                var month = dateArray[1];
                var year = dateArray[0];
                return day + '/' + month + '/' + year;
            }
        });
    </script>
@endpush
