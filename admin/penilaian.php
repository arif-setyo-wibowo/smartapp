<?php
function calculatePercentage30($total_point)
{
    if ($total_point < -240) {
        $percentage = 0;
    } elseif ($total_point >= -240 && $total_point < -90) {
        $percentage = 20;
    } elseif ($total_point >= -90 && $total_point < -30) {
        $percentage = 40;
    } elseif ($total_point >= -30 && $total_point < 0) {
        $percentage = 80;
    } elseif ($total_point >= 0) {
        $percentage = 100;
    } else {
        $percentage = 0;
    }

    return $percentage * 0.3;
}

function calculatePercentage50($value)
{
    $P4 = 100;
    $P5 = 75;
    $P6 = 50;
    $P7 = 25;
    $P8 = 5;

    if ($value < 0) {
        $percentage = $P8;
    } elseif ($value >= 0 && $value < 1) {
        $percentage = $P7;
    } elseif ($value >= 1 && $value < 2) {
        $percentage = $P6;
    } elseif ($value >= 2 && $value < 3) {
        $percentage = $P5;
    } elseif ($value >= 3) {
        $percentage = $P4;
    } else {
        $percentage = 0;
    }

    return $percentage * 0.5;
}

function calculateValue20($value)
{
    $W4 = 100;
    $W5 = 80;
    $W6 = 60;
    $W7 = 40;
    $W8 = 20;
    $W9 = 5;

    if ($value > 0) {
        if ($value <= 2) {
            $percentage = $W4;
        } elseif ($value > 2 && $value <= 6) {
            $percentage = $W5;
        } elseif ($value > 6 && $value <= 10) {
            $percentage = $W6;
        } elseif ($value > 10 && $value <= 15) {
            $percentage = $W7;
        } elseif ($value > 15 && $value <= 20) {
            $percentage = $W8;
        } elseif ($value > 20) {
            $percentage = $W9;
        } else {
            $percentage = 0;
        }

        return $percentage * 0.2;
    } else {
        return 0;
    }
}
?>

<?php
session_start();
$title = 'SMARTPPA Admin | Penilaian';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../login_admin.php');
    exit();
}

include '../koneksi.php';
$no=1;
$dataKategori = mysqli_query($koneksi, 'SELECT * FROM kategori');
$dataProject = mysqli_query($koneksi, 'SELECT * FROM divisi');

if (isset($_GET['id_kategori']) && isset($_GET['id_project']) && isset($_GET['jenis'])) {
    $id_kategori = intval($_GET['id_kategori']);
    $id_project = intval($_GET['id_project']);
    $jenis = strval($_GET['jenis']);
    $getProject = mysqli_query($koneksi, "SELECT * FROM project WHERE id_project = $id_project");
    $projectData = mysqli_fetch_assoc($getProject);
    if ($jenis == "calonvendor") {
        $data = mysqli_query($koneksi, "SELECT c.*, p.nama_project, k.nama_kategori FROM calonvendor c JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE c.id_project = $id_project");
    }elseif ($jenis == "pk_staff") {
        if ($projectData['status'] == 1) {
            $data = mysqli_query($koneksi, "SELECT pk.*, c.nama_vendor, p.nama_project, k.nama_kategori FROM pk_staff pk JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE pk.id_project = $id_project");
        }if ($projectData['status'] == 0) {
            $_SESSION['error'] = 'Project Belum Ditentukan Pemenangnya';
            header('Location: penilaian.php');
            exit();
        }
    }elseif ($jenis == "pk_fpp") {
        if ($projectData['status'] == 1) {
            $data = mysqli_query($koneksi, "
                SELECT pk.*, c.nama_vendor, p.nama_project, k.nama_kategori, d.nama_divisi
                FROM pk_fpp pk
                JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor
                JOIN project p ON c.id_project = p.id_project
                JOIN kategori k ON p.id_kategori = k.id_kategori
                JOIN divisi d ON p.id_divisi = d.id_divisi
                WHERE c.id_project = $id_project
            ");
        } else if ($projectData['status'] == 0) {
            $_SESSION['error'] = 'Project Belum Ditentukan Pemenangnya';
            header('Location: penilaian.php');
            exit();
        }        
    }else{
        header('Location: penilaian.php');
        exit();
    }
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian</h4>

    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header">Filter</h5>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                            <label>Kategori</label>
                            <select id="select-category" class="selectpicker w-100" data-style="btn-default"
                                name="id_kategori" data-live-search="true" required>
                                <option selected disabled value="">Pilih Kategori</option>
                                <?php while($d = mysqli_fetch_array($dataKategori)) : ?>
                                <option value="<?= $d['id_kategori'] ?>" <?= (!empty($id_kategori) && $id_kategori == $d['id_kategori']) ? 'selected' : ''?>><?= $d['nama_kategori'] ?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                            <label>Project</label>
                            <select id="select-project" data-id="<?= $id_project ?>" class="selectpicker w-100" data-style="btn-default" name="id_project" data-live-search="true" required></select>
                        </div>
                        <div class="col col-md-3 col-sm-6 pe-0 mb-md-0 mb-2">
                            <label>Jenis Penilaian</label>
                            <select class="selectpicker w-100" data-style="btn-default" name="jenis"
                                data-live-search="true" required>
                                <option selected disabled value="">Pilih Jenis Penilaian </option>
                                <option value="pk_fpp" <?= (!empty($jenis) && $jenis == "pk_fpp") ? 'selected' : ''?>>Penilaian Kinerja Vendor FPP</option>
                                <option value="pk_staff" <?= (!empty($jenis) && $jenis == "pk_staff") ? 'selected' : ''?>>Penilaian Kinerja Vendor Staff</option>
                                <option value="calonvendor" <?= (!empty($jenis) && $jenis == "calonvendor") ? 'selected' : ''?>>Penilaian Calon Vendor Staff</option>
                            </select>
                        </div>
                        <div class="col col-md-3 col-sm-6">
                            <label>&nbsp;</label>
                            <button class="clipboard-btn btn btn-primary me-2 waves-effect waves-light w-100"
                                data-clipboard-action="copy" data-clipboard-target="#clipboard-example">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (!empty($data)) : ?>
<div class="card mb-4">
    <div class="card-header p-0">
        <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false"
                        tabindex="-1">
                        Penilaian
                    </button>
                </li>
                <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <?php if ($jenis == "calonvendor") : ?>
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Project</th>
                            <th>Nama Vendor</th>
                            <th>Performance</th>
                            <th>Bobot (30%)</th>
                            <th>Efisiensi</th>
                            <th>Bobot (50%)</th>
                            <th>Kontrak</th>
                            <th>Bobot (20%)</th>
                            <th id="total-header">Total</th>
                            <th hidden></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nama_kategori'] ?></td>
                            <td><?= $d['nama_project'] ?></td>
                            <td><?= $d['nama_vendor'] ?></td>
                            <td class="<?= empty($d['total_point']) ? 'empty' : '' ?>">
                                <?= !empty($d['total_point']) ? $d['total_point'] : '-' ?>
                            </td>
                            <td><?= calculatePercentage30($d['total_point']) ?>%</td>
                            <td><?= $d['eficiency'] ?>%</td>
                            <td><?= calculatePercentage50($d['eficiency']) ?>%</td>
                            <td><?= !empty($d['kontrak']) ? $d['kontrak'] : '-' ?></td>
                            <td><?= calculateValue20($d['kontrak']) ?>%</td>
                            <td class="total-cell">
                                <?= calculatePercentage30($d['total_point']) + calculatePercentage50($d['eficiency']) + calculateValue20($d['kontrak']) ?>%
                            </td>
                            <td hidden></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php elseif ($jenis == "pk_staff") : ?>
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Vendor</th>
                            <th>Total Penilaian</th>
                            <th>Kategori</th>
                            <th>Judul Pekerjaan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th hidden></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($d = mysqli_fetch_array($data)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nama_vendor'] ?></td>
                            <td><?= !empty($d['total_point']) ? $d['total_point'] : '-' ?></td>
                            <td><?= $d['nama_kategori'] ?></td>
                            <td><?= $d['nama_project'] ?></td>
                            <td><?= date('d/m/Y', strtotime($d['tanggal'])) ?></td>
                            <?php if ($d['status_nilai'] == 0) : ?>
                            <td><a href="penilaian-vendor-edit.php?id=<?= $d['id_vendor'] ?>"><button class="btn btn-primary">Belum
                                    dinilai</button></a></td>
                            <?php elseif ($d['status_nilai'] == 1) : ?>
                            <td><button class="btn btn-success">Sudah Dinilai</button></td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                        <td hidden></td>
                    </tbody>
                </table>
                <?php elseif ($jenis == "pk_fpp") : ?>
                <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul Project</th>
                        <th>Divisi</th>
                        <th>Pelaksana</th>
                        <th>Quality</th>
                        <th>Delivery</th>
                        <th>Service</th>
                        <th>Rata - Rata </th>
                        <th>Status</th>
                        <th hidden></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($d = mysqli_fetch_array($data)) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['nama_kategori'] ?></td>
                        <td><?= $d['nama_project'] ?></td>
                        <td><?= $d['nama_divisi'] ?></td> <!-- Display the division name -->
                        <td><?= $d['nama_vendor'] ?></td>
                        <td><?= $d['quality'] ?></td>
                        <td><?= $d['delivery'] ?></td>
                        <td><?= $d['service'] ?></td>
                        <td><?= $d['ratarata'] ?></td>
                        <?php if ($d['status'] == 0) : ?>
                        <td><button class="btn btn-danger">Belum di Nilai</button></td>
                        <?php elseif ($d['status'] == 1) : ?>
                        <td><button class="btn btn-success">Sudah di Nilai</button></td>
                        <?php endif; ?>
                        <td hidden></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>

                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#select-category').selectpicker();
    $('#select-project').selectpicker();

    $('#select-category').change(function() {
        var categoryId = $(this).val();
        var selectedProjectId = $('#select-project').data('id');

        if (categoryId) {
            $.ajax({
                url: 'get_projects.php',
                type: 'POST',
                dataType: 'json',
                data: { id_kategori: categoryId },
                success: function(data) {
                    var projectSelect = $('#select-project');
                    projectSelect.empty();
                    projectSelect.append('<option selected disabled value="">Pilih Project</option>');

                    if (Array.isArray(data)) {
                        $.each(data, function(index, project) {
                            var selected = (project.id_project == selectedProjectId) ? 'selected' : '';
                            projectSelect.append('<option value="' + project.id_project + '" ' + selected + '>' + project.nama_project + '</option>');
                        });
                    } else {
                        console.error('Data yang diterima bukan array:', data);
                    }

                    projectSelect.selectpicker('destroy').selectpicker();
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + status + error);
                }
            });
        } else {
            $('#select-project').empty();
            $('#select-project').append('<option selected disabled value="">Pilih Project</option>');
            projectSelect.selectpicker('destroy').selectpicker();
        }
    });

    var selectedCategory = $('#select-category').val();
    if (selectedCategory) {
        $('#select-category').trigger('change');
    }
});
</script>

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
