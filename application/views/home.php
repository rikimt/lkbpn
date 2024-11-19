<div class="container-fluid">
  <div class="alert alert-info" role="alert">
    <h4 class="page-title">Selamat Datang <?= $user['nama']; ?></h4>
  </div>
  <!-- ============================================================== -->
  <!-- Sales Cards  -->
  <!-- ============================================================== -->
  <div class="row">
    <?= $this->session->flashdata('message'); ?>


    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
      <a href="<?= base_url('user/kinerja') ?>">
        <div class="card card-hover">
          <div class="box bg-success text-center">
            <h1 class="font-light text-white">
              <i class="fas fa-pencil-alt"></i>
              <h6 class="text-white">Data Kegiatan</h6>
            </h1>
          </div>
        </div>
      </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
      <a href="<?= base_url('user/profil') ?>">
        <div class="card card-hover">
          <div class="box bg-info text-center">
            <h1 class="font-light text-white">
              <i class="fa-solid fa-user"></i>
              <h6 class="text-white">Profil</h6>
            </h1>
          </div>
        </div>
      </a>
    </div>

  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->