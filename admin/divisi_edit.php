<?php
session_start();
$title = 'SMARTPPA Admin | Edit Divisi';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_divisi = intval($_POST['id_divisi']);
        $nama_divisi = $koneksi->real_escape_string($_POST['nama_divisi']);
        $sql = "UPDATE divisi SET nama_divisi='$nama_divisi' WHERE id_divisi=$id_divisi";

        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Divisi berhasil diperbarui!';
        } else {
            $_SESSION['error'] = 'Divisi gagal diperbarui!';
        }

        header('Location: divisi.php');
        exit();
    } else {
        $id_divisi = intval($_GET['id']);
        $sql = "SELECT * FROM divisi WHERE id_divisi = $id_divisi";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $divisi = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['error'] = 'Divisi tidak ditemukan!';
            header('Location: divisi.php');
            exit();
        }
    }
} else {
    header('Location: divisi.php');
    exit();
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Divisi</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                    Edit Data
                </button>
                </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                <form action="" method="POST" >
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="hidden" name="id_divisi" value="<?= $divisi['id_divisi'] ?>" hidden>
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_divisi" placeholder="Divisi" value="<?= $divisi['nama_divisi'] ?>" required/>
                        <label for="basic-default-fullname">Nama Divisi</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="divisi.php"><button type="button" class="btn btn-danger">Batal</button></a>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>


<?php include 'footer.php'; ?>