@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Pengantar Kependudukan </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Surat Keluar</li>
                <li class="breadcrumb-item active">Pengantar Kependudukan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengantar Kependudukan</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#spk"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                        <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-pk/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>

                        <!-- Modal Form SPBM -->
                        <div class="modal fade" id="spk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="spk-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambah-spbm-Label">Data Surat Pengantar Kependudukan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/e-surat/surat-pk" method="POST">
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
                                                    <input type="text" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
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
                                                <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                <div class="col-sm-9">
                                                    <select id="kewarganegaraan" name="kewarganegaraan" class="form-select" required>
                                                        <option value="" @if(old('kewarganegaraan') == '') selected @endif>Pilih Kewarganegaraan ...</option>
                                                        <option value="Indonesia" @if(old('kewarganegaraan') == 'Indonesia') selected @endif>Indonesia</option>
                                                        <option value="Asing" @if(old('kewarganegaraan') == 'Asing') selected @endif>Asing</option>
                                                    </select>
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
                                                        <option value="Duda" @if(old('status_perkawinan') == 'Duda') selected @endif>Duda</option>
                                                        <option value="Janda" @if(old('status_perkawinan') == 'Janda') selected @endif>Janda</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanggal_awal" class="col-sm-3 col-form-label">tanggal_awal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" value="{{ old('tanggal_awal') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanggal_akhir" class="col-sm-3 col-form-label">tanggal_akhir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="jenis_pk" class="form-control" value="spk">
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="status_surat" class="form-control" value="Pending">
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
                            <h5 class="card-title">Data Surat Pengantar Kependudukan</h5>
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
                                @foreach ($spk as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nomor_surat }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->status_surat }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success" type="submit" target="blank" href="/admin/e-surat/surat-pk/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SPK{{$value->id}}" href="/admin/e-surat/edit-surat-pk/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            {{-- <a class="btn btn-danger" type="submit" href="/admin/e-surat/surat-kbm/{{$value->id}}/delete"><i class="fa-regular fa-trash-can"></i></a> --}}
                                        </td>
                                    </tr>

                                    <!-- Modal Edit SPBM-->
                                    <div class="modal fade" id="Modal-Edit-SPK{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SPK" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="/admin/e-surat/surat-pk/{{$value->id}}/edit" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SPK-Satu-Label">Edit Data Surat Pengantar Kependudukan {{$value->nomor_surat}}</h1>
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
                                                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" required>
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
                                                            <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                            <div class="col-sm-9">
                                                                <select id="kewarganegaraan" name="kewarganegaraan" class="form-select" required>
                                                                    <option value="" >Pilih Kewarganegaraan ...</option>
                                                                    <option value="Indonesia" {{ ($value->kewarganegaraan == "Indonesia") ? 'selected' : '' }}>Indonesia</option>
                                                                    <option value="Asing" {{ ($value->kewarganegaraan == "Asing") ? 'selected' : '' }}>Asing</option>
                                                                </select>
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
                                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$value->alamat}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tanggal_awal" class="col-sm-3 col-form-label">tanggal_awal</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" value="{{$value->tanggal_awal}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tanggal_akhir" class="col-sm-3 col-form-label">tanggal_akhir</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" value="{{$value->tanggal_akhir}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_pk" class="form-control" value="{{$value->jenis_pk}}" >
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