@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script>
        // Mendapatkan elemen input NIK
        var nikInput = document.getElementById('nik');

        // Menambahkan event listener ketika nilai input NIK berubah
        nikInput.addEventListener('input', function() {
            var nik = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nik, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Daftar elemen form yang ingin Anda isi
                    var formElements = ['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'umur', 'status_perkawinan', 'pendidikan', 'pekerjaan', 'status_hubungan_kel', 'nama_ibu', 'nama_ayah', 'alamat', 'rt', 'rw', 'nomor_kk'];

                    // Loop melalui elemen form dan isi nilainya jika ada dalam data
                    formElements.forEach(function(element) {
                        if (document.getElementById(element)) {
                            document.getElementById(element).value = data[element] || '';
                        }
                    });
                } else {
                    // Handle jika NIK tidak ditemukan
                    formElements.forEach(function(element) {
                        if (document.getElementById(element)) {
                            document.getElementById(element).value = '';
                        }
                    });
                }
            };

            xhr.send();
        });
    </script>
@endpush

@section('content')
<div class="pagetitle">
    <h1>Surat Keterangan Belum Menikah</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
            <li class="breadcrumb-item">Surat Keluar</li>
            <li class="breadcrumb-item active">Keterangan Belum Menikah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">
            @canany(['input surat', 'lihat contoh surat'])
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Keterangan Belum Menikah</h5>
                    @can('input surat')
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#skbm"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                    @endcan
                    @can('lihat contoh surat')
                    <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-kbm/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>
                    @endcan
                    @can('input surat')
                    <!-- Modal Form 1 Orang -->
                    <div class="modal fade" id="skbm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="skbm-Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambah-skbm-Label">Data Surat Keterangan Belum Menikah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row" action="/admin/e-surat/surat-kbm" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Jenis Kelamin ...</option>
                                                    <option value="LAKI LAKI" @if(old('jenis_kelamin')=='LAKI LAKI' ) selected @endif>LAKI LAKI</option>
                                                    <option value="PEREMPUAN" @if(old('jenis_kelamin')=='PEREMPUAN' ) selected @endif>PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                            </div>
                                            <label for="tanggal_lahir" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agama" name="agama" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Agama ...</option>
                                                    <option value="ISLAM" @if(old('agama')=='ISLAM' ) selected @endif>ISLAM</option>
                                                    <option value="KRISTEN" @if(old('agama')=='KRISTEN' ) selected @endif>KRISTEN</option>
                                                    <option value="KATHOLIK" @if(old('agama')=='KATHOLIK' ) selected @endif>KATHOLIK</option>
                                                    <option value="HINDU" @if(old('agama')=='HINDU' ) selected @endif>HINDU</option>
                                                    <option value="BUDDHA" @if(old('agama')=='BUDDHA' ) selected @endif>BUDDHA</option>
                                                    <option value="KONGHUCU" @if(old('agama')=='KONGHUCU' ) selected @endif>KONGHUCU</option>
                                                    <option value="LAINNYA" @if(old('agama')=='LAINNYA' ) selected @endif>LAINNYA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3" required>Belum Pernah Menikah</textarea>
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
                                            <label for="agama" class="col col-form-label">Pejabat Yang mengetahui</label>
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
                        <h5 class="card-title">Data Surat Keterangan Belum Menikah</h5>
                    </div>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover datatable responsive-table w-100">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
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
                            @foreach ($skbm as $value)
                            <tr>
                                <th scope="row">{{ $no++ }}.</th>
                                <td>{{ $value->nomor_surat }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->nik }}</td>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Status Surat Keterangan Belum Menikah {{$value->nomor_surat}}</h5> <div class="mx-3">{!! $badge_status[$value->status_surat] !!}</div>
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
                                    <a class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-secondary' }}" type="submit" target="blank" href="/admin/e-surat/surat-kbm/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                    @endcan
                                    @can('edit surat')
                                    <!-- Button trigger modal -->
                                    <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKBM{{$value->id}}" href="/admin/e-surat/edit-surat-kbm/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Status Surat Keterangan Belum Menikah {{$value->nomor_surat}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <p>Apakah Anda yakin untuk mengarsipkan surat dengan nomor {{$value->nomor_surat}}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/admin/e-surat/surat-kbm/{{$value->id}}/{{$value->status_surat}}" method="POST">
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
                            <!-- Modal Edit SKBM-->
                            <div class="modal fade" id="Modal-Edit-SKBM{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SKBM" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="/admin/e-surat/surat-kbm/{{$value->id}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Edit Data Surat Keterangan Belum Menikah {{$value->nomor_surat}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="nomor_surat3" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nomor_surat3" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik3" class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nama3" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama" class="form-control" id="nama3" value="{{$value->nama}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jenis_kelamin3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_kelamin3" name="jenis_kelamin" class="form-select" required>
                                                            <option value="" disabled selected>Pilih Jenis Kelamin ...</option>
                                                            <option value="Laki-laki" {{ ($value->jenis_kelamin == "Laki-laki") ? 'selected' : '' }}>Laki-laki</option>
                                                            <option value="Perempuan" {{ ($value->jenis_kelamin == "Perempuan") ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tempat_lahir3" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="tempat_lahir3" name="tempat_lahir" value="{{$value->tempat_lahir}}" required>
                                                    </div>
                                                    <label for="tanggal_lahir3" class="col-sm-1 col-form-label text-center">/</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" id="tanggal_lahir3" name="tanggal_lahir" value="{{$value->tanggal_lahir}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="agama3" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <select id="agama3" name="agama" class="form-select" required>
                                                            <option value="" disabled selected>Pilih Agama ...</option>
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
                                                <div class="row mb-3">
                                                    <label for="pekerjaan3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan3" value="{{$value->pekerjaan}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="alamat3" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamat" class="form-control" id="alamat3" value="{{$value->alamat}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="deskripsi3" class="col-sm-3 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="deskripsi" class="form-control" id="deskripsi3" rows="3" required>{{$value->deskripsi}}</textarea>
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
                                                    <label for="agama" class="col col-form-label">Pejabat Yang mengetahui</label>
                                                </div>
                                                <div class="row ">
                                                    @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                    <div class="col-md-4 ">
                                                        <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                            <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                            @foreach($pejabat as $jabat)
                                                            <option value="{{ $verifikasi->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($verifikasi->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endforeach
                                                    @if(count($value->MengetahuiVerifikasiSurat) < 3) @foreach(range(1, 3 - count($value->MengetahuiVerifikasiSurat)) as $index)
                                                        <div class="col-md-4 ">
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

@push('footer')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Memuat JavaScript Select2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        // Menginisialisasi Select2 pada elemen dengan kelas 'select2'
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script> -->
@endpush
