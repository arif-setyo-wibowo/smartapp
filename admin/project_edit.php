<?php
session_start();
$title = 'Edit Project';

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_project = intval($_POST['id_project']);
        $id_kategori = intval($_POST['id_kategori']);
        $nama_project = $koneksi->real_escape_string($_POST['nama_project']);
        $sql = "UPDATE project SET nama_project='$nama_project', id_kategori='$id_kategori' WHERE id_project=$id_project";

        if ($koneksi->query($sql) === true) {
            $_SESSION['msg'] = 'Project berhasil diperbarui!';
        } else {
            $_SESSION['error'] = 'Project gagal diperbarui!';
        }

        header('Location: project.php');
        exit();
    } else {
        $id_project = intval($_GET['id']);
        $sql = "SELECT * FROM project WHERE id_project = $id_project";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $project = mysqli_fetch_assoc($result);
            $dataKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
        } else {
            $_SESSION['error'] = 'Project tidak ditemukan!';
            header('Location: project.php');
            exit();
        }
    }
} else {
    header('Location: project.php');
    exit();
}

?>
<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Project</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                            Edit Data
                        </button>
                    </li>
                    <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                    <form action="" method="POST">
                        <div class="form-floating form-floating-outline mb-4">
                            <label>Kategori</label>
                            <select class="selectpicker w-100" data-style="btn-default" name="id_kategori"
                                data-live-search="true" required>
                                <option selected disabled value="">Pilih Kategori</option>
                                <?php while($d = mysqli_fetch_array($dataKategori)) : ?>
                                <option value="<?= $d['id_kategori'] ?>" <?= $project['id_kategori'] == $d['id_kategori'] ? 'selected' : '' ?>><?= $d['nama_kategori'] ?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                          <input type="hidden" name="id_project" value="<?= $project['id_project'] ?>" hidden>
                            <input type="text" class="form-control" id="basic-default-fullname" name="nama_project"
                                placeholder="Nama Project" value="<?= $project['nama_project'] ?>" required />
                            <label for="basic-default-fullname">Nama project</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="project.php"><button type="button" class="btn btn-danger">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>
