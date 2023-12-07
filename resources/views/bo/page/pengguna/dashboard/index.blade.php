@extends('bo.layout.master')

@section('content')
	<div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="col-lg-12">
          <div class="row">
              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Pamong <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['pamong'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>

              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card revenue-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Kontributor <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['kontributor'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>

              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card customers-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Penduduk <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['penduduk'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>
          </div>

      </div>
    </section>

@endsection
