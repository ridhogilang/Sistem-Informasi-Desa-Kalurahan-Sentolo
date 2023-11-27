<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="alternate" type="application/rss+xml" title="Feed Desa Sukaraya" href="https://preview.silirdev.com/sitemap">
    <link rel="shortcut icon" href="{{ asset('home/img/kulonprogo.png') }}">
    <link rel="manifest" id="manifest"
        href="data:application/json;base64,eyJuYW1lIjoiRGVzYSBTdWthcmF5YSIsImRpc3BsYXkiOiJzdGFuZGFsb25lIiwic2hvcnRfbmFtZSI6IkRlc2EgU3VrYXJheWEiLCJkZXNjcmlwdGlvbiI6IkFwbGlrYXNpIERlc2EgU3VrYXJheWEiLCJzdGFydF91cmwiOiJodHRwczovL3ByZXZpZXcuc2lsaXJkZXYuY29tLyIsImJhY2tncm91bmRfY29sb3IiOiIjZmZmZmZmIiwidGhlbWVfY29sb3IiOiIjMTQyODUwIiwiaWNvbnMiOlt7InNyYyI6Imh0dHBzOi8vcHJldmlldy5zaWxpcmRldi5jb20vZGVzYS90aGVtZXMvc2lsaXIvYXNzZXRzL2FwcC1pY29ucy9pY29uLTQ4eDQ4LnBuZyIsInNpemVzIjoiNDh4NDgiLCJ0eXBlIjoiaW1hZ2UvcG5nIiwicHVycG9zZSI6ImFueSJ9LHsic3JjIjoiaHR0cHM6Ly9wcmV2aWV3LnNpbGlyZGV2LmNvbS9kZXNhL3RoZW1lcy9zaWxpci9hc3NldHMvYXBwLWljb25zL2ljb24tNzJ4NzIucG5nIiwic2l6ZXMiOiI3Mng3MiIsInR5cGUiOiJpbWFnZS9wbmciLCJwdXJwb3NlIjoiYW55In0seyJzcmMiOiJodHRwczovL3ByZXZpZXcuc2lsaXJkZXYuY29tL2Rlc2EvdGhlbWVzL3NpbGlyL2Fzc2V0cy9hcHAtaWNvbnMvaWNvbi05Nng5Ni5wbmciLCJzaXplcyI6Ijk2eDk2IiwidHlwZSI6ImltYWdlL3BuZyIsInB1cnBvc2UiOiJhbnkifSx7InNyYyI6Imh0dHBzOi8vcHJldmlldy5zaWxpcmRldi5jb20vZGVzYS90aGVtZXMvc2lsaXIvYXNzZXRzL2FwcC1pY29ucy9pY29uLTE0NHgxNDQucG5nIiwic2l6ZXMiOiIxNDR4MTQ0IiwidHlwZSI6ImltYWdlL3BuZyIsInB1cnBvc2UiOiJhbnkifSx7InNyYyI6Imh0dHBzOi8vcHJldmlldy5zaWxpcmRldi5jb20vZGVzYS90aGVtZXMvc2lsaXIvYXNzZXRzL2FwcC1pY29ucy9pY29uLTE5MngxOTIucG5nIiwic2l6ZXMiOiIxOTJ4MTkyIiwidHlwZSI6ImltYWdlL3BuZyIsInB1cnBvc2UiOiJhbnkifSx7InNyYyI6Imh0dHBzOi8vcHJldmlldy5zaWxpcmRldi5jb20vZGVzYS90aGVtZXMvc2lsaXIvYXNzZXRzL2FwcC1pY29ucy9pY29uLTUxMng1MTIucG5nIiwic2l6ZXMiOiI1MTJ4NTEyIiwidHlwZSI6ImltYWdlL3BuZyIsInB1cnBvc2UiOiJhbnkifV19">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('home/js/leaflet.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="{{ asset('home/js/leaflet-providers.min.js') }}"></script>
    <script src="{{ asset('home/js/mapbox-gl.min.js') }}"></script>
    <script src="{{ asset('home/js/leaflet-mapbox-gl.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.cycle2.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.cycle2.carousel.min.js') }}"></script>
    <script src="{{ asset('home/js/peta.js') }}"></script>
    <script src="https://kit.fontawesome.com/d61a3422c6.js" crossorigin="anonymous"></script>
    <link as="style" href="{{ asset('home/css/aos.css') }}" onload="this.onload=null;this.rel=&#39;stylesheet&#39;"
        rel="stylesheet">
    <link as="style" href="{{ asset('home/css/jquery.dataTables.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/highcharts.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/jquery.fancybox.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/leaflet.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/mapbox-gl.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link href="https://preview.silirdev.com/cloudme.fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect">
    <link as="style" href="{{ asset('home/css/css2') }}" onload="this.onload=null;this.rel=&#39;stylesheet&#39;"
        rel="stylesheet">
    <link as="style" href="{{ asset('home/css/ionicons.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/animate.compat.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    <link as="style" href="{{ asset('home/css/owl.carousel.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet">
    {{-- <link as="style" href="{{ asset('home/css/tabler-icons.min.css') }}"
        onload="this.onload=null;this.rel=&#39;stylesheet&#39;" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('home/css/style.min.css') }}" id="main-css">
    <link rel="stylesheet" href="{{ asset('home/css/custom.css') }}">
    @stack('header')
</head>

<body data-theme="custom" x-data="{ drawer: false }" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    <div class="loading">
        <div class="pt-20">
            <img loading="" src="{{ asset('home/img/kulonprogo.png') }}" alt="Logo Desa Sukaraya"
                style="height: 7rem" class="w-auto mx-auto"><br><br><br>
            <img loading="" src="{{ asset('home/img/loadingdepan.gif') }}" alt="Logo Desa Sukaraya"
                style="height: 6rem" class="w-auto mx-auto">
            <div class="inline-flex items-center pt-6">
                {{-- <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-slate-600 dark:text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg> --}}
                <p class="pl-0.5 text-opacity-50">Memuat....</p>
            </div>
        </div>
    </div>
    {{-- Header Section --}}
    @include('partials.header')

    {{-- Main Section --}}
    @yield('main')
    <section
        class="fixed inset-x-0 bottom-0 left-0 max-w-screen right-0 z-40 bg-white dark:bg-dark-secondary shadow-xl lg:hidden lg:invisible bottom-nav">
        <div class="flex justify-between">
            <a href="https://preview.silirdev.com/"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="fa-solid fa-house text-lg"></i>
                <span class="text-xs">Beranda</span>
            </a>
            <a href="https://preview.silirdev.com/peta"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="fa-solid fa-location-dot text-lg"></i>
                <span class="text-xs">Peta</span>
            </a>
            <a href="http://127.0.0.1:8000/#"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary bg-primary text-white"
                data-mdb-ripple="true" data-mdb-ripple-color="light" @click="drawer = !drawer">
                <i class="fa-solid fa-bars text-lg"></i>
                <span class="text-xs">Menu</span>
            </a>
            <a href="https://preview.silirdev.com/first/#"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light" data-bs-target="#modal-login" data-bs-toggle="modal"
                @click="drawer = false">
                <i class="fa-regular fa-user text-lg"></i>
                <span class="text-xs">Login</span>
            </a>
            <a href="https://preview.silirdev.com/galeri"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="fa-solid fa-images text-lg"></i>
                <span class="text-xs">Galeri</span>
            </a>
        </div>
    </section>

    {{-- Footer Section --}}
    @include('partials.footer')

    {{-- button ke atas --}}
    <a href="https://preview.silirdev.coxm/first/#"
        class="fixed bottom-0 right-0 lg:mb-5 mb-16 mr-5 bg-tertiary text-white focus:outline-none ring-2 ring-tertiary ring-offset-2 flex items-center justify-center w-10 h-10 rounded-full scroll-top"
        id="scroll-to-top">
        <i class="ti ti-arrow-up text-lg"></i>
    </a>

    {{-- JavaScript --}}
    {{-- <script src=" {{ asset('home/js/highcharts.min.js') }}"></script>
    <script src=" {{ asset('home/js/highcharts-3d.min.js') }}"></script>
    <script src=" {{ asset('home/js/highcharts-more.min.js') }}"></script>
    <script src=" {{ asset('home/js/sankey.min.js') }}"></script>
    <script src=" {{ asset('home/js/organization.min.js') }}"></script>
    <script src=" {{ asset('home/js/accessibility.min.js') }}"></script> --}}
    {{-- <script src=" {{ asset('home/js/aos.js') }}"></script>
    <script src=" {{ asset('home/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src=" {{ asset('home/js/owl.carousel.min.js') }}"></script> --}}
    <script defer="" src=" {{ asset('home/js/cdn.min.js') }}"></script>
    <script src="{{ asset('sandbox/js/plugins.js') }}"></script>
    <script src="{{ asset('sandbox/js/theme.js') }}"></script>
    {{-- <script src=" {{ asset('home/js/typed.js@2.0.12') }}"></script>
    <script src=" {{ asset('home/js/anti-csrf.js') }}"></script>
    <script src=" {{ asset('home/js/jquery.validate.min.js') }}"></script>
    <script src=" {{ asset('home/js/validasi.js') }}"></script>
    <script src=" {{ asset('home/js/messages_id.js') }}"></script> --}}
    <script src=" {{ asset('home/js/script.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script defer="" src=" {{ asset('home/js/script.min.js') }}"></script> --}}
    @stack('footer')

    <style type="text/css" data-typed-js-css="true">
        .typed-cursor {
            opacity: 1;
        }

        .typed-cursor.typed-cursor--blink {
            animation: typedjsBlink 0.7s infinite;
            -webkit-animation: typedjsBlink 0.7s infinite;
            animation: typedjsBlink 0.7s infinite;
        }

        @keyframes typedjsBlink {
            50% {
                opacity: 0.0;
            }
        }

        @-webkit-keyframes typedjsBlink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleSwitch = document.getElementById("mySwitch");
            const toggleIndicator = document.querySelector(".toggle-indicator");

            // Mengecek apakah ada preferensi dark mode yang tersimpan
            const darkModePreference = localStorage.getItem("darkMode");

            // Mengatur mode gelap berdasarkan preferensi yang tersimpan
            if (darkModePreference === "enabled") {
                toggleSwitch.checked = true;
                document.body.classList.add("dark");
                toggleIndicator.style.transform = "translateX(140%)";
                document.body.style.backgroundColor = "rgb(15 23 42)";
                document.body.style.color = "white";
            }

            toggleSwitch.addEventListener("change", function() {
                if (toggleSwitch.checked) {
                    // Aktifkan mode gelap
                    document.body.classList.add("dark");
                    toggleIndicator.style.transform = "translateX(140%)";
                    document.body.style.backgroundColor = "rgb(15 23 42)";
                    document.body.style.color = "white";
                    // Simpan preferensi dark mode ke localStorage
                    localStorage.setItem("darkMode", "enabled");
                } else {
                    // Aktifkan mode terang
                    document.body.classList.remove("dark");
                    toggleIndicator.style.transform = "translateX(0)";
                    document.body.style.backgroundColor = "rgb(241 245 249)";
                    document.body.style.color = "rgb(51 65 85)";
                    // Simpan preferensi dark mode ke localStorage
                    localStorage.setItem("darkMode", "disabled");
                }
            });
        });
    </script>
    <script>
        var marquee = document.querySelector('.newsticker-item marquee');

        marquee.addEventListener('mouseenter', function() {
            marquee.stop(); // Hentikan marquee saat kursor masuk
        });

        marquee.addEventListener('mouseleave', function() {
            marquee.start(); // Mulai kembali marquee saat kursor keluar
        });
    </script>
    <script>
        // Dapatkan elemen input pencarian
        var searchInput = document.getElementById('cari');

        // Cek apakah ada nilai pencarian dalam URL query parameter
        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);

        // Jika ada nilai pencarian dalam URL query parameter, atur nilai input pencarian
        if (urlParams.has('cari')) {
            var searchKeyword = urlParams.get('cari');
            searchInput.value = searchKeyword;
        }
    </script>
    <script>
        // Function to show the loading div
        function showLoading() {
            const loadingDiv = document.querySelector('.loading');
            loadingDiv.style.display = 'block';
        }

        // Function to hide the loading div
        function hideLoading() {
            const loadingDiv = document.querySelector('.loading');
            loadingDiv.style.display = 'none';
        }

        // Panggil showLoading saat halaman mulai dimuat
        showLoading();

        // Panggil hideLoading ketika halaman telah selesai dimuat
        window.addEventListener('load', hideLoading);
    </script>
    <script type="text/javascript">
        $(function() {
            var chart_widget;
            $(document).ready(function() {
                chart_widget = new Highcharts.Chart({
                    chart: {
                        renderTo: 'statistik_kalurahan',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Jumlah Penduduk'
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    xAxis: {
                        categories: [
                            '{{ $statistik->lk }} <br> LAKI-LAKI',
                            '{{ $statistik->pr }} <br> PEREMPUAN',
                            '{{ $statistik->lk + $statistik->pr }} <br> TOTAL'
                        ]
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            colorByPoint: true
                        },
                        column: {
                            pointPadding: 0,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        type: 'column',
                        name: 'Populasi',
                        data: [
                            ['LAKI-LAKI', {{ $statistik->lk }}],
                            ['PEREMPUAN', {{ $statistik->pr }}],
                            ['TOTAL', {{ $statistik->lk + $statistik->pr }}],
                        ]
                    }]
                });
            });
        });
    </script>
    <script>
        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
        var posisi = [-7.837151186733103, 110.21840572357179];
        var zoom = 14;

        //Style polygon
        var style_polygon = {
            stroke: true,
            color: '#FF0000',
            opacity: 1,
            weight: 2,
            fillColor: '#8888dd',
            fillOpacity: 0.5
        };
        var wilayah_desa = L.map('map_wilayah').setView(posisi, zoom);

        //Menampilkan BaseLayers Peta
        var baseLayers = getBaseLayers(wilayah_desa, '');

        L.control.layers(baseLayers, null, {
            position: 'topright',
            collapsed: true
        }).addTo(wilayah_desa);

        var polygon_desa = [
            [
                [
                    [-7.824324896269134, 110.20575106143953],
                    [-7.824099030977428, 110.20601928234102],
                    [-7.824011342066498, 110.20642697811128],
                    [-7.823668557965023, 110.206735432148],
                    [-7.823068020797905, 110.20699560642242],
                    [-7.822153927166726, 110.20721554756166],
                    [-7.822217701206011, 110.20834743976594],
                    [-7.82239307976375, 110.20864248275758],
                    [-7.822935158475958, 110.20997285842896],
                    [-7.82356226826392, 110.21105647087099],
                    [-7.824157490241141, 110.2110940217972],
                    [-7.824168119197294, 110.21181821823122],
                    [-7.82505563608049, 110.21308422088623],
                    [-7.825278843622056, 110.21366357803346],
                    [-7.825523308887612, 110.21423220634462],
                    [-7.825969723350446, 110.21489739418031],
                    [-7.826405508436378, 110.21555185317993],
                    [-7.826522426308748, 110.21604537963869],
                    [-7.826575570785349, 110.21694660186768],
                    [-7.826692488610024, 110.21740794181825],
                    [-7.826804091957525, 110.21776735782625],
                    [-7.827107015178683, 110.21843254566194],
                    [-7.826347049487897, 110.21886706352235],
                    [-7.825682742679221, 110.21842181682588],
                    [-7.824492302229917, 110.21846473217012],
                    [-7.823801420053301, 110.21802484989168],
                    [-7.8229298439821955, 110.21759033203126],
                    [-7.821999806531532, 110.21731674671175],
                    [-7.821005992792195, 110.2173113822937],
                    [-7.820485169673044, 110.21755814552309],
                    [-7.820277903148829, 110.21799802780151],
                    [-7.820219443341319, 110.21860957145692],
                    [-7.819937773244917, 110.21949470043184],
                    [-7.820591460158331, 110.2201169729233],
                    [-7.820235386926001, 110.22085189819337],
                    [-7.820447967996788, 110.2217960357666],
                    [-7.820384193686927, 110.222584605217],
                    [-7.820649919913694, 110.22319614887239],
                    [-7.82107508152446, 110.2238827943802],
                    [-7.821521500749347, 110.22410273551942],
                    [-7.821617161949676, 110.22448897361757],
                    [-7.821409895987923, 110.22541701793672],
                    [-7.821500242701855, 110.22637724876404],
                    [-7.821526815261061, 110.2273964881897],
                    [-7.821574645863343, 110.22840499877931],
                    [-7.821723452146512, 110.22947251796724],
                    [-7.821824427808429, 110.23019134998323],
                    [-7.821851000346974, 110.23076534271242],
                    [-7.822148612663014, 110.23073315620424],
                    [-7.822424966766326, 110.23063123226167],
                    [-7.822382450762357, 110.23195624351501],
                    [-7.822552514752253, 110.23229956626892],
                    [-7.822409023265344, 110.23376405239107],
                    [-7.82309990774888, 110.2336835861206],
                    [-7.823753589706404, 110.2335387468338],
                    [-7.825076893946741, 110.23310959339143],
                    [-7.8263098483346, 110.23263752460481],
                    [-7.827627830026737, 110.23231029510498],
                    [-7.831029053845156, 110.22977828979494],
                    [-7.83226199062236, 110.22879123687744],
                    [-7.833452408875349, 110.2271604537964],
                    [-7.8342601907520075, 110.22638797760011],
                    [-7.834812882712155, 110.22321224212646],
                    [-7.835238029874603, 110.22162437438966],
                    [-7.836215866700722, 110.22115230560304],
                    [-7.8371937012301, 110.22110939025879],
                    [-7.839914620004899, 110.22261142730714],
                    [-7.840446047376478, 110.21980047225954],
                    [-7.842954375407062, 110.21879196166994],
                    [-7.844654928180307, 110.21851301193239],
                    [-7.84486749678804, 110.21735429763795],
                    [-7.844548643835691, 110.2161741256714],
                    [-7.844697441910548, 110.21323442459108],
                    [-7.844941895775076, 110.21256923675539],
                    [-7.845186349495906, 110.21190404891969],
                    [-7.845080065287125, 110.21132469177246],
                    [-7.8450588084420865, 110.21076679229738],
                    [-7.844761212497748, 110.21040201187135],
                    [-7.844633671313552, 110.20999431610109],
                    [-7.842784319747318, 110.20849227905275],
                    [-7.842151924652704, 110.20819187164307],
                    [-7.841817126860448, 110.20804703235626],
                    [-7.841535471366228, 110.20782172679903],
                    [-7.8410253024383625, 110.20746231079103],
                    [-7.8407489606745715, 110.20725309848787],
                    [-7.840600161187269, 110.20713508129121],
                    [-7.840536389962138, 110.20692050457002],
                    [-7.840116562486053, 110.20678639411928],
                    [-7.8396382775034485, 110.20638942718507],
                    [-7.839335363396807, 110.20591199398042],
                    [-7.838936791867928, 110.20519852638246],
                    [-7.838187476360252, 110.20501077175142],
                    [-7.837847361074742, 110.20544528961182],
                    [-7.8371565010454605, 110.20571887493135],
                    [-7.835875749804286, 110.20653426647188],
                    [-7.835397459948588, 110.20654499530794],
                    [-7.834664081102735, 110.20642697811128],
                    [-7.834249562053277, 110.20577788352966],
                    [-7.833696869345469, 110.20575642585754],
                    [-7.833367379112973, 110.20565450191499],
                    [-7.833011316794474, 110.20564377307893],
                    [-7.832724340972947, 110.20539164543153],
                    [-7.832203532495518, 110.20547211170198],
                    [-7.831730552803805, 110.20549893379213],
                    [-7.831082197747005, 110.20540505647661],
                    [-7.8298678578971765, 110.20537018775941],
                    [-7.828953779176564, 110.2054587006569],
                    [-7.827343507715861, 110.20541042089465],
                    [-7.826126499744803, 110.20535141229631],
                    [-7.825653513155319, 110.20538896322253],
                    [-7.825172554331461, 110.20539969205859],
                    [-7.825215070050961, 110.20568400621416]
                ]
            ]
        ];
        var kantor_desa = L.polygon(polygon_desa, style_polygon).bindTooltip("Wilayah Desa").addTo(wilayah_desa);
        wilayah_desa.fitBounds(kantor_desa.getBounds());
    </script>
</body>

</html>
