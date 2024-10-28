<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Sub Menu Aktif</h5>
                    <a class="btn btn-primary btn-sm text-white mt-2" data-bs-toggle="modal"
                        data-bs-target="#tambah-sub-menu-modal">
                        <i class=" fas fa-plus"><span class="ms-1">Tambah Sub Menu</span></i>
                    </a>
                    <?= $this->session->flashdata('message_sub_menu'); ?>
                    <?= form_error('judul', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                </div>
                <table class="table table-border table-hover text-center w-100 p-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu Untuk</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Link</th>
                            <th scope="col">Icon</th>
                            <th scope="col">No Urut</th>
                            <th scope="col">Status Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_sub_menu_aktif as $sub_menu):
                            $is_active = $sub_menu['is_active'];
                            if ($is_active == 1) {
                                $status_aktif = 'Aktif';
                            } else {
                                $status_aktif = 'Tidak Aktif';
                            }
                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sub_menu['nama_menu']; ?></td>
                                <td><?= $sub_menu['judul']; ?></td>
                                <td><?= $sub_menu['url']; ?></td>
                                <td><?= $sub_menu['icon']; ?></td>
                                <td><?= $sub_menu['no_urut']; ?></td>
                                <td><?= $status_aktif; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-sub-menu-modal<?= $sub_menu['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#off-sub-menu-modal<?= $sub_menu['id']; ?>">
                                        <i class="fas fa-window-close"><span class="ms-1">Off</span></i>
                                    </a>

                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>

                    </tbody>
                </table>
                <div class="card-body">
                    <h5 class="card-title mb-0">Data Sub Menu Tidak Aktif</h5>
                </div>
                <table class="table table-border table-hover text-center w-100 p-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu Untuk</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Link</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Status Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_sub_menu_tidak_aktif as $sub_menu):
                            $is_active = $sub_menu['is_active'];
                            if ($is_active == 1) {
                                $status_aktif = 'Aktif';
                            } else {
                                $status_aktif = 'Tidak Aktif';
                            }
                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sub_menu['nama_menu']; ?></td>
                                <td><?= $sub_menu['judul']; ?></td>
                                <td><?= $sub_menu['url']; ?></td>
                                <td><?= $sub_menu['icon']; ?></td>
                                <td><?= $status_aktif; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white">
                                        <i class="fas fa-check-square"><span class="ms-1" data-bs-toggle="modal"
                                                data-bs-target="#on-sub-menu-modal<?= $sub_menu['id']; ?>">On</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-sub-menu-modal<?= $sub_menu['id']; ?>">
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
<div class="modal fade" id="tambah-sub-menu-modal" tabindex="-1" aria-labelledby="tambah-sub-menu-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-sub-menu-modal-label">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/manage_sub_menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect01" name="id_menu">
                            <option selected>Menu untuk...</option>
                            <?php foreach ($datamenu as $row): ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Judul" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="judul">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="URL" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="url">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Icon" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="icon">
                        <input type="hidden" name="no_urut" value="<?= $no_urut['no_urut'] + 1; ?>">
                    </div>
                    <input type="hidden" name="is_active" id="" value="1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_menu">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($data_sub_menu_aktif as $menu): ?>
    <!-- Modal edit menu -->
    <div class="modal fade" id="edit-sub-menu-modal<?= $menu['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-sub-menu-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-sub-menu-modal-label">Edit Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/manage_sub_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <select class="form-select" id="inputGroupSelect01" name="id_menu">
                                <option selected>Menu untuk...</option>
                                <?php foreach ($datamenu as $row): ?>
                                    <option value="<?= $row['id']; ?>" <?php echo ($row['id'] == $menu['id_menu']) ? "selected" : ""; ?>><?= $row['nama_menu']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Judul" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="judul" value="<?= $menu['judul']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="URL" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="url" value="<?= $menu['url']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Icon" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="icon" value="<?= $menu['icon']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Icon" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="no_urut"
                                value="<?= $menu['no_urut']; ?>">
                        </div>
                        <input type="hidden" name="is_active" id="" value="1">
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">


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

<!-- Modal hapus menu -->
<?php foreach ($data_sub_menu_tidak_aktif as $menu): ?>
    <div class="modal fade" id="delete-sub-menu-modal<?= $menu['id']; ?>" tabindex="-1"
        aria-labelledby="delete-sub-menu-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-sub-menu-modal-label">Hapus Sub Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/delete_sub_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $menu['judul']; ?>" name="judul">
                            <input type="hidden" value="<?= $menu['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data menu <?= $menu['judul']; ?>?</p>
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

<!-- Modal off menu -->
<?php foreach ($data_sub_menu_aktif as $menu): ?>
    <div class="modal fade" id="off-sub-menu-modal<?= $menu['id']; ?>" tabindex="-1"
        aria-labelledby="off-sub-menu-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="off-sub-menu-modal-label">Nonaktifkan Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/off_sub_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $menu['judul']; ?>" name="judul">
                            <input type="hidden" value="<?= $menu['id']; ?>" name="id">
                            <input type="hidden" value="0" name="is_active">
                            <p class="fw-bolder">Yakin nonaktifkan sub menu <?= $menu['judul']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="off_menu">Off</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data_sub_menu_tidak_aktif as $menu): ?>
    <!-- Modal on menu -->
    <div class="modal fade" id="on-sub-menu-modal<?= $menu['id']; ?>" tabindex="-1"
        aria-labelledby="on-sub-menu-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="on-sub-menu-modal-label">Aktifkan Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/on_sub_menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $menu['judul']; ?>" name="judul">
                            <input type="hidden" value="<?= $menu['id']; ?>" name="id">
                            <input type="hidden" value="1" name="is_active">
                            <p class="fw-bolder">Yakin aktifkan sub menu <?= $menu['judul']; ?>?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" name="on_menu">On</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>