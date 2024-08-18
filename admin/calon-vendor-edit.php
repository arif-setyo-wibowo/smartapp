<?php
session_start();
$title = 'SMARTPPA Admin | Edit Calon Vendor';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}


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

        // Query SQL untuk memperbarui data
        $sql = "UPDATE calonvendor 
        SET nama_vendor='$nama_vendor', 
            id_procurement='$id_procurement', 
            id_project='$id_project', 
            tahapan_proses='$tahapan_proses', 
            tanggal='$tanggal', 
            oe='$oe', 
            penawaran='$penawaran', 
            eficiency='$eficiency'
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
                                value="<?= $calonvendor['eficiency'] ?>%" readonly required />
                            <label for="efficiency">Efisiensi</label>
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
