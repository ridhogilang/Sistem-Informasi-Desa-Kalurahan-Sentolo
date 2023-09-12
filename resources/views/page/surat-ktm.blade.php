@extends('layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Tidak Mampu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Keterangan Tidak Mampu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Jenis Surat Keterangan Tidak Mampu</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sktm-satu"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat 1 Orang</button>
                                <a class="btn btn-success btn-sm" type="submit" target="blank" href="/contoh-surat-ktm-satu/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat 1 Orang</a>
                            </div>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sktm-dua"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat 2 Orang</button>
                                <a class="btn btn-success btn-sm" type="submit" target="blank" href="/contoh-surat-ktm-dua/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat 2 Orang</a>
                            </div>
                        </div>

                        <!-- Modal Form 1 Orang -->
                        <div class="modal fade" id="sktm-satu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Data Surat Keterangan Tidak Mampu 1 Orang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/surat-ktm-satu" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="nik" class="form-control" id="nik" minlength="16" value="{{ old('nik') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                        <option value="" @if(old('jenis_kelamin') == '') selected @endif>Pilih Jenis Kelamin ...</option>
                                                        <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                                                        <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
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
                                                        <option value="" @if(old('agama') == '') selected @endif>Pilih Agama ...</option>
                                                        <option value="Islam" @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                                        <option value="Kristen Protestan" @if(old('agama') == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" @if(old('agama') == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                                        <option value="Hindu" @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                                        <option value="Buddha" @if(old('agama') == 'Buddha') selected @endif>Buddha</option>
                                                        <option value="Konghucu" @if(old('agama') == 'Konghucu') selected @endif>Konghucu</option>
                                                        <option value="Lainnya" @if(old('agama') == 'Lainnya') selected @endif>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="status_perkawinan" class="col-sm-3 col-form-label">Status Perkawinan</label>
                                                <div class="col-sm-9">
                                                    <select id="status_perkawinan" name="status_perkawinan" class="form-select" required>
                                                        <option value="" @if(old('status_perkawinan') == '') selected @endif>Pilih Status Perkawinan ...</option>
                                                        <option value="Belum Menikah" @if(old('status_perkawinan') == 'Belum Menikah') selected @endif>Belum Menikah</option>
                                                        <option value="Sudah Menikah" @if(old('status_perkawinan') == 'Sudah Menikah') selected @endif>Sudah Menikah</option>
                                                        <option value="Janda" @if(old('status_perkawinan') == 'Janda') selected @endif>Janda</option>
                                                        <option value="Duda" @if(old('status_perkawinan') == 'Duda') selected @endif>Duda</option>
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
                                                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3" required>Bahwa bersangkutan tersebut adalah benar dari keluarga kurang mampu.</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="jenis_sktm" class="form-control" value="sktm-satu-orang" >
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="status_surat" class="form-control" value="Pending" >
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

                        <!-- Modal Form 2 Orang -->
                        <div class="modal fade" id="sktm-dua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sktm-dua-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-dua-Label">Data Surat Keterangan Tidak Mampu 2 Orang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/surat-ktm-dua" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nomor_surat2" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_surat2" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                                </div>
                                            </div>
                                            <h5 class="modal-title mt-2 mb-3">Data Orang ke-1</h5>
                                            <div class="row mb-3">
                                                <label for="nama_satu" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control" id="nama_satu" value="{{ old('nama') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik_satu" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="nik" class="form-control" id="nik_satu" value="{{ old('nik') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tempat_lahir_satu" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tempat_lahir_satu" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                                </div>
                                                <label for="tanggal_lahir_satu" class="col-sm-1 col-form-label text-center">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal_lahir_satu" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama" name="agama" class="form-select" required>
                                                        <option value="" @if(old('agama') == '') selected @endif>Pilih Agama ...</option>
                                                        <option value="Islam" @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                                        <option value="Kristen Protestan" @if(old('agama') == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" @if(old('agama') == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                                        <option value="Hindu" @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                                        <option value="Buddha" @if(old('agama') == 'Buddha') selected @endif>Buddha</option>
                                                        <option value="Konghucu" @if(old('agama') == 'Konghucu') selected @endif>Konghucu</option>
                                                        <option value="Lainnya" @if(old('agama') == 'Lainnya') selected @endif>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pekerjaan_satu" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan_satu" value="{{ old('pekerjaan') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat_satu" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat" class="form-control" id="alamat_satu" value="{{ old('alamat') }}" required >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="hubungan" class="col-sm-3 col-form-label">Hubungan</label>
                                                <div class="col-sm-9">
                                                    <select id="hubungan" name="hubungan" class="form-select" required>
                                                        <option value="" @if(old('hubungan') == '') selected @endif>Pilih Hubungan ...</option>
                                                        <option value="Orang Tua / Wali" @if(old('hubungan') == 'Orang Tua / Wali') selected @endif>Orang Tua / Wali</option>
                                                        <option value="Suami" @if(old('hubungan') == 'Suami') selected @endif>Suami</option>
                                                        <option value="Istri" @if(old('hubungan') == 'Istri') selected @endif>Istri</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h5 class="modal-title mt-2 mb-3">Data Orang ke-2</h5>
                                            <div class="row mb-3">
                                                <label for="nama_dua" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_dua" class="form-control" id="nama_dua" value="{{ old('nama_dua') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik_dua" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nik_dua" class="form-control" id="nik_dua" value="{{ old('nik_dua') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tempat_lahir_dua" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tempat_lahir_dua" name="tempat_lahir_dua" value="{{ old('tempat_lahir_dua') }}" required>
                                                </div>
                                                <label for="tanggal_lahir_dua" class="col-sm-1 col-form-label text-center">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal_lahir_dua" name="tanggal_lahir_dua" value="{{ old('tanggal_lahir_dua') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama_dua" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama_dua" name="agama_dua" class="form-select" required>
                                                        <option value="" @if(old('agama_dua') == '') selected @endif>Pilih Agama ...</option>
                                                        <option value="Islam" @if(old('agama_dua') == 'Islam') selected @endif>Islam</option>
                                                        <option value="Kristen Protestan" @if(old('agama_dua') == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" @if(old('agama_dua') == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                                        <option value="Hindu" @if(old('agama_dua') == 'Hindu') selected @endif>Hindu</option>
                                                        <option value="Buddha" @if(old('agama_dua') == 'Buddha') selected @endif>Buddha</option>
                                                        <option value="Konghucu" @if(old('agama_dua') == 'Konghucu') selected @endif>Konghucu</option>
                                                        <option value="Lainnya" @if(old('agama_dua') == 'Lainnya') selected @endif>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pekerjaan_dua" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pekerjaan_dua" class="form-control" id="pekerjaan_dua" value="{{ old('pekerjaan_dua') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat_dua" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_dua" class="form-control" id="alamat_dua" value="{{ old('alamat_dua') }}" required >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deskripsi2" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" name="deskripsi" class="form-control" id="deskripsi2" rows="3" required>Bahwa bersangkutan tersebut adalah benar dari keluarga kurang mampu.</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="jenis_sktm" class="form-control" value="sktm-dua-orang" >
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="status_surat" class="form-control" value="Pending" >
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
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Surat Keterangan Tidak Mampu</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($sktm as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nomor_surat }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->status_surat }}</td>
                                        <td class="text-center">
                                            @if ($value->jenis_sktm == 'sktm-satu-orang')
                                                <a class="btn btn-success" type="submit" target="blank" href="/surat-ktm-satu/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKTM-Satu-{{$value->id}}" href="/surat-ktm-satu/{{$value->id}}/editSatu"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @else
                                                <a class="btn btn-success" type="submit" target="blank" href="/surat-ktm-dua/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKTM-Dua-{{$value->id}}" href="/surat-ktm-dua/{{$value->id}}/editDua"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Modal Edit SKTM Satu Orang -->
                                    <div class="modal fade" id="Modal-Edit-SKTM-Satu-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SKTM-Satu-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="/surat-ktm-satu/{{$value->id}}" method="POST" >
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Edit Data Surat Keterangan Tidak Mampu 1 Orang {{$value->nomor_surat}}</h1>
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
                                                            <label for="nama3" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama" class="form-control" id="nama3" value="{{$value->nama}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nik3" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" min="16" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jenis_kelamin3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                            <div class="col-sm-9">
                                                                <select id="jenis_kelamin3" name="jenis_kelamin" class="form-select" required>
                                                                    <option value="" >Pilih Jenis Kelamin ...</option>
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
                                                        <div class="row mb-3">
                                                            <label for="status_perkawinan3" class="col-sm-3 col-form-label">Status Perkawinan</label>
                                                            <div class="col-sm-9">
                                                                <select id="status_perkawinan3" name="status_perkawinan" class="form-select" required>
                                                                    <option value="">Pilih Status Perkawinan ...</option>
                                                                    <option value="Belum Menikah" {{ ($value->status_perkawinan == "Belum Menikah") ? 'selected' : '' }}>Belum Menikah</option>
                                                                    <option value="Sudah Menikah" {{ ($value->status_perkawinan == "Sudah Menikah") ? 'selected' : '' }}>Sudah Menikah</option>
                                                                    <option value="Janda" {{ ($value->status_perkawinan == "Janda") ? 'selected' : '' }}>Janda</option>
                                                                    <option value="Duda" {{ ($value->status_perkawinan == "Duda") ? 'selected' : '' }}>Duda</option>
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
                                                        <div class="row">
                                                            <label for="deskripsi3" class="col-sm-3 col-form-label">Deskripsi</label>
                                                            <div class="col-sm-9">
                                                                <textarea type="text" name="deskripsi" class="form-control" id="deskripsi3" rows="3" required>{{$value->deskripsi}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_sktm" class="form-control" value="{{$value->jenis_sktm}}" >
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="status_surat" class="form-control" value="{{$value->status_surat}}" >
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

                                    <!-- Modal Edit SKTM Dua Orang -->
                                    <div class="modal fade" id="Modal-Edit-SKTM-Dua-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SKTM-Dua-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="/surat-ktm-dua/{{$value->id}}" method="POST" >
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Dua-Label">Edit Data Surat Keterangan Tidak Mampu 2 Orang {{$value->nomor_surat}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="nomor_surat5" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nomor_surat5" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                            </div>
                                                        </div>
                                                        <h5 class="modal-title mt-2 mb-3">Data Orang ke-1</h5>
                                                        <div class="row mb-3">
                                                            <label for="nama4" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama" class="form-control" id="nama4" value="{{$value->nama}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nik4" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nik" class="form-control" id="nik4" value="{{$value->nik}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tempat_lahir4" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="tempat_lahir4" name="tempat_lahir" value="{{$value->tempat_lahir}}" required>
                                                            </div>
                                                            <label for="tanggal_lahir4" class="col-sm-1 col-form-label text-center">/</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" id="tanggal_lahir4" name="tanggal_lahir" value="{{$value->tanggal_lahir}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="agama4" class="col-sm-3 col-form-label">Agama</label>
                                                            <div class="col-sm-9">
                                                                <select id="agama4" name="agama" class="form-select" required>
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
                                                        <div class="row mb-3">
                                                            <label for="pekerjaan4" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan4" value="{{$value->pekerjaan}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="alamat4" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" class="form-control" id="alamat4" value="{{$value->alamat}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="hubungan4" class="col-sm-3 col-form-label">Hubungan</label>
                                                            <div class="col-sm-9">
                                                                <select id="hubungan4" name="hubungan" class="form-select" required>
                                                                    <option value="">Pilih Status Perkawinan ...</option>
                                                                    <option value="Orang Tua / Wali" {{ ($value->hubungan == "Orang Tua / Wali") ? 'selected' : '' }}>Orang Tua / Wali</option>
                                                                    <option value="Suami" {{ ($value->hubungan == "Suami") ? 'selected' : '' }}>Suami</option>
                                                                    <option value="Istri" {{ ($value->hubungan == "Istri") ? 'selected' : '' }}>Istri</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <h5 class="modal-title mt-2 mb-3">Data Orang ke-2</h5>
                                                        <div class="row mb-3">
                                                            <label for="nama_dua4" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama_dua" class="form-control" id="nama_dua4" value="{{$value->nama_dua}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nik_dua4" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nik_dua" class="form-control" id="nik_dua4" value="{{$value->nik_dua}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tempat_lahir_dua4" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="tempat_lahir_dua4" name="tempat_lahir_dua" value="{{$value->tempat_lahir_dua}}" required>
                                                            </div>
                                                            <label for="tanggal_lahir_dua4" class="col-sm-1 col-form-label text-center">/</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" id="tanggal_lahir_dua4" name="tanggal_lahir_dua" value="{{$value->tanggal_lahir_dua}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="agama_dua4" class="col-sm-3 col-form-label">Agama</label>
                                                            <div class="col-sm-9">
                                                                <select id="agama_dua4" name="agama_dua" class="form-select" required>
                                                                    <option value="">Pilih Agama ...</option>
                                                                    <option value="Islam" {{ ($value->agama_dua == "Islam") ? 'selected' : '' }}>Islam</option>
                                                                    <option value="Kristen Protestan" {{ ($value->agama_dua == "Kristen Protestan") ? 'selected' : '' }}>Kristen Protestan</option>
                                                                    <option value="Kristen Katolik" {{ ($value->agama_dua == "Kristen Katolik") ? 'selected' : '' }}>Kristen Katolik</option>
                                                                    <option value="Hindu" {{ ($value->agama_dua == "Hindu") ? 'selected' : '' }}>Hindu</option>
                                                                    <option value="Buddha" {{ ($value->agama_dua == "Buddha") ? 'selected' : '' }}>Buddha</option>
                                                                    <option value="Konghucu" {{ ($value->agama_dua == "Konghucu") ? 'selected' : '' }}>Konghucu</option>
                                                                    <option value="Lainnya" {{ ($value->agama_dua == "Lainnya") ? 'selected' : '' }}>Lainnya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="pekerjaan_dua4" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="pekerjaan_dua" class="form-control" id="pekerjaan_dua4" value="{{$value->pekerjaan_dua}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="alamat_dua4" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat_dua" class="form-control" id="alamat_dua4" value="{{$value->alamat_dua}}" required >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="deskripsi4" class="col-sm-3 col-form-label">Deskripsi</label>
                                                            <div class="col-sm-9">
                                                                <textarea type="text" name="deskripsi" class="form-control" id="deskripsi4" rows="3" required>{{$value->deskripsi}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_sktm" class="form-control" value="{{$value->jenis_sktm}}" >
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="status_surat" class="form-control" value="{{$value->status_surat}}" >
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
