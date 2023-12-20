@extends('bo.layout.master')

@push('header')
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="pagetitle">
        <h1>Hak Akses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Kepegawaian</a></li>
                <li class="breadcrumb-item active">Hak Akses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Hak Akses</h5>
                            <a class="btn btn-primary" href="{{ route('bo.pegawai.role_management.create')}}">Tambah</a>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable responsive-table w-100">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role['name'] }}</td>
                                        <td>
                                            <form action="{{ route('bo.pegawai.role_management.destroy', $role->id) }}" method="POST">
                                            
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-warning" href="{{ route('bo.pegawai.role_management.edit', $role->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                             <button class="btn btn-danger" type="submit" href="/surat-kbm/{{$role->id}}/delete"><i class="fa-regular fa-trash-can"></i></button>
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

