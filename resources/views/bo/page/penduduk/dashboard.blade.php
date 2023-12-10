@extends('bo.layout.master')

@section('content')
	<div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/kependudukan/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Penduduk <span>| {{ $thn_ini }}</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="ps-3">
                            <h3>{{ $data_graf['jum_penduduk'] }}</h3>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Bukan Penduduk <span>| {{ $thn_ini }}</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users-slash"></i>
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


              <div class="col-lg-12">
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Data Penduduk</h5>

                      <!-- Pie Chart -->
                      <canvas id="data_penduduk" style="max-height: 400px;"></canvas>
                      <!-- End Pie CHart -->

                  </div>
                  </div>
              </div>

          </div>
      </div>
    </section>




@endsection

@push('footer')

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

  </script>
@endpush
