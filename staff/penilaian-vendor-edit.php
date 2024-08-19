<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php');
    exit();
}

$title = 'Edit Penilaian Vendor';

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_vendor = intval($_POST['id_vendor']);
        $tanggal = $_POST['tanggal'];

        $points = [];
        $keterangan = [];
        $total_point = 0;

        for ($i = 1; $i <= 13; $i++) {
            $points[$i] = isset($_POST["point_$i"]) ? intval($_POST["point_$i"]) : 0;
            $keterangan[$i] = $koneksi->real_escape_string($_POST["keterangan_$i"]);
            $total_point += $points[$i];
        }

        // Query SQL untuk memperbarui data
        $sql = "UPDATE pk_staff 
        SET tanggal='$tanggal', 
            total_point='$total_point', 
            point_1='{$points[1]}',
            keterangan_1='{$keterangan[1]}',
            point_2='{$points[2]}',
            keterangan_2='{$keterangan[2]}',
            point_3='{$points[3]}',
            keterangan_3='{$keterangan[3]}',
            point_4='{$points[4]}',
            keterangan_4='{$keterangan[4]}',
            point_5='{$points[5]}',
            keterangan_5='{$keterangan[5]}',
            point_6='{$points[6]}',
            keterangan_6='{$keterangan[6]}',
            point_7='{$points[7]}',
            keterangan_7='{$keterangan[7]}',
            point_8='{$points[8]}',
            keterangan_8='{$keterangan[8]}',
            point_9='{$points[9]}',
            keterangan_9='{$keterangan[9]}',
            point_10='{$points[10]}',
            keterangan_10='{$keterangan[10]}',
            point_11='{$points[11]}',
            keterangan_11='{$keterangan[11]}',
            point_12='{$points[12]}',
            keterangan_12='{$keterangan[12]}',
            point_13='{$points[13]}',
            keterangan_13='{$keterangan[13]}',
            status_nilai='1'
        WHERE id_vendor=$id_vendor";

        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Vendor berhasil dinilai!';
        } else {
            $_SESSION['error'] = 'Vendor gagal dinilai!';
        }

        header('Location: penilaian-vendor.php');
        exit();
    } else {
        $id_vendor = intval($_GET['id']);
        $sql = "SELECT pk.*, p.nama_project, c.nama_vendor FROM pk_staff pk JOIN project p ON pk.id_project = p.id_project JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor WHERE id_vendor = $id_vendor";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $vendor = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['error'] = 'Project tidak ditemukan!';
            header('Location: penilaian-vendor.php');
            exit();
        }
    }
} else {
    header('Location: penilaian-vendor.php');
    exit();
}

?>


<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Ubah Penilaian Vendor</h4>

    <div class="card mb-4">
        <div class="card-header p-0">

            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Ubah Data
                        </button>
                    </li>
                    <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                    <form action="" method="POST">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
                            <input type="text" class="form-control" id="vendor-name" name="nama_vendor"
                                placeholder="Nama Vendor" value="<?= $vendor['nama_vendor'] ?>" readonly />
                            <label for="vendor-name">Nama Vendor</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="job-title" name="judul_pekerjaan"
                                value="<?= $vendor['nama_project'] ?>" readonly />
                            <label for="job-title">Judul Pekerjaan</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="date" name="tanggal"
                                placeholder="Tanggal" value="<?= date('Y-m-d', strtotime($vendor['tanggal'])) ?>" required />
                            <label for="date">Tanggal</label>
                        </div>

                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <style>
                                    .table td {
                                        word-wrap: break-word;
                                        /* Ensures long words wrap */
                                        white-space: normal;
                                        /* Allows text to wrap to the next line */
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
                                                "Spesifikasi dan delivery time Barang/Jasa sesuai dengan yang
                                                dipersyaratkan dalam Kontrak
                                                <br>Ketentuan perhitungan kinerja dilaksanakan sebagai berikut:
                                                <br>Untuk Pengadaan Barang:
                                                <br>1) Penilaian kinerja dilaksanakan saat pembuatan Goods Receipt (GR)
                                                <br>2) Dalam hal pengadaan barang dengan syarat penyerahan partial
                                                delivery atau Call Of Order (COO) dan barang tersebut bukan merupakan
                                                kesatuan yang saling terkait, maka Penilaian Kinerja dilaksanakan pada
                                                setiap pembuatan Goods Receipt (GR) partial maupun Final GR
                                                <br>3) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem
                                                Catalog maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada
                                                Pelaksana OA Catalog atau setiap Order kepada Pelaksana Kontak
                                                e-Catalog;
                                                <br>Untuk Pengadaan Jasa:
                                                <br>1) Penilaian kinerja dilaksanakan saat pembuatan Service Acceptance
                                                (SA) Final
                                                <br>2) Dalam hal pengadaan dengan metode e-Purchasing melalui Sistem
                                                Catalog maka Penilaian Kinerja dilaksanakan untuk setiap COO kepada
                                                Pelaksana OA Catalog atau setiap Order kepada Pelaksana Kontak
                                                e-Catalog;"
                                            </td>
                                            <td>5</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_1'] ? 'checked' : ''?> name="point_1" value="5"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_1" id=""><?= $vendor['keterangan_1'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak
                                                adalah ≥ 90%.</td>
                                            <td>10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_2'] ? 'checked' : ''?> name="point_2" value="10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_2" id=""><?= $vendor['keterangan_2'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Hasil Final Evaluation terkait HSSE Plan selama pelaksanaan Kontrak
                                                adalah < 90%.</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_3'] ? 'checked' : ''?> name="point_3" value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_3" id=""><?= $vendor['keterangan_3'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak,
                                                namun belum mencapai denda maksimal.
                                                <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada
                                                butir nomor II. 1 di atas"
                                            </td>
                                            <td>-15</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_4'] ? 'checked' : ''?> name="point_4" value="-15"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_4" id=""><?= $vendor['keterangan_4'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Terlambat menyerahkan Jaminan terkait Pengadaan Barang/Jasa (apabila
                                                dipersyaratkan).</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_5'] ? 'checked' : ''?> name="point_5" value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_5" id=""><?= $vendor['keterangan_5'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Terlambat menyampaikan penyesuaian atas Jaminan Pengadaan Barang/Jasa
                                                dalam hal terdapat perubahan Kontrak.</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_6'] ? 'checked' : ''?> name="point_6" value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_6" id=""><?= $vendor['keterangan_6'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>"Terlambat menyelesaikan pekerjaan sebagaimana diatur dalam Kontrak dan
                                                telah mencapai denda maksimal.
                                                <br>(*) Ketentuan perhitungan kinerja dilaksanakan dengan mengacu pada
                                                butir nomor II. 1 di atas."
                                            </td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_7'] ? 'checked' : ''?> name="point_7" value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_7" id=""><?= $vendor['keterangan_7'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>"Melaksanakan pekerjaan yang performance-nya tidak sesuai sebagaimana
                                                ditetapkan dalam Kontrak, namun Fungsi Pengguna masih mentolerir
                                                pekerjaan tersebut"</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_8'] ? 'checked' : ''?> name="point_8" value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_8" id=""><?= $vendor['keterangan_8'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang
                                                berkaitan dengan pekerjaan (baik yang berada dalam tanggungjawabnya
                                                langsung/ yang di subcontract-kan) dan yang berdampak terhadap salah
                                                satu kriteria berikut:
                                                <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang
                                                mengakibatkan penanganan dan perawatan korban melebihi P3K antara lain:
                                                Medical Treatment Cases/ pembatasan kerja atau pemindahan tugas
                                                (restricted work days atau transfer to another job).
                                                <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/
                                                tanah dengan jumlah: 1 ≤ tumpahan minyak < 5 Bbls. <br>c. Kerusakan
                                                    dan/atau kehilangan properti Pertamina sehingga menyebabkan kerugian
                                                    langsung terhadap Pertamina sebesar: USD 10.000 ≤ Property Damage <
                                                        USD 100.000."</td>
                                            <td>-45</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_9'] ? 'checked' : ''?> name="point_9" value="-45"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_9" id=""><?= $vendor['keterangan_9'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">10</th>
                                            <td>Tidak menyelesaikan pekerjaan baik sebagian atau seluruhnya sebagaimana
                                                ditetapkan dalam Kontrak</td>
                                            <td>-60</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_10'] ? 'checked' : ''?> name="point_10" value="-60"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_10" id=""><?= $vendor['keterangan_10'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">11</th>
                                            <td>Tidak melaksanakan kegiatan pemeliharaan selama masa pemeliharaan.</td>
                                            <td>-60</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_11'] ? 'checked' : ''?> name="point_11" value="-60"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_11" id=""><?= $vendor['keterangan_11'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12</th>
                                            <td>Tidak melaksanakan pelayanan purna jual (after sales service) pada masa
                                                garansi.</td>
                                            <td>-60</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_12'] ? 'checked' : ''?> name="point_12" value="-60"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_12" id=""><?= $vendor['keterangan_12'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">13</th>
                                            <td>"Terbukti berdasarkan hasil investigasi menyebabkan kecelakaan yang
                                                berkaitan dengan pekerjaan dan yang berdampak terhadap salah satu
                                                kriteria berikut:
                                                <br>a. Luka/ cedera/ sakit yang berkaitan dengan pekerjaan yang
                                                mengakibatkan penanganan dan perawatan korban dengan kategori “Hari
                                                kerja hilang (Day away from work)”.
                                                <br>b. Pencemaran lingkungan berupa tumpahan minyak ke sungai/ laut/
                                                tanah dengan jumlah: 5 ≤ tumpahan minyak < 15 Bbls. <br>c. Kerusakan
                                                    dan/atau kehilangan properti Pertamina sehingga menyebabkan kerugian
                                                    langsung terhadap Pertamina sebesar USD 100.000 ≤ Property Damage <
                                                        USD 1.000.000."</td>
                                            <td>-60</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" <?= $vendor['point_13'] ? 'checked' : ''?> name="point_13" value="-60"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_13" id=""><?= $vendor['keterangan_13'] ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Nilai</button>
                        <a href="penilaian-vendor.php"><button type="button"
                                class="btn btn-danger mt-3">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
