@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/penduduk">Data Penduduk</a></li>
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
                            <form class="row g-3" action="/penduduk" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nik" id="nik" required {{ old('nik') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nama" id="nama" required {{ old('nama') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required {{ old('tempat_lahir') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<i style="color: #ff0000;">*</i></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required {{ old('tanggal_lahir') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="" @if(old('jenis_kelamin')=='' ) selected @endif>Pilih Jenis Kelamin ...</option>
                                        <option value="Laki-laki" @if(old('jenis_kelamin')=='Laki-laki' ) selected @endif>Laki-laki</option>
                                        <option value="Perempuan" @if(old('jenis_kelamin')=='Perempuan' ) selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agama" class="form-label">Agama<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="agama" name="agama" required>
                                        <option value="" @if(old('agama')=='' ) selected @endif>Pilih Agama ...</option>
                                        <option value="Islam" @if(old('agama')=='Islam' ) selected @endif>Islam</option>
                                        <option value="Kristen Protestan" @if(old('agama')=='Kristen Protestan' ) selected @endif>Kristen Protestan</option>
                                        <option value="Kristen Katolik" @if(old('agama')=='Kristen Katolik' ) selected @endif>Kristen Katolik</option>
                                        <option value="Hindu" @if(old('agama')=='Hindu' ) selected @endif>Hindu</option>
                                        <option value="Buddha" @if(old('agama')=='Buddha' ) selected @endif>Buddha</option>
                                        <option value="Konghucu" @if(old('agama')=='Konghucu' ) selected @endif>Konghucu</option>
                                        <option value="Lainnya" @if(old('agama')=='Lainnya' ) selected @endif>Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="" @if(old('status_perkawinan')=='' ) selected @endif>Pilih Status Perkawinan ...</option>
                                        <option value="Belum Menikah" @if(old('status_perkawinan')=='Belum Menikah' ) selected @endif>Belum Menikah</option>
                                        <option value="Sudah Menikah" @if(old('status_perkawinan')=='Sudah Menikah' ) selected @endif>Sudah Menikah</option>
                                        <option value="Duda" @if(old('status_perkawinan')=='Duda' ) selected @endif>Duda</option>
                                        <option value="Janda" @if(old('status_perkawinan')=='Janda' ) selected @endif>Janda</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="kewarganegaraan" name="kewarganegaraan" required>
                                        <option value="" @if(old('kewarganegaraan')=='' ) selected @endif>Pilih Kewarganegaraan ...</option>
                                        <option value="WNI" @if(old('kewarganegaraan')=='WNI' ) selected @endif>WNI</option>
                                        <option value="WNA" @if(old('kewarganegaraan')=='WNA' ) selected @endif>WNA</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required {{ old('alamat') }}>
                                </div>
                                <div class="col-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required {{ old('pekerjaan') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                        <option value="" @if(old('pendidikan_terakhir')=='' ) selected @endif>Pilih Pendidikan Terakhir ...</option>
                                        <option value="SD" @if(old('pendidikan_terakhir')=='SD' ) selected @endif>SD</option>
                                        <option value="SMP" @if(old('pendidikan_terakhir')=='SMP' ) selected @endif>SMP</option>
                                        <option value="SMK" @if(old('pendidikan_terakhir')=='SMK' ) selected @endif>SMK</option>
                                        <option value="S1" @if(old('pendidikan_terakhir')=='S1' ) selected @endif>S1</option>
                                        <option value="S2" @if(old('pendidikan_terakhir')=='S2' ) selected @endif>S2</option>
                                        <option value="S3" @if(old('pendidikan_terakhir')=='S3' ) selected @endif>S3</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nomor_telepon" id="nomor_telepon" required {{ old('nomor_telepon') }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="penghasilan" class="form-label">Penghasilan</label>
                                    <select class="form-select" id="penghasilan" name="penghasilan">
                                        <option value="" @if(old('penghasilan')=='' ) selected @endif>Pilih Penghasilan Perbulan...</option>
                                        <option value="< Rp. 500.000" @if(old('penghasilan')=='< Rp. 500.000' ) selected @endif>< Rp. 500.000</option>
                                        <option value="Rp. 500.000 - Rp. 1.000.000" @if(old('penghasilan')=='Rp. 500.000 - Rp. 1.000.000' ) selected @endif>Rp. 500.000 - Rp. 1.000.000</option>
                                        <option value="Rp. 1.000.000 - Rp. 3.000.000" @if(old('penghasilan')=='Rp. 1.000.000 - Rp. 3.000.000' ) selected @endif>Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="Rp. 3.000.000 - Rp. 5.000.000" @if(old('penghasilan')=='Rp. 3.000.000 - Rp. 5.000.000' ) selected @endif>Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="> Rp. 5.000.000" @if(old('penghasilan')=='> Rp. 5.000.000' ) selected @endif>> Rp. 5.000.000</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="foto_penduduk" class="form-label">Foto Penduduk</label>
                                    <input type="file" class="form-control" name="foto_penduduk" id="foto_penduduk">
                                </div>
                                <div class="col-6">
                                    <label for="nomor_kk" class="form-label">Nomor KK<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nomor_kk" id="nomor_kk" required {{ old('nomor_kk') }}>
                                </div>
                                <div class="col-6">
                                    <label for="nomor_ktp" class="form-label">Nomor KTP<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nomor_ktp" id="nomor_ktp" required {{ old('nomor_ktp') }}>
                                </div>
                                <div class="col-6">
                                    <label for="kontak_darurat" class="form-label">Kontak Darurat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="kontak_darurat" id="kontak_darurat" required {{ old('kontak_darurat') }}>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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
                            <form class="row g-3" action="/penduduk/{{$penduduk->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nik" id="nik" required value="{{ $penduduk->nik }}">
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
                                        <option value="Laki-laki" {{ ($penduduk->jenis_kelamin == "Laki-laki") ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ ($penduduk->jenis_kelamin == "Perempuan") ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agama" class="form-label">Agama<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="agama" name="agama" required>
                                        <option value="">Pilih Agama ...</option>
                                        <option value="Islam" {{ ($penduduk->agama == "Islam") ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen Protestan" {{ ($penduduk->agama == "Kristen Protestan") ? 'selected' : '' }}>Kristen Protestan</option>
                                        <option value="Kristen Katolik" {{ ($penduduk->agama == "Kristen Katolik") ? 'selected' : '' }}>Kristen Katolik</option>
                                        <option value="Hindu" {{ ($penduduk->agama == "Hindu") ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ ($penduduk->agama == "Buddha") ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ ($penduduk->agama == "Konghucu") ? 'selected' : '' }}>Konghucu</option>
                                        <option value="Lainnya" {{ ($penduduk->agama == "Lainnya") ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="" >Pilih Status Perkawinan ...</option>
                                        <option value="Belum Menikah" {{ ($penduduk->status_perkawinan == "Belum Menikah") ? 'selected' : '' }}>Belum Menikah</option>
                                        <option value="Sudah Menikah" {{ ($penduduk->status_perkawinan == "Sudah Menikah") ? 'selected' : '' }}>Sudah Menikah</option>
                                        <option value="Janda" {{ ($penduduk->status_perkawinan == "Janda") ? 'selected' : '' }}>Janda</option>
                                        <option value="Duda" {{ ($penduduk->status_perkawinan == "Duda") ? 'selected' : '' }}>Duda</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="kewarganegaraan" name="kewarganegaraan" required>
                                        <option value="" >Pilih Kewarganegaraan ...</option>
                                        <option value="WNI" {{ ($penduduk->kewarganegaraan == "WNI") ? 'selected' : '' }}>WNI</option>
                                        <option value="WNA" {{ ($penduduk->kewarganegaraan == "WNA") ? 'selected' : '' }}>WNA</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required value="{{ $penduduk->alamat }}">
                                </div>
                                <div class="col-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required value="{{ $penduduk->pekerjaan }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                        <option value="" >Pilih Pendidikan Terakhir ...</option>
                                        <option value="SD" {{ ($penduduk->pendidikan_terakhir == "SD") ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ ($penduduk->pendidikan_terakhir == "SMP") ? 'selected' : '' }}>SMP</option>
                                        <option value="SMK" {{ ($penduduk->pendidikan_terakhir == "SMK") ? 'selected' : '' }}>SMK</option>
                                        <option value="S1" {{ ($penduduk->pendidikan_terakhir == "S1") ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ ($penduduk->pendidikan_terakhir == "S2") ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ ($penduduk->pendidikan_terakhir == "S3") ? 'selected' : '' }}>S3</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" required value="{{ $penduduk->nomor_telepon }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="penghasilan" class="form-label">Penghasilan</label>
                                    <select class="form-select" id="penghasilan" name="penghasilan">
                                        <option value="" >Pilih Penghasilan Perbulan...</option>
                                        <option value="< Rp. 500.000" {{ ($penduduk->penghasilan == "< Rp. 500.000") ? 'selected' : ''}}>< Rp. 500.000</option>
                                        <option value="Rp. 500.000 - Rp. 1.000.000" {{ ($penduduk->penghasilan == "Rp. 500.000 - Rp. 1.000.000") ? 'selected' : ''}}>Rp. 500.000 - Rp. 1.000.000</option>
                                        <option value="Rp. 1.000.000 - Rp. 3.000.000" {{ ($penduduk->penghasilan == "Rp. 1.000.000 - Rp. 3.000.000") ? 'selected' : ''}}>Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ ($penduduk->penghasilan == "Rp. 3.000.000 - Rp. 5.000.000") ? 'selected' : ''}}>Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="> Rp. 5.000.000" {{ ($penduduk->penghasilan == "> Rp. 5.000.000") ? 'selected' : ''}}>> Rp. 5.000.000</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="foto_penduduk" class="form-label">Foto Penduduk</label>
                                    <input type="file" class="form-control" name="foto_penduduk" id="foto_penduduk" value="{{ $penduduk->foto_penduduk }}">
                                </div>
                                <div class="col-6">
                                    <label for="nomor_kk" class="form-label">Nomor KK<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nomor_kk" id="nomor_kk" required value="{{ $penduduk->nomor_kk }}">
                                </div>
                                <div class="col-6">
                                    <label for="nomor_ktp" class="form-label">Nomor KTP<i style="color: #ff0000;">*</i></label>
                                    <input type="number" class="form-control" name="nomor_ktp" id="nomor_ktp" required value="{{ $penduduk->nomor_ktp }}">
                                </div>
                                <div class="col-6">
                                    <label for="kontak_darurat" class="form-label">Kontak Darurat<i style="color: #ff0000;">*</i></label>
                                    <input type="text" class="form-control" name="kontak_darurat" id="kontak_darurat" required value="{{ $penduduk->kontak_darurat }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_nyawa" class="form-label">Status Nyawa<i style="color: #ff0000;">*</i></label>
                                    <select class="form-select" id="status_nyawa" name="status_nyawa" required>
                                        <option value="" >Pilih Status Nyawa ...</option>
                                        <option value="Hidup" {{ ($penduduk->status_nyawa == "Hidup") ? 'selected' : '' }}>Hidup</option>
                                        <option value="Meninggal" {{ ($penduduk->status_nyawa == "Meninggal") ? 'selected' : '' }}>Meninggal</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="keterangan_kematian" class="form-label">Keterangan Kematian</label>
                                    <input type="text" class="form-control" name="keterangan_kematian" id="keterangan_kematian" value="{{ $penduduk->keterangan_kematian }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status_migrasi" class="form-label">Status Migrasi</label>
                                    <select class="form-select" id="status_migrasi" name="status_migrasi" >
                                        <option value="" >Pilih Status Migrasi ...</option>
                                        <option value="Migrasi Masuk" {{ ($penduduk->status_migrasi == "Migrasi Masuk") ? 'selected' : '' }}>Migrasi Masuk</option>
                                        <option value="Migrasi Keluar" {{ ($penduduk->status_migrasi == "Migrasi Keluar") ? 'selected' : '' }}>Migrasi Keluar</option>
                                        <option value="Tidak Migrasi" {{ ($penduduk->status_migrasi == "Tidak Migrasi") ? 'selected' : '' }}>Tidak Migrasi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status_pajak" class="form-label">Status Pajak</label>
                                    <select class="form-select" id="status_pajak" name="status_pajak" >
                                        <option value="" >Pilih Status Pajak ...</option>
                                        <option value="Terdaftar" {{ ($penduduk->status_pajak == "Terdaftar") ? 'selected' : '' }}>Terdaftar</option>
                                        <option value="Belum Terdaftar" {{ ($penduduk->status_pajak == "Belum Terdaftar") ? 'selected' : '' }}>Belum Terdaftar</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a type="submit" href="/penduduk" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>
            @endif
        </div>
    </section>
@endsection
