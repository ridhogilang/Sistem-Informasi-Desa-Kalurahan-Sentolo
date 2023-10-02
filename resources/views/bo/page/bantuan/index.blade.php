@extends('bo.layout.master')

@section('content')
<div class="pagetitle">
        <h1>Bantuan </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Bantuan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>ini adalah halaman bantuan</h2>
                </div>
            </div>
            <div class="row">
                <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                  <div class="accordion-item px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                        <span class="num">1.</span>
                        Non consectetur a erat nam at lectus urna duis?
                      </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                        <span class="num">2.</span>
                        Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                      </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                        <span class="num">3.</span>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                      </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                        <span class="num">4.</span>
                        Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                      </button>
                    </h3>
                    <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                        <span class="num">5.</span>
                        Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                      </button>
                    </h3>
                    <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                </div>
            </div>
            <div class="row">
                <div class="col">
                    list aplikasi
                    <li><a href="/admin/bantuan/kepegawaian">Kepegawaian</a></li>
                    <li><a href="/admin/bantuan/e-surat">e-surat</a></li>
                    <li><a href="/admin/bantuan/sistem_informasi">sistem informasi</a></li>
                </div>
            </div>
        </div>
    </section>
@endsection