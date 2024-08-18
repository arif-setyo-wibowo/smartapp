<?php
session_start();
include '../koneksi.php';
$title = 'SMARTPPA Admin | Edit Password FPP';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php'); 
    exit();
}


if (!isset($_GET['id_fpp']) || empty($_GET['id_fpp'])) {
    die('ID FPP tidak ditemukan!');
}

$id_fpp = intval($_GET['id_fpp']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors[] = 'Password harus terdiri dari minimal 6 karakter.';
        }
        if ($password !== $confirm_password) {
            $errors[] = 'Password dan konfirmasi password tidak cocok.';
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $stmt = $koneksi->prepare('SELECT password FROM fpp WHERE id_fpp = ?');
        $stmt->bind_param('i', $id_fpp);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();
    }

    if (empty($errors)) {
        $stmt = $koneksi->prepare('UPDATE fpp SET password = ? WHERE id_fpp = ?');
        $stmt->bind_param('si', $hashed_password, $id_fpp);

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

// Fetch divisions
$dataDivisi = mysqli_query($koneksi, 'SELECT * FROM divisi');
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
                        <div class="form-password-toggle mb-4">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        minlength="6" />
                                    <label for="password">Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>
                        <div class="form-password-toggle mb-4">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="password"
                                        id="confirm_password"
                                        class="form-control"
                                        name="confirm_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="confirm_password"
                                        minlength="6" />
                                    <label for="confirm_password">Konfirmasi Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
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
