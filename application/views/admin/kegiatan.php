<style>
    /* CSS untuk tampilan desktop */
    .card {
        margin: 20px auto;
        /* Mengatur margin card */
        max-width: 800px;
        /* Membatasi lebar maksimum card */
    }

    .table th,
    .table td {
        padding: 1rem;
        /* Mengatur padding pada tabel */
    }

    /* CSS untuk tampilan layar kecil */
    @media (max-width: 768px) {
        .card {
            width: 90%;
            /* Memastikan card memenuhi lebar layar pada perangkat kecil */
            margin: 10px auto;
            /* Mengatur margin pada perangkat kecil */
        }

        .table th,
        .table td {
            padding: 0.5rem;
            /* Memperkecil padding untuk tabel */
            font-size: 0.85rem;
            /* Memperkecil ukuran font untuk tabel */
        }

        .form-check-input {
            transform: scale(1.2);
            /* Memperbesar ukuran checkbox */
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
                    <h5 class="card-title mb-0">Data Kegiatan</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2">
                        <i class=" fas fa-plus"><span class="ms-1" data-bs-toggle="modal"
                                data-bs-target="#tambah-level-modal">Tambah Kegiatan</span></i>
                    </a>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_error('nama_kegiatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                </div>
                <table class="table table-border table-hover text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datakegiatan as $kegiatan): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $kegiatan['nama_kegiatan']; ?></td>
                                <td>

                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-level-modal<?= $kegiatan['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-level-modal<?= $kegiatan['id']; ?>">
                                        <i class="fas fa-trash"><span class="ms-1">Delete</span></i>
                                    </a>
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
                <h1 class="modal-title fs-5" id="tambah-level-modal-label">Tambah Kegiatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/kegiatan'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Kegiatan"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            name="nama_kegiatan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_kegiatan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($datakegiatan as $kegiatan): ?>
    <!-- Modal edit level -->
    <div class="modal fade" id="edit-level-modal<?= $kegiatan['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-level-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-level-modal-label">Edit Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/kegiatan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Kegiatan"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="nama_kegiatan" value="<?= $kegiatan['nama_kegiatan']; ?>">
                            <input type="hidden" name="id" value="<?= $kegiatan['id']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_kegiatan">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datakegiatan as $kegiatan): ?>
    <!-- Modal hapus level -->
    <div class="modal fade" id="delete-level-modal<?= $kegiatan['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-level-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-level-modal-label">Hapus Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/kegiatan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $kegiatan['nama_kegiatan']; ?>" name="nama_kegiatan">
                            <input type="hidden" value="<?= $kegiatan['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data kegiatan <?= $kegiatan['nama_kegiatan']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_kegiatan">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>