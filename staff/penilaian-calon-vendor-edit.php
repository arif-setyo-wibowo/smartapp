<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span>Penilaian Calon Vendor</h4>
  
  <div class="card mb-4">
        <div class="card-header p-0">

          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                      Memberikan Nilai
                    </button>
                  </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                <form action="" method="POST">
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="vendor-name" name="nama_vendor" placeholder="Nama Vendor" readonly/>
                    <label for="vendor-name">Nama Vendor</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <select class="selectpicker w-100" data-style="btn-default" name="idcabor" data-live-search="true" readonly>
                        <option selected disabled value="">Pilih Project</option>
                            <option value="A">Project A</option>
                            <option value="B">Project B</option>
                    </select>
                    <label for="vendor-name">Pilih Project</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="process-stage" name="tahapan_proses" placeholder="Tahapan Proses" readonly/>
                    <label for="process-stage">Tahapan Proses</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="date" class="form-control" id="date" name="tanggal" placeholder="Tanggal" readonly/>
                    <label for="date">Tanggal</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" class="form-control" id="oe" name="oe" placeholder="OE" readonly/>
                    <label for="oe">OE</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" class="form-control" id="offer" name="penawaran" placeholder="Penawaran" readonly/>
                    <label for="offer">Penawaran</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="efficiency" name="efisiensi" readonly value="((OE-Penawaran)/OE)x100" />
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
                    <button type="submit" class="btn btn-primary mt-3">Update Nilai</button>
                    
                    <a href="penilaian-calon-vendor.php" class="btn btn-danger mt-3">Batal</a>
                </form>
            </div>
          </div>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>