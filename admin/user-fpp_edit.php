<?php
session_start();
include '../koneksi.php';
$title = 'SMARTPPA Admin | Edit Data FPP';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}


// Check if ID FPP is provided
if (!isset($_GET['id_fpp']) || empty($_GET['id_fpp'])) {
    die('ID FPP tidak ditemukan!');
}

$id_fpp = intval($_GET['id_fpp']);

// Fetch divisions
$dataDivisi = mysqli_query($koneksi, 'SELECT * FROM divisi');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $id_divisi = intval($_POST['divisi']);
    $username = $_POST['username'];

    $errors = [];

    // Validate input
    if (empty($nama)) {
        $errors[] = 'Nama tidak boleh kosong.';
    }
    if (empty($username)) {
        $errors[] = 'Username tidak boleh kosong.';
    }

    // Check for duplicate username
    $stmt = $koneksi->prepare('SELECT COUNT(*) FROM fpp WHERE username = ? AND id_fpp != ?');
    $stmt->bind_param('si', $username, $id_fpp);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $errors[] = 'Username sudah digunakan oleh FPP lain.';
    }

    // Use old password if new password is not provided
    $stmt = $koneksi->prepare('SELECT password FROM fpp WHERE id_fpp = ?');
    $stmt->bind_param('i', $id_fpp);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // If no errors, proceed to update data
    if (empty($errors)) {
        $stmt = $koneksi->prepare('UPDATE fpp SET nama = ?, id_divisi = ?, username = ? WHERE id_fpp = ?');
        $stmt->bind_param('sisi', $nama, $id_divisi, $username, $id_fpp);

        if ($stmt->execute()) {
            $_SESSION['msg'] = 'Data FPP berhasil diperbarui!';
        } else {
            $_SESSION['error'] = 'Gagal memperbarui data FPP!';
        }

        $stmt->close();
        header('Location: user-fpp.php');
        exit();
    } else {
        $_SESSION['error'] = implode('<br>', $errors);
    }
}

// Fetch current FPP data
$stmt = $koneksi->prepare('SELECT * FROM fpp WHERE id_fpp = ?');
$stmt->bind_param('i', $id_fpp);
$stmt->execute();
$fpp = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Edit Data FPP</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Edit Data
                        </button>
                    </li>
                    <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span>
                </ul>
            </div>
        </div>
        <div class="card-body">
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
                            html: '<?php echo $_SESSION['error']; ?>',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-primary waves-effect waves-light'
                            },
                            buttonsStyling: false
                        });
                    });
                </script>
            <?php unset($_SESSION['error']); endif; ?>

            <div class="tab-content p-0">
                <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                    <form action="" method="POST">
                        <input type="hidden" name="id_fpp" value="<?php echo htmlspecialchars($fpp['id_fpp']); ?>">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama" value="<?php echo htmlspecialchars($fpp['nama']); ?>" placeholder="Nama" required />
                            <label for="basic-default-fullname">Nama</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <label>Divisi</label>
                            <select class="selectpicker w-100" data-style="btn-default" name="divisi" data-live-search="true" required>
                                <?php while ($row = mysqli_fetch_assoc($dataDivisi)): ?>
                                    <option value="<?php echo $row['id_divisi']; ?>" <?php echo $row['id_divisi'] == $fpp['id_divisi'] ? 'selected' : ''; ?>>
                                        <?php echo $row['nama_divisi']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-username" name="username" value="<?php echo htmlspecialchars($fpp['username']); ?>" placeholder="Username" required />
                            <label for="basic-default-username">Username</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="user-fpp.php" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
