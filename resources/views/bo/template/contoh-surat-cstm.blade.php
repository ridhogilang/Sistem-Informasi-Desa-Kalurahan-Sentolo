<!DOCTYPE html>

<head>
    <title>CONTOH SURAT|</title>
    <style>
        table tr td {
            font-size: 16px;
        }

        table tr .text {
            text-align: right;
            font-size: 13px;
        }

        table tr .text2 {
            text-align: center;

        }

        .satu {
            margin-left: 50px;
            margin-top: -40px;
        }

        hr {
            width: 650px;
            margin-top: -1px;
        }

        .dua {
            margin-left: 20px;
        }

        .dua hr {
            border-top: 4px double black;
        }

        img {
            margin-left: -30px;
        }

        .hrsatu {
            margin-left: 247px;
            margin-top: -3px;
            width: 217px
        }

        .nosurat {
            margin-top: -33px;
        }

        .empat p {
            font-size: 16px;
            margin-left: 20px;
            text-align: justify;
            margin-right: 200px;
            line-height: 1.5;
        }

        .lima {
            margin-left: 80px;
        }

        .lima tr .template {
            font-size: 16px;
            padding-right: 20px;
            padding-top: 0px;
            /* margin-right: 10px; */
        }


        .lima tr td {
            font-size: 16px;
            padding-right: 5px;
            padding-top: 0px;
        }

        .enam p {
            margin-top: 0px;
            margin-left: 490px;
            line-height: 1.5;
        }

        .enam .namapernyataan {
            text-align: center;
        }

        .tujuh {
            margin-left: 50px;
            margin-top: -300px;
            line-height: 1.5;
        }

        .namadesa {
            margin-left: 10px;
            margin-top: 50px;
        }

        .namapernyataan {
            margin-left: 20px;
            margin-top: 50px;
        }

        .delapan hr {
            width: 115px;
            margin-left: 470px;
            margin-top: -23px;
        }

        p {
            text-indent: 40px;
            /* Menjorokkan teks sejauh 40px dari kiri */
            margin-top: 0px;
            /* Jarak atas antara paragraf */
            margin-bottom: 0px;
            /* Jarak bawah antara paragraf */
            font-size: 16px;
            font-family: Arial;
        }

        .tglsurat{
            margin-top: -45px;
            display: flex;
            margin-left: 76%;
            font-size: 16px;
            font-family: Arial;
        }

       .nomorsurat table .atas {
            font-size: 16px;
            font-family: Arial;
            margin-left: 100%;
        }

        .signature {
            width: 300px;
            /* Lebar area tanda tangan */
            height: 100px;
            /* Tinggi area tanda tangan */
            /* border: 1px solid #000; Garis tepi */
            margin-top: 50px;
            /* Jarak atas */
            padding: 10px;
            /* Ruang dalam */
            text-align: center;
            /* Pusatkan teks di dalam area tanda tangan */
            font-size: 16px;
            /* Ukuran font */
            display: inline-block;
            /* Tampilkan tanda tangan secara berdampingan */
            margin-right: 20px;
            /* Jarak antara tanda tangan */
        }

    </style>
</head>

<body>
    <center>
        <br>
        <table class="satu">
            <tr>
                <td><img src="{{ public_path('template/img/kop_surat.jpg') }}" style="width: 97%; height: 15%"></td>
            </tr>
        </table>
    </center>
    <div class="nomorsurat">
        <table class="atas">
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td>20/BB/IX/2023</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td>Undangan</td>
            </tr>
        </table>
        <p class="tglsurat">23 September 2023</p><br><br><br>
    </div>



    <div class="penerimasurat">
        <p>Yth</p>
        <p>KKN Ujb</p>
        <p>Di Kalurahan Sentolo</p>
        <p>Di Tempat</p>
        </td>
    </div>
    <br>

    <div class="isisurat">
        <p>Dengan Hormat,</p>
        <p>Salam sejahtera semoga Bapak/Ibu/Sdr senantiasa selalu dalam lindungan Tuhan YME Allah S.W.T. Salam dan
            SHolawat semoga selalu tercurah kepada Baginda Nabi Agung Muhammad S.A.W. yang selalu kita nantikan
            syafa'atnya kelak di hari kiamat.</p>
        <p>Sehubungan dilaksakan kegiatan Pembinaan Kesenian khususnya kesenian ketoprak oleh Dinas Kebudayaan (kundha
            Kabudayaan) D.I. Yogyakarta di Kalurahan Sentolo maka dengan ini kami mengharapkan kehadiran Bapak/Ibu/Sdr
            besok pada :</p>
        </td>
    </div>


    <center>
        <table class="lima">
            <tr>
                <td class="template">Hari / Tanggal</td>
                <td>:</td>
                <td>Sabtu / 23 September 2023 </td>
            </tr>


            <tr>
                <td class="template">alamat</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">Padukuhan Gedangan, RT 50 RW 24, Kalurhaan Sentolo,
                    kapanewon Sentolo, Kabupaten Kulon Progo, D.I. Yogyakarta</td>
            </tr>


            <tr>
                <td class="template">Waktu</td>
                <td>:</td>
                <td>19.30 WIB - Selesai</td>
            </tr>


            <tr>
                <td class="template" style="vertical-align: top;">Acara</td>
                <td style="vertical-align: top;">:</td>
                <td style="max-width: 405px; word-wrap: break-word;">Menyaksikan Pentas Kesenian Ketoprak Bhineka Budaya
                    Sentolo</td>

            </tr>

        </table>
    </center>

    {{-- <p>{{ $scstm->paragrafpenutup }}</p> --}}
    <p>Demikian undangan ini kami sampaikan, atas kehadiran kami ucapkan terimakasih.</p>

    <center>
        <div class="signature">
            &#160; Mengetahui,
            <br>Lurah Sentolo<br><br><br><br>
            <b>(TEGUH)</b>
        </div>

        <!-- Area tanda tangan kedua -->
        <div class="signature">
            Sentolo,19 September 2023<br>
            Ketua Panitia<br><br><br><br>
            <b>(Wisnu Harmanto)</b>
        </div>

    </center>
</body>

</html>
