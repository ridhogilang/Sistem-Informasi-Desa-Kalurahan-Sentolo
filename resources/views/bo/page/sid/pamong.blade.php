@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Berita</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Pamong</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalPamong"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Pamong</button>
                            </div>
                        </div>

                        <!-- Modal Form Tambah Poster Pamong -->
                        <div class="modal fade" id="modalPamong" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="pamong-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pamong-Label">Tambah Pamong</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="/admin/sistem-informasi/tambah-pamong" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input name="nama" id="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input name="jabatan" id="jabatan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file" id="gambar"
                                                        accept=".png, .jpg, .jpeg">
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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Poster Aparatur Desa</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pamong as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->nama !!}</td>
                                        <td>{!! $item->jabatan !!}</td>
                                        <td><img src="{{ Storage::url($item->gambar) }}" width="45" height="40">
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Pamong-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-text/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="btn btn-danger" type="submit" id="deletepamong"
                                                data-id="{{ $item->id }}" href="/admin/sistem-informasi/hapus-pamong/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Pamong -->
                                    <div class="modal fade" id="Modal-Edit-Pamong-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Pamong-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-pamong/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Pamong-Satu-">Edit
                                                            Poster Pamong</h1>
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
                                                                class="col-sm-3 col-form-label">Jabatan</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="jabatan" id="jabatan"
                                                                    value="{{ $item->jabatan }}">
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
            $(document).on('click', '#deletepamong', function(e) {
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
                        window.location = "/admin/sistem-informasi/hapus-pamong/" + data_id,
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
    <script>
        $('#summernote').summernote({
            placeholder: 'Tuliskan artikel anda disini',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        
    </script>
@endpush
