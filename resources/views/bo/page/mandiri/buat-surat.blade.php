@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Buat Surat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Buat Surat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- ======= Navigation ======= -->
    @include('bo.partial.navigation')
    <!-- End Navigation -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @if ($buatsurat->where('status_blanko', 'Pending')->count() == 0 && $buatsurat->where('status_blanko', 'Proses')->count() == 0)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jenis Surat</h5>

                            <form>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <select class="form-select" id="jenis_surat">
                                            <option value="" selected>Pilih Jenis Surat</option>
                                            <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                            <option value="Surat Pernyataan Belum Menikah">Surat Pernyataan Belum Menikah</option>
                                            <option value="Surat Keterangan Belum Menikah">Surat Keterangan Belum Menikah</option>
                                            <option value="Surat Pengantar Nikah">Surat Pengantar Nikah</option>
                                            <option value="Surat Pengantar E-KTP">Surat Pengantar E-KTP</option>
                                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                                            <option value="Surat Pernyataan Belum Bekerja">Surat Pernyataan Belum Bekerja</option>
                                            <option value="Surat Keterangan Tidak Bekerja">Surat Keterangan Tidak Bekerja</option>
                                            <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
                                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                @endif

                <div class="card" id="surat-umum" style="display: none;">
                    <div class="card-body">
                        <h5 class="card-title">Buat Surat</h5>

                        <!-- Buat Surat -->
                        <form class="row g-3" action="/buat-surat" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="3401532516997842" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="Rizki Bagus Pangestu" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_ktp" class="form-label">Upload File KTP</label>
                                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_kk" class="form-label">Upload File KK</label>
                                <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                            </div>
                            <input type="hidden" name="jenis_surat">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form><!-- End Buat Surat -->

                    </div>
                </div>

                <div class="card" id="surat-nikah" style="display: none;">
                    <div class="card-body">
                        <h5 class="card-title">Buat Surat</h5>

                        <!-- Buat Surat -->
                        <form class="row g-3" action="/buat-surat" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="3401532516997842" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="Rizki Bagus Pangestu" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_ktp" class="form-label">Upload File KTP</label>
                                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_kk" class="form-label">Upload File KK</label>
                                <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_akta_lahir" class="form-label">Upload File Akta Lahir</label>
                                <input type="file" class="form-control" id="foto_akta_lahir" name="foto_akta_lahir" required>
                            </div>
                            <input type="hidden" name="jenis_surat">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form><!-- End Buat Surat -->

                    </div>
                </div>

                <div class="card" id="surat-pengantar" style="display: none;">
                    <div class="card-body">
                        <h5 class="card-title">Buat Surat</h5>

                        <!-- Buat Surat -->
                        <form class="row g-3" action="/buat-surat" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="3401532516997842" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="Rizki Bagus Pangestu" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_ktp" class="form-label">Upload File KTP</label>
                                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_kk" class="form-label">Upload File KK</label>
                                <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_akta_lahir" class="form-label">Upload File Akta Lahir</label>
                                <input type="file" class="form-control" id="foto_akta_lahir" name="foto_akta_lahir" required>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_surat_keterangan_dokter" class="form-label">Upload File Surat Keterangan Dokter</label>
                                <input type="file" class="form-control" id="foto_surat_keterangan_dokter" name="foto_surat_keterangan_dokter" required>
                            </div>
                            <input type="hidden" name="jenis_surat">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form><!-- End Buat Surat -->

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Antrian Pembuatan Surat</h5>

                        <!-- Table antrian -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Blanko</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Status Blanko</th>
                                    <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($buatsurat as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->tanggal_blanko }}</td>
                                        <td>{{ $value->jenis_surat }}</td>
                                        <td>
                                            <span class="badge
                                                @if ($value->status_blanko == 'Pending')
                                                    bg-danger
                                                @elseif ($value->status_blanko == 'Proses')
                                                    bg-warning
                                                @elseif ($value->status_blanko == 'Sukses')
                                                    bg-success
                                                @endif">{{ $value->status_blanko }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($value->status_blanko == 'Sukses')
                                                <a class="btn btn-success" type="submit" target="blank" href="#"><i class="fa-solid fa-print"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table antrian -->

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@push('footer')
    <script>
        $(document).ready(function () {
            $('#jenis_surat').change(function () {
                var jenisSurat = $(this).val();

                // Set the value of the hidden input field
                $('[name=jenis_surat]').val(jenisSurat);

                // Menyembunyikan semua form
                $('[id^=surat]').hide();

                // Menampilkan form yang sesuai berdasarkan jenis surat
                if (jenisSurat === 'Surat Keterangan Tidak Mampu' || jenisSurat === 'Surat Pernyataan Belum Bekerja' || jenisSurat === 'Surat Keterangan Tidak Bekerja' || jenisSurat === 'Surat Keterangan Penghasilan' || jenisSurat === 'Surat Keterangan Domisili') {
                    $('#surat-umum').show();
                    $('#surat-umum .card-title').text('Buat ' + jenisSurat);
                } else if (jenisSurat === 'Surat Pernyataan Belum Menikah' || jenisSurat === 'Surat Keterangan Belum Menikah' || jenisSurat === 'Surat Pengantar Nikah') {
                    $('#surat-nikah').show();
                    $('#surat-nikah .card-title').text('Buat ' + jenisSurat);
                } else if (jenisSurat === 'Surat Pengantar E-KTP' || jenisSurat === 'Surat Pengantar SKCK') {
                    $('#surat-pengantar').show();
                    $('#surat-pengantar .card-title').text('Buat ' + jenisSurat);
                }
            });
        });

    </script>
@endpush
