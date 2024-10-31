<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="card col-12 col-md-8 col-lg-6">
            <div class="card-body">
                <?= $this->session->flashdata('message_level'); ?>
            </div>
            <?= form_open_multipart('user/edit_profil'); ?>

            <div class="mb-3 row">
                <label for="kode_guru" class="col-4 col-form-label">Kode Guru</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="kode_guru" name="kode_guru"
                        value="<?= $user['kode_guru']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="username" class="col-4 col-form-label">Username</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?= $user['username']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?= set_value('nama', $user['nama']); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="no_hp" class="col-4 col-form-label">Nomor HP</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-4 col-form-label">Foto</label>
                <div class="col-8 d-flex flex-column flex-md-row align-items-center">
                    <div class="mb-2 mb-md-0">
                        <input type="hidden" name="old_foto" value="<?= $user['foto']; ?>">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" alt="notFound"
                            class="img-thumbnail" style="width: 100px; height: auto;">
                    </div>
                    <div class="ms-md-3">
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info w-100 w-md-auto">Simpan</button>
                </div>
            </div>

            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid -->
<!-- ============================================================== -->