@extends('layout.main')

@push('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script> --}}
    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    </script>

    <style>
        #table-agenda {
            width: 100%;
            /* border-collapse: collapse; */
            margin-top: 10px;
        }

        #table-agenda th,
        #table-agenda td {
            padding: 5px;
            border: 1px solid #ccc;
            text-align: left;
        }

        #table-agenda th {
            text-align: left;
            background-color: #f2f2f2;
        }

        #hari-ini-agenda {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        #yad {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        #lama {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        #hari-inigor {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        #yad-gor {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        #minggu {
            max-height: 300px;
            /* Sesuaikan dengan tinggi maksimum yang Anda inginkan */
            overflow-x: auto;
        }

        .note-red {
            color: red;
        }

        /* Dark mode for the table */
        .dark #table-agenda {
            width: 100%;
            margin-top: 10px;
            background-color: #121212;
            /* Background color for dark mode */
        }

        .dark #table-agenda th,
        .dark #table-agenda td {
            padding: 5px;
            border: 1px solid #333;
            /* Adjust border color for dark mode */
            text-align: left;
            color: #fff;
            border: 1px solid #fff;
            /* Border color for dark mode (white) */
            /* Text color for dark mode */
        }

        .dark #table-agenda th {
            text-align: left;
            background-color: #333;
            /* Header background color for dark mode */
            color: #fff;
            /* Header text color for dark mode */
        }

        .dark #hari-ini-agenda,
        .dark #yad,
        .dark #lama {
            max-height: 300px;
            overflow-x: auto;
            /* Background color for dark mode */
        }

        .dark #hari-inigor,
        .dark #yad-gor,
        .dark #minggu {
            max-height: 300px;
            overflow-x: auto;
            /* Background color for dark mode */
        }

        /* Dark mode for the note-red class */
        .dark .note-red {
            color: red;
            /* Text color for dark mode */
        }

        /* Dark mode for the card */
        .dark .card {
            --tw-bg-opacity: 1;
            background-color: rgb(45 55 72 / var(--tw-bg-opacity));
            color: #fff;
            /* Text color for dark mode */
            border: 1px solid #333;
            /* Border color for dark mode */
        }
    </style>
@endpush

@section('main')
    <div class="w-full max-w-container mx-auto px-3 -mt-20 z-20 space-y-5 my-5 relative">
        <div class="newsticker rounded-none text-sm" style="overflow: hidden; min-height: 1px;">
            <h3 class="newsticker-heading py-1"><i class="fa-solid fa-bullhorn text-lg"></i> <span
                    class="newsticker-title">Sekilas Info</span></h3>
            <ul class="newsticker-list py-1"style="padding: 0px; margin: 0px; position: relative; list-style-type: none;">
                <li class="newsticker-item" style="left: 50%; white-space: nowrap;">
                    <marquee behavior="" direction="">{!! $text->textrunning !!}</marquee><a class="newsticker-link"></a>
                </li>

            </ul>
        </div>
        <div class="bg-slate-300 flex flex-col lg:flex-row rounded shadow overflow-hidden">
            <div class="lg:w-2/3 lg:block p-3">
                <section class="slider -mx-3 lg:mx-auto lg:mt-0">
                    <div class="owl-carousel slider-content owl-loaded owl-drag">
                        <div class="">
                            <div class="berita-logos slider owl-stage" id="berita-container">

                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </section>
            </div>
            <div class="lg:w-1/3 w-full px-5 py-5 space-y-8 bg-tertiary text-white">
                <article class="flex flex-col gap-3">
                    <div class="flex-shrink-0 w-full h-auto rounded-lg  " style="background: transparent">
                        <img loading="lazy" src="{{ Storage::url($sideberita->gambar) }}" alt="{{ $sideberita->judul }}"
                            class="article-image mx-auto">
                    </div>
                    <div class="flex flex-col justify-between space-y-2">
                        <div class="space-y-1">
                            <a href="/berita/{{ date('Y', strtotime($sideberita->tanggal)) }}/{{ date('m', strtotime($sideberita->tanggal)) }}/{{ date('d', strtotime($sideberita->tanggal)) }}/{{ $sideberita->slug }}"
                                class="text-heading lg:text-lg block">{{ $sideberita->judul }}</a>
                            <p class="text-sm">{!! implode(' ', array_slice(str_word_count(strip_tags($sideberita->artikel), 1), 0, 30)) !!}...
                            </p>
                        </div>
                        <a href="/berita/{{ date('Y', strtotime($sideberita->tanggal)) }}/{{ date('m', strtotime($sideberita->tanggal)) }}/{{ date('d', strtotime($sideberita->tanggal)) }}/{{ $sideberita->slug }}"
                            class="button button-secondary w-36 text-sm" data-mdb-ripple="true"
                            data-mdb-ripple-color="light">Selengkapnya <span
                                class="fa-solid me-2 fa-angle-right"></span></a>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <main class="container px-3 max-w-container mx-auto space-y-5 my-5">
        <script>
            const KODE_KOTA = "2611";
            const DATE_NOW = '2023-09-03';
        </script>
        <section class="grid gap-4 lg:gap-5 grid-cols-3 md:grid-cols-3 lg:grid-cols-9 my-5" id="shortcut-link">
            @foreach ($menu as $item)
                <a href="{{ $item->link }}" target="" rel="noopener"
                    class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init aos-animate"
                    data-aos="zoom-in" data-aos-delay="0">
                    <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="{{ $item->menu }}"
                        class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                    <span class="text-center text-xs block break-words">{{ $item->menu }}</span>
                </a>
            @endforeach
        </section>
        <section class="relative overflow-hidden shadow-lg rounded-lg my-5">
            <div class="product-header">
                <h3 class="text-heading product-ribbon">Aparatur</h3>
            </div>
            <div class="owl-carousel flex space-x-4 bg-primary dark:bg-dark-primary p-4 main-carousel owl-loaded owl-drag">
                <div class="">
                    <div class="customer-logos slider owl-stage" style="width: 1500px;" id="pamong-container">

                    </div>
                </div>
                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                            aria-label="Previous">‹</span></button><button type="button" role="presentation"
                        class="owl-next"><span aria-label="Next">›</span></button></div>
                <div class="owl-dots disabled"></div>
            </div>
        </section>
        <section class="flex flex-col lg:flex-row lg:space-x-5 lg:space-y-0 space-y-3 shalat">
            <div
                class="lg:w-1/3 bg-secondary bg-opacity-90 py-5 px-4 text-white flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat justify-center">
                <span class="font-bold font-heading"><i class="fa-regular fa-clock mr-1"></i> Jadwal Sholat di <span
                        class="city-name capitalize">{{ $waktu['data']['lokasi'] }}</span></span>
                <span class="text-sm italic"><i class="fa-regular fa-calendar-days mr-1"></i> <span
                        class="date-now">{{ $waktu['data']['jadwal']['tanggal'] }}</span></span>
            </div>

            <div class="lg:w-2/3 grid grid-cols-3 lg:grid-cols-6 gap-3">
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        imsak </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1" data-name="imsak">04:23</span>
                </div>
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        subuh </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1"
                        data-name="subuh">{{ $waktu['data']['jadwal']['subuh'] }}</span>
                </div>
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        dzuhur </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1"
                        data-name="dzuhur">{{ $waktu['data']['jadwal']['dzuhur'] }}</span>
                </div>
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        ashar </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1"
                        data-name="ashar">{{ $waktu['data']['jadwal']['ashar'] }}</span>
                </div>
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        maghrib </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1"
                        data-name="maghrib">{{ $waktu['data']['jadwal']['maghrib'] }}</span>
                </div>
                <div
                    class="bg-white dark:bg-dark-secondary py-5 px-4 shadow rounded-lg flex flex-col bg-flower bg-right-top bg-5 bg-no-repeat space-y-1">
                    <span class="text-sm tracking-widest capitalize text-primary dark:text-white">
                        <svg class="icon icon-base hidden lg:inline-block " width="52" height="51"
                            viewBox="0 0 52 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.6269 36.0243C38.6269 36.3803 38.9883 36.6216 39.3124 36.4742C44.807 33.9753 49.0796 29.1675 50.9576 23.2525C51.1298 22.7098 51.9643 22.7582 51.9837 23.3272C51.9946 23.6431 52 23.9604 52 24.279C52 38.998 40.3594 50.9301 26 50.9301C11.6406 50.9301 0 38.998 0 24.279C0 13.5268 6.21178 4.26183 15.1575 0.0489075C15.6687 -0.191841 16.0883 0.513621 15.6908 0.915183C11.7661 4.87954 9.33329 10.3905 9.33329 16.4837C9.33329 22.6606 11.8335 28.2391 15.8534 32.2147C16.1604 32.5183 16.6667 32.2945 16.6667 31.8627V15.8283C16.6667 15.2761 17.1144 14.8283 17.6667 14.8283H21.6667C22.219 14.8283 22.6667 15.2761 22.6667 15.8283V36.421C22.6667 36.6231 22.7882 36.8059 22.9761 36.8803C23.3351 37.0226 23.6988 37.1551 24.0669 37.2777C24.3842 37.3834 24.7063 37.1433 24.7063 36.8088V24.5884C24.7063 23.4838 25.6018 22.5884 26.7063 22.5884H36.6269C37.7315 22.5884 38.6269 23.4838 38.6269 24.5884V36.0243ZM33.5787 38.1419C33.8219 38.1079 34 37.8981 34 37.6525V34.4334C34 34.1319 33.864 33.8465 33.6298 33.6566C33.6298 33.6566 33.6298 33.6566 33.6298 33.6566L32.1298 32.4406C32.1298 32.4406 32.1298 32.4406 32.1298 32.4406C31.7627 32.143 31.2374 32.143 30.8703 32.4406C30.8703 32.4406 30.8703 32.4406 30.8703 32.4406L29.3703 33.6566C29.3703 33.6566 29.3703 33.6566 29.3703 33.6566C29.1361 33.8465 29 34.1319 29 34.4334V37.8162C29 38.077 29.2005 38.2947 29.4609 38.3095C29.86 38.3323 30.262 38.3439 30.6666 38.3439C31.6544 38.3439 32.6266 38.2751 33.5787 38.1419Z"
                                fill="#2EAF71"></path>
                            <path
                                d="M20.9767 13.5918C20.9767 13.592 20.9765 13.5918 20.9767 13.5918C21.9524 13.5547 22.6221 13.3322 22.6221 12.243C22.6221 11.4918 22.0243 11.0621 21.3577 10.5829C20.8603 10.2254 20.3243 9.84006 19.9697 9.27322C19.8577 9.0942 19.4311 9.0942 19.3191 9.27322C18.9645 9.84007 18.4285 10.2254 17.9311 10.5829C17.2645 11.0621 16.6667 11.4918 16.6667 12.243C16.6667 13.3224 17.3245 13.5506 18.2859 13.5908C18.2926 13.5911 18.2994 13.5912 18.3062 13.5912H19.5796H19.5808C19.5806 13.5912 19.581 13.5912 19.5808 13.5912L19.6439 13.5912C19.6436 13.5912 19.6443 13.5912 19.6439 13.5912L19.7076 13.5912C19.7074 13.5912 19.7077 13.5912 19.7076 13.5912H19.7092L20.9767 13.5918Z"
                                fill="#d1ac11"></path>
                            <path
                                d="M38.5745 19.4812C38.4714 19.3816 38.4345 19.2331 38.4655 19.0932C38.5261 18.8198 38.5576 18.5112 38.5576 18.1632C38.5576 16.4799 37.1743 15.5171 35.6313 14.4432C34.5164 13.6673 33.3182 12.8333 32.4983 11.6275C32.2037 11.1942 31.1299 11.1942 30.8353 11.6275C30.0154 12.8333 28.8171 13.6673 27.7023 14.4432C26.1593 15.5171 24.776 16.4799 24.776 18.1632C24.776 18.5109 24.8075 18.8192 24.868 19.0925C24.899 19.2327 24.862 19.3814 24.7588 19.4812C24.7588 19.4811 24.7588 19.4812 24.7588 19.4812C24.1118 20.1059 24.5541 21.2005 25.4534 21.2005H37.8798C38.7792 21.2005 39.2214 20.1059 38.5745 19.4812C38.5744 19.4812 38.5745 19.4812 38.5745 19.4812Z"
                                fill="#d1ac11"></path>
                        </svg>
                        isya </span>
                    <span class="text-2xl font-bold shalat-time lg:ml-1"
                        data-name="isya">{{ $waktu['data']['jadwal']['isya'] }}</span>
                </div>
            </div>
        </section>
        <section id="article-list" class="space-y-4 py-5">
            <h2 class="text-heading text-xl lg:text-3xl font-bold mb-5"><i
                    class="fa-regular fa-newspaper inline-block mr-2 h-10 text-primary dark:text-white"></i>Berita
                Desa
            </h2>
            <ul class="flex space-x-2 lg:space-x-0 lg:gap-2 lg:flex-wrap overflow-x-auto pb-2">
                {{-- <li class="flex-shrink-0">
                    <a href="#beritaterbaru"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-secondary text-white border-transparent hover:border-secondary inactive-link">
                        Terbaru
                        <i class="fa-solid fa-check inline-block icon icon-sm"></i>
                    </a>
                </li> --}}
                <li class="flex-shrink-0">
                    <a href="#beritaterbaru"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white inactive-link">
                        Berita Terbaru </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="#semuaberita"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white inactive-link">
                        Semua Berita </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="#beritadesa"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white inactive-link">
                        Berita Desa </a>

                </li>
                <li class="flex-shrink-0">
                    <a href="#beritalokal"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white inactive-link">
                        Berita Lokal </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="#programkerja"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white inactive-link">
                        Program Kerja </a>
                </li>
            </ul>
            <div id="beritaterbaru">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($beritaterbaru as $item)
                        <article class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="logo desa"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-calendar-days mr-2"></i>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-user mr-2"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{!! $item->ringkasan !!}
                                    <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div><br>
                <nav aria-label="nomor halaman">
                    <ul class="pagination mt-1 mb-5">
                        @if ($beritaterbaru->currentPage() > 1)
                            <li>
                                <a href="{{ $beritaterbaru->previousPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-left inline-block"></i>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $beritaterbaru->lastPage(); $i++)
                            <li>
                                <a href="{{ $beritaterbaru->url($i) }}"
                                    class="pagination-link {{ $i == $beritaterbaru->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($beritaterbaru->currentPage() < $beritaterbaru->lastPage())
                            <li>
                                <a href="{{ $beritaterbaru->nextPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-right inline-block"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div id="semuaberita">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($semuaberita as $item)
                        <article class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="logo desa"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-calendar-days mr-2"></i>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-user mr-2"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{!! $item->ringkasan !!}
                                    <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div><br>
                <div class="flex-shrink-0">
                    <a href="/berita/kategori/semua-berita"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-secondary text-white border-transparent hover:border-secondar">
                        See More... </a>
                </div><br>
                <nav aria-label="nomor halaman">
                    <ul class="pagination mt-1 mb-5">
                        @if ($semuaberita->currentPage() > 1)
                            <li>
                                <a href="{{ $semuaberita->previousPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-left inline-block"></i>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $semuaberita->lastPage(); $i++)
                            <li>
                                <a href="{{ $semuaberita->url($i) }}"
                                    class="pagination-link {{ $i == $semuaberita->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($semuaberita->currentPage() < $semuaberita->lastPage())
                            <li>
                                <a href="{{ $semuaberita->nextPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-right inline-block"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div id="beritadesa">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($beritadesa as $item)
                        <article class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="logo desa"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-calendar-days mr-2"></i>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-user mr-2"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{!! $item->ringkasan !!}
                                    <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div><br>
                <div class="flex-shrink-0">
                    <a href="/berita/kategori/berita-desa"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-secondary text-white border-transparent hover:border-secondar">
                        See More... </a>
                </div><br>
                <nav aria-label="nomor halaman">
                    <ul class="pagination mt-1 mb-5">
                        @if ($beritadesa->currentPage() > 1)
                            <li>
                                <a href="{{ $beritadesa->previousPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-left inline-block"></i>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $beritadesa->lastPage(); $i++)
                            <li>
                                <a href="{{ $beritadesa->url($i) }}"
                                    class="pagination-link {{ $i == $beritadesa->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($beritadesa->currentPage() < $beritadesa->lastPage())
                            <li>
                                <a href="{{ $beritadesa->nextPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-right inline-block"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div id="beritalokal">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($beritalokal as $item)
                        <article class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="logo desa"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-calendar-days mr-2"></i>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-user mr-2"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{!! $item->ringkasan !!}
                                    <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div><br>
                <div class="flex-shrink-0">
                    <a href="/berita/kategori/berita-lokal"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-secondary text-white border-transparent hover:border-secondar">
                        See More... </a>
                </div><br>
                <nav aria-label="nomor halaman">
                    <ul class="pagination mt-1 mb-5">
                        @if ($beritalokal->currentPage() > 1)
                            <li>
                                <a href="{{ $beritalokal->previousPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-left inline-block"></i>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $beritalokal->lastPage(); $i++)
                            <li>
                                <a href="{{ $beritalokal->url($i) }}"
                                    class="pagination-link {{ $i == $beritalokal->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($beritalokal->currentPage() < $beritalokal->lastPage())
                            <li>
                                <a href="{{ $beritalokal->nextPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-right inline-block"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div id="programkerja">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($programkerja as $item)
                        <article class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img loading="lazy" src="{{ Storage::url($item->gambar) }}" alt="logo desa"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-calendar-days mr-2"></i>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <i class="fa-regular fa-user mr-2"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{!! $item->ringkasan !!}
                                    <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div><br>
                <div class="flex-shrink-0">
                    <a href="/berita/kategori/program-kerja"
                        class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md bg-secondary text-white border-transparent hover:border-secondar">
                        See More... </a>
                </div><br>
                <nav aria-label="nomor halaman">
                    <ul class="pagination mt-1 mb-5">
                        @if ($programkerja->currentPage() > 1)
                            <li>
                                <a href="{{ $programkerja->previousPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-left inline-block"></i>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $programkerja->lastPage(); $i++)
                            <li>
                                <a href="{{ $programkerja->url($i) }}"
                                    class="pagination-link {{ $i == $programkerja->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($programkerja->currentPage() < $programkerja->lastPage())
                            <li>
                                <a href="{{ $programkerja->nextPageUrl() }}" class="pagination-link">
                                    <i class="fa-solid fa-angle-right inline-block"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </section>
        {{-- Statistik Desa --}}
        <section class="bg-white dark:bg-dark-secondary dark:border-gray-500 flex gap-5 border shadow rounded-lg py-5">
            <aside class="grid grid-cols-1 lg:grid-cols-3 card gap-5 rounded-xl p-5 shadow">
                <div class="sidebar-item">
                    <style type="text/css">
                        .highcharts-xaxis-labels tspan {
                            font-size: 8px;
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><a href="https://pleret.id/first/statistik/4"><i
                                        class="fa fa-map-marker"></i> Statistik Kalurahan Sentolo</a></h3>
                        </div>
                        <div class="box-body">
                            <div class="box-body">
                                <div id="map_wilayah"
                                    style="width: 100%; height: 300px; margin: 0px auto; overflow: hidden;"></div>
                                <a href="https://www.openstreetmap.org/#map=15/-7.837151186733103/110.21840572357179"
                                    class="text-link">Buka peta</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                <div class="sidebar-item">
                    <!-- widget Sinergi Program-->
                    <!-- TODO: Pindahkan ke external css -->
                    <style>
                        #sinergi_program {
                            text-align: center;
                        }

                        #sinergi_program table {
                            margin: auto;
                        }

                        #sinergi_program img {
                            max-width: 100%;
                            max-height: 100%;
                            transition: all 0.5s;
                            -o-transition: all 0.5s;
                            -moz-transition: all 0.5s;
                            -webkit-transition: all 0.5s;
                        }

                        #sinergi_program img:hover {
                            transition: all 0.3s;
                            -o-transition: all 0.3s;
                            -moz-transition: all 0.3s;
                            -webkit-transition: all 0.3s;
                            transform: scale(1.5);
                            -moz-transform: scale(1.5);
                            -o-transform: scale(1.5);
                            -webkit-transform: scale(1.5);
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-external-link"></i>Agenda</h3>
                        </div>
                        <div id="agenda" class="box-body">
                            <ul class="nav nav-tabs" id="nav-agenda">
                                <li class="active"><a data-toggle="tab" href="#hari-ini-agenda">Hari ini</a></li>
                                <li class=""><a data-toggle="tab" href="#yad">Yang akan datang</a></li>
                                <li class=""><a data-toggle="tab" href="#lama">Lama</a></li>
                            </ul>
                            <div class="tab-content" id="tab-agenda">
                                <div id="hari-ini-agenda" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendahariini->count())
                                            @foreach ($agendahariini as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            {{-- <th width="40%">Kegiatan</th> --}}
                                                            <th colspan="3"><a href="">{{ $value->judul }}</a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Waktu</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                                <br>{{ $value->waktu }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lokasi</th>
                                                            <td>{{ $value->lokasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Koordinator</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Hari ini Tidak ada Agenda.
                                            </p>
                                        @endif
                                    </ul>
                                </div>
                                <div id="yad" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendaakandatang->count())
                                            @foreach ($agendaakandatang as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            {{-- <th width="40%">Kegiatan</th> --}}
                                                            <th colspan="3"><a href="">{{ $value->judul }}</a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Waktu</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                                <br>{{ $value->waktu }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lokasi</th>
                                                            <td>{{ $value->lokasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Koordinator</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Yang Akan Datang Tidak ada
                                                Agenda.</p>
                                        @endif
                                    </ul>
                                </div>
                                <div id="lama" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendalalu->count())
                                            @foreach ($agendalalu as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            {{-- <th width="40%">Kegiatan</th> --}}
                                                            <th colspan="3"><a href="">{{ $value->judul }}</a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Waktu</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                                <br>{{ $value->waktu }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lokasi</th>
                                                            <td>{{ $value->lokasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Koordinator</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Tidak ada agenda sebelumnya
                                            </p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        button.btn {
                            margin-left: 0px;
                        }

                        #collapse2 {
                            margin-top: 5px;
                        }

                        button[aria-expanded=true] .fa-chevron-down {
                            display: none;
                        }

                        button[aria-expanded=false] .fa-chevron-up {
                            display: none;
                        }

                        .tabel-info {
                            width: 100%;
                        }

                        .tabel-info,
                        tr {
                            border-bottom: 1px;
                            border: 0px solid;
                        }

                        .tabel-info,
                        td {
                            border: 0px solid;
                            height: 30px;
                            padding: 5px;
                        }
                    </style>
                    <!-- widget Peta Lokasi Kantor Desa -->
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="fa-solid fa-clock"></i> Jadwal Layanan
                            </h3>
                        </div>
                        <div class="box-body">
                            @foreach ($jadwal as $item)
                                <table id="table-agenda" width="100%">
                                    <tbody>
                                        <tr>
                                            <th width="40%">{{ $item->hari }}</th>
                                            <td width="100%" @if ($item->waktu === 'Libur') class="note-red" @endif>
                                                {{ $item->waktu }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="note-red">{{ $item->note }}</p>
                            @endforeach
                            <br>
                            <p class="note-red">* Tanggal Merah dan Hari Besar Lbur</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        button.btn {
                            margin-left: 0px;
                        }

                        #collapse2 {
                            margin-top: 5px;
                        }

                        button[aria-expanded=true] .fa-chevron-down {
                            display: none;
                        }

                        button[aria-expanded=false] .fa-chevron-up {
                            display: none;
                        }

                        .tabel-info {
                            width: 100%;
                        }

                        .tabel-info,
                        tr {
                            border-bottom: 1px;
                            border: 0px solid;
                        }

                        .tabel-info,
                        td {
                            border: 0px solid;
                            height: 30px;
                            padding: 5px;
                        }
                    </style>
                    <!-- widget Peta Lokasi Kantor Desa -->
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="fa-solid fa-people-line" style="color: #ffffff;"></i> Jumlah Pengunjung
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="container" align="center">
                                <table cellpadding="0" cellspacing="0" class="counter">
                                    <tr>
                                        <td> Hari ini</td>
                                        <td id="todayCounter"></td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" height="20">Kemarin</td>
                                        <td valign="middle" id="yesterdayCounter"></td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" height="20">Jumlah pengunjung</td>
                                        <td valign="middle" id="totalCounter"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
                    var posisi = [-7.869267369142893, 110.40032299159996];
                    var zoom = 14;

                    var lokasi_kantor = L.map('map_canvas').setView(posisi, zoom);

                    //Menampilkan BaseLayers Peta
                    var baseLayers = getBaseLayers(lokasi_kantor,
                        'pk.eyJ1IjoicHBpZHBsZXJldCIsImEiOiJjbDAzbGU0Z3oxM2ptM2NxZ3dvZHM5bzNtIn0.9IekgDvhS-fGVRbjE7oeeg');

                    L.control.layers(baseLayers, null, {
                        position: 'topright',
                        collapsed: true
                    }).addTo(lokasi_kantor);

                    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
                    var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
                </script>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        .highcharts-xaxis-labels tspan {
                            font-size: 8px;
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><a href=""><i class="ti ti-chart-histogram mr-1"></i> Statistik
                                    Kalurahan Sentolo</a></h3>
                        </div>
                        <div class="box-body">
                            <div id="statistik_kalurahan" style="width: 100%; height: 300px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <!-- widget Sinergi Program-->
                    <!-- TODO: Pindahkan ke external css -->
                    <style>
                        #sinergi_program {
                            text-align: center;
                        }

                        #sinergi_program table {
                            margin: auto;
                        }

                        #sinergi_program img {
                            max-width: 100%;
                            max-height: 100%;
                            transition: all 0.5s;
                            -o-transition: all 0.5s;
                            -moz-transition: all 0.5s;
                            -webkit-transition: all 0.5s;
                        }

                        #sinergi_program img:hover {
                            transition: all 0.3s;
                            -o-transition: all 0.3s;
                            -moz-transition: all 0.3s;
                            -webkit-transition: all 0.3s;
                            transform: scale(1.5);
                            -moz-transform: scale(1.5);
                            -o-transform: scale(1.5);
                            -webkit-transform: scale(1.5);
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-external-link"></i> Sinergi Program</h3>
                        </div>
                        <div id="sinergi_program" class="box-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            @foreach ($sinergi as $item)
                                                <span style="display: inline-block; width: 30.333333333333%">
                                                    <a href="{{ $item->link }}" target="_blank"><img
                                                            src="{{ Storage::url($item->gambar) }}"
                                                            alt="{{ $item->nama }}"></a>
                                                </span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                            <td>
                                                <span style="display: inline-block; width: 30.333333333333%">
                                                    <a href="https://bantulkab.go.id/" target="_blank"><img
                                                            src="/home/img/yogyakarta.svg" alt="DIY"></a>
                                                </span>
                                                <span style="display: inline-block; width: 30.333333333333%">
                                                    <a href="https://kec-pleret.bantulkab.go.id/" target="_blank"><img
                                                            src="/home/img/kulonprogo.png" alt="Kapanewon Sentolo"></a>
                                                </span>

                                            </td>
                                        </tr> --}}
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        button.btn {
                            margin-left: 0px;
                        }

                        #collapse2 {
                            margin-top: 5px;
                        }

                        button[aria-expanded=true] .fa-chevron-down {
                            display: none;
                        }

                        button[aria-expanded=false] .fa-chevron-up {
                            display: none;
                        }

                        .tabel-info {
                            width: 100%;
                        }

                        .tabel-info,
                        tr {
                            border-bottom: 1px;
                            border: 0px solid;
                        }

                        .tabel-info,
                        td {
                            border: 0px solid;
                            height: 30px;
                            padding: 5px;
                        }
                    </style>
                    <!-- widget Peta Lokasi Kantor Desa -->
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="fa fa-map-marker"></i>Lokasi Kantor Kalurahan
                            </h3>
                        </div>
                        <div class="box-body">
                            <div style="height:200px;"><iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31620.672824268557!2d110.1989283066177!3d-7.833764499978429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7afa312dfde719%3A0x5b3c901e524d10eb!2sPemerintah%20Kalurahan%20Sentolo!5e0!3m2!1sid!2sid!4v1695217882732!5m2!1sid!2sid"
                                    width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                            <button class="btn btn-success btn-block"><a href="https://maps.app.goo.gl/Gbwj6uU2V6Y7LNxX6"
                                    style="color:#fff;" target="_blank">Buka Peta</a></button>
                            <button class="btn btn-success btn-block" data-toggle="collapse" data-target="#collapse2"
                                aria-expanded="false">
                                Detail
                                <i class="fa fa-chevron-up pull-right"></i>
                                <i class="fa fa-chevron-down pull-right"></i>
                            </button>
                            <div id="collapse2" class="panel-collapse collapse">
                                <br>
                                <img class="img-responsive" src="" alt="Kantor Desa">
                                <hr>
                                <div class="info-desa">
                                    <table class="table-info">
                                        <tbody>
                                            <tr>
                                                <td width="25%">Alamat</td>
                                                <td>:</td>
                                                <td width="70%">Kerto, Pleret, Pleret, Bantul</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kalurahan </td>
                                                <td>:</td>
                                                <td width="70%">Pleret</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kapanewon</td>
                                                <td>:</td>
                                                <td width="70%">Pleret</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kabupaten</td>
                                                <td>:</td>
                                                <td width="70%">Bantul</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kodepos</td>
                                                <td>:</td>
                                                <td width="70%">55791</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Telepon</td>
                                                <td>:</td>
                                                <td width="70%">02744415147</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Email</td>
                                                <td>:</td>
                                                <td width="70%">desa.pleret@bantulkab.go.id</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
                        var posisi = [-7.869267369142893, 110.40032299159996];
                        var zoom = 14;

                        var lokasi_kantor = L.map('map_canvas').setView(posisi, zoom);

                        //Menampilkan BaseLayers Peta
                        var baseLayers = getBaseLayers(lokasi_kantor,
                            'pk.eyJ1IjoicHBpZHBsZXJldCIsImEiOiJjbDAzbGU0Z3oxM2ptM2NxZ3dvZHM5bzNtIn0.9IekgDvhS-fGVRbjE7oeeg');

                        L.control.layers(baseLayers, null, {
                            position: 'topright',
                            collapsed: true
                        }).addTo(lokasi_kantor);

                        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
                        var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
                    </script>
                </div>
                <div class="sidebar-item">
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa-regular fa-images mr-2"></i> Galeri Sentolo </h3>
                        </div>
                        <div id="sinergi_program" class="box-body">
                            <table>

                                <tbody>
                                    <tr>
                                        <td>
                                            @foreach ($galeri as $item)
                                                <span style="display: inline-block; width: 30.333333333333%">
                                                    <a
                                                        href="/galeri/{{ date('Y', strtotime($item->created_at)) }}/{{ date('m', strtotime($item->created_at)) }}/{{ date('d', strtotime($item->created_at)) }}/{{ $item->nama }}"><img
                                                            src="{{ Storage::url($item->gambar) }}"
                                                            alt="{{ $item->nama }}"></a>
                                                </span>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    button.btn {
                        margin-left: 0px;
                    }

                    #collapse2 {
                        margin-top: 5px;
                    }

                    button[aria-expanded=true] .fa-chevron-down {
                        display: none;
                    }

                    button[aria-expanded=false] .fa-chevron-up {
                        display: none;
                    }

                    .tabel-info {
                        width: 100%;
                    }

                    .tabel-info,
                    tr {
                        border-bottom: 1px;
                        border: 0px solid;
                    }

                    .tabel-info,
                    td {
                        border: 0px solid;
                        height: 30px;
                        padding: 5px;
                    }
                </style>
                </div>
                {{-- Agenda GOR --}}
                <div class="sidebar-item">
                    <!-- widget Sinergi Program-->
                    <!-- TODO: Pindahkan ke external css -->
                    <style>
                        #sinergi_program {
                            text-align: center;
                        }

                        #sinergi_program table {
                            margin: auto;
                        }

                        #sinergi_program img {
                            max-width: 100%;
                            max-height: 100%;
                            transition: all 0.5s;
                            -o-transition: all 0.5s;
                            -moz-transition: all 0.5s;
                            -webkit-transition: all 0.5s;
                        }

                        #sinergi_program img:hover {
                            transition: all 0.3s;
                            -o-transition: all 0.3s;
                            -moz-transition: all 0.3s;
                            -webkit-transition: all 0.3s;
                            transform: scale(1.5);
                            -moz-transform: scale(1.5);
                            -o-transform: scale(1.5);
                            -webkit-transform: scale(1.5);
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-external-link"></i>Agenda Kegiatan GOR</h3>
                        </div>
                        <div id="agenda" class="box-body">
                            <ul class="nav nav-tabs" id="nav-gor">
                                <li class="active"><a data-toggle="tab" href="#hari-inigor">Hari ini</a></li>
                                <li class=""><a data-toggle="tab" href="#yad-gor">Besok</a></li>
                                <li class=""><a data-toggle="tab" href="#minggu">Minggu ini</a></li>
                            </ul>
                            <div class="tab-content" id="tab-gor">
                                <div id="hari-inigor" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendagorhariini->count())
                                            @foreach ($agendagorhariini as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Hari ini tidak ada booking
                                                GOR.
                                            </p>
                                            <br><br><br>
                                        @endif
                                    </ul>
                                </div>
                              
                                <div id="yad-gor" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendagorakandatang->count())
                                            @foreach ($agendagorakandatang as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Besok belum ada booking GOR
                                            </p>
                                            <br><br><br>
                                        @endif
                                    </ul>
                                </div>
                                <div id="minggu" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendagormingguini->count())
                                            @foreach ($agendagormingguini as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Tidak ada booking GOR Minggu
                                                ini.
                                            </p>
                                            <br><br><br>
                                        @endif
                                    </ul>
                                </div>
                                <button class="btn btn-success btn-block" type="button"><a href="/booking_gor"
                                    style="color:#fff;" target="_blank">Booking GOR</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Agenda BAlAI --}}
                <div class="sidebar-item">
                    <!-- widget Sinergi Program-->
                    <!-- TODO: Pindahkan ke external css -->
                    <style>
                        #sinergi_program {
                            text-align: center;
                        }

                        #sinergi_program table {
                            margin: auto;
                        }

                        #sinergi_program img {
                            max-width: 100%;
                            max-height: 100%;
                            transition: all 0.5s;
                            -o-transition: all 0.5s;
                            -moz-transition: all 0.5s;
                            -webkit-transition: all 0.5s;
                        }

                        #sinergi_program img:hover {
                            transition: all 0.3s;
                            -o-transition: all 0.3s;
                            -moz-transition: all 0.3s;
                            -webkit-transition: all 0.3s;
                            transform: scale(1.5);
                            -moz-transform: scale(1.5);
                            -o-transform: scale(1.5);
                            -webkit-transform: scale(1.5);
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-external-link"></i>Agenda Kegiatan Balai</h3>
                        </div>
                        <div id="agenda" class="box-body">
                            <ul class="nav nav-tabs" id="nav-balai">
                                <li class="active"><a data-toggle="tab" href="#hari-inibalai">Hari ini</a></li>
                                <li class=""><a data-toggle="tab" href="#yad-balai">Besok</a></li>
                                <li class=""><a data-toggle="tab" href="#minggubalai">Minggu ini</a></li>
                            </ul>
                            <div class="tab-content" id="tab-balai">
                                <div id="hari-inibalai" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendabalaihariini->count())
                                            @foreach ($agendabalaihariini as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Hari ini tidak ada Kegiatan
                                                Balai.
                                            </p>
                                        @endif
                                    </ul>
                                </div>
                                <div id="yad-balai" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendabalaiakandatang->count())
                                            @foreach ($agendabalaiakandatang as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Besok Belum Ada Kegiatan Balai
                                            </p>
                                        @endif
                                    </ul>
                                </div>
                                <div id="minggubalai" class="">
                                    <ul class="sidebar-latest">
                                        @if ($agendabalaimingguini->count())
                                            @foreach ($agendabalaimingguini as $value)
                                                <table id="table-agenda" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Kegiatan</th>
                                                            <td width="100%">{{ $value->kegiatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="40%">Tanggal</th>
                                                            <td width="100%">
                                                                {{ date('j F Y', strtotime($value->tanggal)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <td>{{ $value->waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Selesai</th>
                                                            <td>{{ $value->selesai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penanggung Jawab</th>
                                                            <td>{{ $value->koordinator }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                        @else
                                            <p class="text-heading lg:text-lg text-center mt-5"
                                                style="font-weight: bold; padding-top: 50px;">Tidak ada Kegiatan Balai Minggu
                                                ini.
                                            </p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <section class="flex flex-row-reverse py-5" id="self-service">
            <div class="lg:w-7/12 hidden lg:block">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 793 551.73152" data-aos="fade-right"
                    class="w-10/12 mx-auto aos-init aos-animate">
                    <ellipse cx="158" cy="539.73152" rx="158" ry="12" fill="#e6e6e6">
                    </ellipse>
                    <path
                        d="M324.27227,296.55377c27.49676-11.6953,61.74442-4.28528,95.19092.85757.31124-6.228,4.08385-13.80782.132-18.15284-4.80115-5.2788-4.35917-10.82529-1.47008-16.40375,7.38788-14.265-3.1969-29.44375-13.88428-42.0647a23.66937,23.66937,0,0,0-19.75537-8.29179l-19.7975,1.41411A23.70939,23.70939,0,0,0,343.635,230.85851v0c-4.72724,6.42917-7.25736,12.84055-5.66438,19.21854-7.08065,4.83882-8.27029,10.67977-5.08851,17.2644,2.698,4.14592,2.66928,8.18161-.12275,12.1056a55.89079,55.89079,0,0,0-8.31011,16.5061Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M977.70889,651.09727H417.29111A18.79111,18.79111,0,0,1,398.5,632.30616h0q304.727-35.41512,598,0h0A18.79111,18.79111,0,0,1,977.70889,651.09727Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M996.5,633.41151l-598-1.10536,69.30611-116.61553.3316-.55268V258.13057a23.7522,23.7522,0,0,1,23.75418-23.75418H899.792a23.7522,23.7522,0,0,1,23.75418,23.75418V516.90649Z"
                        transform="translate(-203.5 -174.13424)" fill="#3f3d56"></path>
                    <path
                        d="M491.35028,250.95679a7.74623,7.74623,0,0,0-7.73753,7.73753V493.03073a7.74657,7.74657,0,0,0,7.73753,7.73752H903.64972a7.74691,7.74691,0,0,0,7.73753-7.73752V258.69432a7.74657,7.74657,0,0,0-7.73753-7.73753Z"
                        transform="translate(-203.5 -174.13424)" fill="currentColor"
                        class="text-slate-100 dark:text-dark-secondary"></path>
                    <path
                        d="M493.07794,531.71835a3.32522,3.32522,0,0,0-3.01275,1.93006l-21.35537,46.42514a3.31594,3.31594,0,0,0,3.01221,4.7021H920.81411a3.3157,3.3157,0,0,0,2.96526-4.79925L900.5668,533.55126a3.29926,3.29926,0,0,0-2.96526-1.83291Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <circle cx="492.34196" cy="67.97967" r="4.97412" fill="#fff"></circle>
                    <path
                        d="M651.69986,593.61853a3.32114,3.32114,0,0,0-3.20165,2.4536l-5.35679,19.89649a3.31576,3.31576,0,0,0,3.20166,4.17856h101.874a3.31531,3.31531,0,0,0,3.13257-4.40093l-6.88691-19.89649a3.31784,3.31784,0,0,0-3.13366-2.23123Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <polygon
                        points="720.046 337.135 720.046 341.556 264.306 341.556 264.649 341.004 264.649 337.135 720.046 337.135"
                        fill="#2f2e41"></polygon>
                    <circle cx="707.33457" cy="77.37523" r="77.37523" fill="currentColor" class="text-secondary">
                    </circle>
                    <path
                        d="M942.89,285.223H878.77911a4.42582,4.42582,0,0,1-4.42144-4.42145V242.11391a4.42616,4.42616,0,0,1,4.42144-4.42144H942.89a4.42616,4.42616,0,0,1,4.42144,4.42144v38.68761A4.42582,4.42582,0,0,1,942.89,285.223Zm-64.11091-43.10906v38.68761h64.11415L942.89,242.11391Z"
                        transform="translate(-203.5 -174.13424)" fill="#fff"></path>
                    <path
                        d="M930.73105,242.11391h-39.793V224.42814c0-12.80987,8.36792-22.10721,19.89649-22.10721s19.89648,9.29734,19.89648,22.10721Zm-35.37153-4.42144h30.95009V224.42814c0-10.413-6.36338-17.68576-15.475-17.68576s-15.47505,7.27281-15.47505,17.68576Z"
                        transform="translate(-203.5 -174.13424)" fill="#fff"></path>
                    <circle cx="707.33457" cy="86.21811" r="4.42144" fill="#fff"></circle>
                    <path
                        d="M856.81994,421.28372H538.18006a5.90767,5.90767,0,0,1-5.90073-5.90073V336.342a5.90767,5.90767,0,0,1,5.90073-5.90072H856.81994a5.90767,5.90767,0,0,1,5.90073,5.90072V415.383A5.90767,5.90767,0,0,1,856.81994,421.28372Zm-318.63988-88.4821a3.5443,3.5443,0,0,0-3.54043,3.54043V415.383a3.54431,3.54431,0,0,0,3.54043,3.54044H856.81994a3.54431,3.54431,0,0,0,3.54043-3.54044V336.342a3.5443,3.5443,0,0,0-3.54043-3.54043Z"
                        transform="translate(-203.5 -174.13424)" fill="#e6e6e6"></path>
                    <circle cx="384.19021" cy="198.69546" r="24.03645" fill="#e6e6e6"></circle>
                    <path d="M643.203,356.80541a4.00608,4.00608,0,1,0,0,8.01215H832.06074a4.00607,4.00607,0,0,0,0-8.01215Z"
                        transform="translate(-203.5 -174.13424)" fill="#e6e6e6"></path>
                    <path d="M643.203,380.84186a4.00607,4.00607,0,1,0,0,8.01214H724.469a4.00607,4.00607,0,1,0,0-8.01214Z"
                        transform="translate(-203.5 -174.13424)" fill="#e6e6e6"></path>
                    <path
                        d="M467.022,382.46241,408.1189,413.778l-.74561-26.09629c19.22553-3.20948,37.51669-8.7974,54.42941-17.8946l6.1605-15.22008a10.31753,10.31753,0,0,1,17.53643-2.67788l0,0a10.31753,10.31753,0,0,1-.90847,14.06885Z"
                        transform="translate(-203.5 -174.13424)" fill="#ffb8b8"></path>
                    <path
                        d="M323.09819,563.26707v0a11.57378,11.57378,0,0,1,1.46928-9.36311l12.93931-19.85777a22.61221,22.61221,0,0,1,29.335-7.73927h0c-5.438,9.25647-4.67994,17.37679,1.87806,24.43365a117.63085,117.63085,0,0,0-27.93606,19.04492A11.57386,11.57386,0,0,1,323.09819,563.26707Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M469.70475,537.30274l0,0a22.20314,22.20314,0,0,1-18.87085,10.77909l-85.96027.65122-3.728-21.62264,38.026-11.18413-32.06116-24.60507L402.154,450.31277l63.65,59.32431A22.20317,22.20317,0,0,1,469.70475,537.30274Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M351.45266,685.17939H331.32124c-18.07509-123.89772-36.47383-248.14186,17.8946-294.51529l64.12231,10.43852L405.13646,455.532l-35.7892,41.00845Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M369.14917,713.24594h0a11.57381,11.57381,0,0,1-9.3632-1.46873l-21.85854-2.93814a22.61221,22.61221,0,0,1-7.741-29.33451v0c9.2568,5.43749,17.37707,4.67891,24.43354-1.8795,4.98593,10.06738,13.20093,9.45331,21.04657,17.93494A11.57385,11.57385,0,0,1,369.14917,713.24594Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                    <path
                        d="M399.1716,307.90158l-37.28042-8.94731c6.19168-12.6739,6.70155-26.77618,3.728-41.75406l25.35068-.74561C391.76421,275.08,394.16732,292.48081,399.1716,307.90158Z"
                        transform="translate(-203.5 -174.13424)" fill="#ffb8b8"></path>
                    <path
                        d="M409.41752,423.55243c-27.13873,18.49308-46.31418.63272-60.94729-26.92346,2.03338-16.86188-1.259-37.04061-7.35672-58.96635a40.13762,40.13762,0,0,1,24.50567-48.40124h0l32.06116,13.421c27.22362,22.19038,32.582,46.227,22.36825,71.5784Z"
                        transform="translate(-203.5 -174.13424)" fill="currentColor" class="text-secondary">
                    </path>
                    <path
                        d="M331.32124,326.54178,301.4969,342.19956l52.9382,31.31555,7.366,18.16951a9.63673,9.63673,0,0,1-5.78925,12.73088h0a9.63673,9.63673,0,0,1-12.76159-8.54442l-.74489-12.66307-67.2838-22.20366a15.73306,15.73306,0,0,1-9.87265-9.61147v0a15.733,15.733,0,0,1,5.90262-18.30258l54.10485-37.11845Z"
                        transform="translate(-203.5 -174.13424)" fill="#ffb8b8"></path>
                    <path
                        d="M361.14557,329.52422c-12.43861-5.4511-23.74934.47044-38.026,5.21926l-2.23683-39.51725c14.17612-7.55568,27.69209-9.59281,40.26285-3.728Z"
                        transform="translate(-203.5 -174.13424)" fill="currentColor" class="text-secondary">
                    </path>
                    <circle cx="172.52496" cy="78.09251" r="23.80211" fill="#ffb8b8"></circle>
                    <path d="M404.5,249.22353c-23.56616,2.30811-41.52338-1.54606-53-12.52007v-8.8377h51Z"
                        transform="translate(-203.5 -174.13424)" fill="#2f2e41"></path>
                </svg>
            </div>
            <div class="w-full lg:w-5/12">
                <form action="" method="post"
                    class="shadow rounded-lg bg-primary dark:bg-dark-secondary overflow-hidden relative">
                    <h3
                        class="py-4 text-center bg-secondary text-white font-bold font-heading text-lg absolute top-0 left-0 w-full">
                        Layanan Mandiri</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1040 320" class="mt-4">
                        <path class="fill-current text-secondary"
                            d="M0,192L60,176C120,160,240,128,360,133.3C480,139,600,181,720,186.7C840,192,960,160,1080,154.7C1200,149,1320,171,1380,181.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                        </path>
                    </svg>
                    <div class="p-5 -mt-10 space-y-4 pb-8">
                        <div
                            class="bg-slate-200 dark:bg-dark-primary py-2 px-4 border-l-4 border-secondary text-secondary">
                            <p class="text-xs"><i class="ti ti-info-circle mr-1"></i> Hubungi operator desa untuk
                                memperoleh PIN</p>
                        </div>
                        <div class="space-y-2 flex flex-col">
                            <label for="nik" class="text-white text-sm font-bold">NIK / No. KTP</label>
                            <input type="text" class="form-input" id="nik" name="nik">
                        </div>
                        <div class="space-y-2 flex flex-col">
                            <label for="pin" class="text-white text-sm font-bold">Kode PIN</label>
                            <input type="password" class="form-input" id="pin" name="pin">
                        </div>
                        <button type="submit" class="button button-tertiary w-full mt-10 hover:ring-offset-primary"
                            data-mdb-ripple="true" data-md-ripple-color="light">Masuk</button>
                    </div>
                    <input type="hidden" name="sidcsrf" value="c16b318d6983a15714a6aa9b7a93ad95">
                </form>
            </div>
        </section>
    </main>
@endsection

@push('footer')
    <script>
        $(document).ready(function() {
            function updateCounter(selector, visitorCount) {
                var countString = visitorCount.toString();
                var imageHtml = '';

                for (var i = 0; i < countString.length; i++) {
                    var digit = countString.charAt(i);
                    var imageUrl = './home/img/count/' + digit + '.gif'; // Ganti dengan format nama gambar Anda
                    imageHtml += '<img src="' + imageUrl + '" align="absmiddle" />';
                }

                $(selector).html(imageHtml);
            }

            // Contoh data pengunjung dari database (ganti ini dengan data yang sesungguhnya)
            var todayVisitorCount = {{ $todayCount }};
            var yesterdayVisitorCount = {{ $yesterdayCount }};
            var totalVisitorCount = {{ $totalVisitors }};

            // Perbarui gambar-gambar angka sesuai dengan data pengunjung
            updateCounter('#todayCounter', todayVisitorCount);
            updateCounter('#yesterdayCounter', yesterdayVisitorCount);
            updateCounter('#totalCounter', totalVisitorCount);
        });
    </script>
    <script>
        $(document).ready(function() {
            // Kode JavaScript untuk mengambil data dan menambahkan elemen HTML
            function getDataAndRenderElements2() {
                $.ajax({
                    url: '/get-highlight', // Ganti dengan URL yang sesuai
                    method: 'GET',
                    success: function(data) {
                        data.forEach(function(item) {
                            var $owlItem = $(
                                '<div class="owl-item berita-logos" style="width: 810px;"></div>'
                            );
                            var $figure = $('<figure class="slider-item"></figure>');
                            var $img = $('<img class="slider-image">');
                            var $figcaption = $(
                                '<figcaption class="absolute block bottom-0 p-3 lg:p-5 bg-gradient-to-b from-black/40 to-black/70 w-full h-auto text-white z-[999] left-0 right-0 font-heading text-lg lg:text-xl font-bold tracking-wide"></figcaption>'
                            );

                            $img.attr('src', item.gambar);
                            $img.attr('alt', 'Highlight');

                            // Buat tautan dengan URL yang sesuai
                            var beritaURL = '/berita/' + item.tanggal.substring(0, 4) + '/' +
                                item.tanggal.substring(5, 7) + '/' + item.tanggal.substring(8,
                                    10) + '/' + item.slug;
                            var $captionLink = $('<a href="' + beritaURL + '"></a>');
                            $captionLink.text(item.judul);

                            // Masukkan tautan ke dalam elemen caption
                            $figcaption.append($captionLink);

                            $figure.append($img);
                            $figure.append($figcaption);
                            $owlItem.append($figure);
                            $('#berita-container').append($owlItem);
                        });

                        // Setelah semua elemen ditambahkan, inisialisasi Slick Slider
                        initSlickSlider2();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            }

            // Inisialisasi slider Slick setelah semua sumber daya dimuat
            function initSlickSlider2() {
                if ($('.berita-logos').length) {
                    $('.berita-logos').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 5000,
                        arrows: false,
                        dots: false,
                        pauseOnHover: false,
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    });
                }
            }

            // Panggil fungsi getDataAndRenderElements() saat dokumen siap
            getDataAndRenderElements2();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Kode JavaScript untuk mengambil data dan menambahkan elemen HTML
            function getDataAndRenderElements() {
                $.ajax({
                    url: '/get-pamong', // Ganti dengan URL yang sesuai
                    method: 'GET',
                    success: function(data) {
                        data.forEach(function(item) {
                            var $owlItem = $(
                                '<div class="owl-item" style="width: 231px; margin-right: 16px;"></div>'
                            );
                            var $card = $(
                                '<div class="cardaparatur p-4 flex flex-col justify-between space-y-4 product-item"></div>'
                            );
                            var $imageContainer = $('<div class="space-y-3"></div>');
                            var $img = $(
                                '<img class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg">'
                            );
                            var $textContainer = $(
                                '<div class="space-y-1 text-sm text-center"></div>'
                            );

                            $img.attr('src', item
                                .gambar); // Ganti dengan variabel PHP yang sesuai
                            $img.attr('alt', item
                                .nama); // Ganti dengan variabel PHP yang sesuai

                            $textContainer.append(
                                $('<span class="text-heading">' + item.nama + '</span>')
                            ); // Mengambil nilai dari properti 'nama' dalam objek 'item'
                            $textContainer.append(
                                $('<span class="block">' + item.jabatan + '</span>')
                            ); // Mengambil nilai dari properti 'jabatan' dalam objek 'item'

                            $imageContainer.append($img);
                            $card.append($imageContainer);
                            $card.append($textContainer);
                            $owlItem.append($card);
                            $('#pamong-container').append($owlItem);
                        });

                        // Setelah semua elemen ditambahkan, inisialisasi Slick Slider
                        initSlickSlider();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Fungsi untuk menginisialisasi Slick Slider
            function initSlickSlider() {
                if ($('.customer-logos').length) {
                    $('.customer-logos').slick({
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: false,
                        dots: false,
                        pauseOnHover: false,
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    });
                }
            }

            // Panggil fungsi getDataAndRenderElements() saat dokumen siap
            getDataAndRenderElements();
        });
    </script>
    {{-- Agenda Kalurahan --}}
    <script>
        // Fungsi untuk mengatur kelas active pada tab yang diklik
        function setActiveTabAgenda(tabId) {
            // Dapatkan semua elemen tab
            var tabLinks = document.querySelectorAll('#nav-agenda li');

            // Loop melalui semua elemen tab
            tabLinks.forEach(function(tab) {
                // Hapus kelas active dari semua elemen tab
                tab.classList.remove('active');

                // Jika tab saat ini memiliki href yang sesuai dengan tabId, tambahkan kelas active
                if (tab.querySelector('a').getAttribute('href') === '#' + tabId) {
                    tab.classList.add('active');
                }
            });
        }

        // Fungsi untuk menampilkan konten tab yang sesuai saat tab diklik
        function showTabContentAgenda(tabId) {
            // Semua konten tab dianggap sembunyi
            var tabContents = document.querySelectorAll('#tab-agenda > div');
            tabContents.forEach(function(content) {
                content.style.display = 'none'; // Sembunyikan semua konten tab
            });

            // Tampilkan konten tab yang sesuai
            var selectedTabContent = document.getElementById(tabId);
            if (selectedTabContent) {
                selectedTabContent.style.display = 'block'; // Tampilkan konten tab yang sesuai
            }
        }

        // Event listener untuk setiap tab yang diklik
        var tabLinks = document.querySelectorAll('#nav-agenda a');
        tabLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var tabId = this.getAttribute('href').substring(1); // Mendapatkan ID tab dari href
                setActiveTabAgenda(tabId); // Atur kelas active pada tab yang diklik
                showTabContentAgenda(tabId); // Tampilkan konten tab yang sesuai
            });
        });

        // Tampilkan tab konten pertama saat halaman dimuat
        showTabContentAgenda('hari-ini-agenda');
    </script>
   {{-- Agenda GOR --}}
<script>
    // Fungsi untuk mengatur kelas active pada tab yang diklik
    function setActiveTabGor(tabId) {
        // Dapatkan semua elemen tab
        var tabLinks = document.querySelectorAll('#nav-gor li');

        // Loop melalui semua elemen tab
        tabLinks.forEach(function(tab) {
            // Hapus kelas active dari semua elemen tab
            tab.classList.remove('active');

            // Jika tab saat ini memiliki href yang sesuai dengan tabId, tambahkan kelas active
            if (tab.querySelector('a').getAttribute('href') === '#' + tabId) {
                tab.classList.add('active');
            }
        });
    }

    // Fungsi untuk menampilkan konten tab yang sesuai saat tab diklik
    function showTabContentGor(tabId) {
        // Semua konten tab dianggap sembunyi
        var tabContents = document.querySelectorAll('#tab-gor > div');
        tabContents.forEach(function(content) {
            content.style.display = 'none'; // Sembunyikan semua konten tab
        });

        // Tampilkan konten tab yang sesuai
        var selectedTabContent = document.getElementById(tabId);
        if (selectedTabContent) {
            selectedTabContent.style.display = 'block'; // Tampilkan konten tab yang sesuai
        }
    }

    // Event listener untuk setiap tab yang diklik
    var tabLinksGor = document.querySelectorAll('#nav-gor a');
    tabLinksGor.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var tabId = this.getAttribute('href').substring(1); // Mendapatkan ID tab dari href
            setActiveTabGor(tabId); // Atur kelas active pada tab yang diklik
            showTabContentGor(tabId); // Tampilkan konten tab yang sesuai
        });
    });

    // Tampilkan tab konten pertama saat halaman dimuat
    showTabContentGor('hari-inigor');
</script>

    {{-- Agenda Balai --}}
<script>
    // Fungsi untuk mengatur kelas active pada tab yang diklik
    function setActiveTabBalai(tabId) {
        // Dapatkan semua elemen tab
        var tabLinks = document.querySelectorAll('#nav-balai li');

        // Loop melalui semua elemen tab
        tabLinks.forEach(function(tab) {
            // Hapus kelas active dari semua elemen tab
            tab.classList.remove('active');

            // Jika tab saat ini memiliki href yang sesuai dengan tabId, tambahkan kelas active
            if (tab.querySelector('a').getAttribute('href') === '#' + tabId) {
                tab.classList.add('active');
            }
        });
    }

    // Fungsi untuk menampilkan konten tab yang sesuai saat tab diklik
    function showTabContentBalai(tabId) {
        // Semua konten tab dianggap sembunyi
        var tabContents = document.querySelectorAll('#tab-balai > div');
        tabContents.forEach(function(content) {
            content.style.display = 'none'; // Sembunyikan semua konten tab
        });

        // Tampilkan konten tab yang sesuai
        var selectedTabContent = document.getElementById(tabId);
        if (selectedTabContent) {
            selectedTabContent.style.display = 'block'; // Tampilkan konten tab yang sesuai
        }
    }

    // Event listener untuk setiap tab yang diklik
    var tabLinksBalai = document.querySelectorAll('#nav-balai a');
    tabLinksBalai.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var tabId = this.getAttribute('href').substring(1); // Mendapatkan ID tab dari href
            setActiveTabBalai(tabId); // Atur kelas active pada tab yang diklik
            showTabContentBalai(tabId); // Tampilkan konten tab yang sesuai
        });
    });

    // Tampilkan tab konten pertama saat halaman dimuat
    showTabContentBalai('hari-inibalai');
</script>

    {{-- <script type="text/javascript">
        $(function() {
            var chart_widget;
            $(document).ready(function() {
                // Build the chart
                chart_widget = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container_widget',
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
                            @foreach ($statistik as $item)
                                [{{ $item->lk }}, 'LAKI-LAKI'],
                                [{{ $item->pr }}, 'PEREMPUAN'],
                                [{{ $item->lk + $item->pr }}, 'TOTAL'],
                            @endforeach
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
                            @foreach ($statistik as $item)
                                ['LAKI-LAKI', {{ $item->lk }}],
                                ['PEREMPUAN', {{ $item->pr }}],
                                ['TOTAL', {{ $item->lk + $item->pr }}],
                            @endforeach
                            // ['LAKI-LAKI', 4000],
                            // ['PEREMPUAN', 3000],
                            // ['TOTAL', 7000],
                        ]
                    }]
                });
            });
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const beritaTerbaruLink = document.querySelector('a[href="#beritaterbaru"]');
            const beritaSemuaLink = document.querySelector('a[href="#semuaberita"]');
            const beritaDesaLink = document.querySelector('a[href="#beritadesa"]');
            const beritaLokalLink = document.querySelector('a[href="#beritalokal"]');
            const beritaProgramLink = document.querySelector('a[href="#programkerja"]');
            const beritaTerbaruSection = document.getElementById('beritaterbaru');
            const beritaSemuaSection = document.getElementById('semuaberita');
            const beritaDesaSection = document.getElementById('beritadesa');
            const beritaLokalSection = document.getElementById('beritalokal');
            const beritaProgramSection = document.getElementById('programkerja');

            // Function untuk mengubah tampilan tautan
            function updateLinkStyle(link, isActive) {
                if (isActive) {
                    link.classList.add('active-link', 'bg-secondary', 'text-white');
                    link.classList.remove('inactive-link', 'bg-white', 'text-black');

                    // Cek apakah ikon sudah ada
                    const icon = link.querySelector('i.fa-check');
                    if (!icon) {
                        // Jika tidak ada, tambahkan ikon
                        const newIcon = document.createElement('i');
                        newIcon.className = 'fa-solid fa-check inline-block icon icon-sm';
                        link.appendChild(newIcon);
                    }
                } else {
                    link.classList.remove('active-link', 'bg-secondary', 'text-white');
                    link.classList.add('inactive-link', 'bg-white', 'text-black');

                    // Hapus ikon jika tautan tidak aktif
                    const icon = link.querySelector('i.fa-check');
                    if (icon) {
                        link.removeChild(icon);
                    }
                }
            }

            // Function untuk menampilkan tab default
            function showDefaultTab() {
                beritaTerbaruSection.style.display = '';
                beritaSemuaSection.style.display = 'none';
                beritaDesaSection.style.display = 'none';
                beritaLokalSection.style.display = 'none';
                beritaProgramSection.style.display = 'none';

                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaTerbaruLink, true);
                updateLinkStyle(beritaSemuaLink, false);
                updateLinkStyle(beritaDesaLink, false);
                updateLinkStyle(beritaLokalLink, false);
                updateLinkStyle(beritaProgramLink, false);
            }

            // Tampilkan tab default saat halaman dimuat
            showDefaultTab();


            beritaTerbaruLink.addEventListener('click', function(event) {
                event.preventDefault();
                beritaTerbaruSection.style.display = '';
                beritaSemuaSection.style.display = 'none';
                beritaDesaSection.style.display = 'none';
                beritaLokalSection.style.display = 'none';
                beritaProgramSection.style.display = 'none';

                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaTerbaruLink, true);
                updateLinkStyle(beritaSemuaLink, false);
                updateLinkStyle(beritaDesaLink, false);
                updateLinkStyle(beritaLokalLink, false);
                updateLinkStyle(beritaProgramLink, false);

            });

            beritaSemuaLink.addEventListener('click', function(event) {
                event.preventDefault();
                beritaSemuaSection.style.display = '';
                beritaTerbaruSection.style.display = 'none';
                beritaDesaSection.style.display = 'none';
                beritaLokalSection.style.display = 'none';
                beritaProgramSection.style.display = 'none';

                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaSemuaLink, true);
                updateLinkStyle(beritaTerbaruLink, false);
                updateLinkStyle(beritaDesaLink, false);
                updateLinkStyle(beritaLokalLink, false);
                updateLinkStyle(beritaProgramLink, false);
            });

            beritaDesaLink.addEventListener('click', function(event) {
                event.preventDefault();
                beritaDesaSection.style.display = '';
                beritaTerbaruSection.style.display = 'none';
                beritaSemuaSection.style.display = 'none';
                beritaLokalSection.style.display = 'none';
                beritaProgramSection.style.display = 'none';

                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaDesaLink, true);
                updateLinkStyle(beritaTerbaruLink, false);
                updateLinkStyle(beritaSemuaLink, false);
                updateLinkStyle(beritaLokalLink, false);
                updateLinkStyle(beritaProgramLink, false);
            });

            beritaLokalLink.addEventListener('click', function(event) {
                event.preventDefault();
                beritaLokalSection.style.display = '';
                beritaTerbaruSection.style.display = 'none';
                beritaSemuaSection.style.display = 'none';
                beritaDesaSection.style.display = 'none';
                beritaProgramSection.style.display = 'none';


                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaLokalLink, true);
                updateLinkStyle(beritaTerbaruLink, false);
                updateLinkStyle(beritaSemuaLink, false);
                updateLinkStyle(beritaDesaLink, false);
                updateLinkStyle(beritaProgramLink, false);
            });

            beritaProgramLink.addEventListener('click', function(event) {
                event.preventDefault();
                beritaProgramSection.style.display = '';
                beritaTerbaruSection.style.display = 'none';
                beritaSemuaSection.style.display = 'none';
                beritaDesaSection.style.display = 'none';
                beritaLokalSection.style.display = 'none';

                // Panggil fungsi untuk mengubah tampilan tautan
                updateLinkStyle(beritaProgramLink, true);
                updateLinkStyle(beritaTerbaruLink, false);
                updateLinkStyle(beritaSemuaLink, false);
                updateLinkStyle(beritaDesaLink, false);
                updateLinkStyle(beritaLokalLink, false);
            });
        });
    </script>
@endpush
