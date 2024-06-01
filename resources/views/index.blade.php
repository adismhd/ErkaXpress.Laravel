<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ErkaXpress | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- Favicons -->
    <link href="{{ asset('') }}assets/img/favicon.png" rel="icon">
    <link href="{{ asset('') }}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cf59e3b8b5.js" crossorigin="anonymous"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <style>
        body {
            background-image: url('../../img/bg.jpeg');
            background-size: 100%;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bg-white {
            background-color: rgba(255, 255, 255, 1); 
        }
    </style>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <h1>ErkaXpress<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#clients">Client</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#testimonials">Experience</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
            <a href="/BuatPesanan" style="border-radius: 25px" class="btn btn-danger">Booking</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Raksasa Khatulistiwa Express</h2>
                    <p style="color: #f6f6f6"><b>Tell Us What You Want, And Logistic in Your Hand.</b></p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started" style="background-color: rgb(255, 255, 255); color: #000000">Get Started</a>&nbsp;&nbsp;
                        <a href="/BuatPesanan" class="btn-get-started"
                            style="background-color: rgb(189, 48, 48)">Booking</a>
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    {{-- <img src="{{ asset('img/OIG1.png') }}" style="width: 400px" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100"> --}}
                        <img src="{{ asset('img/orang_paket.png') }}" style="width: 400px" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100">
                        
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">
                    <div class="col-xl-2 col-md-2"></div>
                    <div class="col-xl-8 col-md-8" data-aos-delay="100">
                        <div class="icon-box sections-bg"
                            style="background-color: rgb(255, 255, 255); border-radius: 25px;">
                            {{-- <div class="icon"><i class="fa-solid fa-truck"></i></div> --}}
                            <h4 class="title" style="color: rgb(47, 47, 47)"><i
                                    class="fa-solid fa-truck"></i>&nbsp;Lacak Pesanan </h4>
                            <form action="/CekResi" class="m-4" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="id" class="form-control" placeholder="Nomor Resi"
                                        style="border-top-left-radius: 25px; border-bottom-left-radius: 25px;">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit"
                                            style="border-top-right-radius: 25px; border-bottom-right-radius: 25px;">cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main ">
        <!-- ======= Cek Resi ======= -->
        @isset($pesanan)
            <div class="about sections-bg row" style="background-color: #f6f6f6;">
                <div class="col-xl-2 col-md-2"></div>
                <div class="card col-xl-8 col-md-8" style="background-color: #ffffff; border-radius: 25px" class="m-5">
                    <div class="card-body m-3">
                        <div class="row ">
                            <div class="col-md-4 mb-3">
                                <h4>Detail Pengiriman</h4>
                                <table>
                                    <tr>
                                        {{-- <td>Nama Penerima &nbsp;</td>
                                        <td>: &nbsp;</td> --}}
                                        <td><b>{{ $penerima->Nama }}</td>
                                    </tr>
                                    <tr>
                                        {{-- <td>Alamat &nbsp;</td>
                                        <td>: &nbsp;</td> --}}
                                        <td>{{ $penerima->Alamat }}</td>
                                    </tr>
                                    <tr>
                                        {{-- <td>No Telepon &nbsp;</td>
                                        <td>: &nbsp;</td> --}}
                                        <td>{{ $penerima->NoTelepon }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <table center style="border: 0px; align-self: center;" cellspacing="0" cellpadding="0">
                                    @foreach ($statuList as $data)
                                        <tr>
                                            <td><img src="{{ URL::asset('img/LinePesanan.png') }}" style="width: 70px;"
                                                    alt="Avatar"></td>
                                            <td>{{ $data->created_at }} &nbsp;</td>
                                            <td>{{ $data->Status }}</td>
                                            {{-- <td>{{ $data->Keterangan }}</td>  --}}
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
                
        @isset($statusResi)
            @if ($statusResi == 'true')
                <div class="about sections-bg row" style="background-color: #f6f6f6;">
                    <div class="col-xl-2 col-md-2"></div>
                    <div class="card col-xl-8 col-md-8" style="background-color: #ff3a3a; border-radius: 25px" class="m-5">
                        <div class="card-body m-3">
                            <div class="row ">
                                <h2 style="text-align: center; color: #f6f6f6"><strong> Resi Tidak Ditemukan!</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endisset

        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Sector and Services</h2>
                    {{-- <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat
                        sunt id nobis omnis tiledo stran delop</p> --}}
                </div>
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item  position-relative">
                            <a href="{{ asset('img/service1.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-building-circle-check"></i>
                                </div>
                                <h3>B2C & B2B</h3>
                                <p style="color: black">Dalam melakukan pendistribusian dan barang kami sering
                                    melakukan pengiriman
                                    berupa pengiriman to end customer atau pun dengan manufacture, Dimana kami juga
                                    menangani penanganan barang
                                    khusus, seperti IT Technology dan Raw Material pada produksi BUMN dan Perusahaan
                                    Swasta</p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <a href="{{ asset('img/service2.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-truck-plane"></i>
                                </div>
                                <h3>Export Import</h3>
                                <p style="color: black">Kami dapat melakukan Export Dan Import Ke seluruh negara dengan
                                    spesilisasi kami
                                    ialah pada negara yang termasuk wilayah ASEAN, serta Amerika Belanda, dan China.</p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <a href="{{ asset('img/service3.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-truck-ramp-box"></i>
                                </div>
                                <h3>Logistic Project</h3>
                                <p style="color: black">kami dapat melakukan Logistics Project yaitu pengiriman barang
                                    yang dimensi dan
                                    beratnya sulit untuk di lakukan dan diperlukan penanganan khusus.</p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <a href="{{ asset('img/service4.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                                <h3>InLand Transportation </h3>
                                <p style="color: black">Kami menangani kargo umum dan kargo khusus, Prioritas kami
                                    adalah kepuasan anda</p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <a href="{{ asset('img/service5.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-ship"></i>
                                </div>
                                <h3> Sea Transportation</h3>
                                <p style="color: black">Kami menyediakan transportasi laut seperti kontainer dan
                                    breakbulk kapal,
                                    LCT, tongkang dan kami juga melakukan perencanaan agar efektif dan terhadap waktu
                                </p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <a href="{{ asset('img/service6.png') }}" class="glightbox">
                                <div class="icon">
                                    <i class="fa-solid fa-plane"></i>
                                </div>
                                <h3> Air Transportation</h3>
                                <p style="color: black">Khusus untuk Fast Delivery kami akan menggunakan Air
                                    Transportation yang
                                    nantinya akan menjadikan pilihan anda ketika membtuhkan barang sampai dengan cepat
                                </p>
                                <p class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Our Services Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients bg-white">
            <div class="container" data-aos="zoom-out">

                <div class="section-header">
                    <h2>Our Customers</h2>
                    {{-- <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat
                        sunt id nobis omnis tiledo stran delop</p> --}}
                </div>
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-1.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-2.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-3.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-4.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-8.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/clients/client-6.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img style="height: 70px;"
                                src="{{ asset('img/clients/client-7.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <h5> PT. Raksasa Khatulistiwa Xpress adalah perusahaan bergerak
                        di bidang jasa pengiriman, penanganan barang</h5>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4">
                        {{-- <h3>Voluptatem dignissimos provident quasi corporis</h3> --}}
                        <img src="img/thumb1.jpg" class="img-fluid rounded-4 mb-4" alt="">
                        {{-- <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat
                            debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur
                            fugiat voluptas ea.</p>
                        <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo
                            officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut
                            ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut
                            omnis beatae neque deleniti repellendus.</p> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="content ps-0 ps-lg-5">
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i>
                                    <h5>2015</h5>
                                    Pada tahun 2015, kami
                                    memulai untuk melakukan
                                    Bisnis Project Logistik berupa
                                    pendistribusian raw material
                                    dan finish goods pada
                                    perusahaan BUMN seperti
                                    Pindad, PT. Len, PLN, Serta
                                    Telkom Akses, pada daerah
                                    pendistribusian jawa
                                    barat,kami memulai Bisnis
                                    Project Logistic ini dilakukan
                                    sebagai sebuah Sub-Division
                                    dari PT. Ria Kusumah Bersama
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i>
                                    <h5>2022</h5>
                                    Pada tahun 2022 kami
                                    memulai untuk melangkah
                                    untuk melakukan
                                    pendistribusian barang pada
                                    cakupan nasional dengan
                                    masih di bawah naungan dari
                                    PT. Ria Kusumah Bersama.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i>
                                    <h5>Now</h5>
                                    Pada Tahun 2024 kami
                                    memulai langkah baru dengan
                                    membuat sebuah perusahaan
                                    dengan nama PT. Raksasa
                                    Khatulistiwa Express dan dapat
                                    melakukan pendistribusian
                                    dengan skala nasional, serta
                                    kami melakukan beberapa
                                    penguatan pada pengiriman
                                    di daerah terpencil.
                                </li>
                            </ul>

                            {{-- <div class="position-relative mt-4">
                                <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">
                                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="visi" class="faq bg-white">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="content px-xl-5">
                            <h3><strong>Visi</strong></h3>
                            <h5>
                                Revolutionary Logistics For National Market Chain
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3><strong>Misi</strong></h3>
                        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        <span class="num">1.</span>
                                        Pelayanan sepenuh hati dan profesional
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Memberikan pelayanan sepenuh
                                        hati dan profesional guna
                                        memastikan kepuasan
                                        pelanggan, serta dapat menjalin
                                        kemitraan yang
                                        berkesinambungan
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        <span class="num">2.</span>
                                        Bisnis yang efisien dan inovatif
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Membangun keunggulan operasional melalui pemanfaatan teknologi dan informasi
                                        guna mendukung
                                        proses bisnis yang efisien dan inovatif
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        <span class="num">3.</span>
                                        Ekosistem yang terintegrasi
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Menciptakan ekosistem yang
                                        terintegrasi guna mereduksi biaya
                                        yang dikeluarkan pelanggan
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                        <span class="num">4.</span>
                                        Operasi yang terintegrasi
                                    </button>
                                </h3>
                                <div id="faq-content-4" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Mengusung kolaborasi
                                        dengan semua entitas
                                        logistik guna mewujudkan
                                        operasi yang terintegrasi
                                        dengan mulus.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Experience Section ======= -->
        <section id="testimonials" class="testimonials sections-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Experience</h2>
                </div>
                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <h3>2016 <br><br>(Spare Part) Ghuanzou to Bandung</h3>
                                    </div>
                                    <p>
                                        kami menangani distribusi dan Customs &
                                        Formalities dari Ghuanzou to Bandung
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <h3>2018 - 2019 <br><br>(Project Distribution Logistic)
                                            Bandung to 5 Point Destination in West
                                            Java </h3>
                                    </div>
                                    <p>
                                        kami menangani distribusi raw material dari
                                        pembangunan jaringan di seluruh jawa barat,
                                        dengan beberapa dimensi dan berat yang
                                        menggunakan penanganan berbeda
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <h3>2016 - Now <br><br>(Expedition For B2B Market)</h3>
                                    </div>
                                    <p>
                                        Kami Bergerak pada bidang expedisi untuk B2B
                                        Market, Kemampuan pengiriman terbaik pada
                                        pengiriman Ke Daerah Pulau Sumatera, Daerah
                                        Provinsi Jawa Barat, Daerah Provinsi Sulawesi
                                        Selatan, Sulawesi Tenggara, Kalimantan dan Nusa
                                        Tenggara Barat.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <h3>2022 - Now <br><br>(Expedition For B2C)</h3>
                                    </div>
                                    <p>
                                        Kami Bergerak pada bidang expedisi untuk B2C
                                        Market, Kemampuan pengiriman terbaik pada
                                        pengiriman Ke Daerah Pulau Sumatera, Daerah
                                        Provinsi Jawa Barat, Daerah Provinsi Sulawesi
                                        Selatan, Sulawesi Tenggara, Kalimantan dan Nusa
                                        Tenggara Barat.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team bg-white">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt
                        quis dolorem dolore earum</p>
                </div>

                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-1.jpg') }}" class="img-fluid" alt="">
                            <h4>Muhammad Nur Halim S.Tra, CSCA</h4>
                            <span> Direktur Utama </span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-2.jpg') }}" class="img-fluid" alt="">
                            <h4>MHD. Wahyu Riandani S.Log</h4>
                            <span>General Manajer Operasional</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-3.jpg') }}" class="img-fluid" alt="">
                            <h4>Kevin Kunta Adjie</h4>
                            <span>General Manajer Marketing </span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-4.jpg') }}" class="img-fluid" alt="">
                            <h4> Vianka Salma S.Log</h4>
                            <span>Manajer Operasional</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-5.jpg') }}" class="img-fluid" alt="">
                            <h4> Fauzia Salsabila Brima S.Log</h4>
                            <span>Manajer Pergudangan </span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-6.jpg') }}" class="img-fluid" alt="">
                            <h4> Naufal Wahid Habibillah</h4>
                            <span>Manajer Marketing </span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{ asset('img/teams/team-7.jpg') }}" class="img-fluid" alt="">
                            <h4>Cakra Wibawa </h4>
                            <span> Manajer Pelayanan Pelanggan </span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact bg-white">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Contact</h2>
                </div>
                <div class="row gx-lg-0 gy-4">
                    <div class="col-lg-4">
                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Address :</h4>
                                    <p>Jln. Kebagusan Raya Gang puskesmas RT 07 RW 01 NO 18 Kel
                                        Kebagusan kec. Pasar Minggu</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>info@erkaxpress.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telephone:</h4>
                                    <p>+022 7562130</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Open Hours:</h4>
                                    <p>Mon-Sat: 08.00 - 17.00</p>
                                </div>
                            </div><!-- End Info Item -->
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="custom-contact">
                            <form action="CreateMessage" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                                </div>
                                <br>
                                <div class="text-center"><button class="btn btn-success" style="border-radius: 25px" type="submit">Send Message</button></div>
                            </form>
                        </div>                        
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Address</span>
                    </a>
                    <p> Jln. Kebagusan Raya Gang puskesmas RT 07 RW 01 NO 18 Kel Kebagusan kec. Pasar Minggu</p>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
