@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Galeri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Galeri</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                @can('tambah galeri')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalGaleri"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Gambar</button>
                            </div>
                        </div>

                        <!-- Modal Form Tambah Poster Pamong -->
                        <div class="modal fade" id="modalGaleri" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="galeri-Label" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="galeri-Label">Tambah Gambar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/tambah-galeri" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input name="nama" id="nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file" id="gambar"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                            </div>
                                            <label for="galeri" class="form-label">Galeri</label>
                                            <textarea name="galeri" id="summernote">{{ old('galeri') }}</textarea>
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
                @can
                @can('list galeri')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Gambar Galeri</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gambar</th>
                                    @canany(['edit galeri', 'hapus galeri'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($galeri as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{!! $item->nama !!}</td>
                                        <td><img src="{{ Storage::url($item->gambar) }}" width="45" height="40">
                                        </td>
                                        @canany(['edit galeri', 'hapus galeri'])
                                        <td class="text-center">
                                            @can('edit galeri')
                                            <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-Galeri-{{ $item->id }}"
                                                href="/admin/sistem-informasi/edit-text/{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            @endcan
                                            @can('hapus galeri')
                                            <a class="btn btn-danger" type="submit" id="deletegaleri"
                                                data-id="{{ $item->id }}" href="/admin/sistem-informasi/hapus-galeri/{{ $item->id }}"><i
                                                    class="fa-regular fa-trash-can"></i>
                                            </a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @can('edit galeri')
                                    <!-- Modal Edit galeri -->
                                    <div class="modal fade" id="Modal-Edit-Galeri-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-Galeri-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/edit-galeri/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-Galeri-Satu-">Edit
                                                            Gambar Galeri</h1>
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
                                                        <label for="galeri" class="form-label">Galeri</label>
                                                        <textarea name="galeri" id="summernoteedit">{!! $item->galeri !!}</textarea>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </section>
@endsection

@push('footer')
    @can('hapus galeri')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deletegaleri', function(e) {
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
                        window.location = "/admin/sistem-informasi/hapus-galeri/" + data_id,
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
    @endcan
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
        ],
        fontNames: ['Poppins', 'Arial', 'Times New Roman', 'Verdana'], // Tambahkan "Poppins" sebagai pilihan font.
        fontNamesIgnoreCheck: ['Poppins'], // Set "Poppins" sebagai opsi yang tidak perlu diperiksa.
    });
    </script>    
   <script>
    $('#summernoteedit').summernote({
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
        ],
        fontNames: ['Poppins', 'Arial', 'Times New Roman', 'Verdana'], // Tambahkan "Poppins" sebagai pilihan font.
        fontNamesIgnoreCheck: ['Poppins'], // Set "Poppins" sebagai opsi yang tidak perlu diperiksa.
    });
    </script>    
@endpush
