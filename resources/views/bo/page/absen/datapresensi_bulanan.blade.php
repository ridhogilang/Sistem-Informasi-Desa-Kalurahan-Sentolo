@extends('bo.layout.master')

@push('header')
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Daftar Hadir</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Presensi</li>
                <li class="breadcrumb-item active">Daftar Hadir</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Daftar Hadir {{ auth()->user()->nama }}</h5>
                        </div>
                        <form action="{{ route('bulanan.search') }}" class="row mb-3" method="get">
                            <div class="form-group col-sm-3 mb-3 ">
                                <label for="bulan" class="col-form-label col-sm-6">Cari Berdasarkan Bulan</label>
                                <div class="input-group col-sm-3">
                                    <input type="month" class="form-control" name="bulan" id="bulan"
                                        value="{{ request('bulan', date('Y-m')) }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <form class="float-right" action="{{ route('kehadiran.excel-bulanan') }}" method="get">
                                <input type="hidden" name="bulan" value="{{ request('bulan', date('Y-m')) }}">
                                <button class="btn btn-sm btn-primary" type="submit" title="Download"><i
                                        class="fas fa-download"></i></button>
                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="absen" class="absen table" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>No.</th> --}}
                                    <th>Nama</th>
                                    @foreach ($dates as $date)
                                        <th colspan="2">{{ \Carbon\Carbon::parse($date)->isoFormat('dddd, D-M-Y') }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th></th>
                                    @foreach ($dates as $date)
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $user->nama }}</td>
                                        @foreach ($dates as $date)
                                            <td>
                                                @php
                                                    $formattedDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
                                                    $presents = optional($user->present);
                                                    $present = $presents->firstWhere('tanggal', $formattedDate);
                                                @endphp

                                                {{ $present->jam_masuk ? $present->jam_masuk : '-' }}
                                            </td>
                                            <td>
                                                {{ $present->jam_keluar ? $present->jam_keluar : '-' }}
                                            </td>
                                        @endforeach
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

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
    <script>
        $(document).ready(function() {
            $('#absen').DataTable({
                "scrollY": false, // Matikan Y-scroll
                "scrollX": true, // Aktifkan X-scroll
                "scrollCollapse": true,
                "paging": true, // Untuk menonaktifkan paging
                // Opsi lainnya...
            });
        });
    </script>
@endpush
