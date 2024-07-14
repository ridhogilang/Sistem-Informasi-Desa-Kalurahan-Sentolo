@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/kependudukan/penduduk">Data Penduduk</a></li>
                <li class="breadcrumb-item active">{{ $action }} Data Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            @if ($action === 'Tambah')
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data</h5>

                            <!-- Tambah Data -->
                            <form class="row g-3" action="/admin/kependudukan/penduduk" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nik" id="nik" required value="{{ old('nik') }}">
                                </div>
                                <div class="col-6">
                                    <label for="nomor_kk" class="form-label">Nomor KK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nomor_kk" id="nomor_kk" required value="{{ old('nomor_kk') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama" id="nama" required value="{{ old('nama') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required value="{{ old('tempat_lahir') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="" @if(old('jenis_kelamin')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                        <option value="LAKI LAKI" @if(old('jenis_kelamin')=='LAKI LAKI' ) selected @endif>LAKI LAKI</option>
                                        <option value="PEREMPUAN" @if(old('jenis_kelamin')=='PEREMPUAN' ) selected @endif>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agama" class="form-label">Agama<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="agama" name="agama" required>
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
                                <div class="col-md-6">
                                    <label for="umur" class="form-label">Umur<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="umur" id="umur" required value="{{ old('umur') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="" @if(old('status_perkawinan')=='' ) selected @endif>Pilih Status Perkawinan ...</option>
                                        <option value="Belum Kawin" @if(old('status_perkawinan')=='Belum Kawin' ) selected @endif>Belum Kawin</option>
                                        <option value="Kawin" @if(old('status_perkawinan')=='Kawin' ) selected @endif>Kawin</option>
                                        <option value="Cerai Hidup" @if(old('status_perkawinan')=='Cerai Hidup' ) selected @endif>Cerai Hidup</option>
                                        <option value="Cerai Mati" @if(old('status_perkawinan')=='Cerai Mati' ) selected @endif>Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="pendidikan" class="form-label">Pendidikan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="pendidikan" name="pendidikan" required>
                                        <option value="" @if(old('pendidikan')=='' ) selected @endif>Pilih Pendidikan ...</option>
                                        <option value="Tidak/Belum Sekolah" @if(old('pendidikan')=='Tidak/Belum Sekolah' ) selected @endif>Tidak/Belum Sekolah</option>
                                        <option value="Belum Tamat SD/Sederajat" @if(old('pendidikan')=='Belum Tamat SD/Sederajat' ) selected @endif>Belum Tamat SD/Sederajat</option>
                                        <option value="Tamat SD/Sederajat" @if(old('pendidikan')=='Tamat SD/Sederajat' ) selected @endif>Tamat SD/Sederajat</option>
                                        <option value="SLTA/Sederajat" @if(old('pendidikan')=='SLTA/Sederajat' ) selected @endif>SLTA/Sederajat</option>
                                        <option value="Diploma I/II" @if(old('pendidikan')=='Diploma I/II' ) selected @endif>Diploma I/II</option>
                                        <option value="Diploma III/Sarjana muda" @if(old('pendidikan')=='Diploma III/Sarjana muda' ) selected @endif>Diploma III/Sarjana muda</option>
                                        <option value="Akademi/Diploma III/S. Muda" @if(old('pendidikan')=='Akademi/Diploma III/S. Muda' ) selected @endif>Akademi/Diploma III/S. Muda</option>
                                        <option value="Diploma IV/Strata I" @if(old('pendidikan')=='Diploma IV/Strata I' ) selected @endif>Diploma IV/Strata I</option>
                                        <option value="Strata II" @if(old('pendidikan')=='Strata II' ) selected @endif>Strata II</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_hubungan_kel" class="form-label">Status Hubungan Keluarga<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_hubungan_kel" name="status_hubungan_kel" required>
                                        <option value="" @if(old('status_hubungan_kel')=='' ) selected @endif>Pilih Status Hubungan Keluarga ...</option>
                                        <option value="ORANG TUA" @if(old('status_hubungan_kel')=='ORANG TUA' ) selected @endif>ORANG TUA</option>
                                        <option value="KEPALA KELUARGA" @if(old('status_hubungan_kel')=='KEPALA KELUARGA' ) selected @endif>KEPALA KELUARGA</option>
                                        <option value="ISTRI" @if(old('status_hubungan_kel')=='ISTRI' ) selected @endif>ISTRI</option>
                                        <option value="ANAK" @if(old('status_hubungan_kel')=='ANAK' ) selected @endif>ANAK</option>
                                        <option value="CUCU" @if(old('status_hubungan_kel')=='CUCU' ) selected @endif>CUCU</option>
                                        <option value="FAMILY LAIN" @if(old('status_hubungan_kel')=='FAMILY LAIN' ) selected @endif>FAMILY LAIN</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="nama_ayah" class="form-label">Nama Ayah<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required value="{{ old('nama_ayah') }}">
                                </div>
                                <div class="col-6">
                                    <label for="nama_ibu" class="form-label">Nama Ibu<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required value="{{ old('nama_ibu') }}">
                                </div>
                                <div class="col-6">
                                    <label for="alamat" class="form-label">Alamat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required value="{{ old('alamat') }}">
                                </div>
                                <div class="col-3">
                                    <label for="rt" class="form-label">RT<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="rt" id="rt" required value="{{ old('rt') }}">
                                </div>
                                <div class="col-3">
                                    <label for="rw" class="form-label">RW<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="rw" id="rw" required value="{{ old('rw') }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a type="submit" href="/admin/kependudukan/penduduk" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>
            @endif

            @if ($action === 'Edit')
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data</h5>

                            <!-- Edit Data -->
                            <form class="row g-3" action="/admin/kependudukan/penduduk/{{$penduduk->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nik" id="nik" required value="{{ $penduduk->nik }}">
                                </div>
                                <div class="col-6">
                                    <label for="nomor_kk" class="form-label">Nomor KK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nomor_kk" id="nomor_kk" required value="{{ $penduduk->nomor_kk }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama" id="nama" required value="{{ $penduduk->nama }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required value="{{ $penduduk->tempat_lahir }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required value="{{ $penduduk->tanggal_lahir }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="" >Pilih Jenis Kelamin ...</option>
                                        <option value="LAKI LAKI" {{ ($penduduk->jenis_kelamin == "LAKI LAKI") ? 'selected' : '' }}>LAKI LAKI</option>
                                        <option value="PEREMPUAN" {{ ($penduduk->jenis_kelamin == "PEREMPUAN") ? 'selected' : '' }}>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agama" class="form-label">Agama<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="agama" name="agama" required>
                                        <option value="">Pilih Agama ...</option>
                                        <option value="ISLAM" {{ ($penduduk->agama == "ISLAM") ? 'selected' : '' }}>ISLAM</option>
                                        <option value="KRISTEN" {{ ($penduduk->agama == "KRISTEN") ? 'selected' : '' }}>KRISTEN</option>
                                        <option value="KATHOLIK" {{ ($penduduk->agama == "KATHOLIK") ? 'selected' : '' }}>KATHOLIK</option>
                                        <option value="HINDU" {{ ($penduduk->agama == "HINDU") ? 'selected' : '' }}>HINDU</option>
                                        <option value="BUDDHA" {{ ($penduduk->agama == "BUDDHA") ? 'selected' : '' }}>BUDDHA</option>
                                        <option value="KONGHUCU" {{ ($penduduk->agama == "KONGHUCU") ? 'selected' : '' }}>KONGHUCU</option>
                                        <option value="LAINNYA" {{ ($penduduk->agama == "LAINNYA") ? 'selected' : '' }}>LAINNYA</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="umur" class="form-label">Umur<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="umur" id="umur" required value="{{ $penduduk->umur }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="" >Pilih Status Perkawinan ...</option>
                                        <option value="Belum Kawin" {{ ($penduduk->status_perkawinan == "Belum Kawin") ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ ($penduduk->status_perkawinan == "Kawin") ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ ($penduduk->status_perkawinan == "Cerai Hidup") ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ ($penduduk->status_perkawinan == "Cerai Mati") ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="pendidikan" class="form-label">Pendidikan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="pendidikan" name="pendidikan" required>
                                        <option value="" >Pilih Pendidikan ...</option>
                                        <option value="Tidak/Belum Sekolah" {{ ($penduduk->pendidikan == "Tidak/Belum Sekolah") ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                        <option value="Belum Tamat SD/Sederajat" {{ ($penduduk->pendidikan == "Belum Tamat SD/Sederajat") ? 'selected' : '' }}>Belum Tamat SD/Sederajat</option>
                                        <option value="Tamat SD/Sederajat" {{ ($penduduk->pendidikan == "Tamat SD/Sederajat") ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                                        <option value="SLTA/Sederajat" {{ ($penduduk->pendidikan == "SLTA/Sederajat") ? 'selected' : '' }}>SLTA/Sederajat</option>
                                        <option value="Diploma I/II" {{ ($penduduk->pendidikan == "Diploma I/II") ? 'selected' : '' }}>Diploma I/II</option>
                                        <option value="Diploma III/Sarjana muda" {{ ($penduduk->pendidikan == "Diploma III/Sarjana muda") ? 'selected' : '' }}>Diploma III/Sarjana muda</option>
                                        <option value="Akademi/Diploma III/S. Muda" {{ ($penduduk->pendidikan == "Akademi/Diploma III/S. Muda") ? 'selected' : '' }}>Akademi/Diploma III/S. Muda</option>
                                        <option value="Diploma IV/Strata I" {{ ($penduduk->pendidikan == "Diploma IV/Strata I") ? 'selected' : '' }}>Diploma IV/Strata I</option>
                                        <option value="Strata II" {{ ($penduduk->pendidikan == "Strata II") ? 'selected' : '' }}>Strata II</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required value="{{ $penduduk->pekerjaan }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_hubungan_kel" class="form-label">Status Hubungan Keluarga<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_hubungan_kel" name="status_hubungan_kel" required>
                                        <option value="" >Pilih Status Hubungan Keluarga ...</option>
                                        <option value="ORANG TUA" {{ ($penduduk->status_hubungan_kel == "ORANG TUA") ? 'selected' : '' }}>ORANG TUA</option>
                                        <option value="KEPALA KELUARGA" {{ ($penduduk->status_hubungan_kel == "KEPALA KELUARGA") ? 'selected' : '' }}>KEPALA KELUARGA</option>
                                        <option value="ISTRI" {{ ($penduduk->status_hubungan_kel == "ISTRI") ? 'selected' : '' }}>ISTRI</option>
                                        <option value="ANAK" {{ ($penduduk->status_hubungan_kel == "ANAK") ? 'selected' : '' }}>ANAK</option>
                                        <option value="CUCU" {{ ($penduduk->status_hubungan_kel == "CUCU") ? 'selected' : '' }}>CUCU</option>
                                        <option value="FAMILY LAIN" {{ ($penduduk->status_hubungan_kel == "FAMILY LAIN") ? 'selected' : '' }}>FAMILY LAIN</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_ayah" class="form-label">Nama Ayah<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required value="{{ $penduduk->nama_ayah }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_ibu" class="form-label">Nama Ibu<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required value="{{ $penduduk->nama_ibu }}">
                                </div>
                                <div class="col-6">
                                    <label for="alamat" class="form-label">Alamat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required value="{{ $penduduk->alamat }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="rt" class="form-label">RT<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="rt" id="rt" required value="{{ $penduduk->rt }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="rw" class="form-label">RW<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="rw" id="rw" required value="{{ $penduduk->rw }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a type="submit" href="/admin/kependudukan/penduduk" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>
            @endif
        </div>
    </section>
@endsection
