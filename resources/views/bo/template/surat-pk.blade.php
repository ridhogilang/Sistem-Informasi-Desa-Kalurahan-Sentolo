<!DOCTYPE html>
<head>
    <title>SURAT PENGANTAR KEPENDUDUKAN | {{$spk->nik}}</title>
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
            margin-left:208px;
            margin-top:-2px;
            width:298px
        }

        .tiga{
            margin-top:10px;
            margin-bottom: 20px;
        }
        .nosurat{
            margin-top:-33px;
        }

        .empat p {
            font-size: 17px;
            margin-left: 20px;
            text-align: justify;
            margin-right: 20px;
            line-height: 1.5;
        }

        .lima{
            margin-left: 80px;
        }

        .lima tr .template {
            font-size: 17px;
            padding-right: 20px;
            padding-top:10px;
            /* margin-right: 10px; */
        }
        .lima tr td {
            font-size: 17px;
            padding-right: 5px;
            padding-top:10px;
        }
         P{
             font-size: 16px;
             font-family: Arial;
         }


         .namadesa{
             margin-left: -15px;
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
                        <font size="3"><b>SURAT PENGANTAR KEPENDUDUKAN </b></font><br>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor :  {{$spk->nomor_surat}}</font>
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
                <td>{{$spk->nama}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$spk->nik}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spk->tempat_lahir}} / {{date('d-m-Y',strtotime($spk->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spk->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spk->agama}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{$spk->alamat}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; Sesuai dengan nama bersangkutan diatas, surat Pengantar ini dibuat untuk keperluan Pengantar Kependudukan.
                        Dan berlaku mulai tanggal {{ \Carbon\Carbon::parse($spk['tanggal_awal'])->translatedFormat('j F Y') }} dan {{ \Carbon\Carbon::parse($spk['tanggal_akhir'])->translatedFormat('j F Y') }}.
                        <br>&#160; &#160; &#160; &#160; Demikian surat Pengantar ini dibuat dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam" width="100%">
            <tr>
                <td width="50%" align="center">
                    <p>
                         Mengetahui :
                        <br>{{ $spk->tandatangan[0]['jabatan_user'] }}<br>
                    </p>
                    <p><br><br><br>
                        <b>({{ $spk->tandatangan[0]['nama_user'] }})</b>
                    </p>
                </td>
                <td align="center">
                    <p>
                        Sentolo, {{ \Carbon\Carbon::parse($spk['created_at'])->translatedFormat('j F Y') }}<br>
                        Camat Sentolo,
                    </p>
                    <p><br><br><br>
                        <b>(..............................)</b>
                    </p>
                </td>

            </tr>
        </table>
    </center>
</body>
</html>
