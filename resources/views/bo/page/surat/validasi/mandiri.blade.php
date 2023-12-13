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
                                    <th scope="col">No.</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Blanko</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Dokumen</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($buatsurat as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->tanggal_blanko }}</td>
                                        <td>{{ $value->jenis_surat }}</td>
                                        <td>
                                            <span class="badge
                                                @if ($value->status_blanko == 'Pending')
                                                    bg-danger
                                                @elseif ($value->status_blanko == 'Proses')
                                                    bg-warning
                                                @elseif ($value->status_blanko == 'Sukses')
                                                    bg-success
                                                @endif">{{ $value->status_blanko }}
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Dokumen-{{$value->id}}"><i class="bi bi-card-image"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal-Dokumen-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Surat-Mandiri" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="Modal-Surat-Mandiri">Dokumen Surat Mandiri NIK : {{$value->nik}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <h3><b>Foto Kartu Tanda Penduduk</b></h3>
                                                                <img src="{{ asset('storage/syarat-mandiri/foto-ktp/' . $value->foto_ktp) }}" style="width:50%; margin:auto;" alt="Foto Kartu Tanda Penduduk" class="img-fluid">
                                                            </div>
                                                            <div class="row mb-3">
                                                                <h3><b>Foto Kartu Keluarga</b></h3>
                                                                <img src="{{ asset('storage/syarat-mandiri/foto-kk/' . $value->foto_kk) }}" alt="Foto Kartu Keluarga" style="margin:auto;" class="img-fluid">
                                                            </div>
                                                            @if ($value->foto_akta_lahir)
                                                                <div class="row mb-3">
                                                                    <h3><b>Foto Akta Lahir</b></h3>
                                                                    <img src="{{ asset('storage/syarat-mandiri/foto-akta-lahir/' . $value->foto_akta_lahir) }}" alt="Foto Akta Lahir" style="width:60%; margin:auto;" class="img-fluid">
                                                                </div>
                                                            @endif
                                                            @if ($value->foto_surat_keterangan_dokter)
                                                                <div class="row mb-3">
                                                                    <h3><b>Foto Surat Keterangan Dokter</b></h3>
                                                                    <img src="{{ asset('storage/syarat-mandiri/foto-surat-ket-dokter/' . $value->foto_surat_keterangan_dokter) }}" style="width:50%; margin:auto;" alt="Foto Surat Keterangan Dokter" class="img-fluid">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-Status-{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal-Edit-Status-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-Status" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <form action="/admin/e-surat/validasi-mandiri/{{$value->id}}/status" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-Status">Edit Status Blanko NIK : {{$value->nik}}</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="status_blanko" class="col-sm-3 col-form-label">Status Blanko</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="status_blanko" name="status_blanko" class="form-select" required>
                                                                            <option value="">Pilih Status Blanko ...</option>
                                                                            <option value="Pending" {{ ($value->status_blanko == "Pending") ? 'selected' : '' }}>Pending</option>
                                                                            <option value="Proses" {{ ($value->status_blanko == "Proses") ? 'selected' : '' }}>Proses</option>
                                                                            <option value="Sukses" {{ ($value->status_blanko == "Sukses") ? 'selected' : '' }}>Sukses</option>
                                                                        </select>
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
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-success" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-File-{{$value->id}}"><i class="fa-solid fa-file-pen"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal-Edit-File-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-File" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <form action="/admin/e-surat/validasi-mandiri/{{$value->id}}/file" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="Modal-Edit-File">Input File Surat NIK : {{$value->nik}}</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="dokumen" class="col-sm-3 col-form-label">File Surat</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="file" class="form-control" id="dokumen" name="dokumen" accept=".pdf" required>
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
