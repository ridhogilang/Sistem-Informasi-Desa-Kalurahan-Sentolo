@extends('bo.layout.master')

@push('header')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link href="{{ asset('admin/assets/css/table-responsive-datatable.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Komponen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Komponen Website</li>
                <li class="breadcrumb-item active">Komponen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                @can('lihat running text')
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Running Text</h5>
                            </div>

                            <!-- Table with hoverable rows -->
                            <div style="overflow-x: auto;">
                                <table class="table table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Judul</th>
                                            @can('edit running text')
                                                <th scope="col" class="text-center">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($text as $value)
                                            <tr>
                                                <th scope="row">{{ $no++ }}.</th>
                                                <td>{!! $value->textrunning !!}</td>
                                                @can('edit running text')
                                                    <td class="text-center">
                                                        <a class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Modal-Edit-Text-{{ $value->id }}"
                                                            href="/edit-text/{{ $value->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </td>
                                                @endcan
                                            </tr>
                                            @can('edit running text')
                                                <!-- Modal Edit Running Text -->
                                                <div class="modal fade" id="Modal-Edit-Text-{{ $value->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="Modal-Edit-Text-Label" aria-hidden="true">
                                                    <div
                                                        class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <form action="/admin/sistem-informasi/edit-text/{{ $value->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="Modal-Edit-Text-Satu-">Edit
                                                                        Text Running</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label for="textrunning" class="form-label">Tuliskan di
                                                                            bawah
                                                                            sini</label>
                                                                        <textarea name="textrunning" id="summernote">{{ $value->textrunning }}</textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
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
                    </div>
                @endcan
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <script>
        $('#summernote').summernote({
            placeholder: 'Tuliskan artikel anda disini',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush
