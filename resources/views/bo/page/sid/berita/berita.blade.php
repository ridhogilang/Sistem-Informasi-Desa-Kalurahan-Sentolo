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
                <li class="breadcrumb-item active">Berita</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Berita | Side Berita</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalBerita"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Berita</button>
                            </div>
                            <div>
                                <div class="row mb-3">
                                    <label class="col-sm-6 col-form-label">Pilih Side Berita</label>
                                    <div class="col-sm-10">
                                        <form action="/admin/sistem-informasi/update-sideberita/{id}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select id="pilihsideberita" class="form-select" name="news_id" onchange="this.form.submit()"
                                                placeholder="Pilih berita...">
                                                <option value="" disabled selected>Pilih sideberita</option>
                                                @foreach ($berita as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->sideberita) selected @endif>
                                                        {{ $item->judul }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Form Berita -->
                        <div class="modal fade" id="modalBerita" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Tambah Berita</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="/admin/sistem-informasi/berita" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="judul" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul"
                                                    value="{{ old('judul') }}">
                                            </div>
                                            <div class="col-md-6" style="display: none;">
                                                <label for="slug" class="form-label">Url</label>
                                                <input type="text" name="slug" class="form-control" id="slug"
                                                    value="{{ old('slug') }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penulis" class="form-label">Penulis</label>
                                                <input type="text" name="penulis" class="form-control" id="penulis"
                                                    value="{{ old('penulis') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control"
                                                    value="{{ old('tanggal') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gambar" class="form-label">File Upload</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" name="gambar" type="file" id="formFile"
                                                        accept=".png, .jpg, .jpeg, .img,">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kategoriberita_id" class="form-label">Kategori Artikel</label>
                                                <select id="kategoriberita_id" name="kategoriberita_id" class="form-select">
                                                    <option value=""
                                                        {{ old('kategoriberita_id') == '' ? 'selected' : '' }}>Choose...
                                                    </option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('kategoriberita_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="artikel" class="form-label">Artikel</label>
                                            <textarea name="artikel" id="summernote">{{ old('artikel') }}</textarea>
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
                            <h5 class="card-title">Header</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Berita Utama</th>
                                    @canany(['edit berita', 'hapus berita'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($berita as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->judul }}</td>
                                        <td>{{ $value->penulis }}</td>
                                        <td>{{ $value->kategori->kategori }}</td>
                                        <td>{{ $value->tanggal }}</td>
                                        @canany(['edit berita', 'hapus berita'])
                                        <td>
                                            <form action="{{ route('berita.update-status', ['id' => $value->id]) }}" method="POST"
                                                id="statusForm{{ $value->id }}" class="form-check form-switch">
                                                @csrf
                                                @method('put')
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="hidden" name="status"
                                                        value="0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheck{{ $value->id }}" name="status"
                                                        {{ $value->status ? 'checked' : '' }}
                                                        data-id="{{ $value->id }}"
                                                        onchange="submitStatusForm({{ $value->id }})">
                                                </div>
                                            </form>
                                        </td>
                                        @endcanany
                                        @can('hapus berita')
                                        <td class="text-center">
                                            <a class="btn btn-warning" href="/admin/sistem-informasi/showberita/{{ $value->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger" type="submit" id="deleteberita"
                                                data-id="{{ $value->id }}"
                                                href="/admin/sistem-informasi/deleteberita/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                        @endcan
                                    </tr>
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
            $(document).on('click', '#deleteberita', function(e) {
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
                        window.location = "/admin/sistem-informasi/deleteberita/" + data_id,
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
    <script>
        function submitStatusForm(id) {
            document.getElementById('statusForm' + id).submit();
        }
    </script>
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('input', function() {
            const judulValue = judul.value.trim().toLowerCase(); // Mengambil dan mengubah judul menjadi lowercase
            const slugValue = judulValue.replace(/\s+/g, '-'); // Mengganti spasi dengan tanda strip
            slug.value = slugValue; // Mengisi input "slug" dengan nilai slug yang dihasilkan
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('news-select');

            select.addEventListener('change', function() {
                const selectedValue = select.value;
                const formData = new FormData();
                formData.append('news_id', selectedValue);

                fetch("/update-sideberita/{id}", {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle response if needed
                        console.log(data);

                        // Show SweetAlert2 success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: `"${data.judul}" sudah menjadi sideberita pada halaman utama`,
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>    
@endpush
