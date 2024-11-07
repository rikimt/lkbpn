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
                    <h5 class="card-title mb-0">Data Tugas Tambahan</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2">
                        <i class=" fas fa-plus"><span class="ms-1" data-bs-toggle="modal"
                                data-bs-target="#tambah-tugas-modal">Tambah Tugas Tambahan</span></i>
                    </a>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_error('nama_tugas_tambahan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                </div>
                <table class="table table-border table-hover text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tugas Tambahan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datatugas as $tugas): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $tugas['nama_tugas']; ?></td>
                                <td>

                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-tugas-modal<?= $tugas['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-tugas-modal<?= $tugas['id']; ?>">
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

<!-- Modal tambah tugas -->
<div class="modal fade" id="tambah-tugas-modal" tabindex="-1" aria-labelledby="tambah-tugas-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-tugas-modal-label">Tambah Tugas Tambahan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('staff/tugas_tambahan'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Tugas Tambahan"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            name="nama_tugas_tambahan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_tugas_tambahan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit tugas -->
<?php foreach ($datatugas as $tugas): ?>
    <div class="modal fade" id="edit-tugas-modal<?= $tugas['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-tugas-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-tugas-modal-label">Edit Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/tugas_tambahan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Kegiatan"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="nama_tugas_tambahan" value="<?= $tugas['nama_tugas']; ?>">
                            <input type="hidden" name="id" value="<?= $tugas['id']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_tugas_tambahan">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal hapus tugas -->
<?php foreach ($datatugas as $tugas): ?>
    <div class="modal fade" id="delete-tugas-modal<?= $tugas['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-tugas-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-tugas-modal-label">Hapus Tugas Tambahan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/tugas_tambahan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $tugas['nama_tugas']; ?>" name="nama_tugas_tambahan">
                            <input type="hidden" value="<?= $tugas['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data tugas tambahan <?= $tugas['nama_tugas']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_tugas_tambahan">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>