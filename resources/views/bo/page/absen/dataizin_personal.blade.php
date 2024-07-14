@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Hadir</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Presensi</li>
                <li class="breadcrumb-item active">Perizinan Absensi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Perizinan Absensi | {{ auth()->user()->nama }}</h5>
                        </div>
                        <div style="overflow-x: auto;">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Perizinan</th>
                                        <th>Tanggal</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($izin as $value)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->jenis }}</td>
                                            <td>{{ date('d F Y', strtotime($value->tanggal)) }}</td>
                                            <td>{{ $value->alasan }}</td>
                                            @if ($value->setuju)
                                                <td> Sudah Disetujui </td>
                                                <td>--</td>
                                            @else
                                                <td> Belum Disetujui </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                                        data-bs-target="#Modal-Edit-perizinan-{{ $value->id }}"
                                                        href="/admin/presensi/perizinan-personal/{{ $value->id }}/edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a class="btn btn-danger" type="submit" id="deleteizin"
                                                        data-id="{{ $value->id }}"
                                                        href="/admin/presensi/delete-perizinan/{{ $value->id }}"><i
                                                            class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="Modal-Edit-perizinan-{{ $value->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="Modal-Edit-menu-Label" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="/admin/presensi/perizinan-personal/{{ $value->id }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="Modal-Edit-SKTM-Satu-Label">
                                                                Edit
                                                                Perizinan Absensi | {{ auth()->user()->nama }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label for="tanggal"
                                                                    class="col-sm-3 col-form-label">Tanggal</label>
                                                                <div class="col-sm-9">
                                                                    <input name="tanggal" type="date" class="form-control" value="{{ $value->tanggal }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="jenis" class="col-sm-3 col-form-label">Jenis
                                                                    Perizinan</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-select" name="jenis" id="" required>
                                                                        <option value="" disabled>Jenis Perizinan</option>
                                                                        <option value="Sakit" {{ $value->jenis == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                                                        <option value="Cuti" {{ $value->jenis == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                                                                        <option value="Dinas" {{ $value->jenis == 'Dinas' ? 'selected' : '' }}>Dinas Luar Kota</option>
                                                                    </select>                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="alasan"
                                                                    class="col-sm-3 col-form-label">Alasan</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="alasan" class="form-control" placeholder="Tulis Alasanmu disini" id="floatingTextarea" required>{{ $value->alasan }}</textarea>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#deleteizin', function(e) {
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
                        window.location = "/admin/presensi/delete-perizinan/" + data_id,
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
@endpush
