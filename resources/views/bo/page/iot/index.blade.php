@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monitoring Suhu dan Kelembapan</h5>

                        @if (!empty($dataArray))
                            @foreach ($dataArray as $key => $item)
                                <div class="mb-3">
                                    <div class="card-body">
                                        <h3 class="card-subtitle mb-2 text-muted">Komposter {{ $key }}</h3>
                                        <h6 class="card-subtitle mb-2 text-muted">Waktu update terakhir pada Hari {{ Carbon\Carbon::createFromFormat('Y-m-d', $item['tanggal'])->isoFormat('dddd, D MMMM YYYY') }} Pukul {{ $item['waktu'] }}.</h6>
                                        <div class="row text-center">
                                            <div class="col-sm-3">
                                                <h5 class="card-text">Suhu</h5>
                                                <h3 class="card-text"><b>{{ $item['suhu'] }} °C</b></h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5 class="card-text">Kelembaban</h5>
                                                <h3 class="card-text"><b>{{ $item['kelembaban'] }} %</b></h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5 class="card-text">Ketinggian Atas</h5>
                                                <h3 class="card-text"><b>{{ $item['ketinggian_atas'] }} Cm</b></h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5 class="card-text">Ketinggian Bawah</h5>
                                                <h3 class="card-text"><b>{{ $item['ketinggian_bawah'] }} Cm</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Data tidak ditemukan atau terjadi kesalahan.</p>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
