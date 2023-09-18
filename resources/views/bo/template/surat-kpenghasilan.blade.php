<!DOCTYPE html>
<head>
    <title>SURAT KETERANGAN PENGHASILAN | {{$skpenghasilan->nik}}</title>
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
            margin-left: 40px;
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

         .enam{
             margin-top: 5px;
             margin-left: 450px;
         }

         .tujuh{
            margin-left: 450px;
            margin-top: -30px;
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
        <table class="satu">
            <tr >
                <td><img src="{{ public_path('template/img/kop_surat.jpg') }}" style="width: 97%; height:auto"></td>
            </tr>
        </table>
        <table class="tiga">
            <tr>
                <td width="538">
                    <center>
                        <font size="3"><b>SURAT KETERANGAN PENGHASILAN </b></font><br>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor : {{$skpenghasilan->nomor_surat}}</font>
                    </center>
                </td>
            </tr>
        </table>

        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; &#160; Yang bertanda tangan dibawah ini Lurah Sentolo, Kapanewon Sentolo, Kabupaten Kulon Progo, menerangkan bahwa :
                    </p>
                </td>
            </tr>
        </table>
        <table class="lima">
            <tr>
                <td class="template">Nama</td>
                <td>:</td>
                <td>{{$skpenghasilan->nama}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$skpenghasilan->nik}}</td>
            </tr>
            <tr>
                <td class="template">Umur</td>
                <td>:</td>
                <td>{{$skpenghasilan->umur}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$skpenghasilan->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$skpenghasilan->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template">Penghasilan</td>
                <td>:</td>
                <td>{{$skpenghasilan->penghasilan}}</td>
            </tr>
            <tr>
                <td class="template">Kewarganegaraan</td>
                <td>:</td>
                <td>{{$skpenghasilan->kewarganegaraan}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{$skpenghasilan->alamat}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        Demikian surat Keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>Sentolo, {{ \Carbon\Carbon::parse($skpenghasilan['created_at'])->translatedFormat('j F Y') }}</p>
            </tr>
        </table>
        <table  class="tujuh">
            <tr>
                <td> <P>&#160; &#160; &#160; &#160; Lurah Sentolo</P>  <br>  <P class="namadesa">&#160; &#160; &#160; <b>(TEGUH) </b></P></td>
            </tr>
        </table>
    </center>
</body>
</html>
