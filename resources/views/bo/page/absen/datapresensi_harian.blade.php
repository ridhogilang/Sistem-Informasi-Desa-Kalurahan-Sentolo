@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Hadir</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Reka</li>
                <li class="breadcrumb-item active">Rekapitulasi Absen Harian</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="m-0 pt-1 font-weight-bold float-left">Kehadiran</h5>
                        <div class="row">
                            <div class="col-lg-6 mb-1">
                                <form action="{{ route('kehadiran.search') }}" method="get">
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-form-label col-sm-3">Tanggal</label>
                                        <div class="input-group col-sm-9">
                                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                value="{{ request('tanggal', date('Y-m-d')) }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <form class="float-right" action="{{ route('kehadiran.excel-users') }}" method="get">
                                <input type="hidden" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">
                                <button class="btn btn-sm btn-primary" type="submit" title="Download"><i
                                        class="fas fa-download"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Rekap Kehadiran Harian</h5>
                        </div>
                        <div style="overflow-x: auto;">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Total Jam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$presents->count())
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data yang tersedia</td>
                                        </tr>
                                    @else
                                        @foreach ($presents as $rank => $present)
                                            <tr>
                                                <th>{{ $rank + 1 }}</th>
                                                <td>{{ $present->user->nama }}</td>
                                                <td>{{ $present->keterangan }}</td>
                                                @if ($present->jam_masuk)
                                                    <td>{{ date('H:i:s', strtotime($present->jam_masuk)) }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                @if ($present->jam_keluar)
                                                    <td>{{ date('H:i:s', strtotime($present->jam_keluar)) }}</td>
                                                    <td>
                                                        @if (strtotime($present->jam_keluar) <= strtotime($present->jam_masuk))
                                                            {{ 21 - \Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar)) }}
                                                        @else
                                                            @if (strtotime($present->jam_keluar) >= strtotime(config('absensi.jam_pulang') . ' +2 hours'))
                                                                {{ \Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar)) - 3 }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar)) - 1 }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td>-</td>
                                                    <td>-</td>
                                                @endif
                                                <td>
                                                    <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                        data-bs-target="#Modal-Edit-presensi-{{ $present->id }}"
                                                        href="/admin/presensi/rekap-harian/{{ $present->id }}/edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="Modal-Edit-presensi-{{ $present->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="Modal-Edit-presensi-Label" aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="/admin/presensi/rekap-harian/{{ $present->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="Modal-Edit-SKTM-Satu-Label">
                                                                    Edit
                                                                    Presensi | {{ $present->user->nama }}</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="keterangan"
                                                                        class="col-sm-3 col-form-label">Keterangan</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="keterangan" class="form-select">
                                                                            <option disabled value="">Pilih Keterangan
                                                                            </option>
                                                                            <option value="Masuk"
                                                                                {{ $present->keterangan === 'Masuk' ? 'selected' : '' }}>
                                                                                Masuk</option>
                                                                            <option value="Alpha"
                                                                                {{ $present->keterangan === 'Alpha' ? 'selected' : '' }}>
                                                                                Alpha</option>
                                                                            <option value="Telat"
                                                                                {{ $present->keterangan === 'Telat' ? 'selected' : '' }}>
                                                                                Telat</option>
                                                                            <option value="Sakit"
                                                                                {{ $present->keterangan === 'Sakit' ? 'selected' : '' }}>
                                                                                Sakit</option>
                                                                            <option value="Cuti"
                                                                                {{ $present->keterangan === 'Cuti' ? 'selected' : '' }}>
                                                                                Cuti</option>
                                                                            <option value="Izin"
                                                                                {{ $present->keterangan === 'Izin' ? 'selected' : '' }}>
                                                                                Izin</option>
                                                                            <option value="Diluar"
                                                                                {{ $present->keterangan === 'Diluar' ? 'selected' : '' }}>
                                                                                Diluar</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jam_masuk"
                                                                        class="col-sm-3 col-form-label">Jam Masuk</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="time" name="jam_masuk"
                                                                            class="form-control" id="jam_masuk"
                                                                            value="{{ $present->jam_masuk }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jam_keluar"
                                                                        class="col-sm-3 col-form-label">Jam Keluar</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="time" name="jam_keluar"
                                                                            class="form-control" id="jam_keluar"
                                                                            value="{{ $present->jam_keluar }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
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
