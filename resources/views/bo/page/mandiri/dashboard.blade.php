@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Profile Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Profile Penduduk </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- ======= Navigation ======= -->
    @if(request()->is('profile-penduduk*'))
        @include('bo.partial.navigation')
    @endif
    <!-- End Navigation -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ isset(auth()->user()->foto_profil) ? asset('storage/public/' . auth()->user()->foto_profil) : asset('template/img/akun_kosong.png') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ auth()->user()->nama }}</h2>
                        <h3>@if(isset(auth()->user()->roles[0]['name']))
                                {{ auth()->user()->roles[0]['name'] }}
                            @endif</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Diri</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Foto Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                                </div>
                                @if(isset(auth()->user()->nik))
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat, Tanggal Lahir</div>
                                    <div class="col-lg-9 col-md-8">{{ $detil_pengguna->detilakun->tempat_lahir .', '. $detil_pengguna->detilakun->tanggal_lahir }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                    <div class="col-lg-9 col-md-8">{{ $detil_pengguna->detilakun->jenis_kelamin }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Agama</div>
                                    <div class="col-lg-9 col-md-8">{{$detil_pengguna->detilakun->agama}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                                    <div class="col-lg-9 col-md-8">{{$detil_pengguna->detilakun->pekerjaan}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor telepon</div>
                                    <div class="col-lg-9 col-md-8">{{$detil_pengguna->detilakun->nomor_telepon}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status Pajak</div>
                                    <div class="col-lg-9 col-md-8">{{$detil_pengguna->detilakun->status_pajak}}</div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('bo.akun.ganti_gambar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ isset(auth()->user()->foto_profil) ? asset('storage/public/' . auth()->user()->foto_profil) : asset('template/img/akun_kosong.png') }}" alt="Profile">
                                        </div>

                                        <div class="row mb-3 mt-3">
                                            <label for="foto_profil" class="col-sm-3 col-form-label">File Upload</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="foto_profil" type="file" id="foto_profil" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="foto_profil_existing" value="{{ auth()->user()->foto_profil }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>


                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('bo.akun.ganti_password') }}" method="post">  
                                    @csrf
                                    @method('put')

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confirm-password" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirm-password" type="password" class="form-control" id="confirm-password">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
