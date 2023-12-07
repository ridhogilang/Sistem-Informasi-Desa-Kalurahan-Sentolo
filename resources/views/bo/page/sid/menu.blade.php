@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Menu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                @can('tambah menu')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Tampilan Menu</h5>

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalMenu"><i class="fa-regular fa-square-plus"
                                        style="margin-right: 5px"></i>Tambah Menu</button>
                            </div>
                        </div>

                        <!-- Modal Form Menu -->
                        <div class="modal fade" id="modalMenu" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="sktm-satu-Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sktm-satu-Label">Tambah Menu</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row" action="/admin/sistem-informasi/menu" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="menu2" class="col-sm-3 col-form-label">Menu</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="menu" class="form-control" id="menu2"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="link" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{ env('APP_URL') }}"
                                                        name="link" class="form-control" id="link" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="gambar" type="file" id="gambar" accept=".png">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="urutan" class="col-sm-3 col-form-label">Urutan</label>
                                                <div class="col-sm-9">
                                                    <input type="number"
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
                    </div>
                </div>
                @endcan
                @can('list menu')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Menu</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Urutan</th>
                                    @canany(['edit menu', 'hapus menu'])
                                    <th scope="col" class="text-center">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($menu as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->menu }}</td>
                                        <td>{{ $value->link }}</td>
                                        <td><img src="{{ Storage::url($value->gambar) }}" width="50" height="50"></td>
                                        <td>{{ $value->urutan }}</td>
                                        @canany(['edit menu', 'hapus menu'])
                                        <td class="text-center">
                                            @can('edit menu')
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Edit-menu-{{ $value->id }}"
                                                href="/admin/sistem-informasi/menu/{{ $value->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('hapus menu')
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger" type="submit" id="deletemenu"
                                                data-id="{{ $value->id }}" href="/admin/sistem-informasi/deletemenu/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>

                                    @can('edit menu')
                                    <!-- Modal Menu -->
                                    <div class="modal fade" id="Modal-Edit-menu-{{ $value->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-menu-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/sistem-informasi/menu/{{ $value->id }}" method="POST"  enctype="multipart/form-data" >
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Edit
                                                            Menu | {{ $value->menu }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="menu2"
                                                                class="col-sm-3 col-form-label">Menu</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="menu2"
                                                                    name="menu" value="{{ $value->menu }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gambar" class="col-sm-3 col-form-label">File Upload</label>
                                                            <div class="col-sm-9">
                                                                <img src="{{ Storage::url($value->gambar) }}" width="50" height="50">
                                                                <input class="form-control" name="gambar" type="file" id="gambar" accept=".png">
                                                                <input type="hidden" name="gambar_existing" value="{{ $value->gambar }}">
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

            </div>
        </div>
    </section>
@endsection

@push('footer')
    @can('hapus menu')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deletemenu', function(e) {
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
                        window.location = "/admin/sistem-informasi/deletemenu/" + data_id,
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
