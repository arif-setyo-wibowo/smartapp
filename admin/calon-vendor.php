<?php
session_start();
$title = 'Calon Vendor';

include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, 'SELECT c.*, p.nama_project, k.nama_kategori FROM calonvendor c JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori');
$dataProject = mysqli_query($koneksi, 'SELECT * FROM project WHERE status="0"');
$_SESSION['id_procurement'] = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'delete') {
        $id_calonvendor = intval($_POST['id_calonvendor']);

        $stmt = $koneksi->prepare('DELETE FROM calonvendor WHERE id_calonvendor = ?');
        $stmt->bind_param('i', $id_calonvendor);

        if ($stmt->execute()) {
            $_SESSION['msg'] = 'Calon Vendor berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Calon Vendor gagal dihapus!';
        }

        $stmt->close();
    } elseif ($action == 'insert') {
        $nama_vendor = $koneksi->real_escape_string($_POST['nama_vendor']);
        $id_procurement = intval($_SESSION['id_procurement']);
        $id_project = intval($_POST['id_project']);
        $tahapan_proses = $koneksi->real_escape_string($_POST['tahapan_proses']);
        $tanggal = $_POST['tanggal'];
        $oe = intval($_POST['oe']);
        $penawaran = intval($_POST['penawaran']);
        $eficiency = $_POST['efisiensi'];
        $sql = "INSERT INTO calonvendor (id_procurement, id_project, nama_vendor, tahapan_proses, tanggal, oe, penawaran, eficiency) VALUES ('$id_procurement', '$id_project', '$nama_vendor', '$tahapan_proses','$tanggal','$oe','$penawaran','$eficiency')";
        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Calon Vendor berhasil ditambahkan!';
        } else {
            $_SESSION['error'] = 'Calon Vendor gagal ditambahkan!';
        }
    }

    header('Location:calon-vendor.php');
    exit();
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Data Calon Vendor</h4>

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
                            Calon Vendor
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
                                <th>Nama Vendor</th>
                                <th>Total Penilaian</th>
                                <th>Kategori</th>
                                <th>Judul Pekerjaan</th>
                                <th>Tanggal</th>
                                <th>Efficiency</th>
                                <th>Status Penilaian</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($d = mysqli_fetch_array($data)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_vendor'] ?></td>
                                <td><?= $d['total_point'] ? $d['total_point'] : '-' ?></td>
                                <td><?= $d['nama_kategori'] ?></td>
                                <td><?= $d['nama_project'] ?></td>
                                <td><?= date('d/m/Y', strtotime($d['tanggal'])) ?></td>
                                <td><?= $d['eficiency'] ?>%</td>
                                <td><button class="btn btn-danger">Belum dinilai staff</button></td>
                                <?php if ($d['status_calon_vendor'] == 0) :?>
                                <td><button class="btn btn-warning">Menunggu Seleksi</button></td>
                                <?php elseif ($d['status_calon_vendor'] == 1) :?>
                                <td><button class="btn btn-danger">Penawar gagal</button></td>
                                <?php elseif ($d['status_calon_vendor'] == 2) :?>
                                <td><button class="btn btn-success">Pelaksana Project</button></td>
                                <?php endif;?>
                                <td>
                                    <?php if ($d['status_calon_vendor'] == 0) :?>
                                    <a href="calon-vendor-edit.php?id=<?= $d['id_calonvendor'] ?>" class="btn btn-info btn-sm mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <?php endif;?>
                                    <a href="calon-vendor-detail.php?id=<?= $d['id_calonvendor'] ?>" class="btn btn-warning btn-sm mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                        Detail
                                    </a>
                                    <form action="calon-vendor.php" method="POST" id="delete-form-<?= $d['id_calonvendor'] ?>"
                                        style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id_calonvendor" value="<?= $d['id_calonvendor'] ?>">
                                        <button type="button" class="btn btn-danger btn-sm confirm-text"
                                            data-form-id="<?= $d['id_calonvendor'] ?>">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                    <form action="" method="POST">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="vendor-name" name="nama_vendor"
                                placeholder="Nama Vendor" required />
                            <label for="vendor-name">Nama Vendor</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="selectpicker w-100" data-style="btn-default" name="id_project"
                                data-live-search="true" required>
                                <option selected disabled value="">Pilih Project</option>
                                <?php while($d = mysqli_fetch_array($dataProject)) : ?>
                                <option value="<?= $d['id_project'] ?>"><?= $d['nama_project'] ?></option>
                                <?php endwhile;?>
                            </select>
                            <label for="vendor-name">Pilih Project</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="process-stage" name="tahapan_proses"
                                placeholder="Tahapan Proses" required />
                            <label for="process-stage">Tahapan Proses</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="date" name="tanggal"
                                placeholder="Tanggal" required />
                            <label for="date">Tanggal</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="number" class="form-control" id="oe" name="oe" placeholder="OE"
                                required />
                            <label for="oe">OE</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="number" class="form-control" id="offer" name="penawaran"
                                placeholder="Penawaran" required />
                            <label for="offer">Penawaran</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="efficiency" name="efisiensi" readonly
                                value="0" required />
                            <label for="efficiency">Efisiensi</label>
                        </div>
                        <input type="hidden" name="action" value="insert">
                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
        document.addEventListener('DOMContentLoaded', () => {
        const oeInput = document.getElementById('oe');
        const offerInput = document.getElementById('offer');
        const efficiencyInput = document.getElementById('efficiency');

        function calculateEfficiency() {
            const oe = parseFloat(oeInput.value);
            const offer = parseFloat(offerInput.value);

            if (!isNaN(oe) && !isNaN(offer) && oe !== 0) {
                let efficiency = ((oe - offer) / oe) * 100;
                efficiencyInput.value = efficiency.toFixed(2) + "%";
            } else {
                efficiencyInput.value = '0';
            }
        }

        oeInput.addEventListener('input', calculateEfficiency);
        offerInput.addEventListener('input', calculateEfficiency);
    });

</script>

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
