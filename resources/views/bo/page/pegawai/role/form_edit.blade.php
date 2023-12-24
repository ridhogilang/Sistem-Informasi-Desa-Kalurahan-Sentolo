@extends('bo.layout.master')

@section('content')
<div class="pagetitle">
        <h1>Hak Akses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Kepegawaian</a></li>
                <li class="breadcrumb-item">Hak Akses</li>
                <li class="breadcrumb-item active">Edit Hak Akses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
                <div class="col-lg-12 margin-tb mb-4">
                    <div class="pull-left">
                        <h2>Edit Role
                            <div class="float-end">
                                <a class="btn btn-primary" href="{{ route('bo.pegawai.role_management.index') }}"> Back</a>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bo.pegawai.role_management.update', $role->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xs-12 mb-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 mb-3">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach ($permission as $value)

                                @if($value->name == 'Menejemen Pengguna')<br><b>Aplikasi Kepegwaian</b><br><ul>@endif
                                @if($value->name == 'Menejemen Pengguna')</ul></ul><span>*hak akses Menejemen Pengguna harus diaktifkan jika ingin mengakses fitur dalam Aplikasi Kepegwaian</span><br><ul>@endif
                                    @if($value->name == 'Kelola Pengguna')<b>Pengelolaan Pegawai</b><br><ul>@endif
                                    @if($value->name == 'Kelola Hak Akses Pamong')</ul><b>Pengelolaan Hak Akses / Jabatan</b><br><ul>@endif
                                @if($value->name == 'Menejemen E-Surat')</ul></ul><b>Aplikasi E-surat</b><br><ul>@endif
                                @if($value->name == 'Menejemen E-Surat')</ul></ul><span>*hak akses Menejemen E-Surat harus diaktifkan jika ingin mengakses fitur dalam Aplikasi E-surat</span><br><ul>@endif
                                    @if($value->name == 'list surat')<b>Transaksi Surat</b><br><ul>@endif
                                    @if($value->name == 'Surat Masuk')</ul><b>Jenis Surat Yang dibuat</b><br><ul>@endif
                                    @if($value->name == 'Arsip Surat')</ul><b>Pengarsipan Surat</b><br><ul>@endif
                                @if($value->name == 'Menejemen Sistem Informasi')</ul></ul><b>Aplikasi Sistem Informasi</b><br><ul>@endif
                                @if($value->name == 'Menejemen Sistem Informasi')</ul></ul><span>*hak akses manajemen sistem informasi harus diaktifkan jika ingin mengakses fitur dalam aplikasi sistem informasi</span><br><ul>@endif
                                    @if($value->name == 'lihat ip user')<b>IP User</b><br><ul>@endif
                                    @if($value->name == 'lihat running text')</ul><b>Running Text</b><br><ul>@endif
                                    @if($value->name == 'list pamong')</ul><b>Foto Pamong</b><br><ul>@endif
                                    @if($value->name == 'list galeri')</ul><b>Galeri</b><br><ul>@endif
                                    @if($value->name == 'list menu')</ul><b>Menu SID</b><br><ul>@endif
                                    @if($value->name == 'list header')</ul><b>Header dan Sub Header</b><br><ul>@endif
                                    @if($value->name == 'list agenda')</ul><b>Agenda</b><br><ul>@endif
                                    @if($value->name == 'list jadwal')</ul><b>Jadwal</b><br><ul>@endif
                                    @if($value->name == 'list sinergi')</ul><b>Sinergi</b><br><ul>@endif
                                    @if($value->name == 'list statistik')</ul><b>Statistik</b><br><ul>@endif
                                    @if($value->name == 'list apdes')</ul><b>APBDES</b><br><ul>@endif
                                    @if($value->name == 'list agenda gor')</ul><b>Agenda GOR dan Balai</b><br><ul>@endif
                                    @if($value->name == 'list berita')</ul><b>Berita</b><br><ul>@endif
                                    @if($value->name == 'list artikel')</ul><b>Artikel</b><br><ul>@endif
                                 @if($value->name == 'Menejemen Kependudukan')</ul></ul><b>Aplikasi Pencatatan Kependudukan</b><br><ul>@endif
                                @if($value->name == 'Menejemen Kependudukan')</ul></ul><span>*hak akses Menejemen Kependudukan harus diaktifkan jika ingin mengakses fitur dalam Aplikasi Pencatatan Kependudukan</span><br><ul>@endif
                                 @if($value->name == 'HR Absensi')</ul></ul><b>Aplikasi Absensi Pamong</b><br><ul>@endif
                                 @if($value->name == 'HR Absensi')</ul></ul><span>*setiap akun pamong akan dapat mengakses absensi tetapi untuk HR absensi digunakan untuk perizinan dan rekap absensi</span><br><ul>@endif
                                @if($value->name == 'Monitoring IOT')</ul></ul><b>Monitoring IOT</b><br><ul>@endif
                                <label>
                                    <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                        value="{{ $value->name }}" class="name">
                                    {{ $value->name }}</label>
                                <br />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 mb-3 text-start">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </section>
@endsection

