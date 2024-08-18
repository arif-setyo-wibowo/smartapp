<?php
session_start();

$title = "Dashboard SMARTPPA | FPP ";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['fpp'])) {
    header('Location: ../login_fpp.php'); 
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Dashboard</h4>
  <?php if (isset($_SESSION['msg'])): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Success!',
                            text: '<?php echo $_SESSION['msg']; ?>',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'btn btn-primary waves-effect waves-light'
                            },
                            buttonsStyling: false
                        });
                    });
                </script>
                <?php unset($_SESSION['msg']); endif; ?>
  <div class="toast-container position-relative">
      <div class="bs-toast toast fade hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="mdi mdi-home me-2"></i>
          <div class="me-auto fw-medium">Bootstrap</div>
          <small class="text-muted">11 mins ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Hello, world! This is a toast message.</div>
      </div>

      <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="mdi mdi-bootstrap text-primary me-2"></i>
          <div class="me-auto fw-medium">Divisi A</div>
          <small class="text-muted">11 menit yang lalu</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Beri Nilai Project A <br><br>
          <a href="penilaian-kinerja-vendor?id=1.php" class="btn btn-secondary clear">Klik disini</a>
        </div>
      </div>

    </div>
</div>
<?php include 'footer.php'; ?>