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
        .card {
            margin: 0;
            /* Menghilangkan margin pada card di perangkat kecil */
            width: 100%;
            /* Memastikan card memenuhi lebar layar */
        }

        .table th,
        .table td {
            padding: 0.5rem;
            /* Memperkecil padding untuk tabel */
            font-size: 0.85rem;
            /* Memperkecil ukuran font untuk tabel */
        }

        .btn-sm {
            font-size: 0.85rem;
            /* Memperkecil ukuran tombol */
            padding: 0.4rem 0.6rem;
            /* Memperkecil padding tombol */
        }
    }
</style>

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
                    <h5 class="card-title mb-0">Data Jabatan</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2">
                        <i class=" fas fa-plus"><span class="ms-1" data-bs-toggle="modal"
                                data-bs-target="#tambah-level-modal">Tambah Jabatan</span></i>
                    </a>
                    <?= $this->session->flashdata('message_level'); ?>
                    <?= form_error('nama_level', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                </div>
                <table class="table table-border table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datalevel as $level): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $level['level']; ?></td>
                                <td>
                                    <?php
                                    $id_level_session = $this->session->userdata('username');
                                    if ($id_level_session == "admin"): ?>
                                        <a class="btn btn-warning btn-sm text-white" data-bs-toggle="modal"
                                            href="<?= base_url('admin/akses_level/') . $level['id']; ?>">
                                            <i class="fas fa-edit"><span class="ms-1">Akses</span></i>
                                        </a>
                                        <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#edit-level-modal<?= $level['id']; ?>">
                                            <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                        </a>
                                        <?php if ($level['level'] == "Admin"): ?>
                                            <a class="btn btn-danger btn-sm text-white disabled" data-bs-toggle="modal"
                                                data-bs-target="#delete-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-trash"><span class="ms-1">Delete</span></i>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-danger btn-sm text-white " data-bs-toggle="modal"
                                                data-bs-target="#delete-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-trash"><span class="ms-1">Delete</span></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if ($level['level'] == "Admin"): ?>
                                            <a class="btn btn-warning btn-sm text-white disabled" data-bs-toggle="modal"
                                                href="<?= base_url('admin/akses_level/') . $level['id']; ?>">
                                                <i class="fas fa-edit"><span class="ms-1">Akses</span></i>
                                            </a>
                                            <a class="btn btn-success btn-sm text-white disabled" data-bs-toggle="modal"
                                                data-bs-target="#edit-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm text-white disabled" data-bs-toggle="modal"
                                                data-bs-target="#delete-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-trash"><span class="ms-1">Delete</span></i>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-warning btn-sm text-white " data-bs-toggle="modal"
                                                href="<?= base_url('admin/akses_level/') . $level['id']; ?>">
                                                <i class="fas fa-edit"><span class="ms-1">Akses</span></i>
                                            </a>
                                            <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                                data-bs-target="#edit-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                                data-bs-target="#delete-level-modal<?= $level['id']; ?>">
                                                <i class="fas fa-trash"><span class="ms-1">Delete</span></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>

                    </tbody>
                </table>
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

<!-- Modal tambah level -->
<div class="modal fade" id="tambah-level-modal" tabindex="-1" aria-labelledby="tambah-level-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-level-modal-label">Tambah Level</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/level'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama level"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            name="nama_level">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_level">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($datalevel as $level): ?>
    <!-- Modal edit level -->
    <div class="modal fade" id="edit-level-modal<?= $level['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-level-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-level-modal-label">Edit Level</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/level'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Level"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="nama_level" value="<?= $level['level']; ?>">
                            <input type="hidden" name="id" value="<?= $level['id']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_level">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datalevel as $level): ?>
    <!-- Modal hapus level -->
    <div class="modal fade" id="delete-level-modal<?= $level['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-level-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-level-modal-label">Hapus Level</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/level'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $level['level']; ?>" name="nama_level">
                            <input type="hidden" value="<?= $level['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data level <?= $level['level']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_level">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>