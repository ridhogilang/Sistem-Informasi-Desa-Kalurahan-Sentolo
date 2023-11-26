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

                                @if($value->name == 'enter_kepegawaian')<br><b>Aplikasi Kepegwaian</b><br><ul>@endif
                                    @if($value->name == 'user_list')<b>Pengelolaan Pegawai</b><br><ul>@endif
                                    @if($value->name == 'role_list')</ul><b>Pengelolaan Hak Akses / Jabatan</b><br><ul>@endif
                                @if($value->name == 'enter_e-surat')</ul></ul><b>Aplikasi E-surat</b><br><ul>@endif
                                    @if($value->name == 'list surat')<b>Transaksi Surat</b><br><ul>@endif
                                    @if($value->name == 'surat KTM')</ul><b>Jenis Surat Yang dibuat</b><br><ul>@endif
                                @if($value->name == 'enter_sistem informasi')</ul></ul><b>Aplikasi Sistem Informasi</b><br><ul>@endif
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

