@extends('bo.layout.master')

@push('header')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
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
                        <table class="table table-hover data-table-surat-masuk w-100">
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
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
      $(function () {

        var table = $('.data-table-surat-masuk').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: "{{ route('bo.surat-masuk.data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nomor_surat', name: 'nomor_surat'},
                {data: 'kepada', name: 'kepada'},
                {data: 'keperluan', name: 'keperluan'},
                {data: 'tanggal_kegiatan', name: 'tanggal_kegiatan'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'dokumen', name: 'dokumen', orderable: false, searchable: false},
            ],
            columnDefs: [
                    {
                        "targets": 0,
                        "className": "text-center align-middle text-sm font-weight-normal",
                        "width": "4%"
                    },
                    {
                        "targets": 1,
                        "className": "upc ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal",
                    },
                    {
                        "targets": 2,
                        "defaultContent" : "-",
                        "className": "upc ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal",
                    },
                    {
                        "targets": 3,
                        "defaultContent" : "-",
                        "className": "upc ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal",
                    },
                    {
                        "targets": 4,
                        "className": "upc ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal",
                    },
                    {
                        "targets": 5,
                        "defaultContent" : "-",
                        "className": "text-center text-sm font-weight-normal",
                    },
                    // {
                    //     "targets": 6,
                    //     "defaultContent" : "-",
                    //     "className": "upc ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal",
                    // },
                    {
                        "targets": 6,
                        "className": "text-center text-sm font-weight-normal",
                    }
                ]
        });

      });
    </script>
@endpush
