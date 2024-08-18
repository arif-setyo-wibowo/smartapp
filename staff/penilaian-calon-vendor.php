
<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user']) && !isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php'); 
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Calon Vendor</h4>
  
  <div class="card mb-4">
        <div class="card-header p-0">
          <!-- Success Alert -->
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

            <!-- Error Alert -->
            <?php if (isset($_SESSION['error'])): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '<?php echo $_SESSION['error']; ?>',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
            <?php unset($_SESSION['error']); endif; ?>

            <!-- Validation Errors Alert -->
            <?php if (!empty($errors)): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        html: '<?php echo implode("<br>", $errors); ?>',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
            <?php endif; ?>


          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false" tabindex="-1">
                     Calon Vendor
                    </button>
                  </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Vendor</th>
                            <th>Total Penilaian</th>
                            <th>Kategori</th>
                            <th>Judul Pekerjaan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PT Hukaru Inti Persada</td>
                            <td>70</td>
                            <td>P</td>
                            <td>Jasa  Tera  Ulang  dan  Kalibrasi  Peralatan  Produksi  dan  Tangki  Timbun</td>
                            <td>10/03/2023</td>
                            <td><button class="btn btn-success">Sudah Dinilai</button></td>
                            <td>
                                <a href="penilaian-calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    Detail
                                </a>
                                <form action="" method="POST" id="delete-form" style="display: inline;">
                                    <button type="button" class="btn btn-danger btn-sm mt-1" id="confirm-text">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PT B</td>
                            <td></td>
                            <td>P</td>
                            <td>Jasa  Tera  Ulang  dan  Kalibrasi  Peralatan  Produksi  dan  Tangki  Timbun</td>
                            <td>10/03/2023</td>
                            <td><a href="penilaian-calon-vendor-edit.php?id=1"><button class="btn btn-primary">Belum dinilai</button></a></td>
                            <td>
                                <a href="penilaian-calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    Detail
                                </a>
                                <form action="" method="POST" id="delete-form" style="display: inline;">
                                    <button type="button" class="btn btn-danger btn-sm mt-1" id="confirm-text">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>PT C</td>
                            <td>70</td>
                            <td>P</td>
                            <td>Jasa  A</td>
                            <td>12/03/2023</td>
                            <td><button class="btn btn-success">Sudah Dinilai </button></td>
                            <td>
                                <a href="penilaian-calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    Detail
                                </a>
                                <form action="" method="POST" id="delete-form" style="display: inline;">
                                    <button type="button" class="btn btn-danger btn-sm mt-1" id="confirm-text">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#example1').addEventListener('click', function(event) {
        // Check if the clicked element has the ID 'confirm-text'
            if (event.target && event.target.id === 'confirm-text') {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah Yakin ingin menghapus data?',
                    text: "Data yang dihapus akan hilang!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                        cancelButton: 'btn btn-outline-secondary waves-effect'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        // Handle the form submission or deletion here
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Hapus!',
                            text: 'Data telah dihapus.',
                            customClass: {
                                confirmButton: 'btn btn-success waves-effect'
                            }
                        });
                    }
                });
            }
        });
    });

</script>
<?php include 'footer.php'; ?>