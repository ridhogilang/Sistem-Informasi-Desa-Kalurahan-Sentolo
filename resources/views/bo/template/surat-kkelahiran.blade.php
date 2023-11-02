<!DOCTYPE html>
<head>
    <title>SURAT KETERANGAN KELAHIRAN | {{$skl->nik}}</title>
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
            margin-left:220px;
            margin-top:-3px;
            width:274px
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
            margin: 0px 16px 0px 500px;
            width: 100%; /* Lebar area tanda tangan */
            /* border: 1px solid #000; Garis tepi */
            /* margin-top: 5px; Jarak atas */
            text-align: center;
            font-size: 16px; /* Ukuran font */
            display: inline-block; /* Tampilkan tanda tangan secara berdampingan */
            /* margin-right: 20px; Jarak antara tanda tangan */
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
                        <font size="3"><b>SURAT KETERANGAN KELAHIRAN</b></font>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="3">Nomor : {{$skl->nomor_surat}}</font><br>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td>
                    <p>
                        Yang Bertanda Tangan di bawah ini Lurah Sentolo, Kapanewon Sentolo, Kabupaten Kulon Progo menerangkan dengan sebenernya bahwa :
                    </p>
                </td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template"><strong>I. Data Anak / Bayi</strong></td>
            </tr>
            <tr>
                <td class="template">Nama</td>
                <td>:</td>
                <td>{{$skl->nama}}</td>
            </tr>
            <tr>
                <td class="template">Status Hubungan</td>
                <td>:</td>
                <td>{{$skl->status_hubungan}}</td>
            </tr>
            <tr>
                <td class="template">Tempat Lahir</td>
                <td>:</td>
                <td>{{$skl->dusun}}, {{$skl->kalurahan}}, {{$skl->kecamatan}}, {{$skl->kabupaten}}, {{$skl->provinsi}}</td>
            </tr>
            <tr>
                <td class="template">Tanggal Lahir</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($skl['tanggal_lahir'])->translatedFormat('j F Y') }} </td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$skl->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Anak Ke</td>
                <td>:</td>
                <td>{{$skl->anak_ke}}</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$skl->agama}}</td>
            </tr>
            <tr>
                <td class="template">Nama Kepala Keluarga</td>
                <td>:</td>
                <td>{{$skl->nama_ayah}}</td>
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
                <td>{{$skl->nama_ayah}}</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$skl->nik_ayah}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$skl->tempat_lahir_ayah}} / {{date('d-m-Y',strtotime($skl->tanggal_lahir_ayah))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$skl->agama_ayah}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$skl->pekerjaan_ayah}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $skl->alamat_ayah}}</td>

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
                <td>{{$skl->nama_ibu}}</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$skl->nik_ibu}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$skl->tempat_lahir_ibu}} / {{date('d-m-Y',strtotime($skl->tanggal_lahir_ibu))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$skl->agama_ibu}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$skl->pekerjaan_ibu}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $skl->alamat_ibu}}</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        Pihak-pihak yang diterangkan diatas benar-benar adalah penduduk Dusun {{$skl->dusun}}, Kalurahan {{$skl->kalurahan}}, Kapanewon {{$skl->kecamatan}},
                        Kabupaten {{$skl->kabupaten}} yang belum memiliki Akta Kelahiran. Demikian Surat Keterangan ini dibuat dengan benar dan diberikan kepada yang
                        bersangkutan untuk proses lebih lanjut.
                    </p>
                </td>
            </tr>
        </table>

        <div class="signature">
            Sentolo, {{ \Carbon\Carbon::parse($skl['created_at'])->translatedFormat('j F Y') }}
            <p>{{ $skl->tandatangan[0]['jabatan_user'] }}</p><br><br><br><br>  
            <p><b>({{ $skl->tandatangan[0]['nama_user'] }}) </b></p>
        </div>

    </center>
</body>
</html>
