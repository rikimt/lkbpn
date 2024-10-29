<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer mt-3">
  <strong>Copyright RMT&copy; 2024 <a href="#">SMK BINA PUTERA NUSANTARA</a>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->



<script src="<?= base_url('assets/matriks') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/datatables') ?>/datatables.min.js"></script>


<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });


  $('.form-check-input').on('click', function () {
    const levelId = $(this).data('level');
    const menuId = $(this).data('menu');

    $.ajax({
      url: "<?= base_url('admin/ubah_akses'); ?>",
      type: "post",
      data: {
        levelId: levelId,
        menuId: menuId
      },
      success: document.location.href = "<?= base_url('admin/akses_level/'); ?>" + levelId
    });
  });
</script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/matriks') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script
  src="<?= base_url('assets/matriks') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/matriks') ?>/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/matriks') ?>/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/matriks') ?>/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="<?= base_url('assets/matriks') ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/excanvas.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/jquery.flot.time.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?= base_url('assets/matriks') ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url('assets/matriks') ?>/dist/js/pages/chart/chart-page-init.js"></script>
</body>

</html>