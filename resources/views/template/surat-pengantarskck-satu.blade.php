<!DOCTYPE html>
<head>
    <title>SURAT PENGANTAR SKCK| {{$pskck->nik}}</title>
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
        }

        .lima{
            margin-left: 80px;
        }

        .lima tr td {
            font-size: 17px;
            padding-right: 30px;
            padding-top: 5px;
            margin-right: 10px;
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
                <td><P> &#160; &#160; &#160; &#160;  &#160; Yang bertanda tangan dibawah ini Lurah Sentolo, Kapanewon Sentolo, Kabupaten Kulon
                    <br>Progo, menerangkan bahwa ;</P>
                </td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td> Nama</td>
                <td>:  {{$pskck->nama}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td> : {{$pskck->nik}}</td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td> : {{$pskck->tempat_lahir}} / {{date('d-m-Y',strtotime($pskck->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td> : {{$pskck->agama}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td> : {{$pskck->pekerjaan}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : {{$pskck->alamat}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        <br>&#160; &#160; &#160; &#160;  &#160;{{$pskck->deskripsi}}<br><br>
                        &#160; &#160; &#160; &#160;  &#160; Demikian Surat Keterangan ini dibuat agar dapat dipergunakan untuk sebagaimana <br> mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>Sentolo, {{ \Carbon\Carbon::parse($pskck['created_at'])->translatedFormat('j F Y') }}</p>
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