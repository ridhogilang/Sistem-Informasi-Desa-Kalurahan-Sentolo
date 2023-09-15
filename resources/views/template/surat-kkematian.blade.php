<!DOCTYPE html>
<head>
    <title>SURAT KETERANGAN KEMATIAN | {{$kkematian->nik}}</title>
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
            margin-left:252px;
            margin-top:-3px;
            width:209px
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
                        <font size="3"><b>SURAT KETERANGAN KEMATIAN </b></font><br>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor :  {{$kkematian->nomor_surat}}</font>
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
                <td>{{$kkematian->nama}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$kkematian->nik}}</td>
            </tr>
            <tr>
                <td class="template">Jenis Kelamin</td>
                <td>:</td>
                <td>{{$kkematian->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="template">Umur</td>
                <td>:</td>
                <td>{{$kkematian->umur}} Tahun</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$kkematian->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$kkematian->agama}}</td>
            </tr>
            <tr>
                <td class="template">Kewarganegaraan</td>
                <td>:</td>
                <td>{{$kkematian->kewarganegaraan}}</td>
            </tr>
            </tr>
            <tr>
                <td class="template">Status Perkawinan</td>
                <td>:</td>
                <td>{{$kkematian->status_perkawinan}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; &#160; Adalah benar-benar warga Kalurahan Sentolo, Kabupaten Kulon Progo dan yang bersangkutan Telah Meninggal Dunia pada hari senin 05
                        <br>&#160; &#160; &#160; Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan seperlunya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>Sentolo,  {{ \Carbon\Carbon::parse($skkematian['created_at'])->translatedFormat('j F Y') }}</p>
            </tr>
        </table>
        <table  class="tujuh">
            <tr>
                <td> <P>&#160; &#160; &#160; &#160; &#160; &#160; Lurah Sentolo</P>  <br>  <P class="namadesa"><b>(TEGUH) </b></P></td>
            </tr>
        </table>
    </center>
</body>
</html>
