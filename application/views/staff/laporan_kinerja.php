<style>
    .input-group .form-control {
        width: auto;
        /* Atur lebar input sesuai kebutuhan */
    }

    .modal-dialog {
        max-width: 800px;
        /* Atur lebar maksimum modal */
    }

    .img-responsive {
        max-width: 100%;
        /* Membuat gambar responsif */
        height: auto;
        /* Mempertahankan rasio aspek gambar */
    }

    /* Media Query untuk ukuran layar lebih kecil */
    @media (max-width: 576px) {
        .img-responsive {
            max-width: 100%;
            /* Gambar tetap full width di ponsel */
        }
    }

    /* Media Query untuk ukuran layar lebih besar */
    @media (min-width: 768px) {
        .img-responsive {
            max-width: 600px;
            /* Mengatur lebar maksimum di desktop */
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
            <div class="card col-12">
                <div class="card-body">


                    <div class="row mt-2">


                        <!-- Tombol Download Laporan -->
                        <div class="col-auto mb-3">

                            <a href="<?= base_url('staff/print_pdf'); ?>" class="btn btn-success btn-sm  text-white">
                                <i class="fas fa-print"></i> Download Laporan
                            </a>

                        </div>


                    </div>



                    <?= $this->session->flashdata('message_level'); ?>
                </div>



                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Hari, Tanggal</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Bukti Kegiatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($datakinerja as $kinerja): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $kinerja['nama']; ?></td>
                                    <td><?= hari_indo($kinerja['tanggal']); ?></td>
                                    <td>
                                        <ol>
                                            <?php
                                            $uraian_list = explode(',', $kinerja['uraian']);
                                            foreach ($uraian_list as $uraian) {
                                                echo "<li>" . trim($uraian) . "</li>";
                                            }
                                            ?>
                                        </ol>
                                    </td>
                                    <td class="text-center">
                                        <img src="<?= base_url('assets/images/bukti_kegiatan/') . $kinerja['bukti']; ?>"
                                            alt="notFound" width="250px">
                                    </td>
                                    <td>
                                        <form action="<?= base_url('staff/download_kinerja_pdf_guru'); ?>" method="post">
                                            <input type="hidden" name="kode_guru" value="<?= $kinerja['kode_guru']; ?>">
                                            <input type="hidden" name="nama" value="<?= $kinerja['nama']; ?>">
                                            <input type="hidden" name="id_kinerja" value="<?= $kinerja['id']; ?>">

                                            <button type="submit" class="btn btn-primary" name="submit_laporan">
                                                <i class="fas fa-print"><span class="ms-1">Download</span></i>
                                            </button>
                                        </form>
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



<!-- Modal print bulan -->
<div class="modal fade" id="print-bulan" tabindex="-1" aria-labelledby="print-bulan-label" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Mengatur ukuran modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="print-bulan-label">Download Perbulan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('staff/download_kinerja_pdf_guru'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <select class="form-control" id="nama" name="kode_guru">
                            <?php foreach ($dataguru as $guru): ?>
                                <Option value="<?= $guru['kode_guru']; ?>"><?= $guru['nama']; ?></Option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select class="form-control" id="bulan" name="bulan">
                            <Option value="1">Januari</Option>
                            <Option value="2">Februari</Option>
                            <Option value="3">Maret</Option>
                            <Option value="4">April</Option>
                            <Option value="5">Mei</Option>
                            <Option value="6">Juni</Option>
                            <Option value="7">Juli</Option>
                            <Option value="8">Agustus</Option>
                            <Option value="9">September</Option>
                            <Option value="10">Oktober</Option>
                            <Option value="11">November</Option>
                            <Option value="12">Desember</Option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <?php
                            $currentYear = date("Y"); // Mendapatkan tahun saat ini
                            for ($year = $currentYear; $year >= 2019; $year--) {
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_bulan">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal print tanggal -->
<div class="modal fade" id="print-tanggal" tabindex="-1" aria-labelledby="print-tanggal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Mengatur ukuran modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="print-tanggal-label">Download Pertanggal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('staff/download_kinerja_pdf_guru'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <select class="form-control" id="nama" name="kode_guru">
                            <?php foreach ($dataguru as $guru): ?>
                                <Option value="<?= $guru['kode_guru']; ?>"><?= $guru['nama']; ?></Option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Dari Tanggal:</label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Sampai Tanggal:</label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_tanggal">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>