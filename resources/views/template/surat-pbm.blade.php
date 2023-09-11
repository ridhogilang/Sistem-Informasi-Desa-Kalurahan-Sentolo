<!DOCTYPE html>
<head>
    <title>SURAT PERNYATAAN BELUM MENIKAH | {{$spbm->nik}}</title>
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

        .enam p{
            margin-top: 5px;
            margin-left: 490px;
            line-height: 1.5;
        }
        .enam .namapernyataan{
            text-align: center;
        }

         .tujuh{
            margin-left: 100px;
            margin-top: -180px;
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
    </style>
</head>

<body>
    <center>
        <br>
        <table class="tiga">
            <tr>
                <td width="538">
                    <center>
                        <font size="3"><b>SURAT PERNYATAAN BELUM MENIKAH </b></font><br>
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
                <td>{{$spbm->nama}}</td>
            </tr>
            <tr>
                <td class="template"> NIK</td>
                <td>:</td>
                <td>{{$spbm->nik}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$spbm->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$spbm->tempat_lahir}} / {{date('d-m-Y',strtotime($spbm->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$spbm->agama}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$spbm->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{ $spbm->alamat }}</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; Dengan ini saya menyatakan bahwa saya sampai saat ini berstatus <strong>{{$spbm->deskripsi}}</strong>
                        Apabila pernyataan ini tidak benar saya siap menanggung segala akibat dan bersedia dituntut dimuka hukum sesuai dengan peraturan  perundangan yang berlaku.
                        <br>
                        &#160; &#160; &#160; &#160; Surat ini saya buat dengan kesadaran sendiri tanpa ada paksaan dan atau tekanan dari pihak
                        manapun dalam keadaan sehat jasmani maupun rohani, selanjutnya agardapat dipergunakan sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>
                    Sentolo, {{ \Carbon\Carbon::parse($spbm['created_at'])->translatedFormat('j F Y') }}<br>
                    Yang membuat pernyataan,
                </p>
                <p class="namapernyataan"><br><br><br>
                    <b>({{$spbm->nama}})</b>
                </p>
            </tr>
        </table>
        <table class="tujuh">
            <tr>
                <p>
                    &#160; Mengetahui :
                    <br>Lurah Sentolo<br>
                </p>
                <p class="namadesa"><br>
                    <b>(TEGUH)</b>
                </p>
            </tr>
        </table>

    </center>
</body>
</html>
