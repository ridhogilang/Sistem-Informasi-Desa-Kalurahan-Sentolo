<!DOCTYPE html>

<head>
    <title>SURAT PENGANTAR NIKAH | {{ $scstm->nik }}</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        table tr .text {
            text-align: right;
            font-size: 13px;
        }

        table tr .text2 {
            text-align: center;

        }

        .satu {
            margin-left: 50px;
            margin-top: -40px;
        }

        hr {
            width: 650px;
            margin-top: -1px;
        }

        .dua {
            margin-left: 20px;
        }

        .dua hr {
            border-top: 4px double black;
        }

        img {
            margin-left: -30px;
        }

        .hrsatu {
            margin-left: 247px;
            margin-top: -3px;
            width: 217px
        }

        .tiga {
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .nosurat {
            margin-top: -33px;
        }

        .empat p {
            font-size: 16px;
            margin-left: 20px;
            text-align: justify;
            margin-right: 200px;
            line-height: 1.5;
        }

        .lima {
            margin-left: 80px;
        }

        .lima tr .template {
            font-size: 16px;
            padding-right: 20px;
            padding-top: 0px;
            /* margin-right: 10px; */
        }

        .lima tr .templateayah {
            font-size: 16px;
            padding-top: 0px;
        }

        .lima tr .templateibu {
            font-size: 16px;
            margin-left: 500px;
            padding-top: 0px;
        }

        .lima tr td {
            font-size: 16px;
            padding-right: 5px;
            padding-top: 0px;
        }

        .enam p {
            margin-top: 0px;
            margin-left: 490px;
            line-height: 1.5;
        }

        .enam .namapernyataan {
            text-align: center;
        }

        .tujuh {
            margin-left: 50px;
            margin-top: -300px;
            line-height: 1.5;
        }

        .namadesa {
            margin-left: 10px;
            margin-top: 50px;
        }

        .namapernyataan {
            margin-left: 20px;
            margin-top: 50px;
        }

        .delapan hr {
            width: 115px;
            margin-left: 470px;
            margin-top: -23px;
        }

        p {
            text-indent: 40px;
            /* Menjorokkan teks sejauh 40px dari kiri */
            margin-top: 0px;
            /* Jarak atas antara paragraf */
            margin-bottom: 0px;
            /* Jarak bawah antara paragraf */
            font-size: 16px;
            font-family: Arial;
        }

        .signature {
            width: 300px;
            /* Lebar area tanda tangan */
            height: 100px;
            /* Tinggi area tanda tangan */
            /* border: 1px solid #000; Garis tepi */
            margin-top: 50px;
            /* Jarak atas */
            padding: 10px;
            /* Ruang dalam */
            text-align: center;
            /* Pusatkan teks di dalam area tanda tangan */
            font-size: 16px;
            /* Ukuran font */
            display: inline-block;
            /* Tampilkan tanda tangan secara berdampingan */
            margin-right: 20px;
            /* Jarak antara tanda tangan */
        }
    </style>
</head>

<body>
    <center>
        <br>
        <table class="satu">
            <tr>
                <td><img src="{{ public_path('template/img/kop_surat.jpg') }}" style="width: 97%; height: 15%"></td>
            </tr>
        </table>
        @if ($scstm->judulsurat)
            <table class="tiga">
                <tr>
                    <td width="538">
                        <center>
                            <font size="3"><b>{{ $scstm->judulsurat }}</b></font>
                            <hr class="hrsatu">
                        </center>
                    </td>
                </tr>
            </table>
        @endif
        <table class="nosurat">
            @if ($scstm->nomor_surat)
                <tr>
                    <td width="537">
                        <center>
                            <font size="3">Nomor : {{ $scstm->nomor_surat }}</font><br>
                        </center>
                    </td>
                </tr>
        </table>
        @endif
    </center>
    @if ($scstm->tanggalsurat)
        <div>
            <p>{{ $scstm->tanggalsurat }}</p>
            </td>
        </div>
    @endif
    @if ($scstm->penerimasurat)
        <div class="penerimasurat">
            <p>{{ $scstm->penerimasurat }}</p>
            <p>{{ $scstm->jabatanpenerima }}</p>
            <p>{{ $scstm->alamatpenerima }}</p>
            <p>{{ $scstm->kotapenerima }}</p>
            </td>
        </div>
        <br>
    @endif

    @if ($scstm->salampembuka)
        <div class="isisurat">
            <p>{{ $scstm->salampembuka }}</p>
            <p>{{ $scstm->paragraf1 }}</p>
            <p>{{ $scstm->paragraf2 }}</p>
            </td>
        </div>
    @endif

    <center>
        <table class="lima">
            @if ($scstm->nama)
                <tr>
                    <td class="template">Nama</td>
                    <td>:</td>
                    <td>{{ $scstm->nama }}</td>
                </tr>
            @endif
            @if ($scstm->nik)
                <tr>
                    <td class="template">NIK</td>
                    <td>:</td>
                    <td>{{ $scstm->nik }}</td>
                </tr>
            @endif
            @if ($scstm->jenis_kelamin)
                <tr>
                    <td class="template">Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $scstm->jenis_kelamin }}</td>
                </tr>
            @endif
            @if ($scstm->hari)
                <tr>
                    <td class="template">Hari / Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $scstm->hari }} / {{ date('d-m-Y', strtotime($scstm->tanggal)) }} </td>
                </tr>
            @endif
            @if ($scstm->alamat)
                <tr>
                    <td class="template">alamat</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="max-width: 405px; word-wrap: break-word;">{{ $scstm->alamat }}</td>
                </tr>
            @endif
            @if ($scstm->agama)
                <tr>
                    <td class="template">agama</td>
                    <td>:</td>
                    <td>{{ $scstm->agama }}</td>
                </tr>
            @endif
            @if ($scstm->pekerjaan)
                <tr>
                    <td class="template">Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $scstm->pekerjaan }}</td>
                </tr>
            @endif
            @if ($scstm->waktu)
                <tr>
                    <td class="template">Waktu</td>
                    <td>:</td>
                    <td>{{ $scstm->waktu }}</td>
                </tr>
            @endif
            @if ($scstm->acara)
                <tr>
                    <td class="template" style="vertical-align: top;">Acara</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="max-width: 405px; word-wrap: break-word;">{{ $scstm->acara }}</td>

                </tr>
            @endif
        </table>
    </center>
    @if ($scstm->paragrafpenutup)
        <p>{{ $scstm->paragrafpenutup }}</p>
    @endif
    @if ($scstm->kalimatpenutup)
        <p>{{ $scstm->kalimatpenutup }}</p>
    @endif
    <center>
        <div class="signature">
            &#160; Mengetahui,
            <br>Lurah Sentolo<br><br><br><br>
            <b>(TEGUH)</b>
        </div>

        <!-- Area tanda tangan kedua -->
        <div class="signature">
            Sentolo, {{ \Carbon\Carbon::parse($scstm['created_at'])->translatedFormat('j F Y') }}<br><br><br><br><br>
            <b>({{ $scstm->namattd }})</b>
        </div>

    </center>
</body>

</html>
