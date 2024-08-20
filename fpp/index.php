<?php
session_start();

$title = 'Dashboard SMARTPPA | FPP ';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['fpp'])) {
    header('Location: ../login_fpp.php');
    exit();
}

include '../koneksi.php';
$id_divisi = $_SESSION['id_divisi'];
$data = mysqli_query($koneksi, "SELECT pk.*, p.nama_project, p.id_project , k.nama_kategori, c.nama_vendor, d.nama_divisi FROM pk_fpp pk JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori JOIN divisi d ON p.id_divisi = d.id_divisi WHERE p.id_divisi=$id_divisi AND pk.status='0'");
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Dashboard</h4>
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

    <div class="toast-container position-relative">
        <?php while($d = mysqli_fetch_array($data)) : ?>
        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="mdi mdi-bootstrap text-primary me-2"></i>
                <div class="me-auto fw-medium"><?= $d['nama_divisi'] ?></div>
                <small class="text-muted"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Beri Nilai <?= $d['nama_project'] ?> <br><br>
                <a href="penilaian-kinerja-vendor.php?id=<?= $d['id_project'] ?>" class="btn btn-secondary clear">Klik disini</a>
            </div>
        </div>
        <?php endwhile;?>
    </div>
</div>
<?php include 'footer.php'; ?>
