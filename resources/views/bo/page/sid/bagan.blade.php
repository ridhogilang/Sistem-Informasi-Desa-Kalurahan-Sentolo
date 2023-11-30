@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Bagan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Bagan</li>
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
                        <div class="modal fade" id="modalAgenda" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Agenda-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Agenda-Label">Tambah Agenda</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-agenda" method="POST"
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
                                            {{-- <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file" id="gambar"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                            </div> --}}
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
                        <!-- Modal Form Tambah Jadwal -->
                        <div class="modal fade" id="modalJadwal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Jadwal-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Jadwal-Label">Tambah Jadwal</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-jadwal" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="hari" class="col-sm-3 col-form-label">Hari</label>
                                                <div class="col-sm-9">
                                                    <input name="hari" id="hari" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                                                <div class="col-sm-9">
                                                    <input name="waktu" id="waktu" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="note" class="col-sm-3 col-form-label">Note</label>
                                                <div class="col-sm-9">
                                                    <input name="note" id="note" class="form-control">
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file"
                                                        id="gambar" accept=".png, .jpg, .jpeg">
                                                </div>
                                            </div> --}}
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
                        <!-- Modal Form Tambah Sinergi -->
                        <div class="modal fade" id="modalSinergi" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Sinergi-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Sinergi-Label">Tambah Sinergi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-sinergi" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input name="nama" id="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                    <input name="link" id="link" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file"
                                                        id="gambar" accept=".png, .jpg, .jpeg">
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
                        </div>
                        <!-- Modal Form Tambah Statistik -->
                        {{-- <div class="modal fade" id="modalStatistik" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Statistik-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Statistik-Label">Tambah Statistik</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-statistik" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Laki - Laki</label>
                                                <div class="col-sm-9">
                                                    <input name="lk" id="lk" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Perempuan</label>
                                                <div class="col-sm-9">
                                                    <input name="pr" id="pr" class="form-control">
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
                            <h5 class="card-title">Agenda</h5>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgenda"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Agenda</button>
                            </div>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Koordinator</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($agenda as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->judul !!}</td>
                                        <td>{!! $item->tanggal !!}</td>
                                        <td>{!! $item->waktu !!}</td>
                                        <td>{!! $item->lokasi !!}</td>
                                        <td>{!! $item->koordinator !!}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Agenda-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-agenda/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="btn btn-danger" type="submit" id="deleteAgenda"
                                                data-id="{{ $item->id }}" href="/admin/sistem-informasi/hapus-agenda/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Agenda -->
                                    <div class="modal fade" id="Modal-Edit-Agenda-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Agenda-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-agenda/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Agenda-">Edit
                                                            Agenda Kegiatan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Judul</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="judul" id="judul"
                                                                    value="{{ $item->judul }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Tanggal</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" name="tanggal"
                                                                    id="tanggal" value="{{ $item->tanggal }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Waktu</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="waktu" id="waktu"
                                                                    value="{{ $item->waktu }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Lokasi</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="lokasi" id="lokasi"
                                                                    value="{{ $item->lokasi }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Koordinator</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="koordinator"
                                                                    id="koordinator" value="{{ $item->koordinator }}">
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
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Jadwal</h5>
                            {{-- <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalJadwal"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Jadwal</button>
                            </div> --}}
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Note</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jadwal as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->hari !!}</td>
                                        <td>{!! $item->waktu !!}</td>
                                        <td>{!! $item->note !!}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Jadwal-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-jadwal/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            {{-- <a class="btn btn-danger" type="submit" id="deleteJadwal"
                                                data-id="{{ $item->id }}"
                                                href="/admin/sistem-informasi/hapus-jadwal/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Jadwal -->
                                    <div class="modal fade" id="Modal-Edit-Jadwal-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Jadwal-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-jadwal/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Jadwal-">Edit
                                                            Jadwal Layanan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Hari</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="hari" id="hari"
                                                                    value="{{ $item->hari }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Waktu</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="waktu" id="waktu"
                                                                    value="{{ $item->waktu }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Note</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="note" id="note"
                                                                    value="{{ $item->note }}">
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
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Sinergi</h5>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalSinergi"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Sinergi</button>
                            </div>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($sinergi as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->nama !!}</td>
                                        <td>{!! $item->link !!}</td>
                                        <td><img src="{{ Storage::url($item->gambar) }}" width="45" height="40">
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Sinergi-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-sinergi/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="btn btn-danger" type="submit" id="deleteSinergi"
                                                data-id="{{ $item->id }}"
                                                href="/admin/sistem-informasi/hapus-sinergi/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Sinergi -->
                                    <div class="modal fade" id="Modal-Edit-Sinergi-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Sinergi-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-sinergi/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Sinergi-">Edit
                                                            Sinergi</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="nama" id="nama"
                                                                    value="{{ $item->nama }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Link</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="link" id="link"
                                                                    value="{{ $item->link }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gambar" class="col-sm-3 col-form-label">File
                                                                Upload</label>
                                                            <div class="col-sm-9">
                                                                <img src="{{ Storage::url($item->gambar) }}"
                                                                    alt="{{ $item->nama }}" width="50"
                                                                    height="50">
                                                                <input class="form-control" name="gambar" type="file"
                                                                    id="gambar" accept=".png, .jpg, .jpeg">
                                                                <input type="hidden" name="gambar_existing"
                                                                    value="{{ $item->gambar }}">
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
                                    {{-- batas --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Statistik</h5>
                            {{-- <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalStatistik"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Statistik</button>
                            </div> --}}
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Laki - laki</th>
                                    <th scope="col">Perempuan</th>
                                    <th scope="col">Total</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($statistik as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->lk !!}</td>
                                        <td>{!! $item->pr !!}</td>
                                        <td>{{ $item->lk + $item->pr }}</td>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Statistik-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-statistik/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            {{-- <a class="btn btn-danger" type="submit" id="deletestatistik"
                                                data-id="{{ $item->id }}"
                                                href="/admin/sistem-informasi/hapus-statistik/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Statistik -->
                                    <div class="modal fade" id="Modal-Edit-Statistik-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Statistik-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-statistik/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Sinergi-">Edit
                                                            Sinergi</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="artikel" class="col-sm-3 col-form-label">Laki -
                                                                Laki</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="lk" id="lk"
                                                                    value="{{ $item->lk }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="artikel"
                                                                class="col-sm-3 col-form-label">Perempuan</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="pr" id="pr"
                                                                    value="{{ $item->pr }}">
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
                                    {{--  --}}
                                    {{-- <div class="modal fade" id="Modal-Edit-Statistik-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Statistik-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-statistik/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Sinergi-">Edit
                                                            Data Statistik</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Laki
                                                            Laki</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="lk" id="pr"
                                                                value="{{ $item->lk }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel"
                                                            class="col-sm-3 col-form-label">Perempuan</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="pr" id="pr"
                                                                value="{{ $item->pr }}">
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
                                    </div> --}}
                                    {{--  --}}
                                @endforeach
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
                        window.location = "/admin/sistem-informasi/hapus-agenda/" + data_id,
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
                        window.location = "/admin/sistem-informasi/hapus-jadwal/" + data_id,
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
                        window.location = "/admin/sistem-informasi/hapus-sinergi/" + data_id,
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
