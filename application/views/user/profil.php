<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto" style="max-width: 600px;">
                <div class="card-body">
                    <?= $this->session->flashdata('message_level'); ?>
                </div>

                <div class="row justify-content-center">
                    <div class="overflow-hidden"
                        style="width: 150px; height: 150px; border-radius: 50%; border: 2px solid #ccc;">
                        <img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" alt="" class="img-fluid"
                            style="object-fit: cover; width: 170px; height: 170px;">
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <label for="kode_guru" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Kode
                        Guru</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="kode_guru"
                            value=": <?= $user['kode_guru']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <label for="nama" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Nama</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="nama"
                            value=": <?= $user['nama']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <label for="username" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Username</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="username"
                            value=": <?= $user['username']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <label for="jabatan" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Jabatan</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="jabatan"
                            value=": <?= $user['level']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <label for="tugas_tambahan" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Tugas
                        Tambahan</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="tugas_tambahan"
                            value=": <?= $user['nama_tugas']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <label for="email" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Email</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="email"
                            value=": <?= $user['email']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <label for="no_hp" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Nomor HP</label>
                    <div class="col-8 col-md-6">
                        <input type="text" readonly class="form-control-plaintext border-bottom" id="no_hp"
                            value=": <?= $user['no_hp']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <label for="password" class="col-4 col-md-3 col-lg-2 col-form-label border-bottom">Password</label>
                    <div class="col-8 col-md-6">
                        <a href="<?= base_url('user/edit_password'); ?>" class="btn btn-primary w-100">Ubah Password</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <a href="<?= base_url('user/edit_profil'); ?>" class="btn btn-info col-8 col-md-6 mt-3"><i
                            class="mdi mdi-account-edit"></i> <span class="ms-1">Ubah Profil</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->