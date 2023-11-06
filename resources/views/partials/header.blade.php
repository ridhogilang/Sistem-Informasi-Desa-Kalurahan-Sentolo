<header class="header">
    <section class="header-top">
        <div class="header-top-inner">
            <div class="header-top-left">
                <div class="header-top-contact">
                    <div class="contact-item">
                        <span class="icon icon-sm pr-1 text-secondary fa-solid fa-phone" style="color: #ffffff;"></span>
                        <span>0471563410</span>
                    </div>
                    <div class="contact-item">
                        <span class="icon icon-sm pr-1 text-secondary fa-regular fa-envelope" style="color: #ffffff;"></span>
                        <span> baldessentolo@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="header-top-right">
                <a href="https://www.facebook.com/DsSentolo" target="_blank" rel="noopener"
                    class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-facebook" style="color: #ffffff;"></span>
                </a>
                <a href="https://twitter.com/opendesa" target="_blank" rel="noopener"
                    class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-twitter" style="color: #ffffff;"></span>
                </a>
                <a href="https://www.youtube.com/@pemdessentolo8151/videos" target="_blank" rel="noopener"
                    class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-youtube" style="color: #ffffff;"></span>
                </a>
                <a href="https://www.instagram.com/kalurahan_sentolo/" target="_blank" rel="noopener"
                    class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-instagram" style="color: #ffffff;"></span>
                </a>
                <a href="https://api.whatsapp.com/send?phone=6285340620352" target="_blank" rel="noopener"
                    class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-whatsapp" style="color: #ffffff;"></span>
                </a>
                <a href="https://t.me/dikisiswanto" target="_blank" rel="noopener" class="header-top-right-link py-0">
                    <span class="fa mx-1 text-lg fa-brands fa-telegram" style="color: #ffffff;"></span>
                </a>
                <div class="toggle ml-3">
                    <div class="toggle-track">
                        <div class="toggle-item dark" title="dark mode"><span class="fa-solid fa-moon"></span></div>
                        <div class="toggle-item light" title="light mode"><span class="fa-solid fa-sun"></span></div>
                    </div>
                    <div class="toggle-indicator"></div>
                    <input type="checkbox" class="toggle-check" id="mySwitch">
                </div>
            </div>
        </div>
    </section>
    <section class="header-bottom">
        <div class="header-bottom-inner">
            <a href="http://127.0.0.1:8000/#" class="brand">
                <img loading="lazy" src="/home/img/kulonprogo.png"
                    alt="Logo Desa Sukaraya" class="brand-image">
                <div class="brand-name">
                    <span id="typed" class="brand-title">Sistem Informasi Kalurahan Sentolo</span>
                    <p class="brand-tagline">Kab. Kulon Progo, Daerah Istimewa Yogyakarta</p>
                </div>
            </a>
            <form action="/berita/kategori/cari-berita" method="GET" class="form mt-4 lg:mt-0">
                <div class="form-search">
                    <input type="search" name="cari" id="cari" class="form-search-input" placeholder="Cari..." value="{{ isset($keyword) ? $keyword : '' }}">
                    <button class="form-search-button"><span class="fa-solid fa-magnifying-glass mx-2"></span></button>
                </div>
            </form>
        </div>
    </section>
</header>
<nav class="main-nav is-sticky hidden lg:block">
    <div class="main-nav-inner">
        <ul class="navigation">
            <div class="navigation-item inline-block lg:hidden uppercase pt-3 pb-1 tracking-wide font-bold text-lg">Menu
            </div>
            <li class="navigation-item is-active lg:inline-block">
                <a href="/" class="navigation-link"><span class="fa-solid fa-house"></span></a>
            </li>
            @foreach ($headers as $header)
                <li class="navigation-item">
                    <a href="{{ $header->link }}" class="navigation-link font-medium font-bold lg:font-normal">
                        {{ $header->header }}
                        @if ($header->subheader->count() > 0)
                            <i class="fa-solid ml-2 fa-angle-down"></i>
                        @endif
                    </a>
                    @if ($header->subheader->count() > 0)
                        <ul class="navigation-dropdown">
                            @foreach ($header->subheader as $subHeader)
                                <li class="navigation-dropdown-item">
                                    <a href="{{ $subHeader->link }}"
                                        class="navigation-dropdown-link">{{ $subHeader->subheader }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<div class="lg:hidden bg-black/50 fixed left-0 top-0 bottom-0 right-0 w-full h-full z-30" @click="drawer = !drawer"
    x-show="drawer" style="display: none;"></div>
<nav
    class="bottom-0 bg-slate-50 fixed top-0 w-10/12 z-40 shadow-lg transition-all duration-500 transform pb-16 h-auto overflow-y-auto lg:w-96 lg:overflow-visible lg:bottom-0 -translate-x-full"
    :class="{&#39;-translate-x-full&#39;: !drawer, &#39;translate-x-0&#39;: drawer}" id="sidenav">
    <div class="bg-tertiary text-white py-3 px-3 text-center">MENU</div>
    <ul class="relative block divide-y">
        @foreach ($headers as $index => $header)
            <li class="relative" id="nav-1">
                <a href="{{ $header->link }}"
                    class="flex items-center justify-between text-sm py-3 px-4 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out cursor-pointer"
                    data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-toggle="collapse"
                    data-bs-target="#collapsemenu{{ $index + 1 }}" aria-expanded="true" aria-controls="collapsemenu1">
                    <span><i class="fa-solid fa-grip-lines"></i>  {{ $header->header }}</span>
                    @if ($header->subheader->count() > 0)
                        <i class="fa-solid ml-2 fa-angle-down text-lg inline-block font-bold"></i>
                    @endif
                </a>
                @if ($header->subheader->count() > 0)
                    <ul class="relative accordion-collapse collapse" id="collapsemenu{{ $index + 1 }}" aria-labelledby="nav1"
                        data-bs-parent="#sidenav">
                        @foreach ($header->subheader as $subHeader)
                            <li class="relative">
                                <a href="{{ $subHeader->link }}"
                                    class="flex py-2 pl-8 pr-3 text-sm overflow-hidden text-gray-700 text-ellipsis whitespace-wrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    data-mdb-ripple="true" data-mdb-ripple-color="dark"><i class="fa-solid fa-circle mr-1"></i>{{ $subHeader->subheader }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </li>
        @endforeach
    </ul>
</nav>
