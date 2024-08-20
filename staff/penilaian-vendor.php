<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php');
    exit();
}

$title = 'Penilaian Kinerja Vendor';

include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, 'SELECT 
                                    pk.*, 
                                    p.nama_project, 
                                    k.nama_kategori, 
                                    c.nama_vendor, 
                                    d.nama_divisi
                                FROM 
                                    pk_staff pk
                                JOIN 
                                    project p ON pk.id_project = p.id_project
                                JOIN 
                                    kategori k ON p.id_kategori = k.id_kategori
                                JOIN 
                                    calonvendor c ON pk.id_vendor = c.id_calonvendor
                                JOIN 
                                    divisi d ON p.id_divisi = d.id_divisi;
                                ');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'delete') {
        $id_vendor = intval($_POST['id_vendor']);

        $stmt = $koneksi->prepare('DELETE FROM pk_staff WHERE id_vendor = ?');
        $stmt->bind_param('i', $id_vendor);

        if ($stmt->execute()) {
            $_SESSION['msg'] = 'Vendor berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Vendor gagal dihapus!';
        }

        $stmt->close();
    }

    header('Location:penilaian-vendor.php');
    exit();
}

?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Kinerja Vendor</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
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


            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false"
                            tabindex="-1">
                            Penilaian Vendor
                        </button>
                    </li>
                    <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Vendor</th>
                                <th>Total Penilaian</th>
                                <th>Kategori</th>
                                <th>Judul Pekerjaan</th>
                                <th>Divisi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($d = mysqli_fetch_array($data)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_vendor'] ?></td>
                                <td><?= !empty($d['total_point']) ? $d['total_point'] : '-'  ?></td>
                                <td><?= $d['nama_kategori'] ?></td>
                                <td><?= $d['nama_project'] ?></td>
                                <td><?= $d['nama_divisi'] ?></td>
                                <td><?= date('d/m/Y', strtotime($d['tanggal'])) ?></td>
                                <?php if ($d['status_nilai'] == 0) :?>
                                    <td><a href="penilaian-vendor-edit.php?id=<?= $d['id_vendor'] ?>"><button class="btn btn-primary">Belum
                                    dinilai</button></a></td>
                                <?php elseif ($d['status_nilai'] == 1) :?>
                                    <td><button class="btn btn-success">Sudah Dinilai</button></td>
                                <?php endif;?>
                                <td>
                                    <a href="penilaian-vendor-detail.php?id=<?= $d['id_vendor'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Detail
                                    </a>
                                    <form action="penilaian-vendor.php" method="POST"
                                        id="delete-form-<?= $d['id_vendor'] ?>" style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id_vendor" value="<?= $d['id_vendor'] ?>">
                                        <button type="button" class="btn btn-danger btn-sm confirm-text"
                                            data-form-id="<?= $d['id_vendor'] ?>">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('confirm-text')) {
                event.preventDefault();

                const formId = event.target.getAttribute('data-form-id');
                const form = document.getElementById(`delete-form-${formId}`);

                Swal.fire({
                    title: 'Apakah Yakin ingin menghapus data?',
                    text: "Data yang dihapus akan hilang!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                        cancelButton: 'btn btn-outline-secondary waves-effect'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    });
</script>
<?php include 'footer.php'; ?>
