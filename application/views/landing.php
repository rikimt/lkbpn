<!DOCTYPE html>
<html lang="en">

<head>
  <title>SMK BPN</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/') ?>logobpn.png" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>fonts/flaticon/font/flaticon.css">



  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/aos.css">

  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

  <!-- <div class="site-wrap"> -->

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-11 col-xl-2 site-logo">
          <h1 class="mb-0"><a href="#" class="text-white h2 mb-0"><img
                src="<?= base_url('assets/landing/') ?>images/logobpn.png" alt="Image" width="50px"></a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
              <li><a href="#section-home" class="nav-link">Beranda</a></li>
              <li class="has-children">
                <a href="#section-sistem" class="nav-link">Sistem</a>
                <ul class="dropdown">
                  <li><a href="http://192.168.100.2" class="nav-link" target="_blank">Sistem Informasi SMK BPN</a></li>
                  <li><a href="<?= base_url('login') ?>" class="nav-link" target="_blank">Laporan Kinerja SMK BPN</a>
                  </li>
                  <li><a href="http://elearning.smkbpn.sch.id" class="nav-link" target="_blank">E-learning SMK BPN</a>
                  </li>
                </ul>
              </li>
              <li><a href="#section-about" class="nav-link">Alamat</a></li>
              <li><a href="#section-prestasi" class="nav-link">Prestasi</a></li>
              <li><a href="#section-kegiatan" class="nav-link">Kegiatan</a></li>
              <li><a href="#section-berita" class="nav-link">Berita</a></li>
              <li><a href="#section-kontak" class="nav-link">Kontak</a></li>
            </ul>
          </nav>
        </div>


        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
            class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

      </div>

    </div>
    </div>

  </header>



  <div class="site-blocks-cover overlay"
    style="background-image: url(<?= base_url('assets/landing/') ?>images/smkbpn.jpg);" data-aos="fade"
    data-stellar-background-ratio="0.5" id="section-home">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">


          <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">SMK BINA PUTERA
            NUSANTARA</h1>
          <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Tasikmalaya</p>

        </div>
      </div>
    </div>
  </div>


  <div class="site-section border-bottom" id="section-sistem">
    <div class="container">

      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Sistem Sekolah</h2>
        </div>
      </div>

      <div class="slide-one-item home-slider owl-carousel">
        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="<?= base_url('assets/landing/') ?>images/logobpn.png" alt="Image" class="img-fluid mb-3">

            </figure>
            <blockquote>
              <p>Sistem Informasi SMK BPN</p>
              <a href="http://192.168.100.2" target="_blank">Selengkapnya</a>
            </blockquote>
          </div>
        </div>

        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="<?= base_url('assets/landing/') ?>images/logobpn.png" alt="Image" class="img-fluid mb-3">

            </figure>
            <blockquote>
              <p>Laporan Kinerja SMK BPN</p>
              <a href="<?= base_url('login') ?>" target="_blank">Selengkapnya</a>
            </blockquote>
          </div>
        </div>

        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="<?= base_url('assets/landing/') ?>images/logobpn.png" alt="Image" class="img-fluid mb-3">

            </figure>
            <blockquote>
              <p>Elearning SMK BPN</p>
              <a href="http://elearning.smkbpn.sch.id" target="_blank">Selengkapnya</a>
            </blockquote>
          </div>
        </div>



      </div>
    </div>
  </div>


  <div class="site-section" id="section-about">
    <div class="container">
      <div class="row mb-5">

        <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade-up" data-aos-delay="100">
          <img src="<?= base_url('assets/landing/') ?>images/alamat.jpg" alt="Image" class="img-fluid rounded">
        </div>
        <div class="col-md-6 order-md-1" data-aos="fade-up">
          <div class="text-left pb-1 border-primary mb-4">
            <h2 class="text-primary">Alamat</h2>
          </div>
          <p>Jl. Sukarindik No.63A, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151</p>


        </div>

      </div>
    </div>
  </div>

  <div class="site-section bg-image overlay"
    style="background-image: url('<?= base_url('assets/landing/') ?>images/bg2.jpg');" id="section-prestasi">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary" data-aos="fade">Prestasi</h2>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="how-it-work-item">
              <span class="number">1</span>
              <div class="how-it-work-body">
                <h2>Make An Order</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt praesentium dicta consectetur fuga neque fugit a at. Cum quod vero assumenda iusto.</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="how-it-work-item">
              <span class="number">2</span>
              <div class="how-it-work-body">
                <h2>Make A Payment</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt praesentium dicta consectetur fuga neque fugit a at. Cum quod vero assumenda iusto.</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="how-it-work-item">
              <span class="number">3</span>
              <div class="how-it-work-body">
                <h2>Track Your Order</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt praesentium dicta consectetur fuga neque fugit a at. Cum quod vero assumenda iusto.</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul>
              </div>
            </div>
          </div> -->

      </div>
    </div>
  </div>

  <div class="site-section border-bottom" id="section-kegiatan">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary" data-aos="fade">Kegiatan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
          <div class="person">
            <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
              <img src="<?= base_url('assets/landing/') ?>images/kegiatan1.jpg" alt="Image" class="img-fluid"
                style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 class="text-center">Kegiatan 1</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae
              quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore
              suscipit inventore deserunt tenetur.</p>
            <ul class="ul-social-circle">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
          <div class="person">
            <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
              <img src="<?= base_url('assets/landing/') ?>images/kegiatan2.jpg" alt="Image" class="img-fluid"
                style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 class="text-center">Kegiatan 2</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae
              quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore
              suscipit inventore deserunt tenetur.</p>
            <ul class="ul-social-circle">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
          <div class="person">
            <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
              <img src="<?= base_url('assets/landing/') ?>images/kegiatan3.jpg" alt="Image" class="img-fluid"
                style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 class="text-center">Kegiatan 3</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae
              quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore
              suscipit inventore deserunt tenetur.</p>
            <ul class="ul-social-circle">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- 
    <div class="site-section bg-light" id="section-services">
      <div class="container">
        <div class="row justify-content-center mb-5" data-aos="fade-up">
          <div class="col-md-7 text-center border-primary">
            <h2 class="mb-0 text-primary">Our Services</h2>
            <p class="color-black-opacity-5">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-plane"></span></div>
              <div>
                <h3>Air Freight</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-boat-ship"></span></div>
              <div>
                <h3>Ocean Freight</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-truck"></span></div>
              <div>
                <h3>Land Transportation</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-warehouse"></span></div>
              <div>
                <h3>Warehousing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-wooden"></span></div>
              <div>
                <h3>Storage</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-worldwide"></span></div>
              <div>
                <h3>Worldwide Delivery</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    

    <div class="site-section block-13" id="section-industries">

      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="mb-0 text-primary">Industries</h2>
            <p class="color-black-opacity-5">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>

      <div class="owl-carousel nonloop-block-13">
        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Storage</h3>
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Air Transports</h3>
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Cargo Transports</h3>
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/img_4.jpg" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Cargo Ship</h3>
            </div>
          </a>
        </div>

        <div>
          <a href="#" class="unit-1 text-center">
            <img src="images/img_5.jpg" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading">Ware Housing</h3>
            </div>
          </a>
        </div>


      </div>
    </div> -->


  <div class="site-blocks-cover overlay inner-page-cover"
    style="background-image: url(<?= base_url('assets/landing/') ?>images/bg3.jpg); background-attachment: fixed;">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-7" data-aos="fade-up">
          <a href="https://www.youtube.com/watch?v=QTTKfzZpIFc"
            class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
          <h2 class="text-white font-weight-light mb-5 h1">Tonton Video</h2>

        </div>
      </div>
    </div>
  </div>



  <div class="site-section" id="section-berita">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Berita</h2>
        </div>
      </div>
      <div class="row mb-5 align-items-stretch">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
          <div class="h-entry">
            <a href="#section-berita">
              <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
                <img src="<?= base_url('assets/landing/') ?>images/berita1.jpg" alt="Image" class="img-fluid"
                  style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </a>
            <h2 class="font-size-regular"><a href="#section-berita">Berita 1</a></h2>
            <div class="meta mb-4"><span class="mx-2">&bullet;</span> 1 November 2024 <span class="mx-2">&bullet;</span>
              <a href="#">News</a>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
              veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="h-entry">
            <a href="#section-berita">
              <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
                <img src="<?= base_url('assets/landing/') ?>images/berita2.jpg" alt="Image" class="img-fluid"
                  style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </a>
            <h2 class="font-size-regular"><a href="#section-berita">Berita 2</a></h2>
            <div class="meta mb-4"><span class="mx-2">&bullet;</span> 1 November 2024 <span class="mx-2">&bullet;</span>
              <a href="#">News</a>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
              veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="h-entry">
            <a href="#section-berita">
              <div class="overflow-hidden mx-auto" style="width: 350px; height: 200px;">
                <img src="<?= base_url('assets/landing/') ?>images/berita3.jpg" alt="Image" class="img-fluid"
                  style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </a>
            <h2 class="font-size-regular"><a href="#section-berita">Berita 3</a></h2>
            <div class="meta mb-4"><span class="mx-2">&bullet;</span> 1 November 2024 <span class="mx-2">&bullet;</span>
              <a href="#">News</a>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
              veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="site-section bg-light" id="section-kontak">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Kontak</h2>
          <p class="color-black-opacity-5">Hubungi Kami</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mb-5">



          <form action="#" class="p-5 bg-white">


            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Nama Depan</label>
                <input type="text" id="fname" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Nama Belakang</label>
                <input type="text" id="lname" class="form-control">
              </div>
            </div>

            <div class="row form-group">

              <div class="col-md-12">
                <label class="text-black" for="email">Email</label>
                <input type="email" id="email" class="form-control">
              </div>
            </div>

            <div class="row form-group">

              <div class="col-md-12">
                <label class="text-black" for="subject">Subjek</label>
                <input type="subject" id="subject" class="form-control">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="message">Pesan</label>
                <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Kirim" class="btn btn-primary py-2 px-4 text-white">
              </div>
            </div>


          </form>
        </div>
        <div class="col-md-5">

          <div class="p-4 mb-3 bg-white">
            <p class="mb-0 font-weight-bold">Alamat</p>
            <p class="mb-4">Jl. Sukarindik No.63A, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151</p>

            <p class="mb-0 font-weight-bold">Telepon</p>
            <p class="mb-4"><a href="#">0821-3010-1001</a></p>

            <p class="mb-0 font-weight-bold">Email Address</p>
            <p class="mb-0"><a href="#">smkbpn@smkbpn.sch.id</a></p>

          </div>



        </div>
      </div>
    </div>
  </div>


  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-5 mr-auto">
              <h2 class="footer-heading mb-4">Alamat</h2>
              <p>Jl. Sukarindik No.63A, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151</p>
            </div>

            <div class="col-md-3">
              <h2 class="footer-heading mb-4">Jelajahi</h2>
              <ul class="list-unstyled">
                <li><a href="#section-about">Alamat</a></li>
                <li><a href="#section-prestasi">Prestasi</a></li>
                <li><a href="#section-kegiatan">Kegiatan</a></li>
                <li><a href="#section-berita">Berita</a></li>
                <li><a href="#section-kontak">Kontak</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <h2 class="footer-heading mb-4">Follow</h2>
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright 2024 RMT&copy;
              <a href="#">SMK BPN Tasikmalaya</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- </div> -->

  <script src="<?= base_url('assets/landing/') ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery-ui.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery.countdown.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/aos.js"></script>

  <script src="<?= base_url('assets/landing/') ?>js/main.js"></script>

</body>

</html>