<!DOCTYPE html>
<head>
    <title>SURAT KETERANGAN TIDAK MAMPU | {{$sktm->nik}}</title>
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
            margin-left:201px;
            margin-top:-3px;
            width:313px
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
            padding-top:3px;
            /* margin-right: 10px; */
        }
        .lima tr td {
            font-size: 17px;
            padding-right: 5px;
            padding-top:3px;
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
            width: 200px;
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
                        <font size="3"><b>SURAT KETERANGAN KURANG MAMPU </b></font><br>
                        <hr class="hrsatu">
                    </center>
                </td>
            </tr>
        </table>
        <table class="nosurat">
            <tr>
                <td width="537">
                    <center>
                        <font size="2">Nomor : {{$sktm->nomor_surat}}</font>
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
                <td>{{$sktm->nama}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$sktm->nik}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$sktm->tempat_lahir}} / {{date('d-m-Y',strtotime($sktm->tanggal_lahir))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$sktm->agama}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$sktm->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{$sktm->alamat}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        Adalah {{$sktm->hubungan}} dari :
                    </p>
                </td>
            </tr>
        </table>
        <table  class="lima">
            <tr>
                <td class="template">Nama</td>
                <td>:</td>
                <td>{{$sktm->nama_dua}}</td>
            </tr>
            <tr>
                <td class="template">NIK</td>
                <td>:</td>
                <td>{{$sktm->nik_dua}}</td>
            </tr>
            <tr>
                <td class="template">Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{$sktm->tempat_lahir_dua}} / {{date('d-m-Y',strtotime($sktm->tanggal_lahir_dua))}}  </td>
            </tr>
            <tr>
                <td class="template">Agama</td>
                <td>:</td>
                <td>{{$sktm->agama_dua}}</td>
            </tr>
            <tr>
                <td class="template">Pekerjaan</td>
                <td>:</td>
                <td>{{$sktm->pekerjaan_dua}}</td>
            </tr>
            <tr>
                <td class="template" style="vertical-align: top;">Alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">{{$sktm->alamat_dua}}</td>
            </tr>
        </table>
        <table class="empat">
            <tr>
                <td>
                    <p>
                        &#160; &#160; &#160; &#160; {{$sktm->deskripsi}}
                        Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </table>

        <table class="enam">
            <tr>
                <p>Sentolo, {{ \Carbon\Carbon::parse($sktm['created_at'])->translatedFormat('j F Y') }}</p>
            </tr>
        </table>
        <table  class="tujuh">
            <tr>
                <td align="center">
                    <p>{{ $sktm->tandatangan[0]['jabatan_user'] }}</p><br><br><br><br>  
                    <p><b>({{ $sktm->tandatangan[0]['nama_user'] }}) </b></p>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
