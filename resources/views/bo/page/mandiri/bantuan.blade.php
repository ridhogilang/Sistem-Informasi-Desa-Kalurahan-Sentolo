@extends('bo.layout.master')

@section('content')
    <div class="pagetitle">
        <h1>Bantuan Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Bantuan Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- ======= Navigation ======= -->
    @include('bo.partial.navigation')
    <!-- End Navigation -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bantuan Penduduk</h5>

                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Waktu / Tanggal</th>
                                    <th scope="col">Nama Program</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>2016-05-25</td>
                                    <td>Designer</td>
                                    <td>Brandon Jacob</td>
                                    <td>28</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>2014-12-05</td>
                                    <td>Developer</td>
                                    <td>Bridie Kessler</td>
                                    <td>35</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>2011-08-12</td>
                                    <td>Finance</td>
                                    <td>Ashleigh Langosh</td>
                                    <td>45</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>2012-06-11</td>
                                    <td>HR</td>
                                    <td>Angus Grady</td>
                                    <td>34</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>2011-04-19</td>
                                    <td>Dynamic Division Officer</td>
                                    <td>Raheem Lehner</td>
                                    <td>47</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
