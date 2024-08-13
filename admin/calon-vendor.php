<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Data Calon Vendor</h4>
  
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
                            <td><button class="btn btn-success">Pelaksana Project</button></td>
                            <td>
                                <a href="calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
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
                            <td>70</td>
                            <td>P</td>
                            <td>Jasa  Tera  Ulang  dan  Kalibrasi  Peralatan  Produksi  dan  Tangki  Timbun</td>
                            <td>10/03/2023</td>
                            <td><button class="btn btn-danger">Penawar gagal</button></td>
                            <td>
                                <a href="calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
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
                            <td><button class="btn btn-warning">Menunggu Seleksi </button></td>
                            <td>
                                <a href="calon-vendor-edit.php?id=1" class="btn btn-info btn-sm mt-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <a href="calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm mt-1">
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
            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <form action="" method="POST">
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="vendor-name" name="nama_vendor" placeholder="Nama Vendor" required/>
                    <label for="vendor-name">Nama Vendor</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                        <option selected disabled value="">Pilih Project</option>
                            <option value="A">Project A</option>
                            <option value="B">Project B</option>
                    </select>
                    <label for="vendor-name">Pilih Project</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="process-stage" name="tahapan_proses" placeholder="Tahapan Proses" required/>
                    <label for="process-stage">Tahapan Proses</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="date" class="form-control" id="date" name="tanggal" placeholder="Tanggal" required/>
                    <label for="date">Tanggal</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" class="form-control" id="oe" name="oe" placeholder="OE" required/>
                    <label for="oe">OE</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" class="form-control" id="offer" name="penawaran" placeholder="Penawaran" required/>
                    <label for="offer">Penawaran</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="efficiency" name="efisiensi" readonly value="((OE-Penawaran)/OE)x100" required/>
                    <label for="efficiency">Efisiensi</label>
                </div>

                    <div class="card">
                        <div class="table-responsive text-nowrap">
                        <style>
                            .table td {
                                word-wrap: break-word; /* Ensures long words wrap */
                                white-space: normal; /* Allows text to wrap to the next line */
                            }
                        </style>

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Point</th>
                                    <th>Pilihan *)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    "Mendaftar dalam Pemilihan Penyedia dan dinyatakan lulus tahap penilaian kualifikasi umum dan khusus (jika ada).
                                    <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                                </td>
                                <td>3</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi administrasi.
                                    <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                                </td>
                                <td>3</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi teknis dan HSSE Plan.
                                    <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                                </td>
                                <td>3</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi komersial.
                                    <br>(*) Hal ini berlaku untuk pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                                </td>
                                <td>3</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>Ditunjuk sebagai Pelaksana Kontrak dan telah menandatangani Kontrak</td>
                                <td>10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran dengan memberikan keterangan tertulis.</td>
                                <td>-10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>Terlambat menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran sehingga tidak dapat diterima oleh Fungsi Pengadaan.</td>
                                <td>-10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran tanpa memberikan keterangan tertulis.</td>
                                <td>-20</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    "Tidak menghadiri pembukaan Dokumen Penawaran.
                                    <br>(*) Hal ini berlaku apabila Dokumen Tender mensyaratkan kehadiran dalam pembukaan Dokumen Penawaran."
                                </td>
                                <td>-10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>
                                    "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid meeting, klarifikasi, negosiasi, dll) tanpa penjelasan tertulis yang dapat diterima oleh Fungsi Pengadaan.
                                    <br>(*) khusus pengenaan sanksi terkait kewajiban kehadiran saat pre- bid meeting/aanswizjing hanya dapat dilaksanakan dalam hal telah diatur tegas dalam Dokumen Tender."
                                </td>
                                <td>-15</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid meeting, klarifikasi, negosiasi, dll) dengan memberikan penjelasan tertulis yang dapat diterima oleh Fungsi Pengadaan."
                                </td>
                                <td>-5</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">12</th>
                                <td>
                                    "Tidak memberikan penjelasan/tanggapan secara tertulis pada waktu yang ditetapkan oleh Fungsi Pengadaan dalam rangka pelaksanaan pemilhan Penyedia."
                                </td>
                                <td>-10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">13</th>
                                <td>Terlambat menghadiri pelaksanaan negosiasi manual.</td>
                                <td>-5</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">14</th>
                                <td>
                                    "Terlambat menyampaikan Dokumen Penegasan Penawaran setelah negosiasi beserta rincian (apabila dipersyaratkan) sesuai ketentuan yang diatur dalam Dokumen Tender."
                                </td>
                                <td>-10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">15</th>
                                <td>
                                    "Terlambat menandatangani Kontrak sesuai jadwal yang ditentukan dalam Dokumen Tender tanpa pemberitahuan tertulis yang dapat diterima."
                                </td>
                                <td>-15</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">16</th>
                                <td>Peserta Pemilihan mengajukan sanggahan yang terbukti tidak benar.</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">17</th>
                                <td>Peserta Pemilihan membatalkan penawaran yang telah diajukan.</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">18</th>
                                <td>
                                    "Calon Pemenang Pemilihan membatalkan penawaran yang telah diajukan sebelum penunjukan Pemenang."
                                </td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <th scope="row">19</th>
                                <td>
                                    "Pemenang Pemilihan membatalkan penawaran yang telah diajukan setelah ditunjuk sebagai Pemenang."
                                </td>
                                <td>-60</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>

                            <tr>
                                <td colspan="2">Total Point</td>
                                <td>56</td>
                            </tr>
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                </form>
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