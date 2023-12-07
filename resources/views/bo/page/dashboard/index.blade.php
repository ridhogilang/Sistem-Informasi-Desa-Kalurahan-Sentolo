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

    <section class="section dashboard">
        <div class="col-lg-12">
          <div class="row">
            @can('Menejemen E-Surat')
              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Surat Keluar <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-envelope fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $data_graf['jum_surat_keluar'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>

              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card revenue-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Surat Masuk <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-envelope-open fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $data_graf['jum_surat_masuk'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>
              @endcan
              @can('Menejemen Kependudukan')
              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card customers-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Penduduk <span>| {{ $thn_ini }}</span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
          @endcan

          @can('Menejemen E-Surat')
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

            </div>
            @endcan
            @can('Menejemen Sistem Informasi')
            <div class="row">
              <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    {{-- <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Sales <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Sales <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card --> --}}

                    <!-- Customers Card -->
                    <div class="col-xxl-6 col-xl-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Berita <span>| Dari Kontributor (Yang belum disetujui)</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalberita }} Berita</h6>
                                    </div>
                                </div>
                                <div class="card-title">Daftar Berita Yang belum disetujui
                                    @foreach ($berita as $item)
                                        <div><span>{{ $loop->iteration }}. {{ $item->judul }}</span></div>
                                    @endforeach
                                    <div><span><a href="/admin/sistem-informasi/berita">Selengkapnya....</a></span></div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Customers Card -->
                    <div class="col-xxl-6 col-xl-6">

                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Komentar <span>| yang belum disetujui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-comment-dots"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalkomentar }} Komentar</h6>
                                    </div>
                                </div>
                                <div class="card-title">Daftar Komentar Yang belum disetujui
                                    @foreach ($komentar as $item)
                                        <div><span>{{ $loop->iteration }}. {{ Str::limit($item->komentar, 50) }}</span></div>
                                    @endforeach
                                    <div><span><a href="/admin/sistem-informasi/berita/komentar">Selengkapnya....</a></span></div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div>
            </div><!-- End Left side columns -->

        </div>
            </div>
            @endcan
            @can('Menejemen Pengguna')
            <!-- ini dashboard pengguna -->
            <div class="row">
              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Pamong <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['pamong'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>

              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card revenue-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Kontributor <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['kontributor'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>

              <div class="col-xxl-4 col-md-4">
                  <div class="card info-card customers-card">

                  <div class="card-body">
                      <h5 class="card-title">Jumlah Akun Penduduk <span></span></h5>

                      <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people fs-2"></i>
                      </div>
                      <div class="ps-3">
                          <h3>{{ $akun['penduduk'] }}</h3>
                      </div>
                      </div>
                  </div>

                  </div>
              </div>
          </div>
          @endcan

          @can('Menejemen Kependudukan')
            <div class="row">
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
          @endcan
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
@endpush