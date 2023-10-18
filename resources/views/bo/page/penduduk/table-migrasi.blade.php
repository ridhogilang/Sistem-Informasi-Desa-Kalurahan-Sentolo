@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Penduduk Migrasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Data Penduduk Migrasi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Penduduk Migrasi</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tempat, Tanggal Lahir</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($penduduk as $value)
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->jenis_kelamin }}</td>
                                        <td>{{ $value->tempat_lahir }}, {{ $value->tanggal_lahir }}<br>
                                        <td>
                                            <?php
                                                $tanggal_lahir = new DateTime($value->tanggal_lahir);
                                                $sekarang = new DateTime();
                                                $umur = $sekarang->diff($tanggal_lahir);
                                                echo $umur->y . ' Tahun'; // Menampilkan umur dalam tahun
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-warning mx-1" type="button" href="/penduduk/{{$value->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                                {{-- <a class="btn btn-danger" type="submit" href="/penduduk/{{$value->id}}/delete"><i class="fa-solid fa-trash-can"></i></a> --}}
                                                {{-- <form method="POST" action="/penduduk/{{$value->id}}/delete" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form> --}}
                                                <!-- Basic Modal -->
                                                <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="modal fade" id="basicModal" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="/penduduk/{{$value->id}}/delete" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Basic Modal</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea type="text" name="catatan" class="form-control" id="catatan" rows="2" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <label for="dokumen" class="col-sm-3 col-form-label">Dokumen</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="file" name="dokumen" class="form-control" id="dokumen" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- End Basic Modal-->
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
