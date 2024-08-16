<?php
session_start();
$title = 'Divisi';

include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, 'SELECT * FROM divisi');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'delete') {
        $id_divisi = intval($_POST['id_divisi']);

        $stmt = $koneksi->prepare('DELETE FROM divisi WHERE id_divisi = ?');
        $stmt->bind_param('i', $id_divisi);

        if ($stmt->execute()) {
            $_SESSION['msg'] = 'Divisi berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Divisi gagal dihapus!';
        }

        $stmt->close();
    } elseif ($action == 'insert') {
        $nama_divisi = $koneksi->real_escape_string($_POST['nama_divisi']);
        $sql = "INSERT INTO divisi (nama_divisi) VALUES ('$nama_divisi')";
        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Divisi berhasil ditambahkan!';
        } else {
            $_SESSION['error'] = 'Divisi gagal ditambahkan!';
        }
    }

    header('Location:divisi.php');
    exit();
}
?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Divisi</h4>

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
                            Divisi
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Tambah Data
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
                                <th>Nama Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($d = mysqli_fetch_array($data)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_divisi'] ?></td>
                                <td>
                                    <a href="divisi_edit.php?id=<?= $d['id_divisi'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <form action="divisi.php" method="POST" id="delete-form-<?= $d['id_divisi'] ?>"
                                        style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id_divisi" value="<?= $d['id_divisi'] ?>">
                                        <button type="button" class="btn btn-danger btn-sm confirm-text"
                                            data-form-id="<?= $d['id_divisi'] ?>">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                    <form action="" method="POST">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama_divisi"
                                placeholder="Divisi" required />
                            <label for="basic-default-fullname">Divisi</label>
                        </div>
                        <input type="hidden" name="action" value="insert">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- / Content -->
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
