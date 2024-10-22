<!DOCTYPE html>
<head>
    <title>SURAT PERNYATAAN BELUM PEKERJA | {{$spbbekerja->nik}}</title>
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
            margin-left:199px;
            margin-top:-3px;
            width:314px
        }

        .tiga{
            margin-top:10px;
            margin-bottom: 20px;
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
    </style>
</head>

<body>
    <center>
        <br>
        <table class="tiga">
            <tr>
                <td width="538">
                    <center>
                        <font size="3"><b>SURAT PERNYATAAN BELUM BEKERJA </b></font><br>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td><p> &#160; &#160; &#160; &#160; &#160; Yang Bertanda Tangan di bawah ini :</p></td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template"> Nama</td>
                <td>:</td>
                <td>{{$spbbekerja->nama}}</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spbbekerja->nik}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spbbekerja->tempat_lahir}} / {{date('d-m-Y',strtotime($spbbekerja->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spbbekerja->agama}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spbbekerja->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $spbbekerja->alamat }}</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; {{$spbbekerja->deskripsi}}.
                        Apabila pernyataan ini tidak benar saya siap menanggung segala akibat dan bersedia dituntut dimuka hukum sesuai dengan peraturan perundangan yang berlaku.
                        <br>
                        &#160; &#160; &#160; &#160; Surat ini saya buat dengan kesadaran sendiri tanpa ada paksaan dan atau tekanan dari pihak manapun dalam keadaan sehat jasmani maupun rohani.
                        Demikian surat Pernyataan ini dibuat dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <br><br><br>

        <table class="enam" width="100%">
            <tr>
                <td width="50%" align="center">
                    <p>
                        Mengetahui :
                        <br>{{ $spbbekerja->tandatangan[0]['jabatan_user'] }}<br>
                    </p>
                    <p><br><br><br><br>
                        <b>({{ $spbbekerja->tandatangan[0]['nama_user'] }})</b>
                    </p>
                </td>
                <td align="center">
                    <p>
                        Sentolo, {{ \Carbon\Carbon::parse($spbbekerja['created_at'])->translatedFormat('j F Y') }}<br>
                        Yang membuat pernyataan,
                    </p>
                    <p><br><br><br><br>
                        <b>({{$spbbekerja->nama}})</b>
                    </p>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
