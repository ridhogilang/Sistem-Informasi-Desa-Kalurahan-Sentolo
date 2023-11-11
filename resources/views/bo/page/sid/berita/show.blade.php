@extends('bo.layout.master')

@push('header')
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
                        <h5 class="card-title">Edit Berita</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="/berita/{{ $berita->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" value="{{ $berita->judul }}" class="form-control"
                                    id="judul">
                            </div>
                            <div class="col-md-6" style="display: none;">
                                <label for="slug" class="form-label">Url</label>
                                <input type="text" name="slug" class="form-control" id="slug" value="{{ $berita->slug }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" name="penulis" value="{{ $berita->penulis }}" class="form-control"
                                    id="penulis">
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" value="{{ $berita->tanggal }}" class="form-control"
                                    id="tanggal">
                            </div>
                            <div class="col-md-6">
                                <label for="gambar" class="form-label">File Upload</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="gambar" type="file" id="gambar">
                                    <input type="hidden" name="gambar_existing" value="{{ $berita->gambar }}">
                                    @if ($berita->gambar)
                                        <br><label for="show" class="form-label">Gambar Sebelumnya</label><br>
                                        <img src="{{ Storage::url($berita->gambar) }}" alt="Gambar Berita"
                                            style="max-width: 20%;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="kategoriberita_id" class="form-label">Kategori Artikel</label>
                                <select id="kategoriberita_id" name="kategoriberita_id" class="form-select">
                                    <option value="">Choose...</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kategoriberita_id', $berita->kategoriberita_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="artikel" class="form-label">Artikel</label>
                            <textarea name="artikel" id="summernote">{{ $berita->artikel }}</textarea>
                            <div class="modal-footer">
                                <a href="javascript:history.back()" class="btn btn-secondary"
                                    style="margin-right: 10px;">Back</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
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
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('input', function() {
            const judulValue = judul.value.trim().toLowerCase(); // Mengambil dan mengubah judul menjadi lowercase
            const slugValue = judulValue.replace(/\s+/g, '-'); // Mengganti spasi dengan tanda strip
            slug.value = slugValue; // Mengisi input "slug" dengan nilai slug yang dihasilkan
        });
    </script>
@endpush
