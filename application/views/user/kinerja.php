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
                    <h5 class="card-title mb-0">Nama : <?= $user['nama']; ?></h5>
                    <h5 class="card-title mb-0">Jabatan : <?= $user['level']; ?></h5>
                    <h5 class="card-title mb-0">Tugas Tambahan : <?= $user['nama_tugas']; ?></h5>

                    <div class="row mt-2">
                        <!-- Tombol Tambah Kegiatan -->
                        <div class="col-auto mb-3">
                            <a class="btn btn-primary btn-sm text-white">
                                <i class="fas fa-plus">
                                    <span class="ms-1" data-bs-toggle="modal"
                                        data-bs-target="#tambah-level-modal">Tambah Kegiatan</span>
                                </i>
                            </a>
                        </div>

                        <!-- Tombol Download Laporan -->
                        <div class="col-auto mb-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle text-white"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-print"></i> Download Laporan
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="ms-1" data-bs-toggle="modal"
                                                data-bs-target="#print-bulan">Perbulan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="ms-1" data-bs-toggle="modal"
                                                data-bs-target="#print-tanggal">Pertanggal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Form Pencarian -->
                        <div class="col-12 col-md-6 mb-3">
                            <form method="post" action="<?= site_url('user/kinerja'); ?>" class="mb-4">
                                <div class="input-group">
                                    <select name="search_type" class="form-select form-select-sm">
                                        <option value="uraian" <?= isset($search_type) && $search_type == 'uraian' ? 'selected' : ''; ?>>Uraian</option>
                                        <option value="tanggal" <?= isset($search_type) && $search_type == 'tanggal' ? 'selected' : ''; ?>>Tanggal</option>
                                        <option value="bulan" <?= isset($search_type) && $search_type == 'bulan' ? 'selected' : ''; ?>>Bulan</option>
                                        <option value="tahun" <?= isset($search_type) && $search_type == 'tahun' ? 'selected' : ''; ?>>Tahun</option>
                                    </select>
                                    <input type="text" class="form-control form-control-sm" name="search_query"
                                        placeholder="Cari..." value="<?= isset($search_query) ? $search_query : ''; ?>">
                                    <button class="btn btn-sm btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>



                    <?= $this->session->flashdata('message_level'); ?>
                    <?= $this->session->flashdata('error_upload'); ?>
                    <?= form_error('tanggal_input', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                </div>

                <?php foreach ($datakinerja as $kinerja): ?>
                    <div class="card mb-5">
                        <img src="<?= base_url('assets/images/bukti_kegiatan/') . $kinerja['bukti']; ?>" alt="notFound"
                            class="img-responsive" style="max-width: 100%; height: auto; width: auto;">
                        <div class="card-body">
                            <h5 class="card-title"><?= hari_indo($kinerja['tanggal']); ?></h5>
                            <p class="card-text"> Kegiatan :
                            <ol>
                                <?php
                                // Memecah uraian berdasarkan koma dan menampilkannya dalam list bernomor
                                $uraian_list = explode(',', $kinerja['uraian']);
                                foreach ($uraian_list as $uraian) {
                                    echo "<li>" . trim($uraian) . "</li>";
                                }
                                ?>
                            </ol>
                            </p>
                            <p class="card-text"><small class="text-body-secondary">
                                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit-level-modal<?= $kinerja['id']; ?>">
                                        <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete-level-modal<?= $kinerja['id']; ?>">
                                        <i class="fas fa-trash"><span class="ms-1">Hapus</span></i>
                                    </a>
                                </small></p>
                        </div>
                    </div>

                    <div style="background-color:#f0ecec;height:30px;"></div>
                <?php endforeach; ?>

                <div class="col-12 text-center">
                    <?= $pagination_links; ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
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
                                        <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#edit-level-modal<?= $kinerja['id']; ?>">
                                            <i class="fas fa-edit"><span class="ms-1">Edit</span></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#delete-level-modal<?= $kinerja['id']; ?>">
                                            <i class="fas fa-trash"><span class="ms-1">Hapus</span></i>
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


<!-- Modal tambah kegiatan -->
<div class="modal fade" id="tambah-level-modal" tabindex="-1" aria-labelledby="tambah-level-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Mengatur ukuran modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambah-level-modal-label">Tambah Kegiatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/kinerja'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal_input">
                    </div>

                    <!-- Kegiatan Dinamis -->
                    <div id="kegiatan-dinamis">
                        <label for="select-kegiatan" class="form-label">Kegiatan</label>
                        <div class="input-group mb-3 kegiatan-input">
                            <select class="form-select kegiatan-select" name="kegiatan[]"
                                onchange="handleKegiatanSelectChange(this)" id="select-kegiatan">
                                <?php foreach ($datakegiatan as $kegiatan): ?>
                                    <option value="<?= $kegiatan['nama_kegiatan']; ?>"><?= $kegiatan['nama_kegiatan']; ?>
                                    </option>
                                <?php endforeach; ?>
                                <option value="lainnya">Lainnya...</option>
                            </select>
                            <input type="text" class="form-control" placeholder="Masukkan kegiatan lainnya"
                                name="kegiatan_lainnya[]" style="display: none;">
                            <button type="button" class="btn btn-outline-secondary add-kegiatan">+</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputGroupFile02" class="form-label">Bukti Kegiatan</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="bukti">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_kinerja">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Kinerja -->
<?php foreach ($datakinerja as $kinerja): ?>
    <div class="modal fade" id="edit-level-modal<?= $kinerja['id']; ?>" tabindex="-1"
        aria-labelledby="edit-level-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-level-modal-label">Edit Kinerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('user/edit_kinerja') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal<?= $kinerja['id']; ?>" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal<?= $kinerja['id']; ?>" name="tanggal_input"
                                value="<?= $kinerja['tanggal']; ?>" readonly>
                            <input type="hidden" name="id" value="<?= $kinerja['id']; ?>">
                        </div>

                        <!-- Kegiatan Dinamis -->
                        <div id="kegiatan-dinamis-edit<?= $kinerja['id']; ?>">
                            <label for="select-kegiatan-edit<?= $kinerja['id']; ?>" class="form-label">Kegiatan</label>


                            <?php
                            // Pecah uraian menjadi array berdasarkan koma
                            $kegiatan_array = explode(',', $kinerja['uraian']);
                            ?>
                            <?php foreach ($kegiatan_array as $key => $selected_kegiatan): ?>
                                <?php
                                $query_cek_kegiatan = $this->db->get_where('kinerja_kegiatan', ['nama_kegiatan' => $selected_kegiatan]);
                                if ($query_cek_kegiatan->num_rows() < 1):
                                    ?>

                                    <div class="input-group mb-3 kegiatan-input-edit">
                                        <select class="form-select kegiatan-select" name="kegiatan[]"
                                            onchange="handleKegiatanSelectChange(this)">
                                            <option value="<?= $selected_kegiatan; ?>">
                                                <?= $selected_kegiatan; ?>
                                            </option>
                                            <?php foreach ($datakegiatan as $kegiatan): ?>





                                                <option value="<?= $kegiatan['nama_kegiatan']; ?>">
                                                    <?= $kegiatan['nama_kegiatan']; ?>
                                                </option>

                                            <?php endforeach; ?>
                                            <option value="lainnya" <?= trim($selected_kegiatan) === 'lainnya' ? 'selected' : ''; ?>>
                                                Lainnya...
                                            </option>
                                        </select>

                                        <input type="text" class="form-control" placeholder="Masukkan kegiatan lainnya"
                                            name="kegiatan_lainnya[]"
                                            value="<?= trim($selected_kegiatan) === 'lainnya' ? '' : ''; ?>"
                                            style="<?= trim($selected_kegiatan) === 'lainnya' ? '' : 'display:none'; ?>">
                                        <button type="button" class="btn btn-outline-secondary add-kegiatan-edit"
                                            data-id="<?= $kinerja['id']; ?>">+</button>

                                    </div>
                                <?php else: ?>
                                    <div class="input-group mb-3 kegiatan-input-edit">
                                        <select class="form-select kegiatan-select" name="kegiatan[]"
                                            onchange="handleKegiatanSelectChange(this)">
                                            <?php foreach ($datakegiatan as $kegiatan): ?>





                                                <option value="<?= $kegiatan['nama_kegiatan']; ?>"
                                                    <?= trim($selected_kegiatan) == $kegiatan['nama_kegiatan'] ? 'selected' : ''; ?>>
                                                    <?= $kegiatan['nama_kegiatan']; ?>
                                                </option>

                                            <?php endforeach; ?>
                                            <option value="lainnya" <?= trim($selected_kegiatan) === 'lainnya' ? 'selected' : ''; ?>>
                                                Lainnya...
                                            </option>
                                        </select>

                                        <input type="text" class="form-control" placeholder="Masukkan kegiatan lainnya"
                                            name="kegiatan_lainnya[]"
                                            value="<?= trim($selected_kegiatan) === 'lainnya' ? '' : ''; ?>"
                                            style="<?= trim($selected_kegiatan) === 'lainnya' ? '' : 'display:none'; ?>">
                                        <button type="button" class="btn btn-outline-secondary add-kegiatan-edit"
                                            data-id="<?= $kinerja['id']; ?>">+</button>
                                        <button type="button" class="btn btn-outline-danger remove-kegiatan-edit"
                                            style="display: <?= $key > 0 ? 'inline' : 'none'; ?>">-</button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>



                        <!-- Bukti Kegiatan -->
                        <div class="mb-3">
                            <label for="bukti<?= $kinerja['id']; ?>" class="form-label">Bukti Kegiatan</label>
                            <input type="file" class="form-control" id="bukti<?= $kinerja['id']; ?>" name="bukti">
                            <small class="form-text text-muted">Jika ingin mengganti bukti kegiatan, unggah file baru. Jika
                                tidak, biarkan kosong.</small>
                            <img src="<?= base_url('assets/images/bukti_kegiatan/') . $kinerja['bukti']; ?>" alt="notFound"
                                width="150px" class="mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($datakinerja as $kinerja): ?>
    <!-- Modal hapus level -->
    <div class="modal fade" id="delete-level-modal<?= $kinerja['id']; ?>" tabindex="-1"
        aria-labelledby="tambah-level-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-level-modal-label">Hapus Kinerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('user/delete_kinerja'); ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?= $kinerja['tanggal']; ?>" name="tanggal_input">
                            <input type="hidden" value="<?= $kinerja['id']; ?>" name="id">
                            <p class="fw-bolder">Yakin hapus data kegiatan pada hari
                                <?= hari_indo($kinerja['tanggal']); ?>?
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="delete_kinerja">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal print bulan -->
<div class="modal fade" id="print-bulan" tabindex="-1" aria-labelledby="print-bulan-label" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Mengatur ukuran modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="print-bulan-label">Download Perbulan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/download_kinerja_pdf2'); ?>" method="post">
                <div class="modal-body">
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
            <form action="<?= base_url('user/download_kinerja_pdf2'); ?>" method="post">
                <div class="modal-body">
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

<script>
    function handleKegiatanSelectChange(selectElement) {
        const kegiatanLainnyaInput = selectElement.nextElementSibling; // Ambil input "lainnya"
        if (selectElement.value === 'lainnya') {
            kegiatanLainnyaInput.style.display = 'block'; // Tampilkan input untuk kegiatan lainnya
            kegiatanLainnyaInput.focus(); // Fokuskan input ketika ditampilkan
        } else {
            kegiatanLainnyaInput.style.display = 'none'; // Sembunyikan jika pilihan lain
            kegiatanLainnyaInput.value = ''; // Kosongkan input jika dipilih kegiatan lain
        }
    }

    document.querySelector('.add-kegiatan').addEventListener('click', function () {
        const kegiatanDinamis = document.getElementById('kegiatan-dinamis');
        const newKegiatanInput = document.createElement('div');
        newKegiatanInput.className = 'input-group mb-3 kegiatan-input';

        newKegiatanInput.innerHTML = `
            <select class="form-select kegiatan-select" name="kegiatan[]"  onchange="handleKegiatanSelectChange(this)">
                <option selected>Pilih Kegiatan</option>
                <?php foreach ($datakegiatan as $kegiatan): ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="<?= $kegiatan['nama_kegiatan']; ?>"><?= $kegiatan['nama_kegiatan']; ?></option>
                <?php endforeach; ?>
                <option value="lainnya">Lainnya...</option>
            </select>
            <input type="text" class="form-control" placeholder="Masukkan kegiatan lainnya" name="kegiatan_lainnya[]" style="display: none;" >
            <button type="button" class="btn btn-outline-danger remove-kegiatan">-</button>
        `;

        kegiatanDinamis.appendChild(newKegiatanInput);

        // Event listener untuk menghapus kegiatan dinamis
        newKegiatanInput.querySelector('.remove-kegiatan').addEventListener('click', function () {
            kegiatanDinamis.removeChild(newKegiatanInput);
        });
    });

    // modal edit
    document.querySelectorAll('.add-kegiatan-edit').forEach(button => {
        button.addEventListener('click', function () {
            const id = button.getAttribute('data-id');
            const kegiatanDinamis = document.getElementById('kegiatan-dinamis-edit' + id);
            const newKegiatanInput = document.createElement('div');
            newKegiatanInput.className = 'input-group mb-3 kegiatan-input-edit';

            newKegiatanInput.innerHTML = `
                <select class="form-select kegiatan-select" name="kegiatan[]" required onchange="handleKegiatanSelectChange(this)">
                    <option value="">Pilih Kegiatan</option>
                    <?php foreach ($datakegiatan as $kegiatan): ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="<?= $kegiatan['nama_kegiatan']; ?>"><?= $kegiatan['nama_kegiatan']; ?></option>
                    <?php endforeach; ?>
                    <option value="lainnya">Lainnya...</option>
                </select>
                <input type="text" class="form-control" placeholder="Masukkan kegiatan lainnya" name="kegiatan_lainnya[]" style="display: none;">
                <button type="button" class="btn btn-outline-danger remove-kegiatan-edit">-</button>
            `;

            kegiatanDinamis.appendChild(newKegiatanInput);

            // Event listener untuk menghapus kegiatan dinamis
            newKegiatanInput.querySelector('.remove-kegiatan-edit').addEventListener('click', function () {
                kegiatanDinamis.removeChild(newKegiatanInput);
            });
        });
    });




</script>