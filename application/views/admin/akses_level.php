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
                    <h5 class="card-title mb-0">Level : <?= $nama_level['level']; ?></h5>

                    <?= $this->session->flashdata('message_level'); ?>

                </div>
                <table class="table table-border table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($datamenu as $menu): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $menu['nama_menu']; ?></td>
                                <td>
                                    <div class="form-check d-flex align-items-center justify-content-center">
                                        <input class="form-check-input " type="checkbox" value=""
                                            <?= cek_akses($nama_level['id'], $menu['id']) ?>
                                            data-level="<?= $nama_level['id']; ?>" data-menu="<?= $menu['id']; ?>">

                                    </div>
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