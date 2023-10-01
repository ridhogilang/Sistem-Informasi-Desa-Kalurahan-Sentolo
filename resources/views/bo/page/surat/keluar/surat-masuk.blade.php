@extends('bo.layout.master')

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete', function(e){
                e.preventDefault();
                var data_id = $(this).attr("data-id");
                var data_nomor_surat = $(this).attr("data-nomor-surat");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Ingin menghapus Surat Masuk dengan Nomor Surat " + data_nomor_surat + " ? " + " Jika dihapus, file juga akan terhapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/e-surat/surat-masuk/" + data_id + "/delete",
                        Swal.fire(
                        'Deleted!',
                        data_nomor_surat + ' sudah terhapus.',
                        'success'
                        )
                    }
                    })

            });
        });
    </script>
@endpush

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
                                                    <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-3">
                                                    <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="kepada" name="kepada" value="{{ old('kepada') }}" required>
                                                    </div>
                                                </div> --}}
                                                <div class="row mb-3">
                                                    <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
                                                    <div class="col-sm-9">
                                                        <select id="kepada" name="kepada" class="form-select" required>
                                                            <option value="" @if(old('kepada') == '') selected @endif>Pilih Kepada ...</option>
                                                            <option value="Lurah" @if(old('kepada') == 'Lurah') selected @endif>Lurah</option>
                                                            <option value="Carik" @if(old('kepada') == 'Carik') selected @endif>Carik</option>
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
                                        <td>{{ $value->kepada }}</td>
                                        <td>{{ $value->keperluan }}</td>
                                        <td>{{ $value->tanggal_kegiatan }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success" target="blank" type="submit" href="/admin/e-surat/surat-masuk/{{$value->id}}/document"><i class="fa-solid fa-file-arrow-down"></i></a>
                                        </td>
                                        <td class="text-center">
                                            {{-- <a class="btn btn-success" type="submit" href="/admin/e-surat/surat-masuk/{{$value->id}}/view"><i class="bi bi-file-earmark-text-fill"></i></a> --}}
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SMasuk{{$value->id}}" href="/admin/e-surat/surat-masuk/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <!-- untuk methode delete lebih baik menggunakan put / delete jangan menggunakan get -->
                                            {{-- <a class="btn btn-danger" type="submit" href="/admin/e-surat/surat-masuk/{{$value->id}}/delete"><i class="fa-regular fa-trash-can"></i></a> --}}
                                            <a class="btn btn-danger" href="/admin/e-surat/surat-masuk/{{$value->id}}/delete" type="submit" id="delete" data-id="{{$value->id}}" data-nomor-surat="{{$value->nomor_surat}}"><i class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit SPBM-->
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
                                                            <label for="tanggal_surat3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat3" value="{{$value->tanggal_surat}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="kepada3" class="col-sm-3 col-form-label">Kepada</label>
                                                            <div class="col-sm-9">
                                                                <select id="kepada3" name="kepada" class="form-select" required>
                                                                    <option value="" {{ ($value->kepada == "") ? 'selected' : '' }}>Dituju Kepada ...</option>
                                                                    <option value="Lurah" {{ ($value->kepada == "Lurah") ? 'selected' : '' }}>Lurah</option>
                                                                    <option value="Carik" {{ ($value->kepada == "Carik") ? 'selected' : '' }}>Carik</option>
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
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_surat" class="form-control" value="{{$value->jenis_surat}}" >
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
