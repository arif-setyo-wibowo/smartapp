<?php
session_start();
$title = 'Edit Calon Vendor';

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_calonvendor = intval($_POST['id_calonvendor']);
        $nama_vendor = $koneksi->real_escape_string($_POST['nama_vendor']);
        $id_procurement = intval($_SESSION['id_procurement']);
        $id_project = intval($_POST['id_project']);
        $tahapan_proses = $koneksi->real_escape_string($_POST['tahapan_proses']);
        $tanggal = $_POST['tanggal'];
        $oe = intval($_POST['oe']);
        $penawaran = intval($_POST['penawaran']);
        $eficiency = $_POST['efisiensi'];

        $points = [];
        $keterangan = [];
        $total_point = 0;

        for ($i = 1; $i <= 19; $i++) {
            $points[$i] = isset($_POST["point_$i"]) ? intval($_POST["point_$i"]) : 0;
            $keterangan[$i] = $koneksi->real_escape_string($_POST["keterangan_$i"]);
            $total_point += $points[$i];
        }

        // Query SQL untuk memperbarui data
        $sql = "UPDATE calonvendor 
        SET nama_vendor='$nama_vendor', 
            id_procurement='$id_procurement', 
            id_project='$id_project', 
            tahapan_proses='$tahapan_proses', 
            tanggal='$tanggal', 
            oe='$oe', 
            penawaran='$penawaran', 
            eficiency='$eficiency', 
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
            point_14='{$points[14]}',
            keterangan_14='{$keterangan[14]}',
            point_15='{$points[15]}',
            keterangan_15='{$keterangan[15]}',
            point_16='{$points[16]}',
            keterangan_16='{$keterangan[16]}',
            point_17='{$points[17]}',
            keterangan_17='{$keterangan[17]}',
            point_18='{$points[18]}',
            keterangan_18='{$keterangan[18]}',
            point_19='{$points[19]}',
            keterangan_19='{$keterangan[19]}'
        WHERE id_calonvendor=$id_calonvendor";

        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Calon Vendor berhasil diperbarui!';
        } else {
            $_SESSION['error'] = 'Calon Vendor gagal diperbarui!';
        }

        header('Location: calon-vendor.php');
        exit();
    } else {
        $id_calonvendor = intval($_GET['id']);
        $sql = "SELECT * FROM calonvendor WHERE id_calonvendor = $id_calonvendor";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $calonvendor = mysqli_fetch_assoc($result);
            $dataProject = mysqli_query($koneksi, 'SELECT * FROM project WHERE status="0"');
        } else {
            $_SESSION['error'] = 'Project tidak ditemukan!';
            header('Location: calon-vendor.php');
            exit();
        }
    }
} else {
    header('Location: calon-vendor.php');
    exit();
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Edit Calon Vendor</h4>

    <div class="card mb-4">
        <div class="card-header p-0">

            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Edit Data
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
                            <input type="hidden" name="id_calonvendor" value="<?= $calonvendor['id_calonvendor'] ?>">
                            <input type="text" class="form-control" id="vendor-name" name="nama_vendor"
                                value="<?= $calonvendor['nama_vendor'] ?>" placeholder="Nama Vendor" required />
                            <label for="vendor-name">Nama Vendor</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="selectpicker w-100" data-style="btn-default" name="id_project"
                                data-live-search="true" required>
                                <option selected disabled value="">Pilih Project</option>
                                <?php while($d = mysqli_fetch_array($dataProject)) : ?>
                                <option value="<?= $d['id_project'] ?>"
                                    <?= $d['id_project'] == $calonvendor['id_project'] ? 'selected' : '' ?>>
                                    <?= $d['nama_project'] ?></option>
                                <?php endwhile;?>
                            </select>
                            <label for="vendor-name">Pilih Project</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="process-stage" name="tahapan_proses"
                                placeholder="Tahapan Proses" value="<?= $calonvendor['tahapan_proses'] ?>" required />
                            <label for="process-stage">Tahapan Proses</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="date" name="tanggal"
                                placeholder="Tanggal" value="<?= $calonvendor['tanggal'] ?>" required />
                            <label for="date">Tanggal</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="number" class="form-control" id="oe" name="oe"
                                value="<?= $calonvendor['oe'] ?>" placeholder="OE" required />
                            <label for="oe">OE</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="number" class="form-control" id="offer"
                                value="<?= $calonvendor['penawaran'] ?>" name="penawaran" placeholder="Penawaran"
                                required />
                            <label for="offer">Penawaran</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="efficiency" name="efisiensi"
                                value="<?= $calonvendor['eficiency'] ?>" readonly required />
                            <label for="efficiency">Efisiensi</label>
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
                                                "Mendaftar dalam Pemilihan Penyedia dan dinyatakan lulus tahap penilaian
                                                kualifikasi umum dan khusus (jika ada).
                                                <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender
                                                Terbuka dan Tender Terbatas."
                                            </td>
                                            <td>3</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_1"
                                                    <?= $calonvendor['point_1'] ? 'checked' : '' ?> value="3"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_1" id=""><?= $calonvendor['keterangan_1'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td>
                                                "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi
                                                administrasi.
                                                <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender
                                                Terbuka dan Tender Terbatas."
                                            </td>
                                            <td>3</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_2"
                                                    <?= $calonvendor['point_2'] ? 'checked' : '' ?> value="3"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_2" id=""><?= $calonvendor['keterangan_2'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td>
                                                "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi
                                                teknis dan HSSE Plan.
                                                <br>(*) Hal ini berlaku untuk Pemilihan Penyedia dengan metode Tender
                                                Terbuka dan Tender Terbatas."
                                            </td>
                                            <td>3</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_3"
                                                    <?= $calonvendor['point_3'] ? 'checked' : '' ?> value="3"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_3" id=""><?= $calonvendor['keterangan_3'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">4</th>
                                            <td>
                                                "Mengajukan penawaran secara lengkap dan dinyatakan lulus evaluasi
                                                komersial.
                                                <br>(*) Hal ini berlaku untuk pemilihan Penyedia dengan metode Tender
                                                Terbuka dan Tender Terbatas."
                                            </td>
                                            <td>3</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_4"
                                                    <?= $calonvendor['point_4'] ? 'checked' : '' ?> value="3"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_4" id=""><?= $calonvendor['keterangan_4'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Ditunjuk sebagai Pelaksana Kontrak dan telah menandatangani Kontrak</td>
                                            <td>10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_5"
                                                    <?= $calonvendor['point_5'] ? 'checked' : '' ?> value="10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_5" id=""><?= $calonvendor['keterangan_5'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak
                                                menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran dengan
                                                memberikan keterangan tertulis.</td>
                                            <td>-10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_6"
                                                    <?= $calonvendor['point_6'] ? 'checked' : '' ?> value="-10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_6" id=""><?= $calonvendor['keterangan_6'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Terlambat menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen
                                                Penawaran sehingga tidak dapat diterima oleh Fungsi Pengadaan.</td>
                                            <td>-10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_7"
                                                    <?= $calonvendor['point_7'] ? 'checked' : '' ?> value="-10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_7" id=""><?= $calonvendor['keterangan_7'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Mendaftar sebagai Calon Peserta Pemilihan/Peserta Pemilihan namun tidak
                                                menyampaikan Dokumen Penilaian Kualifikasi atau Dokumen Penawaran tanpa
                                                memberikan keterangan tertulis.</td>
                                            <td>-20</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_8"
                                                    <?= $calonvendor['point_8'] ? 'checked' : '' ?> value="-20"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_8" id=""><?= $calonvendor['keterangan_8'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">9</th>
                                            <td>
                                                "Tidak menghadiri pembukaan Dokumen Penawaran.
                                                <br>(*) Hal ini berlaku apabila Dokumen Tender mensyaratkan kehadiran
                                                dalam pembukaan Dokumen Penawaran."
                                            </td>
                                            <td>-10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_9"
                                                    <?= $calonvendor['point_9'] ? 'checked' : '' ?> value="-10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_9" id=""><?= $calonvendor['keterangan_9'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">10</th>
                                            <td>
                                                "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid
                                                meeting, klarifikasi, negosiasi, dll) tanpa penjelasan tertulis yang
                                                dapat diterima oleh Fungsi Pengadaan.
                                                <br>(*) khusus pengenaan sanksi terkait kewajiban kehadiran saat pre-
                                                bid meeting/aanswizjing hanya dapat dilaksanakan dalam hal telah diatur
                                                tegas dalam Dokumen Tender."
                                            </td>
                                            <td>-15</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_10"
                                                    <?= $calonvendor['point_10'] ? 'checked' : '' ?> value="-15"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_10" id=""><?= $calonvendor['keterangan_10'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">11</th>
                                            <td>
                                                "Tidak menghadiri undangan Rapat Pemilihan Penyedia (antara lain pre-bid
                                                meeting, klarifikasi, negosiasi, dll) dengan memberikan penjelasan
                                                tertulis yang dapat diterima oleh Fungsi Pengadaan."
                                            </td>
                                            <td>-5</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_11"
                                                    <?= $calonvendor['point_11'] ? 'checked' : '' ?> value="-5"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_11" id=""><?= $calonvendor['keterangan_11'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">12</th>
                                            <td>
                                                "Tidak memberikan penjelasan/tanggapan secara tertulis pada waktu yang
                                                ditetapkan oleh Fungsi Pengadaan dalam rangka pelaksanaan pemilhan
                                                Penyedia."
                                            </td>
                                            <td>-10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_12"
                                                    <?= $calonvendor['point_12'] ? 'checked' : '' ?> value="-10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_12" id=""><?= $calonvendor['keterangan_12'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">13</th>
                                            <td>Terlambat menghadiri pelaksanaan negosiasi manual.</td>
                                            <td>-5</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_13"
                                                    <?= $calonvendor['point_13'] ? 'checked' : '' ?> value="-5"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_13" id=""><?= $calonvendor['keterangan_13'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">14</th>
                                            <td>
                                                "Terlambat menyampaikan Dokumen Penegasan Penawaran setelah negosiasi
                                                beserta rincian (apabila dipersyaratkan) sesuai ketentuan yang diatur
                                                dalam Dokumen Tender."
                                            </td>
                                            <td>-10</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_14"
                                                    <?= $calonvendor['point_14'] ? 'checked' : '' ?> value="-10"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_14" id=""><?= $calonvendor['keterangan_14'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">15</th>
                                            <td>
                                                "Terlambat menandatangani Kontrak sesuai jadwal yang ditentukan dalam
                                                Dokumen Tender tanpa pemberitahuan tertulis yang dapat diterima."
                                            </td>
                                            <td>-15</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_15"
                                                    <?= $calonvendor['point_15'] ? 'checked' : '' ?> value="-15"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_15" id=""><?= $calonvendor['keterangan_15'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">16</th>
                                            <td>Peserta Pemilihan mengajukan sanggahan yang terbukti tidak benar.</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_16"
                                                    <?= $calonvendor['point_16'] ? 'checked' : '' ?> value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_16" id=""><?= $calonvendor['keterangan_16'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">17</th>
                                            <td>Peserta Pemilihan membatalkan penawaran yang telah diajukan.</td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_17"
                                                    <?= $calonvendor['point_17'] ? 'checked' : '' ?> value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_17" id=""><?= $calonvendor['keterangan_17'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">18</th>
                                            <td>
                                                "Calon Pemenang Pemilihan membatalkan penawaran yang telah diajukan
                                                sebelum penunjukan Pemenang."
                                            </td>
                                            <td>-30</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_18"
                                                    <?= $calonvendor['point_18'] ? 'checked' : '' ?> value="-30"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_18" id=""><?= $calonvendor['keterangan_18'] ?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">19</th>
                                            <td>
                                                "Pemenang Pemilihan membatalkan penawaran yang telah diajukan setelah
                                                ditunjuk sebagai Pemenang."
                                            </td>
                                            <td>-60</td>
                                            <td><input class="form-check-input m-auto" type="checkbox" name="point_19"
                                                    <?= $calonvendor['point_19'] ? 'checked' : '' ?> value="-60"
                                                    aria-label="Checkbox for following text input"></td>
                                            <td>
                                                <textarea name="keterangan_19" id=""><?= $calonvendor['keterangan_19'] ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                        <a href="calon-vendor.php"><button type="button"
                                class="btn btn-danger mt-3">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const oeInput = document.getElementById('oe');
        const offerInput = document.getElementById('offer');
        const efficiencyInput = document.getElementById('efficiency');

        function calculateEfficiency() {
            const oe = parseFloat(oeInput.value);
            const offer = parseFloat(offerInput.value);

            if (!isNaN(oe) && !isNaN(offer) && oe !== 0) {
                let efficiency = ((oe - offer) / oe) * 100;
                efficiency = Math.max(efficiency, 0);
                efficiencyInput.value = efficiency.toFixed(2);
            } else {
                efficiencyInput.value = '0';
            }
        }

        oeInput.addEventListener('input', calculateEfficiency);
        offerInput.addEventListener('input', calculateEfficiency);
    });
</script>
<?php include 'footer.php'; ?>
