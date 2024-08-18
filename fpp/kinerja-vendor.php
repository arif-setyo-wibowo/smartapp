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
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Penilaian Vendor</h4>
    <div class="card">
        <div class="card-body">
        <h5 class="card-header">Penilaian Kinerja Vendor</h5>
        <div class="table-responsive ">
            <table class="table table-bordered"  id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul Project</th>
                    <th>Pelaksana</th>
                    <th>Quality</th>
                    <th>Delivery</th>
                    <th>Service</th>
                    <th>Rata - Rata </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody  class="table-border-bottom-0">
                <tr>
                    <td>1</td>
                    <td>Jasa Lainnya</td>
                    <td>Jasa Tera Ulang dan Kalibrasi Peralatan Produksi dan Tangki Timbun</td>
                    <td>PT Widar Menara Abadi</td>
                    <td>85</td>
                    <td>20</td>
                    <td>84</td>
                    <td>63</td>
                    <td><button class="btn btn-success">Sudah di Nilai</button></td>
                    <td>
                        <a href="penilaian-kinerja-vendor.php?id=1" class="btn btn-primary btn-sm">
                            Beri Nilai
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>
<?php include 'footer.php'; ?>