@extends('layouts.client.main')

@section('title', 'SLIBC')

@section('content')
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div>
        <div class="row content">
            <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <p style="text-align: center;">
                    Student Learning and Incubator Business Center yang disebut juga SLIBC adalah sebuah lembaga yang dibawah kemahasiswaan yang berfokus pada pengembangan akademik dan skill mahasiswa. Mereka dapat mengikuti program yang ada untuk upgrading serta mencari pengalaman baru.
                </p>
            </div>
        </div>
    </div>
</section><!-- End About Us Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container">
        <div class="row">
            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
                <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
            </div>

            <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                <div class="content d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="icofont-simple-smile"></i>
                                <p>Banyak orang-orang yang menyukai website slibc</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="icofont-computer"></i>
                                <p>Organisasi IT</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="icofont-info-circle"></i>
                                <p>Pusat pengembangan skill</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="icofont-award"></i>
                                <!-- <span data-toggle="counter-up">15</span> -->
                                <p>Informasi lomba</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End .content-->
            </div>
        </div>

    </div>
</section><!-- End Counts Section -->

<!-- ======= Services Section ======= -->
<section id="programs" class="programs">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Programs</h2>
            <span>SLIBC (Student Learning Incubator Business Center) mempunyai program - program yang menarik, yang dapat membantu para mahasiswa dapat berkreasi dan juga mengharumkan nama baik STT Terpadu Nurul Fikri.</span>
        </div>
    </div>
</section><!-- End Services Section -->

<!-- ======= More Services Section ======= -->
<section id="more-services" class="more-services">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="card" style='background-image: url("assets/img/lomba.jpg");' data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body">
                        <h5 class="card-title"><a href="">IT Club</a></h5>
                        <p class="card-text" style="text-align: center;">Pantau kegiatan IT Club yang kamu ikuti</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4  mt-md-0">
                <div class="card" style='background-image: url("assets/img/Web-Development.jpg");' data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Lomba Lomba</a></h5>
                        <p class="card-text" style="text-align: center;">Yuk cek kegiatan lomba yang akan datang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End More Services Section -->

<!-- ======= Artikel Section ======= -->
<section id="articles" class="team section-bg">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Artikel</h2>
            <p>Kumpulan artikel yang menarik untuk dibaca</p>
        </div>

        <div class="row">
            @foreach($articles as $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="150">
                    <div class="member-img">
                        <img src="/upload_articles/{{ $item->image ?? 'default_article.webp'}}" style="height: 147px; width: 100%" class="img-fluid" alt="{{ $item->title }}">
                        {{-- <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                        </div> --}}
                    </div>
                    <div class="member-info">
                        <a href="{{ route('home.article', $item->slug) }}">
                            <h4>{{ Str::limit($item->title, 20) }}</h4>
                        </a>
                        <span>{{ Str::limit($item->content, 50) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- End Artikel Section -->

<!-- ======= Event Section ======= -->
<section id="events" class="team section-bg">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Event</h2>
            <p>Kumpulan event yang menarik untuk mengasah kemampuan kamu</p>
        </div>

        <div class="row">
            @foreach($events as $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="/upload_events/{{ $item->image ?? 'default_event.webp'}}" style="height: 147px; width: 100%" class="img-fluid" alt="{{ $item->plan }}">
                    </div>
                    <div class="member-info">
                        <a href="{{ route('home.event', $item->slug) }}">
                            <h4>{{ Str::limit($item->plan, 20) }}</h4>
                        </a>
                        <span>{{ Str::limit($item->description, 50) }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
<!-- End Event Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3><img src="assets/img/slibc.png" style="width: 30%;"></h3>
                    <p>Student Learning and Incubator Business Center yang disebut juga SLIBC adalah sebuah lembaga yang dibawah kemahasiswaan yang berfokus pada pengembangan akademik dan skill mahasiswa. Mereka dapat mengikuti program yang ada untuk upgrading serta mencari pengalaman baru.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <div>
                        <i class="ri-map-pin-line"></i>
                        <p>Jl. Lenteng Agung Raya No.20,<br>Jakarta 10550</p>
                    </div>

                    <div>
                        <i class="ri-mail-send-line"></i>
                        <p>info@nurulfikri.ac.id</p>
                    </div>

                    <div>
                        <i class="ri-phone-line"></i>
                        <p>786 3191</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-about">
                    <h3>STT NF</h3>
                    <p>Jalan Lenteng Agung Raya No.20 RT.5/RW.1 Lenteng Agung, Kelurahan, RT.4/RW.1, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640</p>
                    <div class="social-links">
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection
