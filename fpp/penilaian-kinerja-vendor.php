<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['fpp'])) {
    header('Location: ../login_fpp.php');
    exit();
}

$title = 'Edit Penilaian Vendor';

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_penilaian = intval($_POST['id_penilaian']);
        $quality = intval($_POST['quality']);
        $delivery = intval($_POST['delivery']);
        $service = intval($_POST['service']);
        $ratarata = intval(($quality+$delivery+$service)/3);

        // Query SQL untuk memperbarui data
        $sql = "UPDATE pk_fpp 
        SET quality='$quality', 
            delivery='$delivery', 
            service='$service',
            ratarata='$ratarata',
            status='1'
        WHERE id_penilaian=$id_penilaian";

        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Vendor berhasil dinilai!';
        } else {
            $_SESSION['error'] = 'Vendor gagal dinilai!';
        }

        header('Location: kinerja-vendor.php');
        exit();
    } else {
        $id_project = intval($_GET['id']);
        $sql = "SELECT pk.*, p.nama_project, p.id_project , k.nama_kategori, c.nama_vendor FROM pk_fpp pk JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE c.id_project = $id_project";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $vendor = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['error'] = 'Vendor tidak ditemukan!';
            header('Location: kinerja-vendor.php');
            exit();
        }
    }
} else {
    header('Location: kinerja-vendor.php');
    exit();
}

?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Kinerja Vendor</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Beri Nilai
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
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama_vendor"
                                value="<?= $vendor['nama_vendor'] ?>"
                                placeholder="Pengadaan" disabled />
                                <input type="hidden" name="id_penilaian" value="<?= $vendor['id_penilaian'] ?>">
                            <label for="basic-default-fullname">Judul Project</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori"
                                value="<?= $vendor['nama_kategori'] ?>" placeholder="Kategori" disabled />
                            <label for="basic-default-fullname">Kategori</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama_vendor"
                                value="<?= $vendor['nama_vendor'] ?>" placeholder="Kategori" disabled />
                            <label for="basic-default-fullname">Pelaksana</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="quality"
                                value="<?= $vendor['quality'] ?>" placeholder="Quality" required />
                            <label for="basic-default-fullname">Quality</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="delivery"
                                value="<?= $vendor['delivery'] ?>" placeholder="Delivery" required />
                            <label for="basic-default-fullname">Delivery</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="service"
                                value="<?= $vendor['service'] ?>" placeholder="Service" required />
                            <label for="basic-default-fullname">Service</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="kinerja-vendor.php"><button type="button" class="btn btn-danger">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
