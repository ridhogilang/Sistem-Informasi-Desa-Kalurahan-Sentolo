@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>APBDes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">APBDes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @can('list apdes')
        <section class="section">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Pelaksanaan</h5>
                            </div>

                            <!-- Table with hoverable rows -->
                            <div style="overflow-x: auto;">
                                <table class="table table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Pendapatan Desa</th>
                                            <th scope="col">Belanja Desa</th>
                                            <th scope="col">Pembiayaan Desa</th>
                                            @can('edit apdes')
                                                <th scope="col" class="text-center">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $no++ }}.</th>
                                            <td>Rp. {{ number_format($apbdes->pendapatan_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->belanja_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->pembiayaan_desa2, 0, ',', '.') }}</td>
                                            @can('edit apdes')
                                                <td class="text-center">
                                                    <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Modal-Edit-APBDes-{{ $apbdes->id }}"
                                                        href="/edit-apbdes/{{ $apbdes->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                        @can('edit apdes')
                                            <!-- Modal Edit Pelaksanaan -->
                                            <div class="modal fade" id="Modal-Edit-APBDes-{{ $apbdes->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="Modal-Edit-APBDes-Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="/edit-apbdes-pelaksanaan/{{ $apbdes->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    APBDes Pelaksanaan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    Anggaran Terpakai :</h1>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="tahun" id="tahun"
                                                                            value="{{ $apbdes->tahun }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Pendapatan
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="pendapatan_desa"
                                                                            id="pendapatan_desa"
                                                                            value="Rp. {{ number_format($apbdes->pendapatan_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Belanja
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="form-control" class="form-control"
                                                                            name="belanja_desa" id="belanja_desa"
                                                                            value="Rp. {{ number_format($apbdes->belanja_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Pembiayaan
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="pembiayaan_desa"
                                                                            id="pembiayaan_desa"
                                                                            value="Rp. {{ number_format($apbdes->pembiayaan_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    Anggaran :</h1><br>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="tahun" id="tahun"
                                                                            value="{{ $apbdes->tahun }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">pendapatan_desa2</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="pendapatan_desa2"
                                                                            id="pendapatan_desa2"
                                                                            value="Rp. {{ number_format($apbdes->pendapatan_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">belanja_desa2</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="belanja_desa2"
                                                                            id="belanja_desa2"
                                                                            value="Rp. {{ number_format($apbdes->belanja_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">pembiayaan_desa2</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="pembiayaan_desa2"
                                                                            id="pembiayaan_desa2"
                                                                            value="Rp. {{ number_format($apbdes->pembiayaan_desa2, 0, ',', '.') }}">
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
                                        @endcan
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Pendapatan</h5>
                                <div>
                                    <!-- Button trigger modal -->

                                </div>
                            </div>

                            <!-- Table with hoverable rows -->
                            <div style="overflow-x: auto;">
                                <table class="table table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Hasil Usaha Desa</th>
                                            <th scope="col">Hasil Aset Desa</th>
                                            <th scope="col">Dana Desa</th>
                                            <th scope="col">Bagi Hasil Pajak Dan Retribusi Desa</th>
                                            <th scope="col">Alokasi Dana Desa</th>
                                            <th scope="col">Koreksi Kesalahan</th>
                                            <th scope="col">Bunga Bank</th>
                                            @can('edit apdes')
                                                <th scope="col" class="text-center">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $no++ }}.</th>
                                            <td>Rp. {{ number_format($apbdes->hasil_usaha2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->hasilaset_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->dana_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bagihasil_pajak2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->alokasidana_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->koreksi_kesalahan2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bunga_bank2, 0, ',', '.') }}</td>
                                            @can('edit apdes')
                                                <td class="text-center">
                                                    <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Modal-Edit-Pendapatan-{{ $apbdes->id }}"
                                                        href="/edit-apbdes-pendapatan/{{ $apbdes->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                        @can('edit apdes')
                                            <!-- Modal Edit Pendapatan -->
                                            <div class="modal fade" id="Modal-Edit-Pendapatan-{{ $apbdes->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="Modal-Edit-Pendapatan-Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="/edit-apbdes-pendapatan/{{ $apbdes->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    APBDes Pendapatan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    Anggaran Terpakai :</h1>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="tahun" id="tahun"
                                                                            value="{{ $apbdes->tahun }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Hasil
                                                                        Usaha
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="hasil_usaha"
                                                                            id="hasil_usaha"
                                                                            value="Rp. {{ number_format($apbdes->hasil_usaha, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Hasil
                                                                        Aset
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="form-control" class="form-control"
                                                                            name="hasilaset_desa" id="hasilaset_desa"
                                                                            value="Rp. {{ number_format($apbdes->hasilaset_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Dana
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="form-control" class="form-control"
                                                                            name="dana_desa" id="dana_desa"
                                                                            value="Rp. {{ number_format($apbdes->dana_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bagi
                                                                        Hasil
                                                                        Pajak Dan Retribusi Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bagihasil_pajak"
                                                                            id="bagihasil_pajak"
                                                                            value="Rp. {{ number_format($apbdes->bagihasil_pajak, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Alokasi
                                                                        Dana
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="alokasidana_desa"
                                                                            id="alokasidana_desa"
                                                                            value="Rp. {{ number_format($apbdes->alokasidana_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Koreksi
                                                                        Kesalahan Belanja Tahun-tahun Sebelumnya</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="koreksi_kesalahan"
                                                                            id="koreksi_kesalahan"
                                                                            value="Rp. {{ number_format($apbdes->koreksi_kesalahan, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bunga
                                                                        Bank</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bunga_bank"
                                                                            id="bunga_bank"
                                                                            value="Rp. {{ number_format($apbdes->bunga_bank, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    Anggaran :</h1><br>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Hasil
                                                                        Usaha
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="hasil_usaha2"
                                                                            id="hasil_usaha2"
                                                                            value="Rp. {{ number_format($apbdes->hasil_usaha2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Hasil
                                                                        Aset
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="hasilaset_desa2"
                                                                            id="hasilaset_desa2"
                                                                            value="Rp. {{ number_format($apbdes->hasilaset_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Dana
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="dana_desa2"
                                                                            id="dana_desa2"
                                                                            value="Rp. {{ number_format($apbdes->dana_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bagi
                                                                        Hasil
                                                                        Pajak Dan Retribusi Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bagihasil_pajak2"
                                                                            id="bagihasil_pajak2"
                                                                            value="Rp. {{ number_format($apbdes->bagihasil_pajak2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Alokasi
                                                                        Dana
                                                                        Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="alokasidana_desa2"
                                                                            id="alokasidana_desa2"
                                                                            value="Rp. {{ number_format($apbdes->alokasidana_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Koreksi
                                                                        Kesalahan Belanja Tahun-tahun Sebelumnya</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="koreksi_kesalahan2"
                                                                            id="koreksi_kesalahan2"
                                                                            value="Rp. {{ number_format($apbdes->koreksi_kesalahan2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bunga
                                                                        Bank</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bunga_bank2"
                                                                            id="bunga_bank2"
                                                                            value="Rp. {{ number_format($apbdes->bunga_bank2, 0, ',', '.') }}">
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
                                        @endcan
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Pembelanjaan</h5>
                                <div>
                                    <!-- Button trigger modal -->
                                </div>
                            </div>

                            <!-- Table with hoverable rows -->
                            <div style="overflow-x: auto;">
                                <table class="table table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Bidang Penyelenggaran Pemerintahan Desa</th>
                                            <th scope="col">Bidang Pelaksanaan Pembangunan Desa</th>
                                            <th scope="col">Bidang Pembinaan Kemasyarakatan</th>
                                            <th scope="col">Bidang Pemberdayaan Masyarakat</th>
                                            <th scope="col">Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa</th>
                                            @can('edit apdes')
                                                <th scope="col" class="text-center">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $no++ }}.</th>
                                            <td>Rp. {{ number_format($apbdes->bdng_pp_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bdng_p_p_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bdng_p_k_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bdng_pm_desa2, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($apbdes->bdng_pbdm_desa2, 0, ',', '.') }}</td>
                                            @can('edit apdes')
                                                <td class="text-center">
                                                    <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Modal-Edit-Pembelanjaan-{{ $apbdes->id }}"
                                                        href="/edit-apbdes-pembelanjaan/{{ $apbdes->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                        @can('edit apdes')
                                            <!-- Modal Edit Pembelanjaan -->
                                            <div class="modal fade" id="Modal-Edit-Pembelanjaan-{{ $apbdes->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="Modal-Edit-Pembelanjaan-" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="/edit-apbdes-pembelanjaan/{{ $apbdes->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Pembelanjaan-">Edit
                                                                    APBDes Pembelanjaan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Pembelanjaan-">Edit
                                                                    Anggaran Terpakai :</h1>
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="tahun" id="tahun"
                                                                            value="{{ $apbdes->tahun }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Penyelenggaran Pemerintahan Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pp_desa"
                                                                            id="bdng_pp_desa"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pp_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pelaksanaan Pembangunan Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="form-control" class="form-control"
                                                                            name="bdng_p_p_desa" id="bdng_p_p_desa"
                                                                            value="Rp. {{ number_format($apbdes->bdng_p_p_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pembinaan Kemasyarakatan</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_p_k_desa"
                                                                            id="bdng_p_k_desa"
                                                                            value="Rp. {{ number_format($apbdes->bdng_p_k_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pemberdayaan Masyarakat</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pm_desa"
                                                                            id="bdng_pm_desa"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pm_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Penanggulangan Bencana, Darurat Dan Mendesak Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pbdm_desa"
                                                                            id="bdng_pbdm_desa"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pbdm_desa, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                                    Anggaran :</h1><br>
                                                                {{-- anggaran --}}
                                                                <div class="row mb-3">
                                                                    <label for="artikel"
                                                                        class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="tahun" id="tahun"
                                                                            value="{{ $apbdes->tahun }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Penyelenggaran Pemerintahan Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pp_desa2"
                                                                            id="bdng_pp_desa2"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pp_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pelaksanaan Pembangunan Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="form-control" class="form-control"
                                                                            name="bdng_p_p_desa2" id="bdng_p_p_desa2"
                                                                            value="Rp. {{ number_format($apbdes->bdng_p_p_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pembinaan Kemasyarakatan</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_p_k_desa2"
                                                                            id="bdng_p_k_desa2"
                                                                            value="Rp. {{ number_format($apbdes->bdng_p_k_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Pemberdayaan Masyarakat</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pm_desa2"
                                                                            id="bdng_pm_desa2"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pm_desa2, 0, ',', '.') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="artikel" class="col-sm-3 col-form-label">Bidang
                                                                        Penanggulangan Bencana, Darurat Dan Mendesak Desa</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" name="bdng_pbdm_desa2"
                                                                            id="bdng_pbdm_desa2"
                                                                            value="Rp. {{ number_format($apbdes->bdng_pbdm_desa2, 0, ',', '.') }}">
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
                                        @endcan
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection

@push('footer')
@endpush
