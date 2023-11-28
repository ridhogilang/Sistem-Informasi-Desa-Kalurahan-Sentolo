@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Tambah</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgenda"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Agenda</button>
                            </div>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalJadwal"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Jadwal</button>
                            </div>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalSinergi"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Sinergi</button>
                            </div>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalStatistik"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Statistik</button>
                            </div>
                        </div> --}}

                        <!-- Modal Form Tambah Agenda -->
                        {{-- <div class="modal fade" id="modalAgenda" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Agenda-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Agenda-Label">Tambah Agenda</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/tambah-agenda" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                                <div class="col-sm-9">
                                                    <input name="judul" id="judul" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="waktu" class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tanggal" id="tanggal"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                                                <div class="col-sm-9">
                                                    <input name="waktu" id="waktu" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                                                <div class="col-sm-9">
                                                    <input name="lokasi" id="lokasi" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="koordinator" class="col-sm-3 col-form-label">Koordinator</label>
                                                <div class="col-sm-9">
                                                    <input name="koordinator" id="koordinator" class="form-control">
                                                </div>
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
                        </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pelaksanaan</h5>
                            {{-- <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgenda"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Pelaksanaan</button>
                            </div> --}}
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pendapatan Desa</th>
                                    <th scope="col">Belanja Desa</th>
                                    <th scope="col">Pembiayaan Desa</th>
                                    <th scope="col" class="text-center">Action</th>
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
                                    <td class="text-center">
                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-APBDes-{{ $apbdes->id }}"
                                            href="/edit-apbdes/{{ $apbdes->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- <a class="btn btn-danger" type="submit" id="deleteAgenda"
                                                data-id="{{ $apbdes->id }}" href="/hapus-apabdes/{{ $apbdes->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a> --}}
                                    </td>
                                </tr>
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pendapatan</h5>
                            <div>
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgenda"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Pendapatan</button> --}}
                            </div>
                        </div>

                        <!-- Table with hoverable rows -->
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
                                    <th scope="col" class="text-center">Action</th>
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
                                    <td class="text-center">
                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-Pendapatan-{{ $apbdes->id }}"
                                            href="/edit-apbdes-pendapatan/{{ $apbdes->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- <a class="btn btn-danger" type="submit" id="deletePembelanjaan"
                                                data-id="{{ $apbdes->id }}" href="/hapus-apabdes/{{ $apbdes->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a> --}}
                                    </td>
                                </tr>
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
                                                        <label for="artikel" class="col-sm-3 col-form-label">Hasil Usaha
                                                            Desa</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="hasil_usaha"
                                                                id="hasil_usaha"
                                                                value="Rp. {{ number_format($apbdes->hasil_usaha, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Hasil Aset
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
                                                        <label for="artikel" class="col-sm-3 col-form-label">Bagi Hasil
                                                            Pajak Dan Retribusi Desa</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="bagihasil_pajak"
                                                                id="bagihasil_pajak"
                                                                value="Rp. {{ number_format($apbdes->bagihasil_pajak, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Alokasi Dana
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
                                                            <input class="form-control" name="bunga_bank" id="bunga_bank"
                                                                value="Rp. {{ number_format($apbdes->bunga_bank, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                        Anggaran :</h1><br>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Hasil Usaha
                                                            Desa</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="hasil_usaha2"
                                                                id="hasil_usaha2"
                                                                value="Rp. {{ number_format($apbdes->hasil_usaha2, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Hasil Aset
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
                                                            <input class="form-control" name="dana_desa2" id="dana_desa2"
                                                                value="Rp. {{ number_format($apbdes->dana_desa2, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Bagi Hasil
                                                            Pajak Dan Retribusi Desa</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="bagihasil_pajak2"
                                                                id="bagihasil_pajak2"
                                                                value="Rp. {{ number_format($apbdes->bagihasil_pajak2, 0, ',', '.') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Alokasi Dana
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pembelanjaan</h5>
                            <div>
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgenda"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Pendapatan</button> --}}
                            </div>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Bidang Penyelenggaran Pemerintahan Desa</th>
                                    <th scope="col">Bidang Pelaksanaan Pembangunan Desa</th>
                                    <th scope="col">Bidang Pembinaan Kemasyarakatan</th>
                                    <th scope="col">Bidang Pemberdayaan Masyarakat</th>
                                    <th scope="col">Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa</th>
                                    <th scope="col" class="text-center">Action</th>
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
                                    <td class="text-center">
                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-Pembelanjaan-{{ $apbdes->id }}"
                                            href="/edit-apbdes-pembelanjaan/{{ $apbdes->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- <a class="btn btn-danger" type="submit" id="deletePendapatan"
                                                data-id="{{ $apbdes->id }}" href="/hapus-apabdes/{{ $apbdes->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a> --}}
                                    </td>
                                </tr>
                                <!-- Modal Edit Pembelanjaan -->
                                <div class="modal fade" id="Modal-Edit-Pembelanjaan-{{ $apbdes->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="Modal-Edit-Pembelanjaan-" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="/edit-apbdes-pembelanjaan/{{ $apbdes->id }}" method="POST"
                                                enctype="multipart/form-data">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteAgenda', function(e) {
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
                        window.location = "/hapus-agenda/" + data_id,
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
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteJadwal', function(e) {
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
                        window.location = "/hapus-jadwal/" + data_id,
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
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteSinergi', function(e) {
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
                        window.location = "/hapus-sinergi/" + data_id,
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
