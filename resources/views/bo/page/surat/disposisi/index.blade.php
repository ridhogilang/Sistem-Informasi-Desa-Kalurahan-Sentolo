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
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Nomor Surat</th>
                                    <th scope="col" class="text-center">Tanggal Kegiatan</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Isi Surat</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $value['nomor_surat'] }}</td>
                                        <td>{{ date($value['tanggal_kegiatan'],"Y/m/d") }}</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="{{ route('bo.surat.validasi.show', $value['id']) }}" target="blank" class="btn btn-primary">
                                                <i class="bi bi-file-earmark"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-evenly">
                                                <form action="{{ route('bo.surat.validasi.update', $value['id']) }}" method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <button class="btn btn-success" type="submit"><i class="bi bi-check-lg"></i></button>
                                                </form>

                                                <form action="{{ route('bo.surat.validasi.destroy', $value['id']) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"  type="submit"><i class="bi bi-x-lg"></i></button>
                                                </form>

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
