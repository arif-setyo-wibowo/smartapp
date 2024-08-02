<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Procurement</h4>

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
                     Procurement
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                      Tambah Data
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Joni</td>
                            <td>joni@gmail.com</td>
                            <td>12345678</td>
                            <td>
                                <a href="procurement_edit.php" class="btn btn-info btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="" method="POST" id="delete-form" style="display: inline;">
                                    
                                    <button type="button" class="btn btn-danger btn-sm" id="confirm-text">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade " id="navs-top-profile" role="tabpanel">
                <form action="{{ route('penilaian.store')}}" method="POST" >
                    
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Nama" required/>
                        <label for="basic-default-fullname">Nama</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="email" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Email" required/>
                        <label for="basic-default-fullname">Email</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" inputmode="numeric" class="form-control" id="basic-default-fullname" name="No. ID" placeholder="Project" required oninput="this.value = this.value.replace(/[^0-9]/g, '')"/>
                        <label for="basic-default-fullname">No. ID</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>

<!-- / Content -->
<script>
    document.getElementById('confirm-text').addEventListener('click', function(event) {
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
    });
</script>

<?php include 'footer.php'; ?>
