<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="card col-6">
            <div class="mb-3 row">
                <?= $this->session->flashdata('message'); ?>

            </div>
            <form action="<?= base_url('user/edit_password'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="password_lama" class="form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                        <input type="password" class="form-control" id="password_lama" name="password_lama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password_baru" class="form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                        <input type="password" class="form-control" id="password_baru" name="password_baru">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password_baru_konfirmasi" class="form-label">Konfirmasi Password
                        Baru</label>
                    <div class="col-sm-10">
                        <?= form_error('password_baru_konfirmasi', '<small class="text-danger">', '</small>'); ?>

                        <input type="password" class="form-control" id="password_baru_konfirmasi"
                            name="password_baru_konfirmasi">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </form>



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