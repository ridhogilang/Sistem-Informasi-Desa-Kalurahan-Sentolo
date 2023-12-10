@extends('layout.main')

@push('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    </script>
@endpush

@section('main')
    <main class="container px-3 max-w-container mx-auto space-y-5 my-5">
        <div class="newsticker rounded-none text-sm" style="overflow: hidden; min-height: 1px;">
            <h3 class="newsticker-heading py-1"><i class="fa-solid fa-bullhorn text-lg"></i> <span
                    class="newsticker-title">Sekilas Info</span></h3>
            <ul class="newsticker-list py-1"style="padding: 0px; margin: 0px; position: relative; list-style-type: none;">
                <li class="newsticker-item" style="left: 50%; white-space: nowrap;">
                    <marquee behavior="" direction="">{!! $text->textrunning !!}</marquee><a class="newsticker-link"></a>
                </li>

            </ul>
        </div>
   
        <section class="content-wrapper my-5">
            <article class="card content">
                <a href="/berita/kategori/berita-lokal" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                    Galeri
                </a>
                <br>
                <div class="main-content print space-y-4">
                    <h1
                        class="text-heading text-lg lg:text-2xl border-b dark:border-slate-800 border-dotted border-primary dark:border-white pb-2 title">
                        {{ $galeri->nama }} </h1>
                    {!! $galeri->galeri !!}
                </div><br><br>
            </article>
            @include('partials.aside')
        </section>
    </main>
@endsection

@push('footer')
    <script>
        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 1,
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
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
@endpush
