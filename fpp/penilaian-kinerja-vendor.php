<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['fpp'])) {
    header('Location: ../login_fpp.php'); 
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Kinerja Vendor</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                    Beri Nilai
                </button>
                </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                <form action="{{ route('project.update','1')}}" method="POST" >
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="Jasa Tera Ulang dan Kalibrasi Peralatan Produksi dan Tangki Timbun" placeholder="Pengadaan" disabled/>
                        <label for="basic-default-fullname">Judul Project</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="Jasa Lainnya" placeholder="Kategori" disabled/>
                        <label for="basic-default-fullname">Kategori</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="PT Widar Menara Abadi" placeholder="Kategori" disabled/>
                        <label for="basic-default-fullname">Pelaksana</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="83" placeholder="Quality" required/>
                        <label for="basic-default-fullname">Quality</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="20" placeholder="Delivery" required/>
                        <label for="basic-default-fullname">Delivery</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" value="84" placeholder="Service" required/>
                        <label for="basic-default-fullname">Service</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="kinerja-vendor.php"><button type="button" class="btn btn-danger">Batal</button></a>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>


<?php include 'footer.php'; ?>