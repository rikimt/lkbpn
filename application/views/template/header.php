<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description"
    content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title><?= $judul; ?></title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/') ?>logobpn.png" />
  <!-- Favicon icon -->

  <!-- Font Awesome -->
  <link href="<?= base_url('assets/matriks/font-awesome/') ?>css/fontawesome.css" rel="stylesheet" />
  <link href="<?= base_url('assets/matriks/font-awesome/') ?>css/brands.css" rel="stylesheet" />
  <link href="<?= base_url('assets/matriks/font-awesome/') ?>css/solid.css" rel="stylesheet" />
  <!-- Font Awesome -->

  <!-- Custom CSS -->
  <link href="<?= base_url('assets/matriks') ?>/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="<?= base_url('assets/matriks') ?>/dist/css/style.min.css" rel="stylesheet" />


  <link rel="stylesheet" href="<?= base_url('assets/datatables') ?>/datatables.min.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="<?= base_url('home'); ?>">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="<?= base_url('assets/images') ?>/logobpn.png" alt="homepage" class="light-logo" width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2 mt-1" style="font-size:12px;">
              <!-- dark Logo text -->
              SMK BINA PUTERA NUSANTARA

            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>

          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $user['nama'];
                ?>
                <?php $foto = $user['foto'];
                ?>

                <img src="<?= base_url('assets/images/profil/' . $foto) ?>" alt="user" class="rounded-circle"
                  style="width: 35px; height: 35px; object-fit: cover;">

              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="<?= base_url('user/profil') ?>"><i
                    class="mdi mdi-account-settings-variant me-1 ms-1"></i>Profile</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i
                    class="fas fa-sign-out-alt me-1 ms-1"></i> Keluar</a>

              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('home') ?>"
                aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Home</span></a>
            </li>

            <?php foreach ($menu as $row):
              $nama_menu_db = $row['nama_menu'];

              if ($nama_menu_db == "User") {
                $nama_menu_display = "Guru";
              } else if ($nama_menu_db == "Staff") {
                $nama_menu_display = "Staff Tata Usaha";
              } else {
                $nama_menu_display = $nama_menu_db;
              }
              ?>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                  aria-expanded="false"><i class="<?= $row['menu_icon']; ?>"></i><span
                    class="hide-menu"><?= $nama_menu_display ?>
                  </span></a>
                <ul aria-expanded="false" class="collapse first-level">
                  <?php
                  $this->load->model('User_model');
                  $id_menu = $row['id'];


                  $query_sub_menu = $this->db->query("SELECT * FROM user_sub_menu JOIN user_menu ON user_sub_menu.id_menu=user_menu.id WHERE user_sub_menu.id_menu = '$id_menu' AND is_active=1 ORDER BY user_sub_menu.no_urut")->result_array();

                  foreach ($query_sub_menu as $sub_menu):
                    ?>
                    <li class="sidebar-item">
                      <a href="<?= base_url($sub_menu['url']) ?>" class="sidebar-link"><i
                          class="<?= $sub_menu['icon']; ?>"></i><span class="hide-menu"><?= $sub_menu['judul'];
                            ?></span></a>
                    </li>

                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endforeach; ?>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('login/logout') ?>"
                aria-expanded="false"><i class="fas fa-sign-out-alt"></i><span class="hide-menu">Keluar</span></a>
            </li>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">

        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?= $judul ?></h4> <br>


            <div class="ms-auto text-end">

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <?php if ($judul == 'Home'): ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><?= $judul ?></a></li>
                  <?php else: ?>
                    <?php if ($judul == 'Manage Akses'): ?>
                      <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?= base_url('level') ?>">Manage Level</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul ?>
                      </li>
                    <?php else: ?>
                      <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul ?>
                      <?php endif; ?>
                    </li>

                  <?php endif; ?>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->