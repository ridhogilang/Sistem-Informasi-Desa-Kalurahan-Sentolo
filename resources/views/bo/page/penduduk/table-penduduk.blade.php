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
        <h1>Data Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/kependudukan/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Penduduk</h5>
                        <div class="mb-3">
                            <a class="btn btn-primary btn-sm" type="button" href="/admin/kependudukan/penduduk/tambah-data"><i class="fa-solid fa-plus"></i> Tambah Data</a>
                            <!-- Import -->
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="fa-solid fa-file-import"></i> Import Excel
                            </button>
                            <div class="modal fade" id="importModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/admin/kependudukan/penduduk-import" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Masukkan file </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input type="file" name="file" class="form-control" id="file" accept=".xls, .xlsx, .csv" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <i>*masukkan data dengan extensi .xls, .xlsx atau .csv</i>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Import-->
                            <a class="btn btn-success btn-sm" type="button" href="/admin/kependudukan/penduduk-export"><i class="fa-solid fa-file-export"></i> Export Excel</a>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover responsive-table data-table-penduduk w-100">
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
        var table = $('.data-table-penduduk').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: "{{ route('bo.penduduk.data.aktif') }}",
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
            ],
            columnDefs: [
                {
                    "targets": 0,
                    "className": "text-center align-middle text-sm font-weight-normal hilang-nan",
                    "width": "4%"
                },
            ]
        });

        function formatDate(dateString) {
            var dateObject = new Date(dateString);
            var day = dateObject.getDate();
            var month = dateObject.getMonth() + 1;
            var year = dateObject.getFullYear();

            if (day < 10) {
                day = '0' + day;
            }
            if (month < 10) {
                month = '0' + month;
            }
            return day + '/' + month + '/' + year;
        }
        });
    </script>
@endpush
