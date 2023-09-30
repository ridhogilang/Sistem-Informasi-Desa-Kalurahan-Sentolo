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
                                    <th scope="col" class="text-center">Jenis Surat</th>
                                    <th scope="col" class="text-center">Riwayat</th>
                                    <th scope="col" class="text-center">Isi Surat</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arsip_surat as $value)
                                 <tr>
                                     <td>{{ $loop->iteration  }}</td>
                                     <td>{{ $value['nomor_surat'] }}</td>
                                     <td>{{ $value['jenis_surat_2'] .' ( '. $value['jenis_surat'] .' )'}}</td>
                                     <td>
                                        <div >Lihat Riwayat {{ ($value['jenis_surat_2'] == 'Surat Keluar')?'':'' }}</div>
                                     </td>
                                     <!-- ini modal riwayat surat -->
                                     <td>{{ $value['id'] }}</td>
                                     <td></td>
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
