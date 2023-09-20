<!DOCTYPE html>
<head>
    <title>SURAT PENGANTAR NIKAH | 3401032201000001</title>
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
                        <font size="3">Nomor : 001/KMS/IX/2023</font><br>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td><p>Yang bertanda tangan di bawah ini Ketua RT 09, Kalurahan Sentolo, Kecamatan Sentolo menerangakan dengan sesungguhnya bahwa :</p></td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template"><strong>I. Data Diri</strong></td>
            </tr>
            <tr>
                <td class="template">Nama Lengkap</td>
                <td>:</td>
                <td>John Doe</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>3401032201000001</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>Laki-laki</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>Kulon Progo / 01-09-2023</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>Islam</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>Pelajar</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">Padukuhan Gedangan, Sentolo, Sentolo, Kulon Progo</td>

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
                <td>Nuryadi</td>
            </tr>
            {{-- <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spn->nikayah}}</td>
            </tr> --}}
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>Laki-laki</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>Kulon Progo / 01-09-1960</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>Islam</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>Wiraswasta</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">Padukuhan Gedangan, Sentolo, Sentolo, Kulon Progo</td>

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
                <td>Yuli Astuti</td>
            </tr>
            {{-- <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spn->nikibu}}</td>
            </tr> --}}
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>Perempuan</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>Kulon Progo /  01-09-1965</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>Islam</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>Ibu Rumah Tangga</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">Padukuhan Gedangan, Sentolo, Sentolo, Kulon Progo</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>Pemilik nama tersebut di atas adalah benar warga kami RT 09 kalurahan Sentolo, Kecamatan Sentolo dan sepngetahuan kami yang bersangkutan berkelakuan baik. Surat keterangan pengantar ini diberikan untuk keperluan pengurusan surat nikah. Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>
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
            Sentolo, 19 September 2023<br><br><br><br><br>
            <b>(John Doe)</b>
        </div>

    </center>
</body>
</html>
