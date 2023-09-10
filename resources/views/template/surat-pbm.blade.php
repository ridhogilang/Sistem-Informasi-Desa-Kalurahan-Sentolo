<!DOCTYPE html>
<head>
    <title>SKBM | {{$spbm->nama}}</title>
    {{-- <link rel="icon" href="/public/template/assets/img/favicon.png" type="image/icon" > --}}
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
        }

        .lima{
            margin-left: 80px;
        }

        .lima tr td {
            font-size: 17px;
            padding-right:30px;
            padding-top:10px;
            margin-right:20px;
        }
         P{
             font-size: 16px;
             font-family: Arial;
         }

         .enam{
             margin-top: 5px;
             margin-left: 500px;
         }

         .tujuh{
            margin-left: 100px;
            margin-top: -150px;
         }

         .namadesa{
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
        <br>
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
        {{-- <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor : {{$spbm->nomor_surat}}</font>
                    </center>
                </td>
            </tr>
        </table> --}}

        <table class="empat">
            <tr>
                <td><P> &#160; &#160; &#160;Yang Bertanda Tangan di bawah ini :</P></td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td> Nama</td>
                <td>:  {{$spbm->nama}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : {{$spbm->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td> : {{$spbm->tempat_lahir}} / {{date('d-m-Y',strtotime($spbm->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td> : {{$spbm->agama}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td> : {{$spbm->pekerjaan}}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Alamat</td>
                <td style="max-width: 350px; word-wrap: break-word;"> : {{ $spbm->alamat }}</td>

            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; &#160;Dengan ini saya menyatakan bahwa saya sampai saat ini berstatus <strong>{{$spbm->deskripsi}}</strong>
                        Apabila pernyataan ini tidak benar saya siap menanggung segala akibat dan bersedia
                        dituntut dimuka hukum sesuai dengan peraturan  perundangan yang berlaku.
                        <br>
                        &#160; &#160; &#160; &#160;Surat ini saya buat dengan kesadaran sendiri tanpa ada paksaan dan atau tekanan dari pihak 
                        manapun dalam keadaan sehat jasmani maupun rohani, selanjutnya agardapat dipergunakan sebagaimana mestinya.
                    </strong>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>{{ \Carbon\Carbon::parse($spbm['created_at'])->translatedFormat('j F Y') }}
                <br>
                &#160; &#160; &#160; &#160;Pernyataan</p>
            </tr>
        </table>
        <table class="tujuh">
            <tr>
                <p>Mengetahui :
                <br>&#160; &#160; &#160; Lurah<br>
            </tr>
        </table>
        
    </center>
</body>
</html>
