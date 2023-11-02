@extends('bo.layout.master')

@push('scripts')
    <script>
        // Mendapatkan elemen input NIK Data Ayah
        var nik_ayahInput = document.getElementById('nik_ayah');
        // Mendapatkan elemen input NIK Data Ibu
        var nik_ibuInput = document.getElementById('nik_ibu');

        // Menambahkan event listener ketika nilai input NIK berubah Orang 1
        nik_ayahInput.addEventListener('input', function() {
            var nik_ayah = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nik_ayah, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Isi input dengan data yang diterima
                    if (document.getElementById('nama_ayah')) {
                        document.getElementById('nama_ayah').value = data.nama || '';
                    }
                    if (document.getElementById('tempat_lahir_ayah')) {
                        document.getElementById('tempat_lahir_ayah').value = data.tempat_lahir || '';
                    }
                    if (document.getElementById('tanggal_lahir_ayah')) {
                        document.getElementById('tanggal_lahir_ayah').value = data.tanggal_lahir || '';
                    }
                    if (document.getElementById('agama_ayah')) {
                        document.getElementById('agama_ayah').value = data.agama || '';
                    }
                    if (document.getElementById('pekerjaan_ayah')) {
                        document.getElementById('pekerjaan_ayah').value = data.pekerjaan || '';
                    }
                    if (document.getElementById('alamat_ayah')) {
                        document.getElementById('alamat_ayah').value = data.alamat || '';
                    }
                } else {
                    // Handle jika NIK tidak ditemukan
                    document.getElementById('nama_ayah').value = '';
                    document.getElementById('tempat_lahir_ayah').value = '';
                    document.getElementById('tanggal_lahir_ayah').value = '';
                    document.getElementById('agama_ayah').value = '';
                    document.getElementById('pekerjaan_ayah').value = '';
                    document.getElementById('alamat_ayah').value = '';
                }
            };

            xhr.send();
        });

        // Menambahkan event listener ketika nilai input NIK berubah Orang 1
        nik_ibuInput.addEventListener('input', function() {
            var nik_ibu = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nik_ibu, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Isi input dengan data yang diterima
                    if (document.getElementById('nama_ibu')) {
                        document.getElementById('nama_ibu').value = data.nama || '';
                    }
                    if (document.getElementById('tempat_lahir_ibu')) {
                        document.getElementById('tempat_lahir_ibu').value = data.tempat_lahir || '';
                    }
                    if (document.getElementById('tanggal_lahir_ibu')) {
                        document.getElementById('tanggal_lahir_ibu').value = data.tanggal_lahir || '';
                    }
                    if (document.getElementById('agama_ibu')) {
                        document.getElementById('agama_ibu').value = data.agama || '';
                    }
                    if (document.getElementById('pekerjaan_ibu')) {
                        document.getElementById('pekerjaan_ibu').value = data.pekerjaan || '';
                    }
                    if (document.getElementById('alamat_ibu')) {
                        document.getElementById('alamat_ibu').value = data.alamat || '';
                    }
                } else {
                    // Handle jika NIK tidak ditemukan
                    document.getElementById('nama_ibu').value = '';
                    document.getElementById('tempat_lahir_ibu').value = '';
                    document.getElementById('tanggal_lahir_ibu').value = '';
                    document.getElementById('agama_ibu').value = '';
                    document.getElementById('pekerjaan_ibu').value = '';
                    document.getElementById('alamat_ibu').value = '';
                }
            };

            xhr.send();
        });
    </script>
@endpush

@section('content')
<div class="pagetitle">
    <h1>Surat Keterangan Kelahiran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
            <li class="breadcrumb-item">Surat Keluar</li>
            <li class="breadcrumb-item active">Keterangan Kelahiran</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">
            @canany(['input surat', 'lihat contoh surat'])
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Keterangan Kelahiran</h5>
                    <!-- Button trigger modal -->
                    @can('input surat')
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kkelahiran"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                    @endcan
                    @can('lihat contoh surat')
                    <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-kkelahiran/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>
                    @endcan
                    @can('input surat')
                    <!-- Modal Form 1 Orang -->
                    <div class="modal fade" id="kkelahiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kkelahiran-Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="kkelahiran-Label">Data Surat Keterangan Kelahiran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row" action="/admin/e-surat/surat-kkelahiran" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                            </div>
                                        </div>
                                        <h5 class="modal-title mt-2 mb-3"><strong>Data Anak / Bayi</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status_hubungan" class="col-sm-3 col-form-label">Status Hubungan</label>
                                            <div class="col-sm-9">
                                                <select id="status_hubungan" name="status_hubungan" class="form-select" required>
                                                    <option value="" @if(old('status_hubungan')=='' ) selected @endif>Pilih Status Hubungan ...</option>
                                                    <option value="Anak Kandung" @if(old('status_hubungan')=='Anak Kandung' ) selected @endif>Anak Kandung</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="dusun" class="col-sm-3 col-form-label">Dusun</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="dusun" class="form-control" id="dusun" value="{{ old('dusun') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="kalurahan" class="col-sm-3 col-form-label">Kalurahan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="kalurahan" class="form-control" id="kalurahan" value="{{ old('kalurahan') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="{{ old('kecamatan') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="kabupaten" class="form-control" id="kabupaten" value="{{ old('kabupaten') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{ old('provinsi') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                    <option value="" @if(old('jenis_kelamin')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                                    <option value="Laki-laki" @if(old('jenis_kelamin')=='Laki-laki' ) selected @endif>Laki-laki</option>
                                                    <option value="Perempuan" @if(old('jenis_kelamin')=='Perempuan' ) selected @endif>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="anak_ke" class="col-sm-3 col-form-label">Anak ke</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="anak_ke" class="form-control" id="anak_ke" value="{{ old('anak_ke') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agama" name="agama" class="form-select" required>
                                                    <option value="" @if(old('agama')=='' ) selected @endif>Pilih Agama ...</option>
                                                    <option value="Islam" @if(old('agama')=='Islam' ) selected @endif>Islam</option>
                                                    <option value="Kristen Protestan" @if(old('agama')=='Kristen Protestan' ) selected @endif>Kristen Protestan</option>
                                                    <option value="Kristen Katolik" @if(old('agama')=='Kristen Katolik' ) selected @endif>Kristen Katolik</option>
                                                    <option value="Hindu" @if(old('agama')=='Hindu' ) selected @endif>Hindu</option>
                                                    <option value="Buddha" @if(old('agama')=='Buddha' ) selected @endif>Buddha</option>
                                                    <option value="Konghucu" @if(old('agama')=='Konghucu' ) selected @endif>Konghucu</option>
                                                    <option value="Lainnya" @if(old('agama')=='Lainnya' ) selected @endif>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h5 class="modal-title mt-2 mb-3"><strong>Data Ayah</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nik_ayah" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nik_ayah" class="form-control" id="nik_ayah" value="{{ old('nik_ayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama_ayah" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahir_ayah" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}" required>
                                            </div>
                                            <label for="tanggal_lahir_ayah" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agama_ayah" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agama_ayah" name="agama_ayah" class="form-select" required>
                                                    <option value="" @if(old('agama_ayah')=='' ) selected @endif>Pilih Agama ...</option>
                                                    <option value="Islam" @if(old('agama_ayah')=='Islam' ) selected @endif>Islam</option>
                                                    <option value="Kristen Protestan" @if(old('agama_ayah')=='Kristen Protestan' ) selected @endif>Kristen Protestan</option>
                                                    <option value="Kristen Katolik" @if(old('agama_ayah')=='Kristen Katolik' ) selected @endif>Kristen Katolik</option>
                                                    <option value="Hindu" @if(old('agama_ayah')=='Hindu' ) selected @endif>Hindu</option>
                                                    <option value="Buddha" @if(old('agama_ayah')=='Buddha' ) selected @endif>Buddha</option>
                                                    <option value="Konghucu" @if(old('agama_ayah')=='Konghucu' ) selected @endif>Konghucu</option>
                                                    <option value="Lainnya" @if(old('agama_ayah')=='Lainnya' ) selected @endif>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat_ayah" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat_ayah" class="form-control" id="alamat_ayah" value="{{ old('alamat_ayah') }}" required>
                                            </div>
                                        </div>
                                        <h5 class="modal-title mt-2 mb-3"><strong>Data Ibu</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nik_ibu" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nik_ibu" class="form-control" id="nik_ibu" value="{{ old('nik_ibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahir_ibu" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}" required>
                                            </div>
                                            <label for="tanggal_lahir_ibu" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agama_ibu" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agama_ibu" name="agama_ibu" class="form-select" required>
                                                    <option value="" @if(old('agama_ibu')=='' ) selected @endif>Pilih Agama ...</option>
                                                    <option value="Islam" @if(old('agama_ibu')=='Islam' ) selected @endif>Islam</option>
                                                    <option value="Kristen Protestan" @if(old('agama_ibu')=='Kristen Protestan' ) selected @endif>Kristen Protestan</option>
                                                    <option value="Kristen Katolik" @if(old('agama_ibu')=='Kristen Katolik' ) selected @endif>Kristen Katolik</option>
                                                    <option value="Hindu" @if(old('agama_ibu')=='Hindu' ) selected @endif>Hindu</option>
                                                    <option value="Buddha" @if(old('agama_ibu')=='Buddha' ) selected @endif>Buddha</option>
                                                    <option value="Konghucu" @if(old('agama_ibu')=='Konghucu' ) selected @endif>Konghucu</option>
                                                    <option value="Lainnya" @if(old('agama_ibu')=='Lainnya' ) selected @endif>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat_ibu" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat_ibu" class="form-control" id="alamat_ibu" value="{{ old('alamat_ibu') }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                            <div class="col-sm-9">
                                                <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                    <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                    <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        @endcanany
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Surat Keterangan Kelahiran</h5>
                </div>

                <!-- Table with hoverable rows -->
                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Nama Anak</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">NIK Ayah</th>
                            <th scope="col">Status</th>
                            @canany(['edit surat', 'lihat surat', 'hapus surat'])
                            <th scope="col" class="text-center">Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($skl as $value)
                        <tr>
                            <th scope="row">{{ $no++ }}.</th>
                            <td>{{ $value->nomor_surat }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->nama_ayah }}</td>
                            <td>{{ $value->nik_ayah }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#status_{{$value->id}}" class="btn btn-primary">
                                        <i class="bi bi-clock-history"></i> Lihat
                                    </a>
                            </td>
                            <!-- ini bagian modal badge status verifikasi -->
                            <div class="modal fade" id="status_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Kelahiran {{$value->nomor_surat}}</h5>
                                            <div class="mx-3">{!! $badge_status[$value->status_surat] !!}</div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                <div class="row border-bottom p-3">
                                                    <div class="col-sm-3">
                                                        {!! $badge_status[$verifikasi->status]!!}
                                                        {{ $verifikasi->updated_at }}
                                                    </div>
                                                    <div class="col mx-5">
                                                        {{ $verifikasi->nama_user}}
                                                        ( {{ $verifikasi->jabatan_user}} )
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- bagian action -->
                            @canany(['edit surat', 'lihat surat', 'hapus surat'])
                            <td class="text-center d-flex justify-content-evenly">
                                @can('lihat surat')
                                <a class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-secondary' }}" type="submit" target="blank" href="/admin/e-surat/surat-kkelahiran/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                @endcan
                                @can('edit surat')
                                <!-- Button trigger modal -->
                                <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKL{{$value->id}}" href="/admin/e-surat/edit-surat-kkelahiran/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                                @can('hapus surat')
                                <a data-bs-toggle="modal" data-bs-target="#kearsip_{{$value->id}}">
                                    @if($value->status_surat == '2')
                                    <button class="btn btn-success">
                                        <i class="fa-solid fa-circle-up"></i>
                                        @else
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-circle-up"></i>
                                            @endif
                                        </button>
                                </a>
                                <!-- modal hapus atau delete -->
                                <div class="modal fade" id="kearsip_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Kelahiran {{$value->nomor_surat}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <p>Apakah Anda yakin untuk mengarsipkan surat dengan nomor {{$value->nomor_surat}}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/admin/e-surat/surat-kkelahiran/{{$value->id}}/{{$value->status_surat}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-danger' }}">Arsipkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                            </td>
                            @endcanany
                        </tr>
                        @can('edit surat')
                        <!-- Modal Edit SKL-->
                        <div class="modal fade" id="Modal-Edit-SKL{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SKL-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="/admin/e-surat/surat-kkelahiran/{{$value->id}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="Modal-Edit-SKL-Label">Edit Data Surat Keterangan Lahir {{$value->nomor_surat}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="nomor_surat3" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_surat3" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                </div>
                                            </div>
                                            <h5 class="modal-title mt-2 mb-3"><strong>Data Anak / Bayi</strong></h5>
                                            <div class="row mb-3">
                                                <label for="nama3" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control" id="nama3" value="{{$value->nama}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="status_hubungan3" class="col-sm-3 col-form-label">Status Hubungan</label>
                                                <div class="col-sm-9">
                                                    <select id="status_hubungan3" name="status_hubungan" class="form-select" required>
                                                        <option value="" {{ ($value->status_hubungan == "") ? 'selected' : '' }}>Pilih Status Hubungan ...</option>
                                                        <option value="Anak Kandung" {{ ($value->status_hubungan == "Anak Kandung") ? 'selected' : '' }}>Anak Kandung</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="dusun3" class="col-sm-3 col-form-label">Dusun</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="dusun" class="form-control" id="dusun3" value="{{$value->dusun}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kalurahan3" class="col-sm-3 col-form-label">Kalurahan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kalurahan" class="form-control" id="kalurahan3" value="{{$value->kalurahan}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kecamatan3" class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kecamatan" class="form-control" id="kecamatan3" value="{{$value->kecamatan}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kabupaten3" class="col-sm-3 col-form-label">Kabupaten</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kabupaten" class="form-control" id="kabupaten3" value="{{$value->kabupaten}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="provinsi3" class="col-sm-3 col-form-label">Provinsi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="provinsi" class="form-control" id="provinsi3" value="{{$value->provinsi}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanggal_lahir3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="tanggal_lahir3" name="tanggal_lahir" value="{{ $value->tanggal_lahir }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jenis_kelamin3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select id="jenis_kelamin3" name="jenis_kelamin" class="form-select" required>
                                                        <option value="">Pilih Jenis Kelamin ...</option>
                                                        <option value="Laki-laki" {{ ($value->jenis_kelamin == "Laki-laki") ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ ($value->jenis_kelamin == "Perempuan") ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="anak_ke3" class="col-sm-3 col-form-label">Anak ke</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="anak_ke" class="form-control" id="anak_ke3" value="{{ $value->anak_ke }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama3" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama3" name="agama" class="form-select" required>
                                                        <option value="">Pilih Agama ...</option>
                                                        <option value="Islam" {{ ($value->agama == "Islam") ? 'selected' : '' }}>Islam</option>
                                                        <option value="Kristen Protestan" {{ ($value->agama == "Kristen Protestan") ? 'selected' : '' }}>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" {{ ($value->agama == "Kristen Katolik") ? 'selected' : '' }}>Kristen Katolik</option>
                                                        <option value="Hindu" {{ ($value->agama == "Hindu") ? 'selected' : '' }}>Hindu</option>
                                                        <option value="Buddha" {{ ($value->agama == "Buddha") ? 'selected' : '' }}>Buddha</option>
                                                        <option value="Konghucu" {{ ($value->agama == "Konghucu") ? 'selected' : '' }}>Konghucu</option>
                                                        <option value="Lainnya" {{ ($value->agama == "Lainnya") ? 'selected' : '' }}>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h5 class="modal-title mt-2 mb-3"><strong>Data Ayah</strong></h5>
                                            <div class="row mb-3">
                                                <label for="nama_ayah3" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah3" value="{{ $value->nama_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik_ayah3" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nik_ayah" class="form-control" id="nik_ayah3" value="{{ $value->nik_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tempat_lahir_ayah3" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tempat_lahir_ayah3" name="tempat_lahir_ayah" value="{{ $value->tempat_lahir_ayah }}" required>
                                                </div>
                                                <label for="tanggal_lahir_ayah3" class="col-sm-1 col-form-label text-center">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ayah3" name="tanggal_lahir_ayah" value="{{ $value->tanggal_lahir_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama_ayah3" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama_ayah3" name="agama_ayah" class="form-select" required>
                                                        <option value="">Pilih Agama ...</option>
                                                        <option value="Islam" {{ ($value->agama_ayah == "Islam") ? 'selected' : '' }}>Islam</option>
                                                        <option value="Kristen Protestan" {{ ($value->agama_ayah == "Kristen Protestan") ? 'selected' : '' }}>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" {{ ($value->agama_ayah == "Kristen Katolik") ? 'selected' : '' }}>Kristen Katolik</option>
                                                        <option value="Hindu" {{ ($value->agama_ayah == "Hindu") ? 'selected' : '' }}>Hindu</option>
                                                        <option value="Buddha" {{ ($value->agama_ayah == "Buddha") ? 'selected' : '' }}>Buddha</option>
                                                        <option value="Konghucu" {{ ($value->agama_ayah == "Konghucu") ? 'selected' : '' }}>Konghucu</option>
                                                        <option value="Lainnya" {{ ($value->agama_ayah == "Lainnya") ? 'selected' : '' }}>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pekerjaan_ayah3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah3" value="{{ $value->pekerjaan_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat_ayah3" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_ayah" class="form-control" id="alamat_ayah3" value="{{ $value->alamat_ayah }}" required>
                                                </div>
                                            </div>
                                            <h5 class="modal-title mt-2 mb-3"><strong>Data Ibu</strong></h5>
                                            <div class="row mb-3">
                                                <label for="nama_ibu3" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu3" value="{{ $value->nama_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik_ibu3" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nik_ibu" class="form-control" id="nik_ibu3" value="{{ $value->nik_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tempat_lahir_ibu3" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tempat_lahir_ibu3" name="tempat_lahir_ibu" value="{{ $value->tempat_lahir_ibu }}" required>
                                                </div>
                                                <label for="tanggal_lahir_ibu3" class="col-sm-1 col-form-label text-center">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ibu3" name="tanggal_lahir_ibu" value="{{ $value->tanggal_lahir_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama_ibu3" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama_ibu3" name="agama_ibu" class="form-select" required>
                                                        <option value="" {{ ($value->agama_ibu == "") ? 'selected' : '' }}>Pilih Agama ...</option>
                                                        <option value="Islam" {{ ($value->agama_ibu == "Islam") ? 'selected' : '' }}>Islam</option>
                                                        <option value="Kristen Protestan" {{ ($value->agama_ibu == "Kristen Protestan") ? 'selected' : '' }}>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" {{ ($value->agama_ibu == "Kristen Katolik") ? 'selected' : '' }}>Kristen Katolik</option>
                                                        <option value="Hindu" {{ ($value->agama_ibu == "Hindu") ? 'selected' : '' }}>Hindu</option>
                                                        <option value="Buddha" {{ ($value->agama_ibu == "Buddha") ? 'selected' : '' }}>Buddha</option>
                                                        <option value="Konghucu" {{ ($value->agama_ibu == "Konghucu") ? 'selected' : '' }}>Konghucu</option>
                                                        <option value="Lainnya" {{ ($value->agama_ibu == "Lainnya") ? 'selected' : '' }}>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pekerjaan_ibu3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu3" value="{{ $value->pekerjaan_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat_ibu3" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_ibu" class="form-control" id="alamat_ibu3" value="{{ $value->alamat_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                                <div class="col-sm-9">
                                                    <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                        <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                        @foreach($pejabat as $jabat)
                                                        <option value="{{ $value->tandatangan[0]->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($value->tandatangan[0]->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                            </div>
                                            <div class="row mb-3">
                                                @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                <div class="col-md-4 mb-3">
                                                    <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                        <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                        @foreach($pejabat as $jabat)
                                                        <option value="{{ $verifikasi->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($verifikasi->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endforeach
                                                @if(count($value->MengetahuiVerifikasiSurat) < 3) @foreach(range(1, 3 - count($value->MengetahuiVerifikasiSurat)) as $index)
                                                    <div class="col-md-4 mb-3">
                                                        <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                            <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                            @foreach($pejabat as $jabat)
                                                            <option value="{{ '-/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}">{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endcan

                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>

    </div>
    </div>
</section>
@endsection
