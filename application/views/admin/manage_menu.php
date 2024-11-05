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
                    <h5 class="card-title mb-0">Data Menu</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2">
                        <i class=" fas fa-plus"><span class="ms-1" data-bs-toggle="modal"
                                data-bs-target="#tambah-menu-modal">Tambah Menu</span></i>
                    </a>
                    <?= $this->session->flashdata('message_menu'); ?>
                    <?= form_error('nama_menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                </div>
                <table class="table table-border table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datamenu as $menu): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $menu['nama_menu']; ?></td>
                                <td><?= $menu['menu_icon']; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-menu-modal<?= $menu['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-menu-modal<?= $menu['id']; ?>">
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

<!-- Modal tambah menu -->
<div class="modal fade" id="tambah-menu-modal" tabindex="-1" aria-labelledby="tambah-menu-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-menu-modal-label">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/manage_menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Menu"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            name="nama_menu">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Icon" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="icon">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_menu">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($datamenu as $menu): ?>
    <!-- Modal edit menu -->
    <div class="modal fade" id="edit-menu-modal<?= $menu['id']; ?>" tabindex="-1" aria-labelledby="tambah-menu-modal-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-menu-modal-label">Edit Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/manage_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Menu"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                name="nama_menu" value="<?= $menu['nama_menu']; ?>">
                            <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Icon" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="icon" value="<?= $menu['menu_icon']; ?>">
                            <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_menu">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datamenu as $menu): ?>
    <!-- Modal hapus menu -->
    <div class="modal fade" id="delete-menu-modal<?= $menu['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-menu-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-menu-modal-label">Hapus Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/manage_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $menu['nama_menu']; ?>" name="nama_menu">
                            <input type="hidden" value="<?= $menu['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data menu <?= $menu['nama_menu']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_menu">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>