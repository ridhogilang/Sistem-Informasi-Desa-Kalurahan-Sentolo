@extends('bo.layout.master')

@section('content')

    <div class="pagetitle">
        <h1>Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Kepegawaian</a></li>
                <li class="breadcrumb-item active">Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Data Pegawai Kalurahan</h5>
                            
                            @can('user_create')
                            <a class="btn btn-primary" href="{{ route('bo.pegawai.user_management.create')}}">Tambah</a>
                            @endcan
                        </div>

                        <!-- Table with hoverable rows -->
                        <table id="user_table" class="table table-hover content_table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">username</th>
                                    <th scope="col">Email</th>
                                    @canany(['user_edit', 'user_delete'])
                                    <th scope="col">Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user['username'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        @canany(['user_edit', 'user_delete'])
                                            <td>
                                                <form action="{{ route('bo.pegawai.user_management.destroy', $user->id) }}" method="POST">
                                                    
                                                @method('DELETE')
                                                @csrf

                                                @can('user_edit')
                                                <a class="btn btn-warning" href="{{ route('bo.pegawai.user_management.edit', $user->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                @endcan
                                                @can('user_delete')
                                                 <button class="btn btn-danger" type="submit" href="/surat-kbm/{{$user->id}}/delete"><i class="fa-regular fa-trash-can"></i></button>
                                                @endcan
                                                 </form>
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

