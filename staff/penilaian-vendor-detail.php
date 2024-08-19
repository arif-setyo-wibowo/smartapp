<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php');
    exit();
}

$title = 'Detail Penilaian Vendor';

include '../koneksi.php';
if (isset($_GET['id'])) {
    $id_vendor = intval($_GET['id']);
    $sql = "SELECT pk.*, p.nama_project, k.nama_kategori, c.nama_vendor FROM pk_staff pk JOIN project p ON pk.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor WHERE id_vendor = $id_vendor";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $vendor = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = 'Project tidak ditemukan!';
        header('Location: penilaian-vendor.php');
        exit();
    }
} else {
    header('Location: penilaian-vendor.php');
    exit();
}

?>

<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Detail Penilaian Vendor</h4>

    <div class="row">
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Detail Penilaian Vendor</h5>
                    <div class="table-responsive text-nowrap">
                        <style>
                            thead {
                                font-size: 20px !important;
                            }

                            th {
                                font-size: 18px !important;
                            }

                            .table td {
                                word-wrap: break-word;
                                /* Ensures long words wrap */
                                white-space: normal;
                                /* Allows text to wrap to the next line */
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
                                    vendor</td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        Judul Pekerjaan
                                    </td>
                                    <td><?= $vendor['nama_project'] ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        Tanggal
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($vendor['tanggal'])) ?></td>
                                </tr>

                            </tbody>
                        </table>

                        <h5 class="card-header">Detail Point Penilaian Vendor</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        "Spesifikasi dan delivery time Barang/Jasa sesuai dengan yang dipersyaratkan
                                        dalam Kontrak
                                        <br>Ketentuan perhitungan kinerja dilaksanakan sebagai berikut:
                                        <br>Untuk Pengadaan Barang:
                                        <br>1) Penilaian kinerja dilaksanakan saat pembuatan Goods Receipt (GR)
                                        <br>2) Dalam hal pengadaan barang dengan syarat penyerahan partial delivery atau
                                        Call Of Order (COO) dan barang tersebut bukan merupakan kesatuan yang saling
                                        terkait, maka Penilaian Kinerja dilaksanakan pada setiap pembuatan Goods Receipt
                                        (GR) partial maupun Final GR
                                        <br>3) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem Catalog
                                        maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada Pelaksana OA Catalog
                                        atau setiap Order kepada Pelaksana Kontak e-Catalog;
                                        <br>Untuk Pengadaan Jasa:
                                        <br>1) Penilaian kinerja dilaksanakan saat pembuatan Service Acceptance (SA)
                                        Final
                                        <br>2) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem Catalog
                                        maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada Pelaksana OA Catalog
                                        atau setiap Order kepada Pelaksana Kontak e-Catalog;"
                                    </td>
                                    <td><?= $vendor['point_1'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak adalah ≥
                                        90%.</td>
                                    <td><?= $vendor['point_2'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak adalah <
                                            90%.</td>
                                    <td><?= $vendor['point_3'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak, namun belum
                                        mencapai denda maksimal.
                                        <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada butir
                                        nomor II. 1 di atas"
                                    </td>
                                    <td><?= $vendor['point_4'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Terlambat menyerahkan Jaminan terkait Pengadaan Barang/Jasa (apabila
                                        dipersyaratkan).</td>
                                    <td><?= $vendor['point_5'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Terlambat menyampaikan penyesuaian atas Jaminan Pengadaan Barang/Jasa dalam hal
                                        terdapat perubahan Kontrak.</td>
                                    <td><?= $vendor['point_6'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak dan telah
                                        mencapai denda maksimal.
                                        <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada butir
                                        nomor II. 1 di atas."
                                    </td>
                                    <td><?= $vendor['point_7'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>"Melaksanakan pekerjaan yang performance-nya tidak sesuai sebagaimana ditetapkan
                                        dalam Kontrak, namun Fungsi Pengguna masih mentolerir pekerjaan tersebut"</td>
                                    <td><?= $vendor['point_8'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang berkaitan
                                        dengan pekerjaan (baik yang berada dalam tanggungjawabnya langsung/ yang di
                                        subcontract-kan) dan yang berdampak terhadap salah satu kriteria berikut:
                                        <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang mengakibatkan
                                        penanganan dan perawatan korban melebihi P3K antara lain: Medical Treatment
                                        Cases/ pembatasan kerja atau pemindahan tugas (restricted work days atau
                                        transfer to another job).
                                        <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/ tanah
                                        dengan jumlah: 1 ≤ tumpahan minyak < 5 Bbls. <br>c. Kerusakan dan/atau
                                            kehilangan properti Pertamina sehingga menyebabkan kerugian langsung
                                            terhadap Pertamina sebesar: USD 10.000 ≤ Property Damage < USD
                                                100.000."</td>
                                    <td><?= $vendor['point_9'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Tidak menyelesaikan pekerjaan baik sebagian atau seluruhnya sebagaimana
                                        ditetapkan dalam Kontrak</td>
                                    <td><?= $vendor['point_10'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Tidak melaksanakan kegiatan pemeliharaan selama masa pemeliharaan.</td>
                                    <td><?= $vendor['point_11'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Tidak melaksanakan pelayanan purna jual (after sales service) pada masa garansi.
                                    </td>
                                    <td><?= $vendor['point_12'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang berkaitan
                                        dengan pekerjaan dan yang berdampak terhadap salah satu kriteria berikut:
                                        <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang mengakibatkan
                                        penanganan dan perawatan korban dengan kategori “Hari kerja hilang (Day away
                                        from work)”.
                                        <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/ tanah
                                        dengan jumlah: 5 ≤ tumpahan minyak < 15 Bbls. <br>c. Kerusakan dan/atau
                                            kehilangan properti Pertamina sehingga menyebabkan kerugian langsung
                                            terhadap Pertamina sebesar USD 100.000 ≤ Property Damage < USD
                                                1.000.000."</td>
                                    <td><?= $vendor['point_12'] ?></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end">
                                        Total Point
                                    </td>
                                    <td><?= $vendor['total_point'] ?></td>
                                </tr>
                                <tr>
                                    <td><a href="penilaian-vendor.php" class="btn btn-danger">Kembali</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
