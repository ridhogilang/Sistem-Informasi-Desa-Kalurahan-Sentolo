@extends('layout.admin')

@section('main')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Komentar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Komentar yang perlu di setujui</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul Berita</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Komentar</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($komentar as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->berita->judul }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->komentar }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                data-bs-target="#Modal-Show-komentar-{{ $value->id }}"
                                                href="/komentar/{{ $value->id }}/show"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <a class="btn btn-success" id="SetujuiKomentar" data-id="{{ $value->id }}"
                                                href="#">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger" type="submit" id="deletekomentar"
                                                data-id="{{ $value->id }}" href="/hapus-komentar/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Modal Header -->
                                    <div class="modal fade" id="Modal-Show-komentar-{{ $value->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="Modal-Edit-header-Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="" method="">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">Show
                                                            Komentar </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <label for="nama" class="col-sm-3 col-form-label">Judul
                                                                Berita</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="{{ $value->berita->judul }}"
                                                                    required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nama"
                                                                class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="{{ $value->nama }}" required
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="email"
                                                                class="col-sm-3 col-form-label">Emal</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="email" class="form-control"
                                                                    id="email" value="{{ $value->email }}" required
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nohp" class="col-sm-3 col-form-label">No
                                                                HP</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nohp" class="form-control"
                                                                    id="nohp" value="{{ $value->nohp }}" required
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nohp"
                                                                class="col-sm-3 col-form-label">Komentar</label>
                                                            <div class="col-sm-9">
                                                                <textarea type="text" name="nohp" class="form-control" id="nohp" value="{{ $value->komentar }}" required
                                                                    readonly>{{ $value->komentar }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-primary" id="approveButton"
                                                            data-id="{{ $value->id }}" href="#">
                                                            <i class="fa-solid fa-check"></i> Setujui
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Komentar yang sudah di setujui</h5>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul Berita</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Komentar</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($setuju as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->berita->judul }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->komentar }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-danger" type="submit" id="deletekomentar"
                                                data-id="{{ $value->id }}"
                                                href="/hapus-komentar/{{ $value->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deletekomentar', function(e) {
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
                        window.location = "/hapus-komentar/" + data_id,
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const approveButton = document.getElementById("SetujuiKomentar");

            if (approveButton) {
                approveButton.addEventListener("click", function(event) {
                    event.preventDefault();

                    const id = this.getAttribute("data-id");

                    fetch(`/approvecomment/${id}`, {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                status: true
                            }) // Mengirim status true
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error("Gagal mengubah status komentar.");
                            }
                        })
                        .then(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: data.message,
                            });
                            location.reload();
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: error.message,
                            });
                        });
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const approveButton = document.getElementById("approveButton");

            if (approveButton) {
                approveButton.addEventListener("click", function(event) {
                    event.preventDefault();

                    const id = this.getAttribute("data-id");

                    fetch(`/approvecomment/${id}`, {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                status: true
                            }) // Mengirim status true
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error("Gagal mengubah status komentar.");
                            }
                        })
                        .then(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: data.message,
                            });
                            location.reload();
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: error.message,
                            });
                        });
                });
            }
        });
    </script>
@endpush
