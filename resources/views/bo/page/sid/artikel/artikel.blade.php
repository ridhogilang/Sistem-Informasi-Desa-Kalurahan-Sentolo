@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Artikel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Artikel</li>
            </ol>
        </nav> 
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                @can('tambah artikel')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Artikel</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalBerita"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Artikel</button>
                            </div>
                        </div>

                        <!-- Modal Form Berita -->
                        <div class="modal fade" id="modalBerita" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Tambah Artikel</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="/admin/sistem-informasi/artikel" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="judul" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul"
                                                    value="{{ old('judul') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="slug" class="form-label">Url</label>
                                                <input type="text" name="slug" class="form-control" id="slug"
                                                    value="{{ old('slug') }}" disabled required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penulis" class="form-label">Penulis</label>
                                                <input type="text" name="penulis" class="form-control" id="penulis"
                                                    value="{{ old('penulis') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control"
                                                    value="{{ old('tanggal') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gambar" class="form-label">File Upload</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" name="gambar" type="file" id="formFile"
                                                        accept=".png, .jpg, .jpeg, .img,">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none;">
                                                <label for="kategoriberita_id" class="form-label">Kategori Artikel</label>
                                                <select id="kategoriberita_id" name="kategoriberita_id" class="form-select" required>
                                                    <option selected value="4">Artikel</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="link" class="form-label" style="margin-right: 10px;">Link Google Drive</label><input class="form-check-input" type="checkbox" id="checkbox1">
                                                <input type="text" name="link" class="form-control" id="link" style="display: none"
                                                    value="{{ old('link') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kategori_link" class="form-label" id="kategori_link" style="display: none" >Kategori Link Google Drive</label>
                                                <select id="kategorilink" name="kategori_link" class="form-select" style="display: none">
                                                    <option disabled selected value="">Pilih Jenis Link Google Drive</option>
                                                    <option value="1">Video</option>
                                                    <option value="2">PDF</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="artikel" class="form-label" style="margin-right: 10px;">Artikel</label>
                                                <input class="form-check-input" type="checkbox" id="checkbox2">
                                            </div>                                         
                                            <textarea name="artikel" id="summernote" style="display: none">{{ old('artikel') }}</textarea>
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
                @endcan
                @can('list artikel')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Artikel</h5>
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
                                    <th scope="col">Copy Url</th>
                                    @canany(['edit artikel', 'hapus artikel'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($artikel as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->judul }}</td>
                                        <td>{{ $value->penulis }}</td>
                                        <td>{{ $value->kategori->kategori }}</td>
                                        <td>{{ $value->tanggal }}</td>
                                        <td class="">
                                            <a class="btn btn-warning" href="#"
                                                onclick="copySlug('{{ $value->slug }}','{{ $value->tanggal }}' )">
                                                <i class="fa-solid fa-copy"></i>
                                            </a>
                                        </td>
                                        @canany(['edit artikel', 'hapus artikel'])
                                        <td class="text-center">
                                            @can('edit artikel')
                                            <a class="btn btn-warning" href="/admin/sistem-informasi/showartikel/{{ $value->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <!-- Button trigger modal -->
                                            @endcan
                                            @can('hapus artikel')
                                            <a class="btn btn-danger" type="submit" id="deleteartikel"
                                                data-id="{{ $value->id }}"
                                                href="/admin/sistem-informasi/deleteartikel/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                            @endcan
                                        </td>
                                        @endcan
                                    </tr>
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
    @can('hapus artikel')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteartikel', function(e) {
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
                        window.location = "/admin/sistem-informasi/deleteartikel/" + data_id,
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
    var checkbox2 = document.getElementById('checkbox2');
    var textarea1 = document.getElementById('summernote');
    var summernoteInstance; // Variabel untuk menyimpan instance Summernote

    checkbox2.addEventListener('change', function() {
        if (checkbox2.checked) {
            // Jika checkbox dicentang
            if (!summernoteInstance) {
                // Inisialisasi Summernote jika belum
                summernoteInstance = $('#summernote').summernote({
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
            }
            // Tampilkan Summernote textarea
            textarea1.style.display = 'none';
        } else {
            // Jika checkbox tidak dicentang
            // Sembunyikan Summernote textarea dan hapus instance Summernote
            if (summernoteInstance) {
                summernoteInstance.summernote('destroy');
                summernoteInstance = null;
            }
            textarea1.style.display = 'none';
        }
    });
</script>
    {{-- <script>
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
    </script> --}}
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
        function copySlug(slug, tanggal) {
            // Ambil URL aplikasi dari .env
            var appUrl = "{{ config('app.url') }}";
            
            // Ubah tanggal menjadi format yang sesuai (misalnya "yyyy/mm/dd")
            var date = new Date(tanggal);
            var year = date.getFullYear();
            var month = String(date.getMonth() + 1).padStart(2, '0'); // Tambahkan '0' jika bulan < 10
            var day = String(date.getDate()).padStart(2, '0'); // Tambahkan '0' jika tanggal < 10
        
            // Gabungkan URL aplikasi, /artikel, tanggal, dan slug
            var fullUrl = appUrl + "/artikel/" + year + "/" + month + "/" + day + "/" + slug;
        
            // Buat elemen input sementara untuk menyalin teks
            var tempInput = document.createElement("input");
            tempInput.value = fullUrl;
            document.body.appendChild(tempInput);
        
            // Pilih teks dalam elemen input
            tempInput.select();
        
            // Salin teks ke clipboard
            document.execCommand("copy");
        
            // Hapus elemen input sementara
            document.body.removeChild(tempInput);
        
            // Berikan umpan balik kepada pengguna
            Swal.fire({
                title: "URL telah disalin",
                text: fullUrl,
                icon: "success",
                timer: 2000, // Waktu tampilan pesan (opsional)
                showConfirmButton: false // Sembunyikan tombol "OK" (opsional)
            });
        }
        </script>
        <script>
        var checkbox1 = document.getElementById('checkbox1');
        var textInput1 = document.getElementById('link');
        var label1 = document.getElementById('kategori_link'); // Perhatikan perubahan di sini
        var select1 = document.getElementById('kategorilink'); // Perhatikan perubahan di sini

        checkbox1.addEventListener('change', function() { // Perhatikan perubahan di sini
            if (checkbox1.checked) {
                textInput1.style.display = "block";
                label1.style.display = "block";
                select1.style.display = "block";
            } else {
                textInput1.style.display = "none";
                label1.style.display = "none";
                select1.style.display = "none";
            }
        });
        </script>             
@endpush
