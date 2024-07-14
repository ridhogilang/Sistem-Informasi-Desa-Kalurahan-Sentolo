@extends('bo.layout.master')

@push('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('content')
<div class="pagetitle">
        <h1>Akun Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Pengguna</a></li>
                <li class="breadcrumb-item">Akun Penduduk</li>
                <li class="breadcrumb-item active">Tambah Akun Penduduk</li>
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
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>NIK - Nama :</strong>
                        <select name="nik" class="data-penduduk form-control">
                        </select>
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
                <div class="col-xs-12 mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $('.data-penduduk').select2({
            placeholder: "Pilih Nama - NIK",
            allowClear: true,
            ajax: {
                url: "{{ route('bo.pengguna.data.kependudukan')}}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.select_value,
                                text: item.select_display
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush

