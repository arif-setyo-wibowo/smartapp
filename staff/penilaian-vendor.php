<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Vendor</h4>
  
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
                     Penilaian Vendor
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
                            <td>
                                <a href="penilaian-vendor-edit.php?id=1" class="btn btn-info btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <a href="penilaian-vendor-detail.php?id=1" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Detail
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
            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <form action="" method="POST">
                <div class="form-floating form-floating-outline mb-4">
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" required>
                        <option selected disabled value="">Pilih Vendor</option>
                            <option value="A">Vendor A</option>
                            <option value="B">Vendor B</option>
                    </select>
                    <label for="vendor-name">Nama Vendor</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="job-title" name="judul_pekerjaan" value="otomatis mengikuti vendor yang dipilih" readonly required/>
                    <label for="job-title">Judul Pekerjaan</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="date" class="form-control" id="date" name="tanggal" placeholder="Tanggal" required/>
                    <label for="date">Tanggal</label>
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
                                    "Spesifikasi dan delivery time Barang/Jasa sesuai dengan yang dipersyaratkan dalam Kontrak
                                    <br>Ketentuan perhitungan kinerja dilaksanakan sebagai berikut:
                                    <br>Untuk Pengadaan Barang:
                                    <br>1) Penilaian kinerja dilaksanakan saat pembuatan Goods Receipt (GR)
                                    <br>2) Dalam hal pengadaan barang dengan syarat penyerahan partial delivery atau Call Of Order (COO) dan barang tersebut bukan merupakan kesatuan yang saling terkait, maka Penilaian Kinerja dilaksanakan pada setiap pembuatan Goods Receipt (GR) partial maupun Final GR
                                    <br>3) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem Catalog maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada Pelaksana OA Catalog atau setiap Order kepada Pelaksana Kontak e-Catalog;
                                    <br>Untuk Pengadaan Jasa:
                                    <br>1) Penilaian kinerja dilaksanakan saat pembuatan Service Acceptance (SA) Final
                                    <br>2) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem Catalog maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada Pelaksana OA Catalog atau setiap Order kepada Pelaksana Kontak e-Catalog;"
                                </td>
                                <td>5</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak adalah ≥ 90%.</td>
                                <td>10</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak adalah < 90%.</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak, namun belum mencapai denda maksimal.
                                <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada butir nomor II. 1 di atas"</td>
                                <td>-15</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Terlambat menyerahkan Jaminan terkait Pengadaan Barang/Jasa (apabila dipersyaratkan).</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Terlambat menyampaikan penyesuaian atas Jaminan Pengadaan Barang/Jasa dalam hal terdapat perubahan Kontrak.</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak dan telah mencapai denda maksimal.
                                <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada butir nomor II. 1 di atas."</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>"Melaksanakan pekerjaan yang performance-nya tidak sesuai sebagaimana ditetapkan dalam Kontrak, namun Fungsi Pengguna masih mentolerir pekerjaan tersebut"</td>
                                <td>-30</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang berkaitan dengan pekerjaan (baik yang berada dalam tanggungjawabnya langsung/ yang di subcontract-kan) dan yang berdampak terhadap salah satu kriteria berikut:
                                <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang mengakibatkan penanganan dan perawatan korban melebihi P3K antara lain: Medical Treatment Cases/ pembatasan kerja atau pemindahan tugas (restricted work days atau transfer to another job).
                                <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/ tanah dengan jumlah: 1 ≤ tumpahan minyak < 5 Bbls.
                                <br>c. Kerusakan dan/atau kehilangan properti Pertamina sehingga menyebabkan kerugian langsung terhadap Pertamina sebesar: USD 10.000 ≤ Property Damage < USD 100.000."</td>
                                <td>-45</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Tidak menyelesaikan pekerjaan baik sebagian atau seluruhnya sebagaimana ditetapkan dalam Kontrak</td>
                                <td>-60</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>Tidak melaksanakan kegiatan pemeliharaan selama masa pemeliharaan.</td>
                                <td>-60</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Tidak melaksanakan pelayanan purna jual (after sales service) pada masa garansi.</td>
                                <td>-60</td>
                                <td><input class="form-check-input m-auto" type="checkbox" value="" aria-label="Checkbox for following text input"></td>
                                <td><textarea name="" id=""></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row">13</th>
                                <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang berkaitan dengan pekerjaan dan yang berdampak terhadap salah satu kriteria berikut:
                                <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang mengakibatkan penanganan dan perawatan korban dengan kategori “Hari kerja hilang (Day away from work)”.
                                <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/ tanah dengan jumlah: 5 ≤ tumpahan minyak < 15 Bbls.
                                <br>c. Kerusakan dan/atau kehilangan properti Pertamina sehingga menyebabkan kerugian langsung terhadap Pertamina sebesar USD 100.000 ≤ Property Damage < USD 1.000.000."</td>
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