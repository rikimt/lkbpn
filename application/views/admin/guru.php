<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <h4 class="page-title">Selamat Datang <?= $user['nama']; ?></h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Guru Aktif</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2" data-bs-toggle="modal"
                        data-bs-target="#tambah-guru-modal">
                        <i class=" fas fa-plus"><span class="ms-1">Tambah Guru</span></i>
                    </a>
                    <?= $this->session->flashdata('message_sub_menu'); ?>
                    <?= form_error('kode_guru', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('no_hp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('id_level', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('id_tugas_tambahan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('foto', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('status_aktif
                    
                    
                       ', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                </div>
                <table class="table table-border table-hover text-center w-100 p-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Kode Guru</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Tugas Tambahan</th>
                            <th scope="col">Tanggal Daftar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_guru_aktif as $guru_aktif):

                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>

                                <td><img src="<?= base_url('assets/images/') . $guru_aktif['foto']; ?>" alt="" srcset=""
                                        width="50px">
                                </td>

                                <td><?= $guru_aktif['kode_guru']; ?></td>
                                <td><?= $guru_aktif['nama']; ?></td>
                                <td><?= $guru_aktif['email']; ?></td>
                                <td><?= $guru_aktif['username']; ?></td>
                                <td><?= $guru_aktif['level']; ?></td>
                                <td><?= $guru_aktif['nama_tugas']; ?></td>
                                <td><?= $guru_aktif['tanggal_dibuat']; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-guru-modal<?= $guru_aktif['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#off-guru-modal<?= $guru_aktif['id']; ?>">
                                        <i class="fas fa-window-close"><span class="ms-1">Off</span></i>
                                    </a>

                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>

                    </tbody>
                </table>
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Guru Tidak Aktif</h5>
                </div>
                <table class="table table-border table-hover text-center w-100 p-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Kode Guru</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Tugas Tambahan</th>
                            <th scope="col">Tanggal Daftar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_guru_tidak_aktif as $guru_tidak_aktif):

                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><img src="<?= base_url('assets/images/') . $guru_tidak_aktif['foto']; ?>" alt=""
                                        srcset="" class="w-25 ">
                                </td>
                                <td><?= $guru_tidak_aktif['kode_guru']; ?></td>
                                <td><?= $guru_tidak_aktif['nama']; ?></td>
                                <td><?= $guru_tidak_aktif['email']; ?></td>
                                <td><?= $guru_tidak_aktif['username']; ?></td>
                                <td><?= $guru_tidak_aktif['level']; ?></td>
                                <td><?= $guru_tidak_aktif['nama_tugas']; ?></td>
                                <td><?= $guru_tidak_aktif['tanggal_dibuat']; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-guru-modal<?= $guru_tidak_aktif['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#off-guru-modal<?= $guru_tidak_aktif['id']; ?>">
                                        <i class="fas fa-window-close"><span class="ms-1">Off</span></i>
                                    </a>

                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



<!-- Modal tambah menu -->
<div class="modal fade" id="tambah-guru-modal" tabindex="-1" aria-labelledby="tambah-guru-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-guru-modal-label">Tambah Guru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/guru'); ?>" method="post">
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="kode_guru" class="form-label">Kode guru*</label>
                        <input type="text" class="form-control" id="kode_guru" name="kode_guru" placeholder="Kode Guru...">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama*</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama...">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email...">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP.....">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username*</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username...">
                    </div >
                    <div class="mb-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
                    </div >
                    <div class="mb-3">
                        <label for="id_level" class="form-label">Jabatan*</label>
                        <input type="text" class="form-control" id="id_level" name="id_level" placeholder="level...">
                    </div >
                    <div class="mb-3">
                        <label for="id_tugas_tambahan" class="form-label">Tugas Tambahan</label>
                        <input type="text" class="form-control" id="id_tugas_tambahan" name="id_tugas_tambahan" placeholder="tugas tambahan...">
                    </div >
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="bukti">
                    </div>
                    <div class="mb-3">
                        <label for="status_aktif" class="form-label">Status Aktif*</label>
                        <input type="text" class="form-control" id="status_aktif" name="status_aktif" placeholder="Status Aktif...">
                    </div >
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_guru">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>