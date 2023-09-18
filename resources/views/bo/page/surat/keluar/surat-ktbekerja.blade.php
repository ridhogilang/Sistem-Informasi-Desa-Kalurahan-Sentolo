@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Tidak Bekerja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Keterangan tidak bekerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                @canany(['input surat', 'lihat contoh surat'])
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan Tidak Bekerja</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                @can('input surat')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ktbekerja"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                                @endcan
                                @can('lihat contoh surat')
                                <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-ktbekerja/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>
                                @endcan
                            </div>
                        </div>
                        @can('input surat')
                        <!-- Modal Form 1 Orang -->
                        <div class="modal fade" id="ktbekerja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sktbekerja-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ktbekerja">Data Surat Keterangan Tidak Bekerja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/e-surat/surat-ktbekerja" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$TemplateNoSurat}}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                                </div>
                                                <label for="tanggal_lahir" class="col-sm-1 col-form-label text-center">/</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                        <option value="" @if(old('jenis_kelamin') == '') selected @endif>Pilih Jenis Kelamin ...</option>
                                                        <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                                                        <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select id="agama" name="agama" class="form-select" required>
                                                        <option value="" @if(old('agama') == '') selected @endif>Pilih Agama ...</option>
                                                        <option value="Islam" @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                                        <option value="Kristen Protestan" @if(old('agama') == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                                        <option value="Kristen Katolik" @if(old('agama') == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                                        <option value="Hindu" @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                                        <option value="Buddha" @if(old('agama') == 'Buddha') selected @endif>Buddha</option>
                                                        <option value="Konghucu" @if(old('agama') == 'Konghucu') selected @endif>Konghucu</option>
                                                        <option value="Lainnya" @if(old('agama') == 'Lainnya') selected @endif>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="warga_negara" class="col-sm-3 col-form-label">Warga Negara</label>
                                                <div class="col-sm-9">
                                                    <select id="warga_negara" name="warga_negara" class="form-select" required>
                                                        <option value="" @if(old('warga_negara') == '') selected @endif>Pilih Warga Negara ...</option>
                                                        <option value="Indonesia" @if(old('warga_negara') == 'Indonesia') selected @endif>Indonesia</option>
                                                        <option value="Asing" @if(old('warga_negara') == 'Asing') selected @endif>Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="jenis_ktbekerja" class="form-control" value="sktbekerja" >
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="status_surat" class="form-control" value="Pending" >
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
                        @endcan
                    </div>
                </div>
                 @endcanany
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Surat Keterangan TIDAK BEKERJA</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Status</th>
                                    @canany(['edit surat', 'lihat surat'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ktbekerja as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nomor_surat }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->status_surat }}</td>
                                        @canany(['edit surat', 'lihat surat'])
                                        <td class="text-center">
                                            @can('lihat surat')
                                            <a class="btn btn-success" type="submit" target="blank" href="/admin/e-surat/surat-ktbekerja/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                            @endcan
                                            @can('edit surat')
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-KTBEKERJA{{$value->id}}" href="/admin/e-surat/surat-ktbekerja/{{$value->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @can('edit surat')
                                    <!-- Modal Edit spskck Satu Orang -->
                                    <div class="modal fade" id="Modal-Edit-KTBEKERJA{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-KTBEKERJA-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="/admin/e-surat/surat-ktbekerja/{{$value->id}}/edit" method="POST" >
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-KTBEKERJA-Label">Edit Data Surat Keterangan TIDAK BEKERJA {{$value->nomor_surat}}</h1>
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
                                                            <label for="nama3" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama" class="form-control" id="nama3" value="{{$value->nama}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nik3" class="col-sm-3 col-form-label">NIK</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tempat_lahir3" class="col-sm-4 col-form-label">Tempat / Tanggal Lahir</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="tempat_lahir3" name="tempat_lahir" value="{{$value->tempat_lahir}}" required>
                                                            </div>
                                                            <label for="tanggal_lahir3" class="col-sm-1 col-form-label text-center">/</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" id="tanggal_lahir3" name="tanggal_lahir" value="{{$value->tanggal_lahir}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                            <div class="col-sm-9">
                                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                                                    <option value="" @if(old('jenis_kelamin') == '') selected @endif>Pilih Jenis Kelamin ...</option>
                                                                    <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                                                                    <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                            <div class="col-sm-9">
                                                                <select id="agama" name="agama" class="form-select" required>
                                                                    <option value="" @if(old('agama') == '') selected @endif>Pilih Agama ...</option>
                                                                    <option value="Islam" @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                                                    <option value="Kristen Protestan" @if(old('agama') == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                                                    <option value="Kristen Katolik" @if(old('agama') == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                                                    <option value="Hindu" @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                                                    <option value="Buddha" @if(old('agama') == 'Buddha') selected @endif>Buddha</option>
                                                                    <option value="Konghucu" @if(old('agama') == 'Konghucu') selected @endif>Konghucu</option>
                                                                    <option value="Lainnya" @if(old('agama') == 'Lainnya') selected @endif>Lainnya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="warga_negara" class="col-sm-3 col-form-label">Warga Negara</label>
                                                            <div class="col-sm-9">
                                                                <select id="warga_negara" name="warga_negara" class="form-select" required>
                                                                    <option value="" @if(old('warga_negara') == '') selected @endif>Pilih Warga Negara ...</option>
                                                                    <option value="Indonesia" @if(old('warga_negara') == 'Indonesia') selected @endif>Indonesia</option>
                                                                    <option value="Asing" @if(old('warga_negara') == 'Asing') selected @endif>Asing</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="jenis_ktbekerja" class="form-control" value="sktbekerja" >
                                                        </div>
                                                        <div class="row">
                                                            <input type="hidden" name="status_surat" class="form-control" value="{{$value->status_surat}}" >
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
                                    @endcan
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
