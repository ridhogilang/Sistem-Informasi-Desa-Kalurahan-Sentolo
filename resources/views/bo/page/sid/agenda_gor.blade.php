@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Agenda Gedung Olah Raga Dan Balai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Agenda GOR</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="">
                        {{-- <h5 class="card-title">Tambah</h5> --}}
                        {{-- <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalAgendaGOR"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Agenda GOR</button>
                            </div>
                        </div> --}}

                        <!-- Modal Form Tambah Agenda GOR-->
                        <div class="modal fade" id="modalAgendaGOR" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="Agenda-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Agenda-Label">Tambah Agenda GOR</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-agendagor"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="kegiatan" class="col-sm-3 col-form-label">Kegiatan</label>
                                                <div class="col-sm-9">
                                                    <input name="kegiatan" id="kegiatan" class="form-control">
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
                                                <label for="inputTime" class="col-sm-3 col-form-label">Waktu</label>
                                                <div class="col-sm-9">
                                                    <input type="time" name="waktu" id="waktu"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputTime" class="col-sm-3 col-form-label">Selesai</label>
                                                <div class="col-sm-9">
                                                    <input type="time" name="selesai" id="selesai"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="koordinator" class="col-sm-3 col-form-label">Penanggung
                                                    Jawab</label>
                                                <div class="col-sm-9">
                                                    <input name="koordinator" id="koordinator" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nomorhp" class="col-sm-3 col-form-label">Nomer HP</label>
                                                <div class="col-sm-9">
                                                    <input name="nomorhp" id="nomorhp" class="form-control">
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
                    </div>

                    <!-- Modal Form Tambah Agenda BALAI -->
                    <div class="modal fade" id="modalAgendaBalai" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="Agenda-Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="Agenda-Label">Tambah Agenda Balai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row" action="/admin/sistem-informasi/tambah-agendabalai"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="kegiatan" class="col-sm-3 col-form-label">Kegiatan</label>
                                            <div class="col-sm-9">
                                                <input name="kegiatan" id="kegiatan" class="form-control">
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
                                            <label for="inputTime" class="col-sm-3 col-form-label">Waktu</label>
                                            <div class="col-sm-9">
                                                <input type="time" name="waktu" id="waktu"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputTime" class="col-sm-3 col-form-label">Selesai</label>
                                            <div class="col-sm-9">
                                                <input type="time" name="selesai" id="selesai"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="koordinator" class="col-sm-3 col-form-label">Penanggung
                                                Jawab</label>
                                            <div class="col-sm-9">
                                                <input name="koordinator" id="koordinator" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nomorhp" class="col-sm-3 col-form-label">Nomer HP</label>
                                            <div class="col-sm-9">
                                                <input name="nomorhp" id="nomorhp" class="form-control">
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
                </div>
            </div>
            {{-- Agenda Balai --}}
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Agenda GOR</h5>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAgendaGOR"><i class="fa-regular fa-square-plus"
                                    style="margin-right: 5px"></i>Tambah Agenda GOR</button>
                        </div>
                    </div>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Selesai</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($agendagor as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{!! $item->kegiatan !!}</td>
                                    <td>{!! $item->tanggal !!}</td>
                                    <td>{!! $item->waktu !!}</td>
                                    <td>{!! $item->selesai !!}</td>
                                    <td>{!! $item->koordinator !!}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-Agenda-{{ $item->id }}"
                                            href="/admin/sistem-informasi/edit-agenda/{{ $item->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-danger" type="submit" id="deleteAgendagor"
                                            data-id="{{ $item->id }}"
                                            href="/admin/sistem-informasi/hapus-agendagor/{{ $item->id }}"><i
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
                                            <form action="/admin/sistem-informasi/edit-agendagor/{{ $item->id }}"
                                                method="POST" enctype="multipart/form-data">
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
                                                        <label for="kegiatan"
                                                            class="col-sm-3 col-form-label">Kegiatan</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="kegiatan" id="kegiatan"
                                                                value="{{ $item->kegiatan }}">
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
                                                        <label for="inputTime"
                                                            class="col-sm-3 col-form-label">Waktu</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" name="waktu" id="waktu"
                                                                class="form-control" value="{{ $item->waktu }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputTime"
                                                            class="col-sm-3 col-form-label">Selesai</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" id="selesai" name="selesai"
                                                                class="form-control" value="{{ $item->selesai }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Penanggung
                                                            Jawab</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="koordinator"
                                                                id="koordinator" value="{{ $item->koordinator }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Nomo
                                                            HP</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="nomorhp" id="nomorhp"
                                                                value="{{ $item->nomorhp }}">
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
                        <h5 class="card-title">Agenda Balai</h5>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAgendaBalai"><i class="fa-regular fa-square-plus"
                                    style="margin-right: 5px"></i>Tambah Agenda Balai</button>
                        </div>
                    </div>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Selesai</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($agendabalai as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{!! $item->kegiatan !!}</td>
                                    <td>{!! $item->tanggal !!}</td>
                                    <td>{!! $item->waktu !!}</td>
                                    <td>{!! $item->selesai !!}</td>
                                    <td>{!! $item->koordinator !!}</td>
                                    <td>{!! $item->nomorhp !!}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                            data-bs-target="#Modal-Edit-AgendaBalai-{{ $item->id }}"
                                            href="/admin/sistem-informasi/edit-agendabalai/{{ $item->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-danger" type="submit" id="deleteAgendaBalai"
                                            data-id="{{ $item->id }}"
                                            href="/admin/sistem-informasi/hapus-agendabalai/{{ $item->id }}"><i
                                                class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Modal Edit Agenda BALAI -->
                                <div class="modal fade" id="Modal-Edit-AgendaBalai-{{ $item->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="Modal-Edit-AgendaBalai-Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="/admin/sistem-informasi/edit-agendabalai/{{ $item->id }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="Modal-Edit-AgendaBalai-">Edit
                                                        Agenda Kegiatan Balai</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="kegiatan"
                                                            class="col-sm-3 col-form-label">Kegiatan</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="kegiatan" id="kegiatan"
                                                                value="{{ $item->kegiatan }}">
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
                                                        <label for="inputTime"
                                                            class="col-sm-3 col-form-label">Waktu</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" name="waktu" id="waktu"
                                                                class="form-control" value="{{ $item->waktu }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputTime"
                                                            class="col-sm-3 col-form-label">Selesai</label>
                                                        <div class="col-sm-9">
                                                            <input type="time" id="selesai" name="selesai"
                                                                class="form-control" value="{{ $item->selesai }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Penanggung
                                                            Jawab</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="koordinator"
                                                                id="koordinator" value="{{ $item->koordinator }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="artikel" class="col-sm-3 col-form-label">Nomo
                                                            HP</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="nomorhp" id="nomorhp"
                                                                value="{{ $item->nomorhp }}">
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
        </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteAgendagor', function(e) {
                e.preventDefault();
                var data_id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Anda ingin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Anda sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/sistem-informasi/hapus-agendagor/" + data_id,
                            Swal.fire(
                                'Deleted!',
                                'Data Telah Terhapus.',
                                'success'
                            )
                    }
                })

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteAgendaBalai', function(e) {
                e.preventDefault();
                var data_id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda ingin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/sistem-informasi/hapus-agendabalai/" + data_id,
                            Swal.fire(
                                'Deleted!',
                                'Data Telah Terhapus.',
                                'success'
                            )
                    }
                })

            });
        });
    </script>
@endpush
