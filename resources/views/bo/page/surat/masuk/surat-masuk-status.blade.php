@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Masuk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item">Surat Masuk</li>
                <li class="breadcrumb-item active">Status Surat {{ $suratM->nomor_surat }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                <h5 class="card-title">
                   Riwayat Surat {{ $suratM->nomor_surat }}
                </h5>
                    <div class="mx-3 p-3">{!! $badge_disposisi_status[$suratM->status_surat] !!}</div>
                </div>
                <?php
                    $pamongDps[$suratM->id][] = '-';
                ?>
                @foreach($suratM->detilDisposisi as $detildis)
                <div class="row border-bottom p-3">
                    <div class="col">
                        Diterima : {{ $detildis->tgl_diterima_dari_disposisi }}<br>
                        @if(auth()->user()->id == $detildis->id_user)
                            Anda <br>
                        @elseif($detildis->id_user == 'PU')
                            ( {{ $detildis->jabatan_user }} )<br>
                        @else
                            {{ $detildis->pamongDPSS->nama }} ( {{ $detildis->jabatan_user }} )<br>
                        @endif
                        <!-- memilih status -->
                        @if($detildis->id_user == 'PU')
                            Surat Dianalisis ulang oleh Pelayanan Umum
                        @elseif($detildis->status_disposisi == '1' || $detildis->status_disposisi == '4')
                            {!! ($detildis->jenis_disposisi == 'PLK')?$badge_disposisi_status['4']:''!!}

                            {!! $badge_disposisi_status[$detildis->status_disposisi] !!}

                        @else
                        Tindakan : {{ $detildis->tgl_dilanjutkan_ke_disposisi }}<br>
                            {!! ($detildis->jenis_disposisi == 'PLK')?$badge_disposisi_status['4']:''!!}
                            {!! $badge_disposisi_status[$detildis->status_disposisi] !!} {{ $detildis->catatan }}
                        @endif

                    </div>
                </div>
                <?php

                    $id_dtl[$suratM->id] = $detildis->id;
                    $id_jns[$suratM->id] = $detildis->jenis_disposisi;

                ?>

                @endforeach

              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
