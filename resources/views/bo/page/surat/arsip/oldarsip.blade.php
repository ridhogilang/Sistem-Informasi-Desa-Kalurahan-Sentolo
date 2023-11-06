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

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data {{$title}}</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Nomor Surat</th>
                                    <th scope="col" class="text-center">Jenis Surat</th>
                                    <th scope="col" class="text-center">Riwayat</th>
                                    <th scope="col" class="text-center">Isi Surat</th>
                                    <th scope="col" class="text-center">Penghapusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arsip_surat as $value)
                                 <tr>
                                     <td>{{ $loop->iteration  }}</td>
                                     <td>{{ $value['nomor_surat'] }}</td>
                                     <td>{{ $value['jenis_surat_2'] .' ( '. $value['jenis_surat'] .' )'}}</td>
                                     <td class="text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#riwayat_surat_{{$value->id}}" class="btn btn-primary">
                                            <i class="bi bi-clock-history"></i> Lihat Riwayat
                                        </a>
                                     </td>
                                     <!-- ini modal riwayat surat -->
                                     <div class="modal fade" id="riwayat_surat_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Riwayat Surat {{ $value->nomor_surat }}</h5>
                                                        @if($value['jenis_surat_2'] == 'Surat Keluar')
                                                            <div class="mx-3">{!! $badge_status_mengetahui[$value->status_riwayat_surat] !!}</div>
                                                        @else
                                                            <div class="mx-3">{!! $badge_disposisi_status[$value->status_riwayat_surat] !!}</div>
                                                        @endif
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    @if($value['jenis_surat_2'] == 'Surat Keluar')
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            @foreach($value->dtlVerifikasiKeluar as $verifikasi)
                                                            <div class="row border-bottom p-3">
                                                                <div class="col-sm-3">
                                                                    {!! $badge_status_mengetahui[$verifikasi->status]!!}
                                                                    {{ $verifikasi->updated_at }}
                                                                </div>
                                                                <div class="col mx-5">
                                                                    {{ $verifikasi->nama_user}}
                                                                    ( {{ $verifikasi->jabatan_user}} )
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            @foreach($value->detilDisposisi as $detildis)
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
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                     <td class="text-center">
                                         <a href="{{ route('bo.surat.arsip_dihapus.show', $value['id']) }}" target="blank" class="btn btn-primary">
                                                <i class="bi bi-file-earmark"></i>
                                        </a>
                                     </td>
                                     <td class="text-center">
                                         <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_penghapusan_{{$value['id']}}">
                                              <i class="bi bi-eye"></i> Lihat Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_penghapusan_{{$value['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> {{$value['jenis_surat_2'].' '.$value['nomor_surat']}}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row text-start mt-3">
                                                        <div class="col-12 mb-2">
                                                            Pamong yang menghapus :
                                                        </div>
                                                        <div class="col px-3">
                                                            {{ $value->dtlPenghapusan->pamonghps->nama}}
                                                            ( {{$value->dtlPenghapusan->pamonghps->jabatan}} )
                                                        </div>
                                                    </div>
                                                    <div class="row text-start mt-3">
                                                        <div class="col-12 mb-2">
                                                            Dihapus Pada :
                                                        </div>
                                                        <div class="col px-3">
                                                            {{ $value->dtlPenghapusan->waktu_penghapusan}}
                                                        </div>
                                                    </div>
                                                    <div class="row text-start mt-3">
                                                        <div class="col-12 mb-2">
                                                            Surat Penghapusan :
                                                        </div>
                                                        <div class="col px-3">
                                                            <a href="{{ route('bo.surat.arsip.doc', $value['id']) }}" target="blank" class="btn btn-danger">
                                                                    <i class="bi bi-file-earmark"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                     </td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
