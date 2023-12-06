@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Header</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Header</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                @canany(['list header', 'list subheader'])
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Jenis Header</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                @can('tambah header')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalheader"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Header</button>
                                @endcan
                                @can('tambah subheader')
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#subheader"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah SubHeader</button>
                                @endcan
                            </div>
                        </div>

                        @can('tambah header')
                        <!-- Modal Form header -->
                        <div class="modal fade" id="modalheader" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Tambah Header</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/header" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="header2" class="col-sm-3 col-form-label">Header</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="header" class="form-control" id="header2"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="http://kalurahansentolo.test/"
                                                        name="link" class="form-control" id="link" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="urutan" class="col-sm-3 col-form-label">Urutan</label>
                                                <div class="col-sm-9">
                                                    <input type="number" value="http://kalurahansentolo.test/"
                                                        name="urutan" class="form-control" id="urutan" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('tambah subheader')
                        <!-- Modal Form subheader -->
                        <div class="modal fade" id="subheader" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Tambah SubHeader</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/subheader" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="subheader" class="col-sm-3 col-form-label">SubHeader</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="subheader" class="form-control"
                                                        id="subheader" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="http://kalurahansentolo.test/"
                                                        name="link" class="form-control" id="link" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="urutan" class="col-sm-3 col-form-label">Urutan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value=""
                                                        name="urutan" class="form-control" id="urutan" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="header_id" class="col-sm-3 col-form-label">di Bawah
                                                    Header</label>
                                                <div class="col-sm-9">
                                                    <select id="header_id" name="header_id" class="form-select" required>
                                                        <option value="" selected>Pilih Head Header</option>
                                                        @foreach ($header as $item)
                                                            <option value="{{ $item->id }}">{{ $item->header }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" fput
                                                    data-bs-dismiss="modal">Close</button>
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
                @can('list header')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Header</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Header</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Urutan</th>
                                    @canany(['edit header', 'hapus header'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($header as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->header }}</td>
                                        <td>{{ $value->link }}</td>
                                        <td>{{ $value->urutan }}</td>
                                        @canany(['edit header', 'hapus header'])
                                        <td class="text-center">
                                            @can('edit header')
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-header-{{ $value->id }}"
                                                href="/admin/sistem-informasi/header/{{ $value->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('hapus header')
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger" type="submit" id="deleteheader"
                                                data-id="{{ $value->id }}" href="/admin/sistem-informasi/deleteheader/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @can('edit header')
                                    <!-- Modal Header -->
                                    <div class="modal fade" id="Modal-Edit-header-{{ $value->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-header-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/header/{{ $value->id }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Edit
                                                            Header | {{ $value->header }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="header"
                                                                class="col-sm-3 col-form-label">Header</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="header"
                                                                    name="header" value="{{ $value->header }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="link"
                                                                class="col-sm-3 col-form-label">Link</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="link" class="form-control"
                                                                    id="link" value="{{ $value->link }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="urutan"
                                                                class="col-sm-3 col-form-label">Urutan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="urutan" class="form-control"
                                                                    id="urutan" value="{{ $value->urutan }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
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
                    </div>
                </div>
                @endcan
                @can('list subheader')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Sub Header</h5>
                        </div>

                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Sub Header</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Urutan</th>
                                    <th scope="col">di Bawah Header</th>
                                    @canany(['edit subheader', 'hapus subheader'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($subheader as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->subheader }}</td>
                                        <td>{{ $value->link }}</td>
                                        <td>{{ $value->urutan }}</td>
                                        <td>{{ $value->header->header }}</td>
                                        @canany(['edit subheader', 'hapus subheader'])
                                        <td class="text-center">
                                            @can('edit subheader')
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-subheader-{{ $value->id }}"
                                                href="/admin/sistem-informasi/header/{{ $value->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('hapus subheader')
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger" type="submit" id="deletesubheader"
                                                data-id="{{ $value->id }}"
                                                href="/admin/sistem-informasi/deletesubheader/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @can('edit subheader')
                                    <!-- Modal Header -->
                                    <div class="modal fade" id="Modal-Edit-subheader-{{ $value->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-header-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/subheader/{{ $value->id }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Edit
                                                            Sub Header | {{ $value->subheader }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="subheader" class="col-sm-3 col-form-label">Sub
                                                                Header</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="subheader"
                                                                    name="subheader" value="{{ $value->subheader }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="link"
                                                                class="col-sm-3 col-form-label">Link</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="link" class="form-control"
                                                                    id="link" value="{{ $value->link }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="urutan"
                                                                class="col-sm-3 col-form-label">Urutan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="urutan" class="form-control"
                                                                    id="urutan" value="{{ $value->urutan }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="header_id" class="col-sm-3 col-form-label">di
                                                                Bawah Header</label>
                                                            <div class="col-sm-9">
                                                                <select id="header_id" name="header_id"
                                                                    class="form-select" required>
                                                                    <option value="">Pilih Head Header</option>
                                                                    {{-- <option value="{{ $item->id }}" {{ ($item->id == $item->id ) ? 'selected':''}}>{{ $item->header }}</option> --}}
                                                                    @foreach ($header as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ old('header_id', $value->header_id) == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->header }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
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
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @can('hapus header')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteheader', function(e) {
                e.preventDefault();
                var data_id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Kamu ingin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Check if the header has subheaders
                        $.ajax({
                            type: "GET",
                            url: "/admin/sistem-informasi/checkSubheaders/" + data_id,
                            success: function(response) {
                                if (response.hasSubheaders) {
                                    Swal.fire(
                                        'Tidak dapat menghapus!',
                                        'Header ini memiliki subheader. Anda tidak dapat menghapusnya.',
                                        'warning'
                                    );
                                } else {
                                    // If no subheaders, proceed with deletion
                                    window.location = "/admin/sistem-informasi/deleteheader/" + data_id;
                                    Swal.fire(
                                        'Deleted!',
                                        'Data sudah terhapus.',
                                        'success'
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
    @endcan
    @can('hapus subheader')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deletesubheader', function(e) {
                e.preventDefault();
                var data_id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Kamu ingin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/sistem-informasi/deletesubheader/" + data_id,
                            Swal.fire(
                                'Deleted!',
                                'Data sudah terhapus.',
                                'success'
                            )
                    }
                })

            });
        });
    </script>
    @endcan
@endpush
