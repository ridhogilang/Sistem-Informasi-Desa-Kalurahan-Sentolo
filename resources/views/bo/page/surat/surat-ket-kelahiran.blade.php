@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Kelahiran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Surat Keluar</li>
                <li class="breadcrumb-item active">Keterangan Kelahiran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan Kelahiran</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kkelahiran"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                        <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-kkelahiran/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>

                        <!-- Modal Form 1 Orang -->
                        <div class="modal fade" id="kkelahiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kkelahiran-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="kkelahiran-Label">Data Surat Keterangan Kelahiran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="" method="POST">
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
                                                <label for="status_hubungan" class="col-sm-3 col-form-label">Status Hubungan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="status_hubungan" class="form-control" id="status_hubungan" value="{{ old('status_hubungan') }}" required>
                                                </div>
                                            </div>
                                                <div class="row mb-3">
                                                    <label for="kalurahan" class="col-sm-3 col-form-label">Kelurahan</label>
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
                                                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" value="{{ old('kecamatan') }}" required>
                                                </div>
                                            </div>
                                                <div class="row mb-3">
                                                    <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{ old('provinsi') }}" required>
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
                                                        <label for="anak_ke" class="col-sm-3 col-form-label">Anak ke</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="anak_ke" class="form-control" id="anak_ke" value="{{ old('anak_ke') }}" required>
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
                                                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                                        </div>
                                                    </div>
                                            <div class="row mb-3">
                                                <label for="nik_ayah" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nik_ayah" class="form-control" id="nik_ayah" value="{{ old('nik_ayah') }}" required>
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
                                            <div class="row mb-3">
                                                <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                                </div>
                                            </div>
                                    <div class="row mb-3">
                                        <label for="nik_ibu" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" value="{{ old('nik_ibu') }}" required>
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
                                            <select id="agama_ayah" name="agama_ibu" class="form-select" required>
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
                                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3" required>Surat Keterangan ini dibuat sebagai kelengkapan pengurusan surat perpindahan</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="jenis_surat" class="form-control" value="skl" >
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
                            <h5 class="card-title">Data Surat Keterangan Kelahiran</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Nama Ayah</th>
                                    <th scope="col">NIK Ayah</th>
                                    <th scope="col">Nama Ibu</th>
                                    <th scope="col">NIK Ibu</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
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
                                        <td>{{ $value->nama_ayah }}</td>
                                        <td>{{ $value->nik_ayah }}</td>
                                        <td>{{ $value->nama_ibu }}</td>
                                        <td>{{ $value->nik_ibu }}</td>
                                        <td>{{ $value->status_surat }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success" type="submit" target="blank" href="/admin/e-surat/surat-kkelahiran/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKL{{$value->id}}" href="/admin/e-surat/edit-surat-kkelahiran/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>

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
                                                            <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="status_hubungan" class="col-sm-3 col-form-label">Status Hubungan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama" class="form-control" id="status_hubungan" value="{{ old('status_hubungan') }}" required>
                                                            </div>
                                                        </div>
                                                            <div class="row mb-3">
                                                                <label for="kalurahan" class="col-sm-3 col-form-label">Kelurahan</label>
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
                                                                    <label for="anak_ke" class="col-sm-3 col-form-label">Anak ke</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="anak_ke" class="form-control" id="anak_ke" value="{{ old('anak_ke') }}" required>
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
                                                                    <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                                                    </div>
                                                                </div>
                                                        <div class="row mb-3">
                                                            <label for="nik_ayah" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nik_ayah" class="form-control" id="nik_ayah" value="{{ old('nik_ayah') }}" required>
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
                                                        <div class="row mb-3">
                                                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                                            </div>
                                                        </div>
                                                <div class="row mb-3">
                                                    <label for="nik_ibu" class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" value="{{ old('nik_ibu') }}" required>
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
                                                        <select id="agama_ayah" name="agama_ibu" class="form-select" required>
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
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_surat" class="form-control" value="{{$value->jenis_surat}}" >
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
