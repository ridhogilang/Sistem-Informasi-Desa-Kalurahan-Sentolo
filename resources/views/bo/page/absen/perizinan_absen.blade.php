@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Hadir</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Presensi</li>
                <li class="breadcrumb-item active">Perizinan Absensi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Perizinan Absensi</h5>
                        </div>
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Perizinan</th>
                                    <th>Tanggal</th>
                                    <th>Alasan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($izin as $value)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}.</th>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->jenis }}</td>
                                        <td>{{ date('d F Y', strtotime($value->tanggal)) }}</td>
                                        <td>{{ $value->alasan }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <form action="/admin/presensi/update-perizinan/{{ $value->user_id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="jenis" value="{{ $value->jenis }}">
                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <input type="hidden" name="taggal" value="{{ $value->tanggal }}">

                                                    <button type="submit" class="btn btn-success mx-1">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                                <a class="btn btn-danger" type="submit" id="deleteberita"
                                                    data-id="{{ $value->id }}"
                                                    href="/admin/sistem-informasi/deleteberita/{{ $value->id }}"><i
                                                        class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Perizinan Dalam 1 Bulan(yang sudah disetujui)</h5>
                        </div>
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Perizinan</th>
                                    <th>Tanggal</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($izinsebulan as $value)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}.</th>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->jenis }}</td>
                                        <td>{{ date('d F Y', strtotime($value->tanggal)) }}</td>
                                        <td>{{ $value->alasan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deletemenu', function(e) {
                e.preventDefault();
                var data_id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Kamu ingin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/sistem-informasi/deletemenu/" + data_id,
                            Swal.fire(
                                'Deleted!',
                                'Data sudah terhapus.',
                                'success'
                            )
                    }
                })

            });
        });
    </script>
@endpush
