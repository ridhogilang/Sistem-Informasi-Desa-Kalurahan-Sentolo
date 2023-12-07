@extends('bo.layout.master')

@push('header')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@endpush

@section('content')

    <div class="pagetitle">
        <h1>Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Kepegawaian</a></li>
                <li class="breadcrumb-item active">Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Akun Pengguna</h5>
                            <a class="btn btn-primary" href="{{ route('bo.pegawai.user_management.create')}}">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Akun Pamong</h5>
                        </div>
                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable_akun_pamong">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
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


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Akun Kontributor</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable_akun_kontributor">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
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


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Akun Penduduk</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable_akun_penduduk">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Email</th>
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
          
        var table = $('.datatable_akun_pamong').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bo.pengguna.data.akun_pamong') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'jabatan', name: 'jabatan'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
          
      });
    </script>

    <script type="text/javascript">
      $(function () {
          
        var table = $('.datatable_akun_kontributor').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bo.pengguna.data.akun_kontributor') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'nik', name: 'nik'},
                {data: 'jabatan', name: 'jabatan'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
          
      });
    </script>

    <script type="text/javascript">
      $(function () {
          
        var table = $('.datatable_akun_penduduk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bo.pengguna.data.akun_penduduk') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'nik', name: 'nik'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
          
      });
    </script>


@endpush