@extends('bo.layout.master')

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
                            @can('role_create')
                            <a class="btn btn-primary" href="{{ route('bo.pegawai.role_management.create')}}">Tambah</a>
                            @endcan
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Role</th>
                                    @canany(['role_edit', 'role_delete'])
                                    <th scope="col">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role['name'] }}</td>
                                        @canany(['role_edit', 'role_delete'])
                                        <td>
                                            <form action="{{ route('bo.pegawai.role_management.destroy', $role->id) }}" method="POST">
                                            
                                            @method('DELETE')
                                            @csrf

                                            @can('role_edit')
                                            <a class="btn btn-warning" href="{{ route('bo.pegawai.role_management.edit', $role->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('role_delete')
                                             <button class="btn btn-danger" type="submit" href="/surat-kbm/{{$role->id}}/delete"><i class="fa-regular fa-trash-can"></i></button>
                                             </form>
                                             @endcan
                                        </td>
                                        @endcanany
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

