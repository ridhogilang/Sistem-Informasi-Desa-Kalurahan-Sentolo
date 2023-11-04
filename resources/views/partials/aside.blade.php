<aside class="sidebar">
    <form action="https://preview.silirdev.com/layanan-mandiri/cek" method="post"
        class="shadow rounded-lg bg-primary dark:bg-dark-secondary overflow-hidden relative">
        <h3 class="py-4 text-center bg-secondary text-white font-bold font-heading text-lg absolute top-0 left-0 w-full">
            Layanan Mandiri</h3>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1040 320" class="mt-4">
            <path class="fill-current text-secondary"
                d="M0,192L60,176C120,160,240,128,360,133.3C480,139,600,181,720,186.7C840,192,960,160,1080,154.7C1200,149,1320,171,1380,181.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>
        <div class="p-5 -mt-10 space-y-4 pb-8">
            <div class="bg-slate-200 dark:bg-dark-primary py-2 px-4 border-l-4 border-secondary text-secondary">
                <p class="text-xs"><i class="ti ti-info-circle mr-1"></i> Hubungi operator desa untuk
                    memperoleh PIN</p>
            </div>
            <div class="space-y-2 flex flex-col">
                <label for="nik" class="text-white text-sm font-bold">NIK / No. KTP</label>
                <input type="text" class="form-input" id="nik" name="nik">
            </div>
            <div class="space-y-2 flex flex-col">
                <label for="pin" class="text-white text-sm font-bold">Kode PIN</label>
                <input type="password" class="form-input" id="pin" name="pin">
            </div>
            <button type="submit" class="button button-tertiary w-full mt-10 hover:ring-offset-primary"
                data-mdb-ripple="true" data-md-ripple-color="light">Masuk</button>
        </div>
        <input type="hidden" name="sidcsrf" value="52923cd05b6360b94ec243c5e81a071e">
    </form>
    <div class="sidebar-item">
        <section class="relative overflow-hidden shadow-lg rounded-lg ">
            <div class="product-header">
                <h3 class="text-heading product-ribbon">Aparatur</h3>
            </div>
            <div
                class="owl-carousel flex space-x-4 bg-primary dark:bg-dark-primary p-4 one-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="customer-logos slider owl-stage"
                        style="transform: translate3d(-3050px, 0px, 0px); transition: all 0.25s ease 0s; width: 500px;"
                        id="pamong-container">
                        @foreach ($pamong as $item)
                            <div class="owl-item" style="width: 231px; margin-right: 16px;">
                                <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                    <div class="space-y-3">
                                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}"
                                            class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                            style="width: 65%">
                                        <div class="space-y-1 text-sm text-center">
                                            <span class="text-heading">{{ $item->nama }} </span>
                                            <span class="block">{{ $item->jabatan }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                            aria-label="Previous">‹</span></button><button type="button" role="presentation"
                        class="owl-next"><span aria-label="Next">›</span></button></div>
                <div class="owl-dots disabled"></div>
            </div>
        </section>
    </div>
    <div class="sidebar-item">
        <style>
            #sinergi_program {
                text-align: center
            }

            #sinergi_program table {
                margin: auto
            }

            #sinergi_program img {
                max-width: 100%;
                max-height: 100%;
                transition: all .5s;
                -o-transition: all .5s;
                -moz-transition: all .5s;
                -webkit-transition: all .5s
            }

            #sinergi_program img:hover {
                transition: all .3s;
                -o-transition: all .3s;
                -moz-transition: all .3s;
                -webkit-transition: all .3s;
                transform: scale(1.5);
                -moz-transform: scale(1.5);
                -o-transform: scale(1.5);
                -webkit-transform: scale(1.5);
                box-shadow: 2px 2px 6px rgba(0, 0, 0, .5)
            }
        </style>
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title"><i class="fa-solid fa-arrow-up-right-from-square" style="color: #ffffff;"></i>
                    Sinergi Program</h3>
            </div>
            <div id="sinergi_program" class="box-body">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($sinergi as $item)
                                    <span style="display: inline-block; width: 30.333333333333%">
                                        <a href="{{ $item->nama }}" target="_blank"><img loading="lazy"
                                                src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}"></a>
                                    </span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="sidebar-item">
        <style type="text/css">
            .highcharts-xaxis-labels tspan {
                font-size: 8px
            }
        </style>
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title"><a href=""><i class="ti ti-chart-histogram mr-1"></i> Statistik Kalurahan
                        Sentolo</a></h3>
            </div>
            <div class="box-body">
                <div id="statistik_kalurahan" style="width: 100%; height: 300px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <div class="sidebar-item">
        <style type="text/css">
            button.btn {
                margin-left: 0
            }

            #collapse2 {
                margin-top: 5px
            }

            .tabel-info {
                width: 100%
            }

            .tabel-info,
            tr {
                border-bottom: 1px;
                border: 0 solid
            }

            .tabel-info,
            td {
                border: 0 solid;
                height: 30px;
                padding: 5px
            }
        </style>
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-map-marker"></i>Lokasi Kantor Kalurahan
                </h3>
            </div>
            <div class="box-body">
                <div style="height:200px;"><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31620.672824268557!2d110.1989283066177!3d-7.833764499978429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7afa312dfde719%3A0x5b3c901e524d10eb!2sPemerintah%20Kalurahan%20Sentolo!5e0!3m2!1sid!2sid!4v1695217882732!5m2!1sid!2sid"
                        width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                <button class="btn btn-success btn-block"><a href="https://maps.app.goo.gl/Gbwj6uU2V6Y7LNxX6"
                        style="color:#fff;" target="_blank">Buka Peta</a></button>
                <button class="btn btn-success btn-block" data-toggle="collapse" data-target="#collapse2"
                    aria-expanded="false">
                    Detail
                    <i class="fa fa-chevron-up pull-right"></i>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
                <div id="collapse2" class="panel-collapse collapse">
                    <br>
                    <img class="img-responsive" src="" alt="Kantor Desa">
                    <hr>
                    <div class="info-desa">
                        <table class="table-info">
                            <tbody>
                                <tr>
                                    <td width="25%">Alamat</td>
                                    <td>:</td>
                                    <td width="70%">Kerto, Pleret, Pleret, Bantul</td>
                                </tr>
                                <tr>
                                    <td width="25%">Kalurahan </td>
                                    <td>:</td>
                                    <td width="70%">Pleret</td>
                                </tr>
                                <tr>
                                    <td width="25%">Kapanewon</td>
                                    <td>:</td>
                                    <td width="70%">Pleret</td>
                                </tr>
                                <tr>
                                    <td width="25%">Kabupaten</td>
                                    <td>:</td>
                                    <td width="70%">Bantul</td>
                                </tr>
                                <tr>
                                    <td width="25%">Kodepos</td>
                                    <td>:</td>
                                    <td width="70%">55791</td>
                                </tr>
                                <tr>
                                    <td width="25%">Telepon</td>
                                    <td>:</td>
                                    <td width="70%">02744415147</td>
                                </tr>
                                <tr>
                                    <td width="25%">Email</td>
                                    <td>:</td>
                                    <td width="70%">desa.pleret@bantulkab.go.id</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
