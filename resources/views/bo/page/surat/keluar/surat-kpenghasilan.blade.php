@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Surat Keterangan Penghasilan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item">Surat Keluar</li>
                <li class="breadcrumb-item active">Keterangan Penghasilan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                @canany(['input surat', 'lihat contoh surat'])
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan Penghasilan</h5>
                        <!-- Button trigger modal -->
                        @can('input surat')
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#skpenghasilan"><i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>Buat Surat</button>
                        @endcan
                        @can('lihat contoh surat')
                        <a class="btn btn-success btn-sm" type="submit" target="blank" href="/admin/e-surat/contoh-surat-ket-hasil/view"><i class="fa-solid fa-print" style="margin-right: 5px"></i>Contoh Surat</a>
                        @endcan
                        @can('input surat')
                        <!-- Modal Form skpenghasilan -->
                        <div class="modal fade" id="skpenghasilan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="skpenghasilan-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambah-skpenghasilan-Label">Data Surat Keterangan Penghasilan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/e-surat/surat-ket-hasil" method="POST">
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
                                                    <input type="number" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="umur" class="form-control" id="umur" value="{{ old('umur') }}" required>
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
                                                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="penghasilan" class="col-sm-3 col-form-label">Penghasilan</label>
                                                <div class="col-sm-9">
                                                    <select id="penghasilan" name="penghasilan" class="form-select" required>
                                                        <option value="" @if(old('penghasilan') == '') selected @endif>Pilih Penghasilan Perbulan...</option>
                                                        <option value="< Rp. 500.000" @if(old('penghasilan') == '< Rp. 500.000') selected @endif>< Rp. 500.000</option>
                                                        <option value="Rp. 500.000 - Rp. 1.000.000" @if(old('penghasilan') == 'Rp. 500.000 - Rp. 1.000.000') selected @endif>Rp. 500.000 - Rp. 1.000.000</option>
                                                        <option value="Rp. 1.000.000 - Rp. 3.000.000" @if(old('penghasilan') == 'Rp. 1.000.000 - Rp. 3.000.000') selected @endif>Rp. 1.000.000 - Rp. 3.000.000</option>
                                                        <option value="Rp. 3.000.000 - Rp. 5.000.000" @if(old('penghasilan') == 'Rp. 3.000.000 - Rp. 5.000.000') selected @endif>Rp. 3.000.000 - Rp. 5.000.000</option>
                                                        <option value="> Rp. 5.000.000" @if(old('penghasilan') == '> Rp. 5.000.000') selected @endif>> Rp. 5.000.000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                <div class="col-sm-9">
                                                    <select id="kewarganegaraan" name="kewarganegaraan" class="form-select" required>
                                                        <option value="" @if(old('kewarganegaraan') == '') selected @endif>Pilih Kewarganegaraan ...</option>
                                                        <option value="Indonesia" @if(old('kewarganegaraan') == 'Indonesia') selected @endif>Indonesia</option>
                                                        <option value="Asing" @if(old('kewarganegaraan') == 'Asing') selected @endif>Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" name="alamat" class="form-control" id="alamat" rows="2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                                <div class="col-sm-9">
                                                    <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                        <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                        @foreach($pejabat as $value)
                                                            <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4 mb-3">
                                                    <select id="mengetahui[]" name="mengetahui[]" class="form-select" required>
                                                        <option value="" disabled selected>Pilih Pejabat yang Mengetahui</option>
                                                        @foreach($pejabat as $value)
                                                            <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                        <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                        @foreach($pejabat as $value)
                                                            <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                        <option value="" selected>Pilih Pejabat yang Mengetahui</option>
                                                        @foreach($pejabat as $value)
                                                            <option value="{{ $value['id'].'/'.$value['nama'].'/'.$value['jabatan'] }}">{{ $value['nama'] . ' ( ' . $value['jabatan'] . ' )' }}</option>
                                                        @endforeach
                                                    </select>
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
                        @endcan
                    </div>
                </div>
                @endcanany

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Surat Penyataan Belum Bekerja</h5>
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
                                    @canany(['edit surat', 'lihat surat', 'hapus surat'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($skpenghasilan as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nomor_surat }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->nik }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#status_{{$value->id}}">
                                            {!! $badge_status[$value->status_surat] !!}
                                            </a>
                                        </td>
                                        <!-- ini bagian modal badge status verifikasi -->
                                            <div class="modal fade" id="status_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Status Surat Keterangan Penghasilan {{$value->nomor_surat}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="container">
                                                    @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                        <div class="row border-bottom p-3">
                                                            <div class="col-sm-3">
                                                                {!! $badge_status[$verifikasi->status]!!} 
                                                            </div>
                                                            <div class="col mx-5">
                                                                {{ $verifikasi->nama_user}} 
                                                               ( {{ $verifikasi->jabatan_user}} )
                                                            </div>
                                                        </div>                                                            
                                                    @endforeach
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        <!-- bagian action -->
                                        @canany(['edit surat', 'lihat surat', 'hapus surat'])
                                        <td class="text-center">
                                            @can('lihat surat')
                                            <a class="btn btn-success" type="submit" target="blank" href="/admin/e-surat/surat-ket-hasil/{{$value->id}}/view"><i class="fa-solid fa-print"></i></a>
                                            @endcan
                                            @can('edit surat')
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#Modal-Edit-SKPenghasilan-{{$value->id}}" href="/admin/e-surat/surat-ket-hasil/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('hapus surat')
                                                    <a data-bs-toggle="modal" data-bs-target="#kearsip_{{$value->id}}">
                                                        @if($value->status_surat == '2')
                                                        <button class="btn btn-success">
                                                            <i class="bi bi-check-lg"></i>
                                                        @else
                                                        <button class="btn btn-danger">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        @endif
                                                    </button>
                                                    </a>
                                                    <!-- modal hapus atau delete -->
                                                    <div class="modal fade" id="kearsip_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Penghasilan {{$value->nomor_surat}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="container">
                                                                <p>Apakah Anda yakin untuk {{ ($value->status_surat == '2')?'mengarsipkan':'menghapus' }} surat dengan nomor {{$value->nomor_surat}}</p>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <form action="/admin/e-surat/surat-ket-hasil/{{$value->id}}/{{$value->status_surat}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn {{ ($value->status_surat == '2')?'btn-success':'btn-danger' }}">{{ ($value->status_surat == '2')?'Arsipkan':'Hapus' }}</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @can('edit surat')
                                    <!-- Modal Edit SPBM-->
                                    <div class="modal fade" id="Modal-Edit-SKPenghasilan-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-Edit-SKPenghasilan-Satu-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <form action="/admin/e-surat/surat-ket-hasil/{{$value->id}}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKPenghasilan-Satu-Label">Edit Data Surat Keterangan Penghasilan {{$value->nomor_surat}}</h1>
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
                                                                <input type="number" name="nik" class="form-control" id="nik3" value="{{$value->nik}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="umur3" class="col-sm-3 col-form-label">Umur</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="umur" class="form-control" id="umur3" value="{{$value->umur}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jenis_kelamin3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                            <div class="col-sm-9">
                                                                <select id="jenis_kelamin3" name="jenis_kelamin" class="form-select" required>
                                                                    <option value="" >Pilih Jenis Kelamin ...</option>
                                                                    <option value="Laki-laki" {{ ($value->jenis_kelamin == "Laki-laki") ? 'selected' : '' }}>Laki-laki</option>
                                                                    <option value="Perempuan" {{ ($value->jenis_kelamin == "Perempuan") ? 'selected' : '' }}>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="pekerjaan3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan3" value="{{$value->pekerjaan}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="penghasilan3" class="col-sm-3 col-form-label">Penghasilan</label>
                                                            <div class="col-sm-9">
                                                                <select id="penghasilan3" name="penghasilan" class="form-select" required>
                                                                    <option value="">Pilih Penghasilan Perbulan ...</option>
                                                                    <option value="< Rp. 500.000" {{ ($value->penghasilan == "< Rp. 500.000") ? 'selected' : '' }}>< Rp. 500.000</option>
                                                                    <option value="Rp. 500.000 - Rp. 1.000.000" {{ ($value->penghasilan == "Rp. 500.000 - Rp. 1.000.000") ? 'selected' : '' }}>Rp. 500.000 - Rp. 1.000.000</option>
                                                                    <option value="Rp. 1.000.000 - Rp. 3.000.000" {{ ($value->penghasilan == "Rp. 1.000.000 - Rp. 3.000.000") ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 3.000.000</option>
                                                                    <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ ($value->penghasilan == "Rp. 3.000.000 - Rp. 5.000.000") ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                                                                    <option value="> Rp. 5.000.000" {{ ($value->penghasilan == "> Rp. 5.000.000") ? 'selected' : '' }}>> Rp. 5.000.000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="kewarganegaraan3" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                            <div class="col-sm-9">
                                                                <select id="kewarganegaraan3" name="kewarganegaraan" class="form-select" required>
                                                                    <option value="">Pilih Kewarganegaraan ...</option>
                                                                    <option value="Indonesia" {{ ($value->kewarganegaraan == "Indonesia") ? 'selected' : '' }}>Indonesia</option>
                                                                    <option value="Asing" {{ ($value->kewarganegaraan == "Asing") ? 'selected' : '' }}>Asing</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="alamat3" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <textarea type="text" name="alamat" class="form-control" id="alamat3" rows="2" required>{{$value->alamat}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tanda_tangan" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                                            <div class="col-sm-9">
                                                                <select id="tanda_tangan" name="tanda_tangan[]" class="form-select" required>
                                                                    <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                                    @foreach($pejabat as $jabat)
                                                                        <option value="{{ $value->tandatangan[0]->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" 
                                                                        {{ ($value->tandatangan[0]->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="mengetahui" class="col col-form-label">Pejabat Yang mengetahui</label>
                                                        </div>
                                                        <div class="row mb-3">
                                                            @foreach($value->MengetahuiVerifikasiSurat as $verifikasi)
                                                            <div class="col-md-4 mb-3">
                                                                <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                                    <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                                    @foreach($pejabat as $jabat)
                                                                        <option value="{{ $verifikasi->id.'/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}" {{ ($verifikasi->id_user == $jabat['id'])?'selected':'' }}>{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @endforeach
                                                            @if(count($value->MengetahuiVerifikasiSurat) < 3)
                                                                @foreach(range(1, 3 - count($value->MengetahuiVerifikasiSurat)) as $index)
                                                                    <div class="col-md-4 mb-3">
                                                                        <select id="mengetahui[]" name="mengetahui[]" class="form-select">
                                                                            <option value="" disabled selected>Pilih Pejabat yang Bertanda tangan</option>
                                                                            @foreach($pejabat as $jabat)
                                                                                <option value="{{ '-/'.$jabat['id'].'/'.$jabat['nama'].'/'.$jabat['jabatan'] }}">{{ $jabat['nama'] . ' ( ' . $jabat['jabatan'] . ' )' }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @endforeach
                                                            @endif
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
