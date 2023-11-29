@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Masuk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item">Surat Masuk</li>
                <li class="breadcrumb-item active">Status Edit {{ $suratM->nomor_surat }}</li>
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
                   Edit Surat {{ $suratM->nomor_surat }}
                </h5>
                </div>
                <form action="/admin/e-surat/surat-masuk/{{$suratM->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="Modal-Edit-SMasuk">Edit Data Surat Masuk {{$suratM->nomor_surat}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label for="nomor_surat3" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nomor_surat3" name="nomor_surat" value="{{$suratM->nomor_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="judul_surat3" class="col-sm-3 col-form-label">Judul Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="judul_surat3" name="judul_surat" value="{{$suratM->judul_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="tanggal_surat3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat3" value="{{$suratM->tanggal_surat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="Kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                                <div class="col-sm-9">
                                                                    <select id="Kepada" name="kepada" class="form-select" required>
                                                                        <option value="" disabled selected>Pilih Pejabat yang Menerima Surat</option>
                                                                        @foreach($pejabat as $pamong)
                                                                        <option value="{{ $pamong['id'].'/'.$pamong['jabatan'] }}" {{ ($suratM->kepada_id_user == $pamong['id'])?'selected':''}}>{{ $pamong['nama'] . ' ( ' . $pamong['jabatan'] . ' )' }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="keperluan3" class="col-sm-3 col-form-label">Keperluan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="keperluan" class="form-control" id="keperluan3" value="{{$suratM->keperluan}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="tanggal_kegiatan3" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" name="tanggal_kegiatan" class="form-control" id="tanggal_kegiatan3" value="{{$suratM->tanggal_kegiatan}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="catatan3" class="col-sm-3 col-form-label">Catatan</label>
                                                                <div class="col-sm-9">
                                                                    <textarea type="text" name="catatan" class="form-control" id="catatan3" rows="2" required>{{$suratM->catatan}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="lampiran3" class="col-sm-3 col-form-label">Lampiran</label>
                                                                <div class="col-sm-9">
                                                                    <textarea type="text" name="lampiran" class="form-control" id="lampiran3" rows="2" required>{{$suratM->lampiran}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="dokumen3" class="col-sm-3 col-form-label">Dokumen</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="dokumen" class="form-control" id="dokumen3" value="{{$suratM->dokumen}}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-3">
                                                            <a class="btn btn-secondary mx-3" href="{{route('bo.e-surat.suratmasuk.index')}}">Close</a>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>

              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
