<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Dashboard</h4>
            
  <div class="row">
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
        <h5 class="card-header">Tabel Penilaian Efficiency</h5>
            <div class="table-responsive table-bordered">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Nilai</th>
                          <th>Efficiency</th>
                      </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      <tr>
                          <td>100%</td>
                          <td>&gt;3%</td>
                      </tr>
                      <tr>
                          <td>75%</td>
                          <td>2% &lt;= x &lt; 3%</td>
                      </tr>
                      <tr>
                          <td>50%</td>
                          <td>1% &lt;= x &lt; 2%</td>
                      </tr>
                      <tr>
                          <td>25%</td>
                          <td>0% &lt;= x &lt; 1%</td>
                      </tr>
                      <tr>
                          <td>5%</td>
                          <td>&lt;0%</td>
                      </tr>
                      <tr>
                        <td colspan=2>*Reff Audit Plus E</td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card card-border-shadow-warning h-100">
        <div class="card-body">
        <h5 class="card-header">Tabel Penilaian Performance</h5>
          <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nilai</th>
                        <th>Hasil Penilaian Performance</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>100%</td>
                        <td>&gt;=0</td>
                        <td>Hijau</td>
                    </tr>
                    <tr>
                        <td>80%</td>
                        <td>0 &gt; x &gt;= -30</td>
                        <td>Hijau</td>
                    </tr>
                    <tr>
                        <td>40%</td>
                        <td>-30 &gt; x &gt;= -90</td>
                        <td>Kuning</td>
                    </tr>
                    <tr>
                        <td>20%</td>
                        <td>-90 &gt; x &gt;= -240</td>
                        <td>Merah</td>
                    </tr>
                    <tr>
                        <td>0%</td>
                        <td>&lt;-240</td>
                        <td>Merah</td>
                    </tr>
                    <tr>
                      <td colspan=2>*Reff TKO Penilaian</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card card-border-shadow-danger h-100">
        <div class="card-body">
        <h5 class="card-header">Tabel SLA Kontrak</h5>
          <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nilai</th>
                        <th>Lama Waktu (Hari)</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>100%</td>
                        <td>&lt;=2</td>
                    </tr>
                    <tr>
                        <td>80%</td>
                        <td>2 &lt; x &lt;= 6</td>
                    </tr>
                    <tr>
                        <td>60%</td>
                        <td>6 &lt; x &lt;= 10</td>
                    </tr>
                    <tr>
                        <td>40%</td>
                        <td>10 &lt; x &lt;= 15</td>
                    </tr>
                    <tr>
                        <td>20%</td>
                        <td>15 &lt; x &lt;= 20</td>
                    </tr>
                    <tr>
                        <td>5%</td>
                        <td>&gt;20</td>
                    </tr>
                    <tr>
                      <td colspan=2>*Reff SLA Kontrak</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>