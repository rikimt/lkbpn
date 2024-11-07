<style>
    /* CSS untuk tampilan desktop */
    .thumbnail-image {
        width: 50px;
        height: auto;
        object-fit: cover;
        border-radius: 5px;
    }

    /* CSS untuk tampilan layar kecil */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1.15rem;
        }

        .btn-sm {
            font-size: 0.85rem;
            padding: 0.4rem 0.6rem;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            font-size: 0.85rem;
        }

        /* Memperkecil gambar thumbnail */
        .thumbnail-image {
            width: 40px;
        }
    }
</style>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Guru Aktif</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2" data-bs-toggle="modal"
                        data-bs-target="#tambah-guru-modal">
                        <i class="fas fa-plus"></i><span class="ms-1">Tambah Guru</span>
                    </a>
                    <?= $this->session->flashdata('message_sub_menu'); ?>
                    <?php foreach (['kode_guru', 'nama', 'email', 'no_hp', 'username', 'password', 'id_level', 'id_tugas_tambahan', 'foto', 'status_aktif'] as $error_field): ?>
                        <?= form_error($error_field, '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?php endforeach; ?>
                </div>

                <!-- Tabel Data Guru Aktif -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Kode Guru</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Tugas Tambahan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Level Akses</th>
                                <th scope="col">Tanggal Perubahan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_guru_aktif as $guru_aktif): ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="<?= base_url('assets/images/profil/') . $guru_aktif['foto']; ?>"
                                            alt="Foto Guru" class="thumbnail-image"></td>
                                    <td><?= $guru_aktif['kode_guru']; ?></td>
                                    <td><?= $guru_aktif['nama']; ?></td>
                                    <td><?= $guru_aktif['email']; ?></td>
                                    <td><?= $guru_aktif['username']; ?></td>
                                    <td><?= $guru_aktif['nama_tugas']; ?></td>
                                    <td><?= $guru_aktif['jabatan']; ?></td>
                                    <td><?= $guru_aktif['level']; ?></td>
                                    <td><?= $guru_aktif['tanggal_dibuat']; ?></td>
                                    <td>
                                        <?php
                                        $id_level_session = $this->session->userdata('id_level');
                                        if ($id_level_session == 1): ?>
                                            <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                                data-bs-target="#edit-guru-modal<?= $guru_aktif['id']; ?>">
                                                <i class="fas fa-edit"></i><span class="ms-1">Edit
                                                </span>
                                            </a>
                                            <a class="btn btn-danger btn-sm text-white <?= $guru_aktif['id_level'] == 1 ? 'disabled' : '' ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#off-guru-modal<?= $guru_aktif['id']; ?>">
                                                <i class="fas fa-window-close"></i><span class="ms-1">Off
                                                </span>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-success btn-sm text-white <?= $guru_aktif['id_level'] == 1 ? 'disabled' : '' ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit-guru-modal<?= $guru_aktif['id']; ?>">
                                                <i class="fas fa-edit"></i><span class="ms-1">Edit</span>
                                            </a>
                                            <a class="btn btn-danger btn-sm text-white <?= $guru_aktif['id_level'] == 1 ? 'disabled' : '' ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#off-guru-modal<?= $guru_aktif['id']; ?>">
                                                <i class="fas fa-window-close"></i><span class="ms-1">Off</span>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Data Guru Tidak Aktif -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Guru Tidak Aktif</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" id="myTable2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Kode Guru</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Tugas Tambahan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Level Akses</th>
                                <th scope="col">Tanggal Perubahan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_guru_tidak_aktif as $guru_tidak_aktif): ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="<?= base_url('assets/images/profil/') . $guru_tidak_aktif['foto']; ?>"
                                            alt="Foto Guru" class="thumbnail-image"></td>
                                    <td><?= $guru_tidak_aktif['kode_guru']; ?></td>
                                    <td><?= $guru_tidak_aktif['nama']; ?></td>
                                    <td><?= $guru_tidak_aktif['email']; ?></td>
                                    <td><?= $guru_tidak_aktif['username']; ?></td>
                                    <td><?= $guru_tidak_aktif['nama_tugas']; ?></td>
                                    <td><?= $guru_tidak_aktif['jabatan']; ?></td>
                                    <td><?= $guru_tidak_aktif['level']; ?></td>
                                    <td><?= $guru_tidak_aktif['tanggal_dibuat']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#on-guru-modal<?= $guru_tidak_aktif['id']; ?>">
                                            <i class="fas fa-check-square"></i><span class="ms-1">On</span>
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#delete-guru-modal<?= $guru_tidak_aktif['id']; ?>">
                                            <i class="fas fa-trash"></i><span class="ms-1">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
            <form action="<?= base_url('staff/guru'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-guru-modal-label">Tambah Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="kode_guru" class="form-label">Kode guru*</label>
                        <input type="text" class="form-control" id="kode_guru" name="kode_guru"
                            placeholder="Kode Guru...">
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
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password...">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan*</label>

                        <select class="form-select" name="id_jabatan" id="jabatan">
                            <?php foreach ($data_jabatan as $jabatan): ?>
                                <option value="<?= $jabatan['id']; ?>"><?= $jabatan['jabatan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level*</label>

                        <select class="form-select" name="id_level" id="level">
                            <?php foreach ($data_level as $level): ?>
                                <option value="<?= $level['id']; ?>"><?= $level['level']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tugas_tambahan" class="form-label">Tugas Tambahan</label>

                        <select class="form-select" name="id_tugas_tambahan" id="tugas_tambahan">
                            <?php foreach ($data_tugas_tambahan as $tugas_tambahan): ?>
                                <option value="<?= $tugas_tambahan['id']; ?>"><?= $tugas_tambahan['nama_tugas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <input type="hidden" name="status_aktif" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit_guru">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Data Guru -->
<?php foreach ($data_guru_aktif as $guru_aktif): ?>
    <div class="modal fade" id="edit-guru-modal<?= $guru_aktif['id']; ?>" tabindex="-1"
        aria-labelledby="edit-guru-modal-label<?= $guru_aktif['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('staff/edit_guru'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-guru-modal-label<?= $guru_aktif['id']; ?>">Edit Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_guru" value="<?= $guru_aktif['id']; ?>">
                        <input type="hidden" name="old_password" value="<?= $guru_aktif['password']; ?>">
                        <input type="hidden" name="old_foto" value="<?= $guru_aktif['foto']; ?>">

                        <div class="mb-3">
                            <label for="kode_guru<?= $guru_aktif['username']; ?>" class="form-label">Kode Guru*</label>
                            <input type="text" class="form-control" id="kode_guru<?= $guru_aktif['username']; ?>"
                                name="kode_guru" value="<?= $guru_aktif['kode_guru']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama<?= $guru_aktif['nama']; ?>" class="form-label">Nama*</label>
                            <input type="text" class="form-control" id="nama<?= $guru_aktif['nama']; ?>" name="nama"
                                value="<?= $guru_aktif['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email<?= $guru_aktif['email']; ?>" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email<?= $guru_aktif['email']; ?>" name="email"
                                value="<?= $guru_aktif['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp<?= $guru_aktif['no_hp']; ?>" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="no_hp<?= $guru_aktif['no_hp']; ?>" name="no_hp"
                                value="<?= $guru_aktif['no_hp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username<?= $guru_aktif['username']; ?>" class="form-label">Username*</label>
                            <input type="text" class="form-control" id="username<?= $guru_aktif['username']; ?>"
                                name="username" value="<?= $guru_aktif['username']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password<?= $guru_aktif['username']; ?>" class="form-label">Password (kosongkan jika
                                tidak ingin mengubah)</label>
                            <input type="password" class="form-control" id="password<?= $guru_aktif['username']; ?>"
                                name="password" placeholder="Password....(kosongkan jika tidak ingin mengubah)">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan<?= $guru_aktif['username']; ?>" class="form-label">Jabatan*</label>
                            <select class="form-select" name="id_jabatan" id="jabatan<?= $guru_aktif['username']; ?>">
                                <?php foreach ($data_jabatan as $jabatan): ?>
                                    <option value="<?= $jabatan['id']; ?>" <?= ($jabatan['id'] == $guru_aktif['id_jabatan']) ? 'selected' : ''; ?>>
                                        <?= $jabatan['jabatan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="level<?= $guru_aktif['username']; ?>" class="form-label">Level*</label>
                            <select class="form-select" name="id_level" id="level<?= $guru_aktif['username']; ?>">
                                <?php foreach ($data_level as $level): ?>
                                    <option value="<?= $level['id']; ?>" <?= ($level['id'] == $guru_aktif['id_level']) ? 'selected' : ''; ?>>
                                        <?= $level['level']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="tugas_tambahan<?= $guru_aktif['username']; ?>" class="form-label">Tugas
                                Tambahan</label>
                            <select class="form-select" name="id_tugas_tambahan"
                                id="tugas_tambahan<?= $guru_aktif['username']; ?>">
                                <?php foreach ($data_tugas_tambahan as $tugas): ?>
                                    <option value="<?= $tugas['id']; ?>" <?= ($tugas['id'] == $guru_aktif['id_tugas_tambahan']) ? 'selected' : ''; ?>>
                                        <?= $tugas['nama_tugas']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="foto<?= $guru_aktif['username']; ?>" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto<?= $guru_aktif['username']; ?>" name="foto">
                            <img src="<?= base_url('assets/images/profil/' . $guru_aktif['foto']); ?>" width="100"
                                class="mt-2">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="edit_guru" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- Modal off menu -->
<?php foreach ($data_guru_aktif as $guru_aktif): ?>
    <div class="modal fade" id="off-guru-modal<?= $guru_aktif['id']; ?>" tabindex="-1"
        aria-labelledby="off-guru-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="off-guru-modal-label">Nonaktifkan Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/off_guru'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $guru_aktif['nama']; ?>" name="nama">
                            <input type="hidden" value="<?= $guru_aktif['id']; ?>" name="id">
                            <input type="hidden" value="0" name="status_aktif">
                            <p class="fw-bolder">Yakin nonaktifkan Guru <?= $guru_aktif['nama']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="off_guru">Off</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal on guru -->
<?php foreach ($data_guru_tidak_aktif as $guru_tidak_aktif): ?>
    <div class="modal fade" id="on-guru-modal<?= $guru_tidak_aktif['id']; ?>" tabindex="-1"
        aria-labelledby="on-guru-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="on-guru-modal-label">Aktifkan Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/on_guru'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $guru_tidak_aktif['nama']; ?>" name="nama">
                            <input type="hidden" value="<?= $guru_tidak_aktif['id']; ?>" name="id">
                            <input type="hidden" value="1" name="status_aktif">
                            <p class="fw-bolder">Yakin Aktifkan Guru <?= $guru_tidak_aktif['nama']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" name="on_guru">On</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- Modal hapus menu -->
<?php foreach ($data_guru_tidak_aktif as $guru_tidak_aktif): ?>
    <div class="modal fade" id="delete-guru-modal<?= $guru_tidak_aktif['id']; ?>" tabindex="-1"
        aria-labelledby="delete-guru-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-guru-modal-label">Hapus Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/delete_guru'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $guru_tidak_aktif['nama']; ?>" name="nama">
                            <input type="hidden" value="<?= $guru_tidak_aktif['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin Hapus Guru <?= $guru_tidak_aktif['nama']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_guru">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>