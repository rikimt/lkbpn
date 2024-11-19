<div class="container-fluid">

  <!-- ============================================================== -->
  <!-- Sales Cards  -->
  <!-- ============================================================== -->
  <div class="row">


    <?= $this->session->flashdata('message'); ?>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
      <div class="card mx-auto">

        <div class="modal-header">
          <h4>Perbulan</h4>
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
                <Option value="1" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Januari") ? "selected" : ""; ?>>Januari
                </Option>
                <Option value="2" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Februari") ? "selected" : ""; ?>>Februari
                </Option>
                <Option value="3" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Maret") ? "selected" : ""; ?>>Maret
                </Option>
                <Option value="4" <?php echo (nama_bulan_indo(date('Y-m-d')) == "April") ? "selected" : ""; ?>>April
                </Option>
                <Option value="5" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Mei") ? "selected" : ""; ?>>Mei
                </Option>
                <Option value="6" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Juni") ? "selected" : ""; ?>>Juni
                </Option>
                <Option value="7" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Juli") ? "selected" : ""; ?>>Juli
                </Option>
                <Option value="8" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Agustus") ? "selected" : ""; ?>>Agustus
                </Option>
                <Option value="9" <?php echo (nama_bulan_indo(date('Y-m-d')) == "September") ? "selected" : ""; ?>>
                  September
                </Option>
                <Option value="10" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Oktober") ? "selected" : ""; ?>>Oktober
                </Option>
                <Option value="11" <?php echo (nama_bulan_indo(date('Y-m-d')) == "November") ? "selected" : ""; ?>>
                  November
                </Option>
                <Option value="12" <?php echo (nama_bulan_indo(date('Y-m-d')) == "Desember") ? "selected" : ""; ?>>
                  Desember</Option>
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
            <button type="submit" class="btn btn-primary" name="submit_bulan">Download</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
      <div class="card mx-auto">

        <div class="modal-header">
          <h4>Pertanggal</h4>
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
            <button type="submit" class="btn btn-primary" name="submit_tanggal">Download</button>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->