<!DOCTYPE html>
<head>
    <title>SURAT PENGANTAR SKCK | {{$pskck->nik}}</title>
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
            margin-left:254px;
            margin-top:-3px;
            width:208px
        }

        .tiga{
            margin-top:10px;
        }
        .nosurat{
            margin-top:-12px;
        }

        .empat p {
            font-size: 17px;
            margin-left: 20px;
            text-align: justify;
            margin-right: 20px;
            line-height: 1.5;
        }
        .empat ol li{
            font-size: 17px;
            margin-left: 40px;
            text-align: justify;
            margin-right: 20px;
            line-height: 1.2;
        }

        .lima{
            margin-left: 80px;
        }
        .lima tr .template {
            font-size: 17px;
            padding-right: 20px;
            padding-top:5px;
            /* margin-right: 10px; */
        }
        .lima tr td {
            font-size: 17px;
            padding-right: 5px;
            padding-top:5px;
        }
         P{
             font-size: 16px;
             font-family: Arial;
         }

         .enam{
             margin-top: 5px;
             margin-left: 460px;
         }

         .tujuh{
            margin-left: 450px;
            margin-top: -30px;
            width: 200px;
         }

         .namadesa{
             margin-left: 60px;
             margin-top:50px;
         }
         .delapan hr{
             width: 115px;
             margin-left: 470px;
             margin-top:-23px;
         }
    </style>
</head>

<body>
    <center>
        <table class="satu">
            <tr >
                <td><img src="{{ public_path('template/img/kop_surat.jpg') }}" style="width: 97%; height:auto"></td>
            </tr>
        </table>
        <table class="tiga">
            <tr>
                <td width="538">
                    <center>
                        <font size="3"><b>SURAT PENGANTAR SKCK</b></font><br>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor : {{$pskck->nomor_surat}}</font>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; &#160; Yang bertanda tangan dibawah ini Lurah Sentolo, Kapanewon Sentolo, Kabupaten Kulon Progo, menerangkan bahwa ;
                    </p>
                </td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template">Nama</td>
                <td>:</td>
                <td>{{$pskck->nama}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$pskck->nik}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$pskck->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$pskck->tempat_lahir}} / {{date('d-m-Y',strtotime($pskck->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$pskck->agama}}</td>
            </tr>
            <tr>
                <td class="template">Status Perkawinan</td>
                <td>:</td>
                <td>{{$pskck->status_perkawinan}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$pskck->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{$pskck->alamat}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        Benar yang tersebut namanya di atas adalah penduduk Kecamatan Sentolo, Kabupaten Kulon Progo. Berdasarkan catatan yang ada serta sepengetahuan kami dan lainnya:
                    </p>
                    <ol>
                        <li>Berkelakuan Baik, tidak pernah melakukan tindakan / perbuatan yang menyimpang atau norma sosial yang berlaku.</li>
                        <li>Tidak bersangkut paut Perkara Kriminal.</li>
                        <li>Tidak dalam status tahanan yang berwajib.</li>
                        <li>Tidak terlibat dalam penggunaan Narkoba.</li>
                    </ol>
                    <p>
                        &#160; &#160; &#160; &#160; Surat Pengantar ini diberikan kepada yang bersangkutan untuk Kelengkapan Administrasi pengurusan SKCK.
                    </p>
                </td>
            </tr>
        </table>
        <table  class="tujuh">
            <tr>
                 <td align="center">
                    <p>Sentolo, {{ \Carbon\Carbon::parse($pskck['created_at'])->translatedFormat('j F Y') }}</p>
                    <p>{{ $pskck->tandatangan[0]['jabatan_user'] }}</p><br><br><br>  
                    <p><b>({{ $pskck->tandatangan[0]['nama_user'] }}) </b></p>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
