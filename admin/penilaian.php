<?php
session_start();
$title = 'SMARTPPA Admin | Penilaian';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian</h4>

    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header">Filter</h5>
            <div class="card-body">
            <div class="row">
                <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                    <label>Kategori</label>
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                        <option selected disabled value="">Pilih Kategori</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                    </select>
                </div>
                <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                    <label>Project</label>
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                        <option selected disabled value="">Pilih Project</option>
                            <option value="A">Project A</option>
                            <option value="B">Project B</option>
                    </select>
                </div>
                <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                    <label>Project</label>
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                        <option selected disabled value="">Pilih Jenis Penilaian </option>
                            <option value="A">Penilaian Kinerja Vendor FPP</option>
                            <option value="A">Penilaian Kinerja Vendor Staff</option>
                            <option value="A">Penilaian Calon Vendor Staff</option>
                    </select>
                </div>
                <div class="col col-md-3 col-sm-6">
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

            <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false" tabindex="-1">
                     Penilaian
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
                            <th>Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pengadaan ...</td>
                            <td>Penilaian Calon Vendor</td>
                            <td>Q</td>
                            <td>90</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- / Content -->
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
