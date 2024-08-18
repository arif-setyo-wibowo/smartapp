<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php');
    exit();
}

include '../koneksi.php';
if (isset($_GET['id'])) {
    $id_kategori = intval($_GET['id']);
    $sql = "SELECT * FROM kategori WHERE id_kategori = $id_kategori";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $kategori = mysqli_fetch_assoc($result);
        $title = 'Ranking Calon Vendor Kategori ' . $kategori['nama_kategori'];
        $no = 1;
        $dataProject = mysqli_query($koneksi, "SELECT * FROM project WHERE id_kategori = $id_kategori");
    } else {
        $_SESSION['error'] = 'Kategori tidak ditemukan!';
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Ranking</h4>
    <div class="row">
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Ranking Penilaian Calon Vendor</h5>
                    <div class="table-responsive ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Judul Project</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php while($d = mysqli_fetch_array($dataProject)) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kategori['nama_kategori'] ?></td>
                                    <td><?= $d['nama_project'] ?></td>
                                    <?php if ($d['status'] == 0) :?>
                                    <td><button class="btn btn-danger">Belum ada pemenang</button></td>
                                    <?php elseif ($d['status'] == 1) :?>
                                    <td><button class="btn btn-success">Sudah ada pemenang</button></td>
                                    <?php endif;?>
                                    <td>
                                        <a href="form-ranking-calon-vendor-detail.php?id=<?= $d['id_project'] ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <a href="index.php" style="display:inline;float:right;margin:12px;"
                            class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
