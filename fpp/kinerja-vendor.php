<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['fpp'])) {
    header('Location: ../login_fpp.php');
    exit();
}

$title = 'Penilaian Kinerja Vendor';

include '../koneksi.php';
$no = 1;
$id_divisi = $_SESSION['id_divisi'];
$data = mysqli_query($koneksi, "SELECT pk.*, p.nama_project, p.id_project , k.nama_kategori, c.nama_vendor FROM pk_fpp pk JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE p.id_divisi=$id_divisi");
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Vendor</h4>
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Penilaian Kinerja Vendor</h5>
            <div class="table-responsive ">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul Project</th>
                            <th>Pelaksana</th>
                            <th>Quality</th>
                            <th>Delivery</th>
                            <th>Service</th>
                            <th>Rata - Rata </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php while($d = mysqli_fetch_array($data)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nama_kategori'] ?></td>
                            <td><?= $d['nama_project'] ?></td>
                            <td><?= $d['nama_vendor'] ?></td>
                            <td><?= $d['quality'] ?></td>
                            <td><?= $d['delivery'] ?></td>
                            <td><?= $d['service'] ?></td>
                            <td><?= $d['ratarata'] ?></td>
                            <?php if($d['status'] == 0) :?>
                            <td><button class="btn btn-danger">Belum di Nilai</button></td>
                            <?php elseif($d['status'] == 1) :?>
                            <td><button class="btn btn-success">Sudah di Nilai</button></td>
                            <?php endif;?>
                            <td>
                                <a href="penilaian-kinerja-vendor.php?id=<?= $d['id_project'] ?>"
                                    class="btn btn-primary btn-sm">
                                    Beri Nilai
                                </a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                html: '<?php echo implode('<br>', $errors); ?>',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                },
                buttonsStyling: false
            });
        });
    </script>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
