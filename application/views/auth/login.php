<!DOCTYPE html>
<html dir="ltr">

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
  <title>Login</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/matriks') ?>/assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="<?= base_url('assets/matriks') ?>/dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="main-wrapper">
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
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <div class="
            auth-wrapper
            d-flex
            no-block
            justify-content-center
            align-items-center
            bg-dark
            " style="height:100vh;">
        <div class="auth-box bg-dark border-top border-secondary">
          <div>
            <div class="text-center pt-3 pb-3">
              <span class="db"><img src="<?= base_url('assets/') ?>images/logosmk.png" alt="logo"
                  width="270px" /></span>
            </div>

            <!-- Form -->
            <form class="form-horizontal mt-3" action="<?= base_url('login'); ?>" method="post">
              <div class="row pb-4">
                <div class="col-12">
                  <?= $this->session->flashdata('message'); ?>
                  <?= form_error('username', '<small class="text-danger">', '</small>');
                  ; ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white h-100" id="basic-addon1"><i
                          class="mdi mdi-account fs-4"></i></span>
                    </div>
                    <div class="form-floating">
                      <input type="text" class="form-control form-control-lg" placeholder="Username"
                        aria-describedby="basic-addon1" name="username" value="<?= set_value('username'); ?>"
                        id="floatingInput" />
                      <label for="floatingInput">Username</label>
                    </div>

                  </div>
                  <?= form_error('password', '<small class="text-danger">', '</small>');
                  ; ?>
                  <div class="input-group mb-3 position-relative">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white h-100" id="basic-addon2">
                        <i class="mdi mdi-lock fs-4"></i>
                      </span>
                    </div>
                    <div class="form-floating" style="flex: 1;">
                      <input type="password" class="form-control form-control-lg pr-5" placeholder="Password"
                        name="password" aria-label="Password" aria-describedby="basic-addon1" id="floatingPassword" />
                      <label for="floatingPassword">Password</label>
                      <button type="button"
                        class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y"
                        id="togglePassword" style="right: 10px; border:none;">
                        <i class="mdi mdi-eye"></i>
                      </button>
                    </div>
                  </div>




                </div>

              </div>
          </div>
          <div class="row border-top border-secondary">
            <div class="col-12">
              <div class="form-group">
                <div class="pt-3 d-grid">
                  <button class="btn btn-block btn-lg btn-info" type="submit">
                    Masuk
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row border-top border-secondary">
            <!-- <a class="link-success" href="">Belum Punya Akun?</a>  -->
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="<?= base_url('assets/matriks') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="<?= base_url('assets/matriks') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
  </script>

  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordInput = document.getElementById('floatingPassword');
      const icon = this.querySelector('i');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('mdi-eye');
        icon.classList.add('mdi-eye-off');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('mdi-eye-off');
        icon.classList.add('mdi-eye');
      }
    });
  </script>
</body>


</html>