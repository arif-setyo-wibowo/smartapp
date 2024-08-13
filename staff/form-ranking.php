<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Ranking</h4>
  <div class="row">
    <div class="mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-header">Ranking Penilaian Calon Vendor</h5>
            <div class="table-responsive ">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul Project</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>1</td>
                    <td>Jasa Lainnya</td>
                    <td>Jasa Tera Ulang dan Kalibrasi Peralatan Produksi dan Tangki Timbun</td>
                    <td><button class="btn btn-danger">Belum ada pemenang</button></td>
                    <td>
                      <a href="form-ranking-calon-vendor-detail.php?id=1" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Detail
                                </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php include 'footer.php'; ?>