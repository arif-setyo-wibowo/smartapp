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
            $data = mysqli_query($koneksi, "SELECT pk.*, c.nama_vendor, p.nama_project, k.nama_kategori FROM pk_fpp pk JOIN calonvendor c ON pk.id_vendor = c.id_calonvendor JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE c.id_project = $id_project");
        }if ($projectData['status'] == 0) {
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
    <?php if (!empty($data)) :?>
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
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Vendor</th>
                                <th>Project</th>
                                <th>Kategori Project</th>
                                <th><?= (!empty($d['total_point'])) ? 'Total Poin' : 'Rata Rata' ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($d = mysqli_fetch_array($data)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_vendor']?></td>
                                <td><?= $d['nama_project']?></td>
                                <td><?= $d['nama_kategori']?></td>
                                <td><?= (!empty($d['total_point'])) ? $d['total_point'] : $d['ratarata']?></td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif?>
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
