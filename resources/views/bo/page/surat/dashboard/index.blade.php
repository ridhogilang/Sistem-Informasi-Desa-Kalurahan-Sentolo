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
    	<div class="container">
    		<div class="row">

    			<div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">

                    <div class="card-body">
                      <h5 class="card-title">Jumlah Surat Keluar <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle px-3 py-2 text-bg-info d-flex align-items-center justify-content-center">
                          <i class="bi bi-envelope fs-2"></i>
                        </div>
                        <div class="ps-3">
                          <h3>{{ $data_graf['jum_surat_keluar'] }}</h3>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">

                    <div class="card-body">
                      <h5 class="card-title">Jumlah Surat Masuk <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle px-3 py-2 text-bg-success d-flex align-items-center justify-content-center">
                          <i class="bi bi-envelope-open fs-2"></i>
                        </div>
                        <div class="ps-3">
                          <h3>{{ $data_graf['jum_surat_masuk'] }}</h3>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">

                    <div class="card-body">
                      <h5 class="card-title">Jumlah Penduduk <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle px-3 py-2 text-bg-primary d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                        </div>
                        <div class="ps-3">
                          <h3>{{ $data_graf['jum_penduduk'] }}</h3>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
    		</div>


            <!-- ini bagian chart -->
            <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Surat Keluar Diproses</h5>
                      <canvas id="surat_keluar" style="max-height: 400px;"></canvas>
                      <!-- End Bar CHart -->
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Surat Masuk</h5>
                      <canvas id="surat_masuk" style="max-height: 400px;"></canvas>
                      <!-- End Bar CHart -->
                    </div>
                  </div>
                </div>


                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Penduduk</h5>

                      <!-- Pie Chart -->
                      <canvas id="data_penduduk" style="max-height: 400px;"></canvas>
                      <!-- End Pie CHart -->

                    </div>
                  </div>
                </div>


                @can('Arsip Surat')
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Arsip {{ $thn_ini }}</h5>
                      <!-- Pie Chart -->
                      <canvas id="arsip_thn_ini" style="max-height: 400px;"></canvas>
                      <!-- End Pie CHart -->
                    </div>
                  </div>
                </div>
                @endcan

            </div>
    	</div>
    </section>


<script>
    document.addEventListener("DOMContentLoaded", () => {
      new Chart(document.querySelector('#data_penduduk'), {
        type: 'pie',
        data: {
          labels: [
            @foreach($data_graf['graf_penduduk'] as $penduduk)
                '{{ $penduduk->jenis_kelamin }}',
            @endforeach
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [
                @foreach($data_graf['graf_penduduk'] as $penduduk)
                    {{ $penduduk->jumlah }},
                @endforeach
                ],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)'
            ],
            hoverOffset: 4
          }]
        }
      });
    });
    
    @can('Arsip Surat')
    document.addEventListener("DOMContentLoaded", () => {
      new Chart(document.querySelector('#arsip_thn_ini'), {
        type: 'pie',
        data: {
          labels: [
            @foreach($data_graf['graf_arsip'] as $arsip_thn_ini)
                '{{ $arsip_thn_ini->jenis_surat_2 }}',
            @endforeach
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [
                @foreach($data_graf['graf_arsip'] as $arsip_thn_ini)
                    {{ $arsip_thn_ini->jumlah }},
                @endforeach
                ],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)'
            ],
            hoverOffset: 4
          }]
        }
      });
    });
    @endcan


    document.addEventListener("DOMContentLoaded", () => {
      new Chart(document.querySelector('#surat_keluar'), {
        type: 'bar',
        data: {
          labels: [
            @foreach($data_graf['graf_surat_keluar'] as $surat_keluar)
                '{{ $surat_keluar->jenis_surat }}',
            @endforeach
            ],
          datasets: [{
            label: 'Surat Keluar',
            data: [
                @foreach($data_graf['graf_surat_keluar'] as $surat_keluar)
                    {{ $surat_keluar->jumlah }},
                @endforeach
                ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });

    document.addEventListener("DOMContentLoaded", () => {
      new Chart(document.querySelector('#surat_masuk'), {
        type: 'bar',
        data: {
          labels: [
            @foreach($data_graf['graf_surat_masuk'] as $surat_masuk)
                '{{ $surat_masuk->status_text }}',
            @endforeach
            ],
          datasets: [{
            label: 'Surat Masuk',
            data: [
                @foreach($data_graf['graf_surat_masuk'] as $surat_masuk)
                    {{ $surat_masuk->jumlah }},
                @endforeach
                ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
</script>

@endsection