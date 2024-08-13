<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Detail Calon Vendor</h4>

  <div class="row">
    <div class="mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-header">Detail Calon Vendor</h5>
            <div class="table-responsive text-nowrap">
                <style>
                    thead{
                        font-size:20px !important;
                    }
                    th{
                        font-size:18px !important;
                    }
                    .table td {
                        word-wrap: break-word; /* Ensures long words wrap */
                        white-space: normal; /* Allows text to wrap to the next line */
                        font-size: 18px !important;
                    }

                </style>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Judul </th>
                            <th>Isi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            Nama Vendor
                        </td>
                        <td>
                        PT Hukaru Inti Persada</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>
                            Judul Pekerjaan 
                        </td>
                        <td>Jasa  Tera  Ulang  dan  Kalibrasi  Peralatan  Produksi  dan  Tangki  Timbun</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>
                            Tahapan Proses
                        </td>
                        <td>tender terbatas</td>
                    </tr>

                    <tr>
                        <th scope="row">4</th>
                        <td>
                            Tanggal 
                        </td>
                        <td>12/08/2024</td>
                    </tr>

                    <tr>
                        <th scope="row">5</th>
                        <td>OE</td>
                        <td>Rp. 90000000</td>
                    </tr>

                    <tr>
                        <th scope="row">6</th>
                        <td>Penawaran</td>
                        <td>Rp. 1000000</td>
                    </tr>

                    <tr>
                        <th scope="row">7</th>
                        <td>Eficiency</td>
                        <td>((OE-Penawaran)/OE)x100</td>
                    </tr>

                    </tbody>
                </table>

                <h5 class="card-header">Detail Point Calon Vendor</h5>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-nowrap">
                            <th width="5%">No</th>
                            <th width="70%">Deskripsi</th>
                            <th>Point</th>
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
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>
                            "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi administrasi.
                            <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                        </td>
                        <td>3</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>
                            "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi teknis dan HSSE Plan.
                            <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                        </td>
                        <td>3</td>
                    </tr>

                    <tr>
                        <th scope="row">4</th>
                        <td>
                            "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi komersial.
                            <br>(*) Hal ini berlaku untuk pemilihan Penyedia dengan metode Tender Terbuka dan Tender Terbatas."
                        </td>
                        <td>3</td>
                    </tr>

                    <tr>
                        <th scope="row">5</th>
                        <td>Ditunjuk sebagai Pelaksana Kontrak dan telah menandatangani Kontrak</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <th scope="row">6</th>
                        <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran dengan memberikan keterangan tertulis.</td>
                        <td>-10</td>
                    </tr>

                    <tr>
                        <th scope="row">7</th>
                        <td>Terlambat menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran sehingga tidak dapat diterima oleh Fungsi Pengadaan.</td>
                        <td>-10</td>
                    </tr>

                    <tr>
                        <th scope="row">8</th>
                        <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran tanpa memberikan keterangan tertulis.</td>
                        <td>-20</td>
                    </tr>

                    <tr>
                        <th scope="row">9</th>
                        <td>
                            "Tidak menghadiri pembukaan Dokumen Penawaran.
                            <br>(*) Hal ini berlaku apabila Dokumen Tender mensyaratkan kehadiran dalam pembukaan Dokumen Penawaran."
                        </td>
                        <td>-10</td>
                    </tr>

                    <tr>
                        <th scope="row">10</th>
                        <td>
                            "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid meeting, klarifikasi, negosiasi, dll) tanpa penjelasan tertulis yang dapat diterima oleh Fungsi Pengadaan.
                            <br>(*) khusus pengenaan sanksi terkait kewajiban kehadiran saat pre- bid meeting/aanswizjing hanya dapat dilaksanakan dalam hal telah diatur tegas dalam Dokumen Tender."
                        </td>
                        <td>-15</td>
                    </tr>

                    <tr>
                        <th scope="row">11</th>
                        <td>
                            "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid meeting, klarifikasi, negosiasi, dll) dengan memberikan penjelasan tertulis yang dapat diterima oleh Fungsi Pengadaan."
                        </td>
                        <td>-5</td>
                    </tr>

                    <tr>
                        <th scope="row">12</th>
                        <td>
                            "Tidak memberikan penjelasan/tanggapan secara tertulis pada waktu yang ditetapkan oleh Fungsi Pengadaan dalam rangka pelaksanaan pemilhan Penyedia."
                        </td>
                        <td>-10</td>
                    </tr>

                    <tr>
                        <th scope="row">13</th>
                        <td>Terlambat menghadiri pelaksanaan negosiasi manual.</td>
                        <td>-5</td>
                    </tr>

                    <tr>
                        <th scope="row">14</th>
                        <td>
                            "Terlambat menyampaikan Dokumen Penegasan Penawaran setelah negosiasi beserta rincian (apabila dipersyaratkan) sesuai ketentuan yang diatur dalam Dokumen Tender."
                        </td>
                        <td>-10</td>
                    </tr>

                    <tr>
                        <th scope="row">15</th>
                        <td>
                            "Terlambat menandatangani Kontrak sesuai jadwal yang ditentukan dalam Dokumen Tender tanpa pemberitahuan tertulis yang dapat diterima."
                        </td>
                        <td>-15</td>
                    </tr>

                    <tr>
                        <th scope="row">16</th>
                        <td>Peserta Pemilihan mengajukan sanggahan yang terbukti tidak benar.</td>
                        <td>-30</td>
                    </tr>

                    <tr>
                        <th scope="row">17</th>
                        <td>Peserta Pemilihan membatalkan penawaran yang telah diajukan.</td>
                        <td>-30</td>
                    </tr>

                    <tr>
                        <th scope="row">18</th>
                        <td>
                            "Calon Pemenang Pemilihan membatalkan penawaran yang telah diajukan sebelum penunjukan Pemenang."
                        </td>
                        <td>-30</td>
                    </tr>

                    <tr>
                        <th scope="row">19</th>
                        <td>
                            "Pemenang Pemilihan membatalkan penawaran yang telah diajukan setelah ditunjuk sebagai Pemenang."
                        </td>
                        <td>-60</td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" class="text-end">
                            Total Point
                        </td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            Status vendor
                        </td>
                        <td><div class="btn btn-warning">menuggu Keputusan</div></td>
                    </tr>
                    <tr>
                        <td><a href="calon-vendor.php" class="btn btn-danger">Kembali</a></td>
                    </tr>
                    </tfoot>
                    
                </table>
          </div>
        </div>
    </div>
  </div>
<?php include 'footer.php'; ?>