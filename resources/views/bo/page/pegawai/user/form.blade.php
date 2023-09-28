@extends('bo.layout.master')

@section('content')
<div class="pagetitle">
        <h1>Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Kepegawaian</a></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item active">Tambah Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-12 margin-tb mb-4">
                <div class="pull-left">
                    <h2>Tambah Pegawai
                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('bo.pegawai.user_management.index') }}"> Back</a>
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

        <form action="{{ $url }}" method="POST">
            @csrf
            @if(isset($user->nama))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>nama:</strong>
                        <input type="text" name="nama" value="{{ old('nama', isset($user) ? $user->nama : '') }}"
                        class="form-control" placeholder="nama">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles" id="id_supplier" class="form-control">
                            <option disabled selected value="">Silahkan Pilih Jabatan / Hak Akses</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" >{{ $role }}</option>
                            @endforeach
                        </select>
                        <!-- 
                        <select class="form-control" multiple name="roles[]">
                            
                        </select> -->
                    </div>
                </div>
                <div class="col-xs-12 mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </section>
@endsection

