@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

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
                        <table class="table table-hover datatable responsive-table w-100">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Nomor Surat</th>
                                    <th scope="col" class="text-center">Tanggal Kegiatan</th>
                                    <th scope="col" class="text-center">Riwayat</th>
                                    <th scope="col" class="text-center">Isi Surat</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $value->suratMasuk->nomor_surat }}</td>
                                        <td>{{ date("d F Y", strtotime($value->suratMasuk->tanggal_kegiatan)) }}</td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#status_{{$value->id}}" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                        <!-- ini bagian modal badge status verifikasi -->
                                        <div class="modal fade" id="status_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Riwayat Surat {{ $value->suratMasuk->nomor_surat }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <?php
                                                                $pamongDps[$value->id][] = '-';
                                                            ?>
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
                                                            <?php
                                                                if (!in_array($detildis->id_user, $pamongDps[$value->id])) {
                                                                    if ($detildis->status_disposisi != '3') {
                                                                        $pamongDps[$value->id][] = $detildis->id_user;
                                                                    }
                                                                } else {
                                                                    $index = array_search($detildis->id_user, $pamongDps[$value->id]);
                                                                    if ($detildis->status_disposisi == '3' && $index !== false) {
                                                                        array_splice($pamongDps[$value->id], $index, 1);
                                                                    }
                                                                }


                                                                $id_dtl[$value->id] = $detildis->id;
                                                                $id_jns[$value->id] = $detildis->jenis_disposisi;


                                                            ?>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <td class="text-center">
                                            <a href="{{ route('bo.surat.disposisi.show', $value['id_surat']) }}" target="blank" class="btn btn-primary">
                                                <i class="bi bi-file-earmark"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-evenly">
                                                <button data-bs-toggle="modal" data-bs-target="#dispos_{{$value->id}}" class="btn btn-success" type="submit">
                                                    <i class="bi bi-diagram-2"></i> Tindakan
                                                </button>

                                                <!-- ini bagian modal disposisi -->
                                                <div class="modal fade" id="dispos_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Disposisi Surat {{ $value->suratMasuk->nomor_surat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="row border-bottom p-3">
                                                                        <div class="col">
                                                                            <p><b> Mohon untuk mengecek surat {{ $value->suratMasuk->nomor_surat }} terlebih dahulu sebelum melakukan disposisi surat atau mengembalikan surat.</b> Langkah ini akan membantu memastikan bahwa semua informasi yang diperlukan telah dipertimbangkan dengan baik sebelum tindakan selanjutnya diambil.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button data-bs-toggle="modal" data-bs-target="#kembalikan_{{$value->id}}" type="button" class="btn btn-danger">
                                                                    Kembalikan
                                                                </button>
                                                                @if($id_jns[$value->id] != 'PLK')
                                                                <button data-bs-toggle="modal" data-bs-target="#teruskan_{{$value->id}}" type="button" class="btn btn-success">
                                                                    Disposisikan
                                                                </button>
                                                                @endif

                                                                <button data-bs-toggle="modal" data-bs-target="#laksanakan_{{$value->id}}" type="button" class="btn btn-primary">
                                                                    Laksanakan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- modal disposisi tolak-->
                                                <div class="modal fade" id="teruskan_{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Teruskan Surat {{ $value->suratMasuk->nomor_surat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="{{ route('bo.surat.disposisi.update', $id_dtl[$value->id]) }}">
                                                                @method('PUT')
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="container">


                                                                    <div class="row mb-3">
                                                                        <label for="Kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                                        <div class="col-sm-9">
                                                                            <select id="Kepada" name="kepada" class="form-select" required>
                                                                                <option value="" disabled selected>Pilih Pejabat yang Menerima Surat</option>
                                                                                @foreach($pejabat as $jabat)
                                                                                    @if(in_array($jabat['id'], $pamongDps[$value->id]))
                                                                                    @else
                                                                                    <option value="{{ $jabat['id'].'/'.$jabat['jabatan'] }}">{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="jenis_disposisi" class="col-sm-3 col-form-label">Tipe Disposisi</label>
                                                                        <div class="col-sm-9">
                                                                            <select id="jenis_disposisi" name="jenis_disposisi" class="form-select" required>
                                                                                <option value="" disabled selected>Pilih Tipe Disposisi</option>
                                                                                    <option value="TRS">Teruskan</option>
                                                                                    <option value="PLK">Pelaksana</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea name="catatan" class="form-control" id="catatan" rows="5"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">
                                                                    Disposisikan
                                                                </button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($id_jns[$value->id] != 'PLK')
                                                <!-- modal disposisi kembalikan-->
                                                <div class="modal fade" id="kembalikan_{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kembalikan Surat {{ $value->suratMasuk->nomor_surat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="{{ route('bo.surat.disposisi.destroy', $id_dtl[$value->id]) }}">
                                                                @method('delete')
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="container">


                                                                    <div class="row mb-3">
                                                                        <div class="col">
                                                                            <p>Berikan catatan mengapa Anda mengembalikan Surat {{ $value->suratMasuk->nomor_surat }}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea name="catatan" class="form-control" id="catatan" rows="5" required></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    Kembalikan
                                                                </button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                <!-- modal disposisi laksanakan-->
                                                <div class="modal fade" id="laksanakan_{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Laporan Pelaksanaan Surat {{ $value->suratMasuk->nomor_surat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="{{ route('bo.surat.disposisi.executor_imp', $id_dtl[$value->id]) }}">
                                                                @method('PUT')
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="container">

                                                                    <div class="row mb-3">
                                                                        <div class="col">
                                                                            <p>Berikan catatan mengapa Anda mengembalikan Surat {{ $value->suratMasuk->nomor_surat }}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea name="catatan" class="form-control" id="catatan" rows="5" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Laksanakan
                                                                </button>
                                                            </div>
                                                        </form>
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
