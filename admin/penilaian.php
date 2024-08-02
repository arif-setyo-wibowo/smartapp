<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian</h4>

    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header">Filter</h5>
            <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-sm-12 pe-0 mb-md-0 mb-2">
                <label>Kategori</label>
                <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                    <option selected disabled value="">Pilih Kategori</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                </select>
                </div>
                <div class="col-md-4 col-sm-12 pe-0 mb-md-0 mb-2">
                <label>Project</label>
                <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                    <option selected disabled value="">Pilih Project</option>
                        <option value="A">Project A</option>
                        <option value="B">Project B</option>
                </select>
                </div>
                <div class="col-md-4 col-sm-12">
                <label>&nbsp;</label>
                <button class="clipboard-btn btn btn-primary me-2 waves-effect waves-light w-100" data-clipboard-action="copy" data-clipboard-target="#clipboard-example">
                    Cari
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>
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
                     Penilaian
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
                            <th>Judul Pengadaan</th>
                            <th>Project</th>
                            <th>Kategori Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pengadaan ...</td>
                            <td>Penilaian Calon Vendor</td>
                            <td>Q</td>
                            <td>
                                <a href="penilaian_edit.php" class="btn btn-info btn-sm">
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
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Pengadaan" required/>
                        <label for="basic-default-fullname">Judul Pengadaan</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Kategori" required/>
                        <label for="basic-default-fullname">Kategori</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Project" required/>
                        <label for="basic-default-fullname">Nama project</label>
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
