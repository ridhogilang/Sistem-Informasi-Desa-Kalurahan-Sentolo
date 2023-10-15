@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Data Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table with hoverable rows</h5>
                        <div class="d-grid gap-2 mb-2">
                            <a class="btn btn-primary" type="button" href="/penduduk/tambah-data"><i class="fa-solid fa-plus"></i> Tambah Data</a>
                        </div>

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
                                            <a class="btn btn-warning" type="button" href="/penduduk/{{$value->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                            {{-- <a class="btn btn-danger" type="submit" href="/penduduk/{{$value->id}}/delete"><i class="fa-solid fa-trash-can"></i></a> --}}
                                            <form method="POST" action="/penduduk/{{$value->id}}/delete" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
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
