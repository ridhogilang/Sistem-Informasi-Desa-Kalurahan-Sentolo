@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Masuk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Surat Masuk</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-surat-masuk"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Tambah Data</button>

                            <!-- Modal -->
                            <div class="modal fade" id="tambah-surat-masuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambah-surat-masuk-Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambah-surat-masuk-Label">Data Surat Masuk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row" action="/admin/e-surat/surat-masuk" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="{{$TemplateNoSurat}}" value="{{ old('nomor_surat') }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="judul_surat" class="col-sm-3 col-form-label">Judul Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="judul_surat" name="judul_surat" value="{{ old('judul_surat') }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                    <div class="col-sm-9">
                                                        <select id="Kepada" name="kepada" class="form-select" required>
                                                            <option value="" disabled selected>Pilih Pejabat yang Menerima Surat</option>
                                                            @foreach($pejabat as $value)
                                                            <option value="{{ $value['id'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="keperluan" class="col-sm-3 col-form-label">Keperluan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ old('keperluan') }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tanggal_kegiatan" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="catatan" class="form-control" id="catatan" rows="2" required>{{ old('catatan') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="lampiran" class="form-control" id="lampiran" rows="2" required>{{ old('lampiran') }} </textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="dokumen" class="col-sm-3 col-form-label">Dokumen</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept=".doc, .docx, .pdf, .xls, .xlsx, .ppt, .pptx" value="{{ old('dokumen') }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Kepada</th>
                                    <th scope="col">Keperluan</th>
                                    <th scope="col">Tanggal Kegiatan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Dokumen</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($smasuk as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nomor_surat }}</td>
                                        <td>{{ $value->kepada_detil->nama.' ( '. $value->kepada_jabatan .' )'}}</td>
                                        <td>{{ $value->keperluan }}</td>
                                        <td>{{ $value->tanggal_kegiatan  }}<br>
                                        </td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#status_{{$value->id}}" class="btn btn-primary">
                                                <i class="bi bi-clock-history"></i> Lihat
                                            </a>
                                        </td>
                                        <!-- ini bagian modal riwayat surat -->
                                        <div class="modal fade" id="status_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Riwayat Surat {{ $value->nomor_surat }}</h5>
                                                        <div class="mx-3">{!! $badge_disposisi_status[$value->status_surat] !!}</div>
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
                                            <a class="btn btn-success" target="blank" type="submit" href="/admin/e-surat/surat-masuk/{{$value->id}}/document"><i class="fa-solid fa-file-arrow-down"></i></a>
                                        </td>
                                        <td class="text-center">

                                            <!-- Button trigger modal -->
                                            @if(($value->status_surat == '3' || $value->status_surat == '1'))
                                                <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SMasuk{{$value->id}}" href="/admin/e-surat/surat-masuk/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @else
                                                <a class="btn btn-secondary" href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endif
                                            <!-- untuk methode delete lebih baik menggunakan put / delete jangan menggunakan get -->
                                            @if(($tgl_hr_ini > $value->tanggal_kegiatan) || ($value->status_surat == '3'))
                                                <button data-bs-toggle="modal" data-bs-target="#arsip_sm_{{$value->id}}" type="button" class="btn btn-danger">
                                                                    <i class="fa-solid fa-circle-up"></i>
                                                                </button>
                                            @else
                                                <a class="btn btn-secondary"><i class="fa-solid fa-circle-up"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @if(($value->status_surat == '3' || $value->status_surat == '1'))
                                        <!-- Modal Edit SURAT MASUK-->
                                        <div class="modal fade" id="Modal-Edit-SMasuk{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SMasuk" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <form action="/admin/e-surat/surat-masuk/{{$value->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="Modal-Edit-SMasuk">Edit Data Surat Masuk {{$value->nomor_surat}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label for="nomor_surat3" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nomor_surat3" name="nomor_surat" value="{{$value->nomor_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="judul_surat3" class="col-sm-3 col-form-label">Judul Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="judul_surat3" name="judul_surat" value="{{$value->judul_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="tanggal_surat3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat3" value="{{$value->tanggal_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="Kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                                <div class="col-sm-9">
                                                                    <select id="Kepada" name="kepada" class="form-select" required>
                                                                        <option value="" disabled selected>Pilih Pejabat yang Menerima Surat</option>
                                                                        @foreach($pejabat as $pamong)
                                                                        <option value="{{ $pamong['id'].'/'.$pamong['jabatan'] }}" {{ ($value->kepada_id_user == $pamong['id'])?'selected':''}}>{{ $pamong['nama'] . ' ( ' . $pamong['jabatan'] . ' )' }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="keperluan3" class="col-sm-3 col-form-label">Keperluan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="keperluan" class="form-control" id="keperluan3" value="{{$value->keperluan}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="tanggal_kegiatan3" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" name="tanggal_kegiatan" class="form-control" id="tanggal_kegiatan3" value="{{$value->tanggal_kegiatan}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="catatan3" class="col-sm-3 col-form-label">Catatan</label>
                                                                <div class="col-sm-9">
                                                                    <textarea type="text" name="catatan" class="form-control" id="catatan3" rows="2" required>{{$value->catatan}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="lampiran3" class="col-sm-3 col-form-label">Lampiran</label>
                                                                <div class="col-sm-9">
                                                                    <textarea type="text" name="lampiran" class="form-control" id="lampiran3" rows="2" required>{{$value->lampiran}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="dokumen3" class="col-sm-3 col-form-label">Dokumen</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="dokumen" class="form-control" id="dokumen3" value="{{$value->dokumen}}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(($tgl_hr_ini > $value->tanggal_kegiatan) || ($value->status_surat == '3'))
                                         <!-- Modal Arsip SURAT MASUK-->
                                         <div class="modal fade" id="arsip_sm_{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Arsipkan Surat {{ $value->nomor_surat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="/admin/e-surat/surat-masuk/{{$value->id}}/delete">
                                                                @method('delete')
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                            

                                                                    <div class="row mb-3">
                                                                        <div class="col">
                                                                            <p>Berikan catatan mengapa Surat {{ $value->nomor_surat }} gagal dilaksanakan</p>
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
                                                                    Arsipkan
                                                                </button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>

                                    @endif
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
