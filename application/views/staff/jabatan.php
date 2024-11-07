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
                                data-bs-target="#tambah-jabatan-modal">Tambah Jabatan</span></i>
                    </a>
                    <?= $this->session->flashdata('message_jabatan'); ?>
                    <?= form_error('nama_jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                </div>
                <table class="table table-border table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datajabatan as $jabatan): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $jabatan['jabatan']; ?></td>
                                <td>

                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-jabatan-modal<?= $jabatan['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>

                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-jabatan-modal<?= $jabatan['id']; ?>">
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

<!-- Modal tambah jabatan -->
<div class="modal fade" id="tambah-jabatan-modal" tabindex="-1" aria-labelledby="tambah-jabatan-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-jabatan-modal-label">Tambah Jabatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('staff/jabatan'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama jabatan"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            name="nama_jabatan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_jabatan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($datajabatan as $jabatan): ?>
    <!-- Modal edit jabatan -->
    <div class="modal fade" id="edit-jabatan-modal<?= $jabatan['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-jabatan-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-jabatan-modal-label">Edit jabatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/jabatan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama jabatan"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="nama_jabatan" value="<?= $jabatan['jabatan']; ?>">
                            <input type="hidden" name="id" value="<?= $jabatan['id']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_jabatan">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datajabatan as $jabatan): ?>
    <!-- Modal hapus jabatan -->
    <div class="modal fade" id="delete-jabatan-modal<?= $jabatan['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-jabatan-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-jabatan-modal-label">Hapus jabatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('staff/jabatan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $jabatan['jabatan']; ?>" name="nama_jabatan">
                            <input type="hidden" value="<?= $jabatan['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data jabatan <?= $jabatan['jabatan']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_jabatan">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>