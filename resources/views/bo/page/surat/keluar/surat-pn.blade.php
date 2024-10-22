@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script>
        // Mendapatkan elemen input NIK
        var nikInput = document.getElementById('nik');
        // Mendapatkan elemen input NIK Data Ayah
        var nik_ayahInput = document.getElementById('nikayah');
        // Mendapatkan elemen input NIK Data Ibu
        var nik_ibuInput = document.getElementById('nikibu');

        // Menambahkan event listener ketika nilai input NIK berubah
        nikInput.addEventListener('input', function() {
            var nik = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nik, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Daftar elemen form yang ingin Anda isi
                    var formElements = ['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'umur', 'status_perkawinan', 'pendidikan', 'pekerjaan', 'status_hubungan_kel', 'nama_ibu', 'nama_ayah', 'alamat', 'rt', 'rw', 'nomor_kk'];

                    // Loop melalui elemen form dan isi nilainya jika ada dalam data
                    formElements.forEach(function(element) {
                        if (document.getElementById(element)) {
                            document.getElementById(element).value = data[element] || '';
                        }
                    });
                } else {
                    // Handle jika NIK tidak ditemukan
                    formElements.forEach(function(element) {
                        if (document.getElementById(element)) {
                            document.getElementById(element).value = '';
                        }
                    });
                }
            };

            xhr.send();
        });

        // Menambahkan event listener ketika nilai input NIK berubah Orang 1
        nik_ayahInput.addEventListener('input', function() {
            var nikayah = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nikayah, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Isi input dengan data yang diterima
                    if (document.getElementById('namaayah')) {
                        document.getElementById('namaayah').value = data.nama || '';
                    }
                    if (document.getElementById('jenis_kelaminayah')) {
                        document.getElementById('jenis_kelaminayah').value = data.jenis_kelamin || '';
                    }
                    if (document.getElementById('tempat_lahirayah')) {
                        document.getElementById('tempat_lahirayah').value = data.tempat_lahir || '';
                    }
                    if (document.getElementById('tanggal_lahirayah')) {
                        document.getElementById('tanggal_lahirayah').value = data.tanggal_lahir || '';
                    }
                    if (document.getElementById('agamaayah')) {
                        document.getElementById('agamaayah').value = data.agama || '';
                    }
                    if (document.getElementById('pekerjaanayah')) {
                        document.getElementById('pekerjaanayah').value = data.pekerjaan || '';
                    }
                    if (document.getElementById('alamatayah')) {
                        document.getElementById('alamatayah').value = data.alamat || '';
                    }
                } else {
                    // Handle jika NIK tidak ditemukan
                    document.getElementById('namaayah').value = '';
                    document.getElementById('jenis_kelaminayah').value = '';
                    document.getElementById('tempat_lahirayah').value = '';
                    document.getElementById('tanggal_lahirayah').value = '';
                    document.getElementById('agamaayah').value = '';
                    document.getElementById('pekerjaanayah').value = '';
                    document.getElementById('alamatayah').value = '';
                }
            };

            xhr.send();
        });

        // Menambahkan event listener ketika nilai input NIK berubah Orang 1
        nik_ibuInput.addEventListener('input', function() {
            var nikibu = this.value;

            // Buat permintaan AJAX untuk mengambil data berdasarkan NIK
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-penduduk/' + nikibu, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Isi input dengan data yang diterima
                    if (document.getElementById('namaibu')) {
                        document.getElementById('namaibu').value = data.nama || '';
                    }
                    if (document.getElementById('jenis_kelaminibu')) {
                        document.getElementById('jenis_kelaminibu').value = data.jenis_kelamin || '';
                    }
                    if (document.getElementById('tempat_lahiribu')) {
                        document.getElementById('tempat_lahiribu').value = data.tempat_lahir || '';
                    }
                    if (document.getElementById('tanggal_lahiribu')) {
                        document.getElementById('tanggal_lahiribu').value = data.tanggal_lahir || '';
                    }
                    if (document.getElementById('agamaibu')) {
                        document.getElementById('agamaibu').value = data.agama || '';
                    }
                    if (document.getElementById('pekerjaanibu')) {
                        document.getElementById('pekerjaanibu').value = data.pekerjaan || '';
                    }
                    if (document.getElementById('alamatibu')) {
                        document.getElementById('alamatibu').value = data.alamat || '';
                    }
                } else {
                    // Handle jika NIK tidak ditemukan
                    document.getElementById('namaibu').value = '';
                    document.getElementById('jenis_kelaminibu').value = '';
                    document.getElementById('tempat_lahiribu').value = '';
                    document.getElementById('tanggal_lahiribu').value = '';
                    document.getElementById('agamaibu').value = '';
                    document.getElementById('pekerjaanibu').value = '';
                    document.getElementById('alamatibu').value = '';
                }
            };

            xhr.send();
        });
    </script>
@endpush

@section('content')
<div class="pagetitle">
    <h1>Surat Pengantar Nikah </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
            <li class="breadcrumb-item">Surat Keluar</li>
            <li class="breadcrumb-item active">Pengantar Nikah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">
            @canany(['input surat', 'lihat contoh surat'])
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengantar Nikah</h5>
                    <!-- Button trigger modal -->
                    @can('input surat')
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#spn"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                    @endcan
                    @can('lihat contoh surat')
                    <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-pn/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>
                    @endcan
                    @can('input surat')
                    <!-- Modal Form SPN -->
                    <div class="modal fade" id="spn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="spn-Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambah-spn-Label">Data Surat Pengantar Nikah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row" action="/admin/e-surat/surat-pn" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="deskripsi1" class="col-sm-3 col-form-label">Deskripsi Atas</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="deskripsi1" class="form-control" id="deskripsi1" rows="3" required>Yang bertanda tangan di bawah ini Dukuh Siwalan, Kalurahan Sentolo, Kecamatan Sentolo menerangkan dengan sesungguhnya bahwa :</textarea>
                                            </div>
                                        </div>
                                        <h5 class="modal-title mt-2 mb-3"><strong> Data Diri</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                    <option value="" @if(old('jenis_kelamin')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                                    <option value="LAKI LAKI" @if(old('jenis_kelamin')=='LAKI LAKI' ) selected @endif>LAKI LAKI</option>
                                                    <option value="PEREMPUAN" @if(old('jenis_kelamin')=='PEREMPUAN' ) selected @endif>PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                            </div>
                                            <label for="tanggal_lahir" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agama" name="agama" class="form-select" required>
                                                    <option value="" @if(old('agama')=='' ) selected @endif>Pilih Agama ...</option>
                                                    <option value="ISLAM" @if(old('agama')=='ISLAM' ) selected @endif>ISLAM</option>
                                                    <option value="KRISTEN" @if(old('agama')=='KRISTEN' ) selected @endif>KRISTEN</option>
                                                    <option value="KATHOLIK" @if(old('agama')=='KATHOLIK' ) selected @endif>KATHOLIK</option>
                                                    <option value="HINDU" @if(old('agama')=='HINDU' ) selected @endif>HINDU</option>
                                                    <option value="BUDDHA" @if(old('agama')=='BUDDHA' ) selected @endif>BUDDHA</option>
                                                    <option value="KONGHUCU" @if(old('agama')=='KONGHUCU' ) selected @endif>KONGHUCU</option>
                                                    <option value="LAINNYA" @if(old('agama')=='LAINNYA' ) selected @endif>LAINNYA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                                            </div>
                                        </div>
                                        {{-- Data Ayah --}}
                                        <h5 class="modal-title mt-2 mb-3"><strong> Data Ayah</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nikayah" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nikayah" class="form-control" id="nikayah" value="{{ old('nikayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="namaayah" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="namaayah" class="form-control" id="namaayah" value="{{ old('namaayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_kelaminayah" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_kelaminayah" name="jenis_kelaminayah" class="form-select" required>
                                                    <option value="" @if(old('jenis_kelaminayah')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                                    <option value="LAKI LAKI" @if(old('jenis_kelaminayah')=='LAKI LAKI' ) selected @endif>LAKI LAKI</option>
                                                    <option value="PEREMPUAN" @if(old('jenis_kelaminayah')=='PEREMPUAN' ) selected @endif>PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahirayah" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahirayah" name="tempat_lahirayah" value="{{ old('tempat_lahirayah') }}" required>
                                            </div>
                                            <label for="tanggal_lahirayah" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahirayah" name="tanggal_lahirayah" value="{{ old('tanggal_lahirayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agamaayah" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agamaayah" name="agamaayah" class="form-select" required>
                                                    <option value="" @if(old('agamaayah')=='' ) selected @endif>Pilih Agama Ayah ...</option>
                                                    <option value="ISLAM" @if(old('agamaayah')=='ISLAM' ) selected @endif>ISLAM</option>
                                                    <option value="KRISTEN" @if(old('agamaayah')=='KRISTEN' ) selected @endif>KRISTEN</option>
                                                    <option value="KATHOLIK" @if(old('agamaayah')=='KATHOLIK' ) selected @endif>KATHOLIK</option>
                                                    <option value="HINDU" @if(old('agamaayah')=='HINDU' ) selected @endif>HINDU</option>
                                                    <option value="BUDDHA" @if(old('agamaayah')=='BUDDHA' ) selected @endif>BUDDHA</option>
                                                    <option value="KONGHUCU" @if(old('agamaayah')=='KONGHUCU' ) selected @endif>KONGHUCU</option>
                                                    <option value="LAINNYA" @if(old('agamaayah')=='LAINNYA' ) selected @endif>LAINNYA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaanayah" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaanayah" class="form-control" id="pekerjaanayah" value="{{ old('pekerjaanayah') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamatayah" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamatayah" class="form-control" id="alamatayah" value="{{ old('alamatayah') }}" required>
                                            </div>
                                        </div>
                                        {{-- Data Ibu --}}
                                        <h5 class="modal-title mt-2 mb-3"><strong>Data Ibu</strong></h5>
                                        <div class="row mb-3">
                                            <label for="nikibu" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="nikibu" class="form-control" id="nikibu" value="{{ old('nikibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="namaibu" class="form-control" id="namaibu" value="{{ old('namaibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_kelaminibu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_kelaminibu" name="jenis_kelaminibu" class="form-select" required>
                                                    <option value="" @if(old('jenis_kelaminibu')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                                    <option value="LAKI LAKI" @if(old('jenis_kelaminibu')=='LAKI LAKI' ) selected @endif>LAKI LAKI</option>
                                                    <option value="PEREMPUAN" @if(old('jenis_kelaminibu')=='PEREMPUAN' ) selected @endif>PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tempat_lahiribu" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tempat_lahiribu" name="tempat_lahiribu" value="{{ old('tempat_lahiribu') }}" required>
                                            </div>
                                            <label for="tanggal_lahiribu" class="col-sm-1 col-form-label text-center">/</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tanggal_lahiribu" name="tanggal_lahiribu" value="{{ old('tanggal_lahiribu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="agamaibu" class="col-sm-3 col-form-label">Agama</label>
                                            <div class="col-sm-9">
                                                <select id="agamaibu" name="agamaibu" class="form-select" required>
                                                    <option value="" @if(old('agama')=='' ) selected @endif>Pilih Agama ...</option>
                                                    <option value="ISLAM" @if(old('agama')=='ISLAM' ) selected @endif>ISLAM</option>
                                                    <option value="KRISTEN" @if(old('agama')=='KRISTEN' ) selected @endif>KRISTEN</option>
                                                    <option value="KATHOLIK" @if(old('agama')=='KATHOLIK' ) selected @endif>KATHOLIK</option>
                                                    <option value="HINDU" @if(old('agama')=='HINDU' ) selected @endif>HINDU</option>
                                                    <option value="BUDDHA" @if(old('agama')=='BUDDHA' ) selected @endif>BUDDHA</option>
                                                    <option value="KONGHUCU" @if(old('agama')=='KONGHUCU' ) selected @endif>KONGHUCU</option>
                                                    <option value="LAINNYA" @if(old('agama')=='LAINNYA' ) selected @endif>LAINNYA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pekerjaanibu" class="col-sm-3 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaanibu" class="form-control" id="pekerjaanibu" value="{{ old('pekerjaanibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamatibu" class="form-control" id="alamatibu" value="{{ old('alamatibu') }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="deskripsi2" class="col-sm-3 col-form-label">Deskripsi 2</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="deskripsi2" class="form-control" id="deskripsi2" rows="3" required>Pemilik nama tersebut di atas adalah benar warga kami RT 09 kalurahan Sentolo, Kecamatan Sentolo dan sepengetahuan kami yang bersangkutan berkelakuan baik. Surat keterangan pengantar ini diberikan untuk keperluan pengurusan surat nikah.</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                            <div class="col-sm-9">
                                                <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select" required>
                                                    <option value="" disabled selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                    <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                    <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                    @foreach($pejabat as $value)
                                                    <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
            @endcanany

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Surat Penyataan Belum Menikah</h5>
                    </div>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover datatable responsive-table w-100">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Status</th>
                                @canany(['edit surat', 'lihat surat', 'hapus surat'])
                                <th scope="col" class="text-center">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($spn as $value)
                            <tr>
                                <th scope="row">{{ $no++ }}.</th>
                                <td>{{ $value->nomor_surat }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->nik }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#status_{{$value->id}}" class="btn btn-primary">
                                        <i class="bi bi-clock-history"></i> Lihat
                                    </a>
                                </td>
                                <!-- ini bagian modal badge status verifikasi -->
                                <div class="modal fade" id="status_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status Surat Pengantar Nikah {{$value->nomor_surat}}</h5>
                                                <div class="mx-3">{!! $badge_status[$value->status_surat] !!}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                    <div class="row border-bottom p-3">
                                                        <div class="col-sm-3">
                                                            {!! $badge_status[$verifikasi->status]!!}
                                                            {{ $verifikasi->updated_at }}
                                                        </div>
                                                        <div class="col mx-5">
                                                            {{ $verifikasi->nama_user}}
                                                            ( {{ $verifikasi->jabatan_user}} )
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- bagian action -->
                                @canany(['edit surat', 'lihat surat', 'hapus surat'])
                                <td class="text-center d-flex justify-content-evenly">
                                    @can('lihat surat')
                                    <a class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-secondary' }}" type="submit" target="blank" href="/admin/e-surat/surat-pn/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                    @endcan
                                    @can('edit surat')
                                    <!-- Button trigger modal -->
                                    <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SPN{{$value->id}}" href="/admin/e-surat/edit-surat-pn/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    @endcan
                                    @can('hapus surat')
                                    <a data-bs-toggle="modal" data-bs-target="#kearsip_{{$value->id}}">
                                        @if($value->status_surat == '2')
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-circle-up"></i>
                                            @else
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-circle-up"></i>
                                                @endif
                                            </button>
                                    </a>
                                    <!-- modal hapus atau delete -->
                                    <div class="modal fade" id="kearsip_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">SSurat Pengantar Nikah {{$value->nomor_surat}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <p>Apakah Anda yakin untuk mengarsipkan surat dengan nomor {{$value->nomor_surat}}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/admin/e-surat/surat-pn/{{$value->id}}/{{$value->status_surat}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-danger' }}">Arsipkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </td>
                                @endcanany
                            </tr>
                            @can('edit surat')
                            <!-- Modal Edit SPBM-->
                            <div class="modal fade" id="Modal-Edit-SPN{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SPN" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="/admin/e-surat/surat-pn/{{$value->id}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="Modal-Edit-SPN">Edit Data Surat Pernyataan Belum Menikah {{$value->nomor_surat}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="nomor_surat3" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nomor_surat3" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="deskripsi1" class="col-sm-3 col-form-label">Deskripsi 1</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="deskripsi1" class="form-control" id="deskripsi1" rows="3" required>{{$value->deskripsi1}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nama3" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama" class="form-control" id="nama3" value="{{$value->nama}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jenis_kelamin3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_kelamin3" name="jenis_kelamin" class="form-select" required>
                                                            <option value="">Pilih Jenis Kelamin ...</option>
                                                            <option value="LAKI LAKI" {{ ($value->jenis_kelamin == "LAKI LAKI") ? 'selected' : '' }}>LAKI LAKI</option>
                                                            <option value="PEREMPUAN" {{ ($value->jenis_kelamin == "PEREMPUAN") ? 'selected' : '' }}>PEREMPUAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tempat_lahir3" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="tempat_lahir3" name="tempat_lahir" value="{{$value->tempat_lahir}}" required>
                                                    </div>
                                                    <label for="tanggal_lahir3" class="col-sm-1 col-form-label text-center">/</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" id="tanggal_lahir3" name="tanggal_lahir" value="{{$value->tanggal_lahir}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="agama3" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <select id="agama3" name="agama" class="form-select" required>
                                                            <option value="">Pilih Agama ...</option>
                                                            <option value="ISLAM" {{ ($value->agama == "ISLAM") ? 'selected' : '' }}>ISLAM</option>
                                                            <option value="KRISTEN" {{ ($value->agama == "KRISTEN") ? 'selected' : '' }}>KRISTEN</option>
                                                            <option value="KATHOLIK" {{ ($value->agama == "KATHOLIK") ? 'selected' : '' }}>KATHOLIK</option>
                                                            <option value="HINDU" {{ ($value->agama == "HINDU") ? 'selected' : '' }}>HINDU</option>
                                                            <option value="BUDDHA" {{ ($value->agama == "BUDDHA") ? 'selected' : '' }}>BUDDHA</option>
                                                            <option value="KONGHUCU" {{ ($value->agama == "KONGHUCU") ? 'selected' : '' }}>KONGHUCU</option>
                                                            <option value="LAINNYA" {{ ($value->agama == "LAINNYA") ? 'selected' : '' }}>LAINNYA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="pekerjaan3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan3" value="{{$value->pekerjaan}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="alamat3" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamat" class="form-control" id="alamat3" value="{{$value->alamat}}" required>
                                                    </div>
                                                </div>
                                                {{-- Data Ayah --}}
                                                <h5 class="modal-title mt-2 mb-3"><strong>Data Ayah</strong></h5>
                                                <div class="row mb-3">
                                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="namaayah" class="form-control" id="namaayah" value="{{$value->namaayah}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nikayah" class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nikayah" class="form-control" id="nikayah" value="{{$value->nikayah}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jenis_kelaminayah" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_kelaminayah" name="jenis_kelaminayah" class="form-select" required>
                                                            <option value="">Pilih Jenis Kelamin ...</option>
                                                            <option value="LAKI LAKI" {{ ($value->jenis_kelaminayah == "LAKI LAKI") ? 'selected' : '' }}>LAKI LAKI</option>
                                                            <option value="PEREMPUAN" {{ ($value->jenis_kelaminayah == "PEREMPUAN") ? 'selected' : '' }}>PEREMPUAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tempat_lahirayah" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="tempat_lahirayah" name="tempat_lahirayah" value="{{$value->tempat_lahirayah}}" required>
                                                    </div>
                                                    <label for="tanggal_lahirayah" class="col-sm-1 col-form-label text-center">/</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" id="tanggal_lahirayah" name="tanggal_lahirayah" value="{{$value->tanggal_lahirayah}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <select id="agamaayah" name="agamaayah" class="form-select" required>
                                                            <option value="">Pilih Agama ...</option>
                                                            <option value="ISLAM" {{ ($value->agamaayah == "ISLAM") ? 'selected' : '' }}>ISLAM</option>
                                                            <option value="KRISTEN" {{ ($value->agamaayah == "KRISTEN") ? 'selected' : '' }}>KRISTEN</option>
                                                            <option value="KATHOLIK" {{ ($value->agamaayah == "KATHOLIK") ? 'selected' : '' }}>KATHOLIK</option>
                                                            <option value="HINDU" {{ ($value->agamaayah == "HINDU") ? 'selected' : '' }}>HINDU</option>
                                                            <option value="BUDDHA" {{ ($value->agamaayah == "BUDDHA") ? 'selected' : '' }}>BUDDHA</option>
                                                            <option value="KONGHUCU" {{ ($value->agamaayah == "KONGHUCU") ? 'selected' : '' }}>KONGHUCU</option>
                                                            <option value="LAINNYA" {{ ($value->agamaayah == "LAINNYA") ? 'selected' : '' }}>LAINNYA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="pekerjaanayah" class="form-control" id="pekerjaanayah" value="{{$value->pekerjaanayah}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="alamatayah" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamatayah" class="form-control" id="alamatayah" value="{{$value->alamatayah}}" required>
                                                    </div>
                                                </div>
                                                {{-- Data Ibu --}}
                                                <h5 class="modal-title mt-2 mb-3"><strong>Data Ibu</strong></h5>
                                                <div class="row mb-3">
                                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="namaibu" class="form-control" id="namaibu" value="{{$value->namaibu}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nikayah" class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nikibu" class="form-control" id="nikibu" value="{{$value->nikibu}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jenis_kelaminibu" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_kelaminibu" name="jenis_kelaminibu" class="form-select" required>
                                                            <option value="">Pilih Jenis Kelamin ...</option>
                                                            <option value="LAKI LAKI" {{ ($value->jenis_kelaminibu == "LAKI LAKI") ? 'selected' : '' }}>LAKI LAKI</option>
                                                            <option value="PEREMPUAN" {{ ($value->jenis_kelaminibu == "PEREMPUAN") ? 'selected' : '' }}>PEREMPUAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tempat_lahiribu" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="tempat_lahiribu" name="tempat_lahiribu" value="{{$value->tempat_lahiribu}}" required>
                                                    </div>
                                                    <label for="tanggal_lahirayah" class="col-sm-1 col-form-label text-center">/</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" id="tanggal_lahiribu" name="tanggal_lahiribu" value="{{$value->tanggal_lahiribu}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <select id="agamaibu" name="agamaibu" class="form-select" required>
                                                            <option value="">Pilih Agama ...</option>
                                                            <option value="ISLAM" {{ ($value->agamaibu == "ISLAM") ? 'selected' : '' }}>ISLAM</option>
                                                            <option value="KRISTEN" {{ ($value->agamaibu == "KRISTEN") ? 'selected' : '' }}>KRISTEN</option>
                                                            <option value="KATHOLIK" {{ ($value->agamaibu == "KATHOLIK") ? 'selected' : '' }}>KATHOLIK</option>
                                                            <option value="HINDU" {{ ($value->agamaibu == "HINDU") ? 'selected' : '' }}>HINDU</option>
                                                            <option value="BUDDHA" {{ ($value->agamaibu == "BUDDHA") ? 'selected' : '' }}>BUDDHA</option>
                                                            <option value="KONGHUCU" {{ ($value->agamaibu == "KONGHUCU") ? 'selected' : '' }}>KONGHUCU</option>
                                                            <option value="LAINNYA" {{ ($value->agamaibu == "LAINNYA") ? 'selected' : '' }}>LAINNYA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="pekerjaanibu" class="form-control" id="pekerjaanibu" value="{{$value->pekerjaanibu}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="alamatayah" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamatibu" class="form-control" id="alamatibu" value="{{$value->alamatibu}}" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="deskripsi2" class="col-sm-3 col-form-label">Deskripsi 2</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="deskripsi2" class="form-control" id="deskripsi2" rows="3" required>{{$value->deskripsi2}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                                    <div class="col-sm-9">
                                                        <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                            <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                            @foreach($pejabat as $jabat)
                                                            <option value="{{ $value->tandatangan[0]->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($value->tandatangan[0]->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                                </div>
                                                <div class="row mb-3">
                                                    @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                    <div class="col-md-4 mb-3">
                                                        <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                            <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                            @foreach($pejabat as $jabat)
                                                            <option value="{{ $verifikasi->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($verifikasi->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endforeach
                                                    @if(count($value->MengetahuiVerifikasiSurat) < 3) @foreach(range(1, 3 - count($value->MengetahuiVerifikasiSurat)) as $index)
                                                        <div class="col-md-4 mb-3">
                                                            <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                                <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                                @foreach($pejabat as $jabat)
                                                                <option value="{{ '-/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}">{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <!-- End Table with hoverable rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
