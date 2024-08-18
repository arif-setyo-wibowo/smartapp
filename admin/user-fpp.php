<?php
session_start();
$title = 'Data Tim FPP';

include '../koneksi.php';

// Fetch data with join to get division names
$query = 'SELECT fpp.*, divisi.nama_divisi 
          FROM fpp 
          JOIN divisi ON fpp.id_divisi = divisi.id_divisi';
$data = mysqli_query($koneksi, $query);

$dataDivisi = mysqli_query($koneksi, 'SELECT * FROM divisi');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'delete') {
        $id_fpp = intval($_POST['id_fpp']);

        $stmt = $koneksi->prepare('DELETE FROM fpp WHERE id_fpp = ?');
        $stmt->bind_param('i', $id_fpp);

        if ($stmt->execute()) {
            $_SESSION['msg'] = 'FPP berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'FPP gagal dihapus!';
        }

        $stmt->close();
    } elseif ($action == 'insert') {
        $nama = $koneksi->real_escape_string($_POST['nama']);
        $id_divisi = intval($_POST['divisi']); // Fetch divisi from POST
        $username = $koneksi->real_escape_string($_POST['username']);
        $password = $koneksi->real_escape_string($_POST['password']); // Ensure password is fetched
        // Check if username already exists
        $stmt = $koneksi->prepare('SELECT COUNT(*) FROM fpp WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            $_SESSION['error'] = 'Username sudah terdaftar!';
        } else {
            $stmt = $koneksi->prepare('INSERT INTO fpp (nama, id_divisi, username, password) VALUES (?, ?, ?, ?)');
            $stmt->bind_param('siss', $nama, $id_divisi, $username, $password);

            if ($stmt->execute()) {
                $_SESSION['msg'] = 'FPP berhasil ditambahkan!';
            } else {
                $_SESSION['error'] = 'FPP gagal ditambahkan!';
            }
    
            $stmt->close();
        }

        
    }

    header('Location: user-fpp.php');
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> FPP</h4>

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
                            html: '<?php echo implode("<br>", $errors); ?>',
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
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false" tabindex="-1">
                            FPP
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($d = mysqli_fetch_assoc($data)): ?>
                            <tr>
                                <td><?php echo $d['id_fpp']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['username']; ?></td>
                                <td><?php echo $d['nama_divisi']; ?></td> <!-- Display division name -->
                                <td>
                                    <a href="user-fpp_edit.php?id_fpp=<?php echo $d['id_fpp']; ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <a href="user-fpp_edit_password.php?id_fpp=<?php echo $d['id_fpp']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Ganti Password
                                    </a>
                                    <form action="" method="POST" id="delete-form-<?php echo $d['id_fpp']; ?>" style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id_fpp" value="<?php echo $d['id_fpp']; ?>">
                                        <button type="button" class="btn btn-danger btn-sm confirm-text" data-form-id="<?php echo $d['id_fpp']; ?>">
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
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="Nama" required/>
                            <label for="basic-default-fullname">Nama</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <label>Divisi</label>
                            <select class="selectpicker w-100" data-style="btn-default" name="divisi" data-live-search="true" required>
                                <option selected disabled value="">Pilih Divisi</option>
                                <?php while ($div = mysqli_fetch_assoc($dataDivisi)): ?>
                                <option value="<?php echo $div['id_divisi']; ?>"><?php echo $div['nama_divisi']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-username" name="username" placeholder="Username" required/>
                            <label for="basic-default-username">Username</label>
                        </div>
                        <div class="form-password-toggle mb-4">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        minlength="6"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <label for="password">Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="insert">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
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
