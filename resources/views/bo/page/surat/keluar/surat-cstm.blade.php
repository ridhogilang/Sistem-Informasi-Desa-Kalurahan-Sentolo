@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Surat Custom </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Surat Keluar</li>
                <li class="breadcrumb-item active">Custom</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Surat Custom</h5>
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#scstm"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat
                            Surat</button>

                        <a class="btn btn-success btn-sm" type="submit" target="blank"
                            href="/admin/e-surat/contoh-surat-cstm/view"><i class="fa-solid fa-print"
                                style="margin-right: 5px"></i>Contoh Surat</a>

                        <!-- Modal Form SCSTM -->
                        <div class="modal fade" id="scstm" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="scstm-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambah-scstm-Label">Data Surat Custom</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/e-surat/surat-scstm" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_surat"
                                                        name="nomor_surat" value="{{ $TemplateNoSurat }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judulsurat" class="col-sm-3 col-form-label">Judul Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judulsurat" class="form-control"
                                                        id="judulsurat" value="{{ old('judulsurat') }}">
                                                </div>
                                            </div>
                                            {{-- Form Aktif Tanggal Surat Dibuat --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox1">Tanggal Surat</label>
                                                    <input type="checkbox" id="checkbox1">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanggalsurat" id="label-tanggalsurat" class="col-sm-3 col-form-label"
                                                    style="display: none">Tanggal Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tanggalsurat" class="form-control"
                                                        id="tanggalsurat" value="{{ old('tanggalsurat') }}" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            <h5 class="modal-title mt-2 mb-3"><strong>Penerima Surat</strong></h5>
                                            {{-- Form Aktif Nama Penerima --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox2">Penerima Surat</label>
                                                    <input type="checkbox" id="checkbox2">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="penerimasurat" id="label-penerimasurat"
                                                    class="col-sm-3 col-form-label" style="display: none">Penerima
                                                    Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="penerimasurat" class="form-control"
                                                        id="penerimasurat" rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Jabatan Penerima --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox3">Jabatan Penerima</label>
                                                    <input type="checkbox" id="checkbox3">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jabatanpenerima" id="label-jabatanpenerima"
                                                    class="col-sm-3 col-form-label" style="display: none">Jabatan
                                                    Penerima</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="jabatanpenerima" class="form-control"
                                                        id="jabatanpenerima" rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Alamat Penerima --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox">Alamat Penerima</label>
                                                    <input type="checkbox" id="checkbox4">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamatpenerima" id="label-alamatpenerima"
                                                    class="col-sm-3 col-form-label" style="display: none">Penerima
                                                    Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamatpenerima" class="form-control"
                                                        id="alamatpenerima" rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Kota Penerima --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox5">Kota Penerima</label>
                                                    <input type="checkbox" id="checkbox5">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kotapenerima" id="label-kotapenerima"
                                                    class="col-sm-3 col-form-label" style="display: none">Kota
                                                    Penerima</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kotapenerima" class="form-control"
                                                        id="kotapenerima" rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            <h5 class="modal-title mt-2 mb-3"><strong>Salam Pembuka</strong></h5>
                                            {{-- Form Aktif Salam Pembuka --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox6">Salam Pembuka</label>
                                                    <input type="checkbox" id="checkbox6">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="salampembuka" id="label-salampembuka"
                                                    class="col-sm-3 col-form-label" style="display: none">Salam
                                                    Pembuka</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="salampembuka" class="form-control"
                                                        id="salampembuka" rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            <h5 class="modal-title mt-2 mb-3"><strong> Isi Surat</strong></h5>
                                            {{-- Form Aktif Paragraf Pembuka --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox7">Paragraf Pembuka</label>
                                                    <input type="checkbox" id="checkbox7">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="paragrafpembuka" id="label-paragrafpembuka"
                                                    class="col-sm-3 col-form-label" style="display: none">Paragraf
                                                    Pembuka</label>
                                                <div class="col-sm-9">
                                                    <textarea name="paragrafpembuka" class="form-control" id="paragrafpembuka" rows="3" style="display: none"></textarea>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif ISI Surat 1 --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox8">Paragraf 1</label>
                                                    <input type="checkbox" id="checkbox8">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-paragraf1" for="paragraf1"
                                                    class="col-sm-3 col-form-label" style="display: none">Paragraf
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <textarea name="paragraf1" class="form-control" id="paragraf1" rows="3" style="display: none"></textarea>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif ISI Surat 2 --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox9">Paragraf 2</label>
                                                    <input type="checkbox" id="checkbox9">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="paragraf2"
                                                    id="label-paragraf2"class="col-sm-3 col-form-label"
                                                    style="display: none">Paragraf 2</label>
                                                <div class="col-sm-9">
                                                    <textarea name="paragraf2" class="form-control" id="paragraf2" rows="3" style="display: none"></textarea>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Nama --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox10">Nama</label>
                                                    <input type="checkbox" id="checkbox10">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nama" id="label-nama"class="col-sm-3 col-form-label"
                                                    style="display: none">Nama</label>
                                                <div class="col-sm-9">
                                                    <input name="nama" class="form-control" id="nama"
                                                        rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif NIK --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox11">NIK</label>
                                                    <input type="checkbox" id="checkbox11">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik" id="label-nik" class="col-sm-3 col-form-label"
                                                    style="display: none">NIK</label>
                                                <div class="col-sm-9">
                                                    <input name="nik" class="form-control" id="nik"
                                                        rows="3" style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Jenis Kelamin --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox12">Jenis Kelamin</label>
                                                    <input type="checkbox" id="checkbox12">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jenis_kelamin" id="label-jenis_kelamin"
                                                    class="col-sm-3 col-form-label" style="display: none">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select"
                                                        style="display: none">
                                                        <option value=""
                                                            @if (old('jenis_kelamin') == '') selected @endif>Pilih Jenis
                                                            Kelamin ...</option>
                                                        <option value="Laki-laki"
                                                            @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Tempat ? Tanggal --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox13">Hari / Tanggal</label>
                                                    <input type="checkbox" id="checkbox13">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-hari" for="hari" class="col-sm-3 col-form-label"
                                                    style="display: none">Hari / Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="hari"
                                                        name="hari" value="{{ old('hari') }}" style="display: none">
                                                </div>
                                                <label id="label-tanggal" for="tanggal"
                                                    class="col-sm-1 col-form-label text-center"
                                                    style="display: none">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal"
                                                        name="tanggal" value="{{ old('tanggal') }}"
                                                        style="display: none">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Alamat --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox14">Alamat</label>
                                                    <input type="checkbox" id="checkbox14">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-alamat" for="alamat" class="col-sm-3 col-form-label"
                                                    style="display: none">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input name="alamat" class="form-control" id="alamat"
                                                        rows="3" style="display: none" value="{{ old('alamat') }}">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Agama --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox15">Agama</label>
                                                    <input type="checkbox" id="checkbox15">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-agama" for="agama" class="col-sm-3 col-form-label"
                                                    style="display: none">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama" name="agama" class="form-select"
                                                        style="display: none">
                                                        <option value=""
                                                            @if (old('agama') == '') selected @endif>
                                                            Pilih Agama
                                                            ...</option>
                                                        <option value="Islam"
                                                            @if (old('agama') == 'Islam') selected @endif>
                                                            Islam</option>
                                                        <option value="Kristen Protestan"
                                                            @if (old('agama') == 'Kristen Protestan') selected @endif>Kristen
                                                            Protestan</option>
                                                        <option value="Kristen Katolik"
                                                            @if (old('agama') == 'Kristen Katolik') selected @endif>Kristen
                                                            Katolik</option>
                                                        <option value="Hindu"
                                                            @if (old('agama') == 'Hindu') selected @endif>
                                                            Hindu</option>
                                                        <option value="Buddha"
                                                            @if (old('agama') == 'Buddha') selected @endif>
                                                            Buddha
                                                        </option>
                                                        <option value="Konghucu"
                                                            @if (old('agama') == 'Konghucu') selected @endif>
                                                            Konghucu
                                                        </option>
                                                        <option value="Lainnya"
                                                            @if (old('agama') == 'Lainnya') selected @endif>Lainnya
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Pekerjaan --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox16">Pekerjaan</label>
                                                    <input type="checkbox" id="checkbox16">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-pekerjaan" for="pekerjaan"
                                                    class="col-sm-3 col-form-label"
                                                    style="display: none">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input name="pekerjaan" class="form-control" id="pekerjaan"
                                                        rows="3" style="display: none"
                                                        value="{{ old('pekerjaan') }}">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Waktu --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox19">Waktu</label>
                                                    <input type="checkbox" id="checkbox19">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-waktu" for="waktu" class="col-sm-3 col-form-label"
                                                    style="display: none">Waktu</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="waktu" class="form-control"
                                                        id="waktu" rows="3" style="display: none"
                                                        value="{{ old('waktu') }}">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Acara --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox20">Acara</label>
                                                    <input type="checkbox" id="checkbox20">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-acara" for="acara" class="col-sm-3 col-form-label"
                                                    style="display: none">Acara</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="acara" class="form-control"
                                                        id="acara" rows="3" style="display: none"
                                                        value="{{ old('acara') }}">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            <h5 class="modal-title mt-2 mb-3"><strong>Paragraf Penutup</strong></h5>
                                            {{-- Form Aktif Paragraf Terakhir --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox17">Paragraf Penutup</label>
                                                    <input type="checkbox" id="checkbox17">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-paragrafpenutup" for="paragrafpenutup"
                                                    class="col-sm-3 col-form-label" style="display: none">Paragraf
                                                    Penutup</label>
                                                <div class="col-sm-9">
                                                    <textarea name="paragrafpenutup" class="form-control" id="paragrafpenutup" rows="3" style="display: none"></textarea>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            <h5 class="modal-title mt-2 mb-3"><strong>Kalimat Penutup</strong></h5>
                                            {{-- Form Aktif Kalimat Penutup --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox18">Kalimat Penutup</label>
                                                    <input type="checkbox" id="checkbox18">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-kalimatpenutup" for="kalimatpenutup"
                                                    class="col-sm-3 col-form-label" style="display: none">Kalimat
                                                    Penutup</label>
                                                <div class="col-sm-9">
                                                    <textarea name="kalimatpenutup" class="form-control" id="kalimatpenutup" rows="3" style="display: none"></textarea>
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                            {{-- Form Aktif Acara --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-9">
                                                    <label for="checkbox21">Nama TTD</label>
                                                    <input type="checkbox" id="checkbox21">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label id="label-namattd" for="namattd" class="col-sm-3 col-form-label"
                                                    style="display: none">Nama TTD</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="namattd" class="form-control"
                                                        id="namattd" rows="3" style="display: none"
                                                        value="{{ old('namattd') }}">
                                                </div>
                                            </div>
                                            {{-- Batas Bawah --}}
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="jenis_surat" class="form-control" value="scstm">
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="status_surat" class="form-control" value="Pending">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
                        <h5 class="card-title">Data Surat Custom</h5>
                    </div>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover datatable responsive-table w-100">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Judul Surat</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Status</th>
                                @canany(['edit surat', 'lihat surat'])
                                    <th scope="col" class="text-center">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($scstm as $value)
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{{ $value->nomor_surat }}</td>
                                    <td>{{ $value->judulsurat }}</td>
                                    <td>{{ $value->nik }}</td>
                                    <td>{{ $value->status_surat }}</td>

                                    <td class="text-center">

                                        <a class="btn btn-success" type="submit" target="blank"
                                            href="/admin/e-surat/surat-cstm/{{ $value->id }}/view"><i
                                                class="fa-solid fa-print"></i></a>


                                        <!-- Button trigger modal -->
                                        <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-SCSTM{{ $value->id }}"
                                            href="/admin/e-surat/edit-surat-cstm/{{ $value->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        {{-- <a class="btn btn-danger" type="submit" href="/admin/e-surat/surat-kbm/{{$value->id}}/delete"><i class="fa-regular fa-trash-can"></i></a> --}}
                                    </td>

                                </tr>

                                <!-- Modal Edit SPBM-->
                                <div class="modal fade" id="Modal-Edit-SCSTM{{ $value->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SCSTM"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form action="/admin/e-surat/surat-cstm/{{ $value->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="Modal-Edit-SPN">Edit Data Surat
                                                        Custom {{ $value->nomor_surat }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="row mb-3">
                                                        <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor
                                                            Surat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nomor_surat"
                                                                name="nomor_surat" value="{{ $value->nomor_surat }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="judulsurat" class="col-sm-3 col-form-label">Judul
                                                            Surat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="judulsurat" class="form-control"
                                                                id="judulsurat" value="{{ $value->judulsurat }}">
                                                        </div>
                                                    </div>
                                                    {{-- Form Aktif Tanggal Surat Dibuat --}}
                                                    <div class="row mb-3">
                                                        <label for="tanggalsurat" id="tanggalsurat"
                                                            class="col-sm-3 col-form-label">Tanggal
                                                            Surat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tanggalsurat" class="form-control"
                                                                id="tanggalsurat" value="{{ $value->tanggalsurat }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <h5 class="modal-title mt-2 mb-3"><strong>Penerima Surat</strong>
                                                    </h5>
                                                    {{-- Form Aktif Nama Penerima --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="penerimasurat" id="label-penerimasurat"
                                                            class="col-sm-3 col-form-label">Penerima
                                                            Surat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="penerimasurat"
                                                                class="form-control" id="penerimasurat" rows="3"
                                                                value="{{ $value->penerimasurat }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Jabatan Penerima --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label for="jabatanpenerima" id="jabatanpenerima"
                                                            class="col-sm-3 col-form-label">Jabatan
                                                            Penerima</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="jabatanpenerima"
                                                                class="form-control" id="jabatanpenerima" rows="3"
                                                                value="{{ $value->jabatanpenerima }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Alamat Penerima --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="alamatpenerima" id="alamatpenerima"
                                                            class="col-sm-3 col-form-label">Alamat Penerima
                                                            </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="alamatpenerima"
                                                                class="form-control" id="alamatpenerima" rows="3"
                                                                value="{{ $value->alamatpenerima }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Kota Penerima --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="kotapenerima" id="kotapenerima"
                                                            class="col-sm-3 col-form-label">Kota
                                                            Penerima</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="kotapenerima"
                                                                class="form-control" id="kotapenerima" rows="3"
                                                                value="{{ $value->kotapenerima }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <h5 class="modal-title mt-2 mb-3"><strong>Salam Pembuka</strong>
                                                    </h5>
                                                    {{-- Form Aktif Salam Pembuka --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label for="salampembuka" id="salampembuka"
                                                            class="col-sm-3 col-form-label">Salam
                                                            Pembuka</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="salampembuka"
                                                                class="form-control" id="salampembuka" rows="3"
                                                                value="{{ $value->salampembuka }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <h5 class="modal-title mt-2 mb-3"><strong> Isi Surat</strong></h5>
                                                    {{-- Form Aktif Paragraf Pembuka --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="paragrafpembuka" id="paragrafpembuka"
                                                            class="col-sm-3 col-form-label">Paragraf
                                                            Pembuka</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="paragrafpembuka" class="form-control" id="paragrafpembuka" rows="3">{{ $value->paragrafpembuka }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif ISI Surat 1 --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label id="paragraf1" for="paragraf1"
                                                            class="col-sm-3 col-form-label">Paragraf
                                                            1</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="paragraf1" class="form-control" id="paragraf1" rows="3">{{ $value->paragraf1 }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif ISI Surat 2 --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="paragraf2"
                                                            id="paragraf2"class="col-sm-3 col-form-label">Paragraf
                                                            2</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="paragraf2" class="form-control" id="paragraf2" rows="3">{{ $value->paragraf2 }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Nama --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="nama"
                                                            id="nama"class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input name="nama" class="form-control" id="nama"
                                                                rows="3" value="{{ $value->nama }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif NIK --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label for="nik" id="nik"
                                                            class="col-sm-3 col-form-label">NIK</label>
                                                        <div class="col-sm-9">
                                                            <input name="nik" class="form-control" id="nik"
                                                                rows="3" value="{{ $value->nik }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Jenis Kelamin --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label for="jenis_kelamin" id="jenis_kelamin"
                                                            class="col-sm-3 col-form-label">Jenis
                                                            Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <select id="jenis_kelamin" name="jenis_kelamin"
                                                                class="form-select">
                                                                <option value="">Pilih Jenis Kelamin ...</option>
                                                                <option value="Laki-laki"
                                                                    {{ $value->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    {{ $value->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Tempat ? Tanggal --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label id="hari" for="hari"
                                                            class="col-sm-3 col-form-label">Hari
                                                            / Tanggal</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="hari"
                                                                name="hari" value="{{ $value->hari }}">
                                                        </div>
                                                        <label id="tanggal" for="tanggal"
                                                            class="col-sm-1 col-form-label text-center">/</label>
                                                        <div class="col-sm-3">
                                                            <input type="date" class="form-control" id="tanggal"
                                                                name="tanggal" value="{{ $value->tanggal }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Alamat --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label id="alamat" for="alamat"
                                                            class="col-sm-3 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <input name="alamat" class="form-control" id="alamat"
                                                                rows="3" value="{{ $value->alamat }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Agama --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label id="agama" for="agama"
                                                            class="col-sm-3 col-form-label">Agama</label>
                                                        <div class="col-sm-9">
                                                            <select id="agama3" name="agama" class="form-select">
                                                                <option value="">Pilih Agama ...</option>
                                                                <option value="Islam"
                                                                    {{ $value->agama == 'Islam' ? 'selected' : '' }}>
                                                                    Islam</option>
                                                                <option value="Kristen Protestan"
                                                                    {{ $value->agama == 'Kristen Protestan' ? 'selected' : '' }}>
                                                                    Kristen Protestan</option>
                                                                <option value="Kristen Katolik"
                                                                    {{ $value->agama == 'Kristen Katolik' ? 'selected' : '' }}>
                                                                    Kristen Katolik</option>
                                                                <option value="Hindu"
                                                                    {{ $value->agama == 'Hindu' ? 'selected' : '' }}>
                                                                    Hindu</option>
                                                                <option value="Buddha"
                                                                    {{ $value->agama == 'Buddha' ? 'selected' : '' }}>
                                                                    Buddha</option>
                                                                <option value="Konghucu"
                                                                    {{ $value->agama == 'Konghucu' ? 'selected' : '' }}>
                                                                    Konghucu</option>
                                                                <option value="Lainnya"
                                                                    {{ $value->agama == 'Lainnya' ? 'selected' : '' }}>
                                                                    Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Pekerjaan --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label id="pekerjaan" for="pekerjaan"
                                                            class="col-sm-3 col-form-label">Pekerjaan</label>
                                                        <div class="col-sm-9">
                                                            <input name="pekerjaan" class="form-control" id="pekerjaan"
                                                                rows="3" value="{{ $value->pekerjaan }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Waktu --}}
                                                   
                                                    <div class="row mb-3">
                                                        <label id="waktu" for="waktu"
                                                            class="col-sm-3 col-form-label">Waktu</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="waktu" class="form-control"
                                                                id="waktu" rows="3"
                                                                value="{{ $value->waktu }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Acara --}}
        
                                                    <div class="row mb-3">
                                                        <label id="acara" for="acara"
                                                            class="col-sm-3 col-form-label">Acara</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="acara" class="form-control"
                                                                id="acara" rows="3"
                                                                value="{{ $value->acara }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <h5 class="modal-title mt-2 mb-3"><strong>Paragraf Penutup</strong>
                                                    </h5>
                                                    {{-- Form Aktif Paragraf Terakhir --}}
                                                    
                                                    <div class="row mb-3">
                                                        <label id="paragrafpenutup" for="paragrafpenutup"
                                                            class="col-sm-3 col-form-label">Paragraf
                                                            Penutup</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="paragrafpenutup" class="form-control" id="paragrafpenutup" rows="3">{{ $value->paragrafpenutup }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <h5 class="modal-title mt-2 mb-3"><strong>Kalimat Penutup</strong>
                                                    </h5>
                                                    {{-- Form Aktif Kalimat Penutup --}}
                                        
                                                    <div class="row mb-3">
                                                        <label id="kalimatpenutup" for="kalimatpenutup"
                                                            class="col-sm-3 col-form-label">Kalimat
                                                            Penutup</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="kalimatpenutup" class="form-control" id="kalimatpenutup" rows="3">{{ $value->kalimatpenutup }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    {{-- Form Aktif Acara --}}
                                                    <div class="row mb-3">
                                                        <label id="namattd" for="namattd"
                                                            class="col-sm-3 col-form-label">Nama TTD</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="namattd" class="form-control"
                                                                id="namattd" rows="3"
                                                                value="{{ $value->namattd }}">
                                                        </div>
                                                    </div>
                                                    {{-- Batas Bawah --}}
                                                    <div class="row">
                                                        <input type="hidden" name="jenis_surat" class="form-control" value="{{$value->jenis_surat}}" >
                                                    </div>
                                                    <div class="row">
                                                        <input type="hidden" name="status_surat" class="form-control" value="{{$value->status_surat}}" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
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

@push('footer')
    <script>
        //tgl surat
        var checkbox1 = document.getElementById('checkbox1');
        var textInput1 = document.getElementById('tanggalsurat');
        var label1 = document.getElementById('label-tanggalsurat'); // Perhatikan perubahan di sini

        checkbox1.addEventListener('change', function() { // Perhatikan perubahan di sini
            if (checkbox1.checked) {
                textInput1.style.display = "block";
                label1.style.display = "block";
            } else {
                textInput1.style.display = "none";
                label1.style.display = "none";
            }
        });
        //penerima surat
        var checkbox2 = document.getElementById('checkbox2');
        var textInput2 = document.getElementById('penerimasurat');
        var label2 = document.getElementById('label-penerimasurat');

        checkbox2.addEventListener('change', function() {
            if (checkbox2.checked) {
                textInput2.style.display = "block";
                label2.style.display = "block";

            } else {
                textInput2.style.display = "none";
                label2.style.display = "none";

            }
        });
        //jabaran penerima
        var checkbox3 = document.getElementById('checkbox3');
        var textInput131 = document.getElementById('jabatanpenerima');
        var label3 = document.getElementById('label-jabatanpenerima');

        checkbox3.addEventListener('change', function() {
            if (checkbox3.checked) {
                textInput131.style.display = "block";
                label3.style.display = "block";

            } else {
                textInput131.style.display = "none";
                label3.style.display = "none";

            }
        });
        //alamat penerima
        var checkbox4 = document.getElementById('checkbox4');
        var textInput3 = document.getElementById('alamatpenerima');
        var label4 = document.getElementById('label-alamatpenerima');

        checkbox4.addEventListener('change', function() {
            if (checkbox4.checked) {
                textInput3.style.display = "block";
                label4.style.display = "block";

            } else {
                textInput3.style.display = "none";
                label4.style.display = "none";

            }
        });
        //kota penerima
        var checkbox5 = document.getElementById('checkbox5');
        var textInput121 = document.getElementById('kotapenerima');
        var label5 = document.getElementById('label-kotapenerima');

        checkbox5.addEventListener('change', function() {
            if (checkbox5.checked) {
                textInput121.style.display = "block";
                label5.style.display = "block";

            } else {
                textInput121.style.display = "none";
                label5.style.display = "none";

            }
        });
        //salam pembuka
        var checkbox6 = document.getElementById('checkbox6');
        var textInput4 = document.getElementById('salampembuka');
        var label6 = document.getElementById('label-salampembuka');

        checkbox6.addEventListener('change', function() {
            if (checkbox6.checked) {
                textInput4.style.display = "block";
                label6.style.display = "block";

            } else {
                textInput4.style.display = "none";
                label6.style.display = "none";

            }
        });
        //paragraf pembuka
        var checkbox7 = document.getElementById('checkbox7');
        var textarea3 = document.getElementById('paragrafpembuka');
        var label7 = document.getElementById('label-paragrafpembuka');

        checkbox7.addEventListener('change', function() {
            if (checkbox7.checked) {
                textarea3.style.display = "block";
                label7.style.display = "block";

            } else {
                textarea3.style.display = "none";
                label7.style.display = "none";

            }
        });
        //paragraf1
        var checkbox8 = document.getElementById('checkbox8');
        var textarea4 = document.getElementById('paragraf1');
        var label8 = document.getElementById('label-paragraf1');

        checkbox8.addEventListener('change', function() {
            if (checkbox8.checked) {
                textarea4.style.display = "block";
                label8.style.display = "block";

            } else {
                textarea4.style.display = "none";
                label8.style.display = "none";

            }
        });
        //paragraf2
        var checkbox9 = document.getElementById('checkbox9');
        var textarea5 = document.getElementById('paragraf2');
        var label9 = document.getElementById('label-paragraf2');

        checkbox9.addEventListener('change', function() {
            if (checkbox9.checked) {
                textarea5.style.display = "block";
                label9.style.display = "block";

            } else {
                textarea5.style.display = "none";
                label9.style.display = "none";

            }
        });
        //nama
        var checkbox10 = document.getElementById('checkbox10');
        var textInput5 = document.getElementById('nama');
        var label10 = document.getElementById('label-nama');

        checkbox10.addEventListener('change', function() {
            if (checkbox10.checked) {
                textInput5.style.display = "block";
                label10.style.display = "block";

            } else {
                textInput5.style.display = "none";
                label10.style.display = "none";

            }
        });
        //nik
        var checkbox11 = document.getElementById('checkbox11');
        var textInput14 = document.getElementById('nik');
        var label11 = document.getElementById('label-nik');

        checkbox11.addEventListener('change', function() {
            if (checkbox11.checked) {
                textInput14.style.display = "block";
                label11.style.display = "block";

            } else {
                textInput14.style.display = "none";
                label11.style.display = "none";

            }
        });
        //jenis kelamin
        var checkbox12 = document.getElementById('checkbox12');
        var textInput7 = document.getElementById('jenis_kelamin');
        var label12 = document.getElementById('label-jenis_kelamin');

        checkbox12.addEventListener('change', function() {
            if (checkbox12.checked) {
                textInput7.style.display = "block";
                label12.style.display = "block";

            } else {
                textInput7.style.display = "none";
                label12.style.display = "none";

            }
        });
        //hari / tanggal
        var checkbox13 = document.getElementById('checkbox13');
        var textInput8 = document.getElementById('hari');
        var textInput9 = document.getElementById('tanggal');
        var label13 = document.getElementById('label-hari');
        var label14 = document.getElementById('label-tanggal')


        checkbox13.addEventListener('change', function() {
            if (checkbox13.checked) {
                textInput8.style.display = "block";
                textInput9.style.display = "block";
                label13.style.display = "block";
                label14.style.display = "block";

            } else {
                textInput8.style.display = "none";
                textInput9.style.display = "none";
                label13.style.display = "none";
                label14.style.display = "none";

            }
        });
        // alamat
        var checkbox14 = document.getElementById('checkbox14');
        var textInput10 = document.getElementById('alamat');
        var label15 = document.getElementById('label-alamat');

        checkbox14.addEventListener('change', function() {
            if (checkbox14.checked) {
                textInput10.style.display = "block";
                label15.style.display = "block";

            } else {
                textInput10.style.display = "none";
                label15.style.display = "none";

            }
        });
        //agama
        var checkbox15 = document.getElementById('checkbox15');
        var textInput20 = document.getElementById('agama');
        var label16 = document.getElementById('label-agama');

        checkbox15.addEventListener('change', function() {
            if (checkbox15.checked) {
                textInput20.style.display = "block";
                label16.style.display = "block";

            } else {
                textInput20.style.display = "none";
                label16.style.display = "none";

            }
        });
        //pekerjaan
        var checkbox16 = document.getElementById('checkbox16');
        var textInput21 = document.getElementById('pekerjaan');
        var label17 = document.getElementById('label-pekerjaan');

        checkbox16.addEventListener('change', function() {
            if (checkbox16.checked) {
                textInput21.style.display = "block";
                label17.style.display = "block";

            } else {
                textInput21.style.display = "none";
                label17.style.display = "none";

            }
        });
        //paragraf penutup
        var checkbox17 = document.getElementById('checkbox17');
        var textarea6 = document.getElementById('paragrafpenutup');
        var label18 = document.getElementById('label-paragrafpenutup');

        checkbox17.addEventListener('change', function() {
            if (checkbox17.checked) {
                textarea6.style.display = "block";
                label18.style.display = "block";
            } else {
                textarea6.style.display = "none";
                label18.style.display = "none";
            }
        });
        //kalimat penutup
        var checkbox18 = document.getElementById('checkbox18');
        var textarea7 = document.getElementById('kalimatpenutup');
        var label19 = document.getElementById('label-kalimatpenutup');

        checkbox18.addEventListener('change', function() {
            if (checkbox18.checked) {
                textarea7.style.display = "block";
                label19.style.display = "block";
            } else {
                textarea7.style.display = "none";
                label19.style.display = "none";
            }
        });
        //waktu
        var checkbox19 = document.getElementById('checkbox19');
        var textInput11 = document.getElementById('waktu');
        var label22 = document.getElementById('label-waktu');

        checkbox19.addEventListener('change', function() {
            if (checkbox19.checked) {
                textInput11.style.display = "block";
                label22.style.display = "block";
            } else {
                textInput11.style.display = "none";
                label22.style.display = "none";
            }
        });
        //Acara
        var checkbox20 = document.getElementById('checkbox20');
        var textInput122 = document.getElementById('acara');
        var label23 = document.getElementById('label-acara');

        checkbox20.addEventListener('change', function() {
            if (checkbox20.checked) {
                textInput122.style.display = "block";
                label23.style.display = "block";
            } else {
                textInput122.style.display = "none";
                label23.style.display = "none";
            }
        });
        //Nama TTD
        var checkbox21 = document.getElementById('checkbox21');
        var textInput13 = document.getElementById('namattd');
        var label24 = document.getElementById('label-namattd');

        checkbox21.addEventListener('change', function() {
            if (checkbox21.checked) {
                textInput13.style.display = "block";
                label24.style.display = "block";
            } else {
                textInput13.style.display = "none";
                label24.style.display = "none";
            }
        });
    </script>
@endpush
