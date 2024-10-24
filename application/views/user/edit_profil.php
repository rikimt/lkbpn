<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="card col-6">
            <div class="card-body">
                <?= $this->session->flashdata('message_level'); ?>

            </div>
            <?= form_open_multipart('user/edit_profil'); ?>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                        readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?= $user['username']; ?>" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>

                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?= set_value('nama', $user['nama']); ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <div class="col-sm-5">
                        <input type="hidden" name="user_foto" value="<?= $user['foto']; ?>">

                        <img src="<?= base_url('assets/images/') . $user['foto']; ?>" alt="notFound"
                            class="img-thumbnail">

                    </div>
                    <div class="col-sm-7">

                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
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