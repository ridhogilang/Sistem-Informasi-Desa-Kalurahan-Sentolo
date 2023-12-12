@extends('bo.layout.master')

@push('header')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    {{-- bisa download dari library --}}
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style type="text/css">
        .kbw-signature {width: 100%;height: 250px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
            border: 2px solid;
        }
    </style>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/e-surat/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form class="row g-3" action="/signature" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-6">
                                <label for="nik" class="col-form-label">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="nama" class="col-form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="signature" class="form-label">Masukkan Tanda Tangan dibawah ini:</label>
                                <div id="sig"></div>
                                <textarea class="form-control" id="signature" name="signature" style="display: none;"></textarea>
                                <div class="col-sm-2">
                                    <button id="clear" class="btn btn-secondary">Clear</button>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>

@push('footer')
    <script type="text/javascript">
        var sig = $('#sig').signature({synceField:'#signature',synceFormat:'png'});
        $('#sig').signature({guideline: true, guidelineOffset: 25, guidelineIndent: 20, guidelineColor: '#ff0000'});
        $('#clear').click(function(event){
            event.preventDefault();
            sig.signature('clear');
            $('#signature').val('');
        })
    </script>
@endpush

@endsection
