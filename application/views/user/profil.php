<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card col-6">
                <div class="card-body">
                    <?= $this->session->flashdata('message_level'); ?>

                </div>
                <div class="row justify-content-center">

                    <img src="<?= base_url('assets/images/') . $user['foto']; ?>" alt="" srcset="" class="w-25 ">
                </div>
                <div class="row justify-content-center mt-3">
                    <label for="email" class="col-sm-2 col-form-label border-bottom">Email</label>
                    <div class="col-sm-5">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="email"
                            value=": <?= $user['email']; ?>">
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <label for="nama" class="col-sm-2 col-form-label border-bottom">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="nama"
                            value=": <?= $user['nama']; ?>">
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <label for="username" class="col-sm-2 col-form-label border-bottom">Username</label>
                    <div class="col-sm-5">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="username"
                            value=": <?= $user['username']; ?>">
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <label for="password" class="col-sm-2 col-form-label border-bottom">Password</label>
                    <div class="col-sm-5">
                        : <a href="<?= base_url('user/edit_password'); ?>" class="btn btn-primary fs-6">Ubah
                            Password</a>
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <a href="<?= base_url('user/edit_profil'); ?>" class="col-3 btn btn-info fs-5 mt-2 mb-3"><i
                            class="mdi mdi-account-edit"><span class="ms-1">Ubah
                                Profil</span></i></a>

                </div>


            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->