<!DOCTYPE html>
<head>
    <title>SURAT PENGANTAR NIKAH | {{$spn->nik}}</title>
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

        .satu{
            margin-left: 50px;
            margin-top: -40px;
        }
        hr{
            width: 650px;
            margin-top:-1px;
        }

        .dua{
            margin-left:20px;
        }

        .dua hr{
           border-top: 4px double black;
        }

        img{
            margin-left: -30px;
        }

        .hrsatu{
            margin-left:247px;
            margin-top:-3px;
            width:217px
        }

        .tiga{
            margin-top:5px;
            margin-bottom: 20px;
        }
        .nosurat{
            margin-top:-33px;
        }

        .empat p {
            font-size: 16px;
            margin-left: 20px;
            text-align: justify;
            margin-right: 20px;
            line-height: 1.5;
        }

        .lima{
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
            padding-top:0px;
        }
        .lima tr td {
            font-size: 16px;
            padding-right: 5px;
            padding-top:0px;
        }
         P{
             font-size: 16px;
             font-family: Arial;
         }

        .enam p{
            margin-top: 0px;
            margin-left: 490px;
            line-height: 1.5;
        }
        .enam .namapernyataan{
            text-align: center;
        }

         .tujuh{
            margin-left: 50px;
            margin-top: -300px;
            line-height: 1.5;
         }

         .namadesa{
             margin-left: 10px;
             margin-top:50px;
         }
         .namapernyataan{
             margin-left: 20px;
             margin-top:50px;
         }
         .delapan hr{
             width: 115px;
             margin-left: 470px;
             margin-top:-23px;
         }
         p {
        text-indent: 40px; /* Menjorokkan teks sejauh 40px dari kiri */
        margin-top: 0px; /* Jarak atas antara paragraf */
        margin-bottom: 0px; /* Jarak bawah antara paragraf */
        }
         .signature {
            width: 300px; /* Lebar area tanda tangan */
            height: 100px; /* Tinggi area tanda tangan */
            /* border: 1px solid #000; Garis tepi */
            margin-top: 50px; /* Jarak atas */
            padding: 10px; /* Ruang dalam */
            text-align: center; /* Pusatkan teks di dalam area tanda tangan */
            font-size: 16px; /* Ukuran font */
            display: inline-block; /* Tampilkan tanda tangan secara berdampingan */
            margin-right: 20px; /* Jarak antara tanda tangan */
        }
    </style>
</head>

<body>
    <center>
        <br>
        <table class="satu">
            <tr >
                <td><img src="{{ public_path('template/img/kop_surat.jpg') }}" style="width: 97%; height: 15%"></td>
            </tr>
        </table>
        <table class="tiga">
            <tr>
                <td width="538">
                    <center>
                        <font size="3"><b>SURAT PENGANTAR NIKAH </b></font>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="3">Nomor : {{$spn->nomor_surat}}</font><br>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td><p>{{$spn->deskripsi1}}</p></td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template"><strong>I. Data Diri</strong></td>
            </tr>
            <tr>
                <td class="template">Nama Lengkap</td>
                <td>:</td>
                <td>{{$spn->nama}}</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spn->nik}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spn->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spn->tempat_lahir}} / {{date('d-m-Y',strtotime($spn->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spn->agama}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$spn->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $spn->alamat }}</td>

            </tr>
        </table>
        {{-- Data Ayah --}}
        <table  class="lima">
            <tr>
                <td class="templateayah"><strong>II. Ayah</strong></td>
            </tr>
            <tr>
                <td class="template"> Nama</td>
                <td>:</td>
                <td>{{$spn->namaayah}}</td>
            </tr>
            {{-- <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spn->nikayah}}</td>
            </tr> --}}
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spn->jenis_kelaminayah}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spn->tempat_lahirayah}} / {{date('d-m-Y',strtotime($spn->tanggal_lahirayah))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spn->agama}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$spn->pekerjaanayah}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $spn->alamatayah}}</td>

            </tr>
        </table>
        {{-- Data Ibu --}}
        <table  class="lima">
            <tr>
                <td class="templateibu"><strong>III. Ibu</strong></td>
            </tr>
            <tr>
                <td class="template"> Nama</td>
                <td>:</td>
                <td>{{$spn->namaibu}}</td>
            </tr>
            {{-- <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spn->nikibu}}</td>
            </tr> --}}
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spn->jenis_kelaminibu}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spn->tempat_lahiribu}} / {{date('d-m-Y',strtotime($spn->tanggal_lahiribu))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spn->agamaibu}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$spn->pekerjaanibu}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $spn->alamatibu}}</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>{{$spn->deskripsi2}} Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>
                </td>
            </tr>
        </table>

        <div class="signature">
            &#160; Mengetahui,
            <br>Lurah Sentolo<br><br><br><br>
            <b>(TEGUH)</b>
        </div>

        <!-- Area tanda tangan kedua -->
        <div class="signature">
            Sentolo, {{ \Carbon\Carbon::parse($spn['created_at'])->translatedFormat('j F Y') }}<br><br><br><br><br>
            <b>({{$spn->nama}})</b>
        </div>

    </center>
</body>
</html>
