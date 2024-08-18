<?php
session_start();
$title = "SMARTPPA Admin | Dashboard";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}
?>
<?php include 'header.php'; ?>


<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Dashboard</h4>
  <div class="row">
    <div class="mb-4">
        <div class="card">
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
          <div class="card-body">
            <h5 class="card-header">Ranking Penilaian Calon Vendor</h5>
            <div class="table-responsive ">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>1</td>
                    <td><a href="form-ranking.php?id=1" class="btn btn-text-dark waves-effect waves-light">Jasa Lainnya</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><a href="form-ranking.php?id=1" class="btn btn-text-dark waves-effect waves-light">Jasa A</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php include 'footer.php'; ?>