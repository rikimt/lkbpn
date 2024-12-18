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