<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Ranking</h4>
        
  <div class="row">
    <div class="mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-header">Ranking Penilaian Calon Vendor Judul Project</h5>
            <div class="table-responsive ">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th hidden>Kategori</th>
                    <th>Nama Project</th>
                    <th>Nama Vendor</th>
                    <th>Performance</th>
                    <th>Bobot ( 30% )</th>
                    <th>Eficiency</th>
                    <th>Bobot ( 50% )</th>
                    <th>Kontrak</th>
                    <th>Bobot ( 20 % )</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>1</td>
                    <td hidden>test</td>
                    <td>Jasa Tera Ulang dan Kalibrasi Peralatan Produksi dan Tangki Timbun</td>
                    <td>Pt Hukara Inti Persada</td>
                    <td> total point (12)</td>
                    <td> 30%
                        <?php
                        // function calculatePercentage($total_point) {
                        //     if ($total_point < -240) {
                        //         $percentage = 0;
                        //     } elseif ($total_point >= -240 && $total_point < -90) {
                        //         $percentage = 20;
                        //     } elseif ($total_point >= -90 && $total_point < -30) {
                        //         $percentage = 40;
                        //     } elseif ($total_point >= -30 && $total_point < 0) {
                        //         $percentage = 80;
                        //     } elseif ($total_point >= 0) {
                        //         $percentage = 100;
                        //     } else {
                        //         $percentage = 0; // Default case if none of the conditions are met
                        //     }
                            
                        //     return $percentage * 0.30; // Multiplying by 30%
                        // }

                        // Example usage
                        // $total_point = -3; // Change this value as needed
                        // $result = calculatePercentage($total_point);
                        // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>(otomatis ((OE-Penawaran)/OE)x100 )</td>
                    <td>2.50%
                        <?php
                            // function calculatePercentage($value) {
                            //     // Definisikan nilai untuk P4, P5, P6, P7, dan P8
                            //     $P4 = 100;
                            //     $P5 = 75;
                            //     $P6 = 50;
                            //     $P7 = 25;
                            //     $P8 = 5;

                            //     // Menentukan nilai berdasarkan rentang
                            //     if ($value < 0) {
                            //         $percentage = $P8;
                            //     } elseif ($value >= 0 && $value < 1) {
                            //         $percentage = $P7;
                            //     } elseif ($value >= 1 && $value < 2) {
                            //         $percentage = $P6;
                            //     } elseif ($value >= 2 && $value < 3) {
                            //         $percentage = $P5;
                            //     } elseif ($value >= 3) {
                            //         $percentage = $P4;
                            //     } else {
                            //         $percentage = 0; // Default case if none of the conditions are met
                            //     }
                                
                            //     return $percentage * 0.50; // Mengalikan dengan 50%
                            // }

                            // // Contoh penggunaan
                            // $value = -8.79; // nilai dan efficiency vendor
                            // $result = calculatePercentage($value);
                            // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>Hanya Pemenang Kontrak yang ada angkanya sebelum di pilih kosong</td>
                    <td>16%
                        <?php
                            // function calculateValue($value) {
                            //     // Definisikan nilai untuk W4 sampai W9
                            //     $W4 = 100;
                            //     $W5 = 80;
                            //     $W6 = 60;
                            //     $W7 = 40;
                            //     $W8 = 20;
                            //     $W9 = 5;

                            //     // Menentukan nilai berdasarkan rentang
                            //     if ($value > 0) {
                            //         if ($value <= 2) {
                            //             $percentage = $W4;
                            //         } elseif ($value > 2 && $value <= 6) {
                            //             $percentage = $W5;
                            //         } elseif ($value > 6 && $value <= 10) {
                            //             $percentage = $W6;
                            //         } elseif ($value > 10 && $value <= 15) {
                            //             $percentage = $W7;
                            //         } elseif ($value > 15 && $value <= 20) {
                            //             $percentage = $W8;
                            //         } elseif ($value > 20) {
                            //             $percentage = $W9;
                            //         } else {
                            //             $percentage = 0; // Default case if none of the conditions are met
                            //         }
                                    
                            //         return $percentage * 0.20; // Mengalikan dengan 20%
                            //     } else {
                            //         return 0;
                            //     }
                            // }

                            // // Contoh penggunaan
                            // $value = ''; // isi berdasarkan lama kontrak
                            // $result = calculateValue($value);
                            // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>Bobot 30%+50%+20%</td>
                    <td>
                        <form action="" method="POST" style="display: inline;">
                            <button type="button" class="btn btn-success" id="confirm-text">
                                Konfirmasi Pemenang
                            </button>
                        </form>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td hidden>test</td>
                    <td>Jasa Tera Ulang dan Kalibrasi Peralatan Produksi dan Tangki Timbun</td>
                    <td>Pt B</td>
                    <td> total point (12)</td>
                    <td> 30%
                        <?php
                        // function calculatePercentage($total_point) {
                        //     if ($total_point < -240) {
                        //         $percentage = 0;
                        //     } elseif ($total_point >= -240 && $total_point < -90) {
                        //         $percentage = 20;
                        //     } elseif ($total_point >= -90 && $total_point < -30) {
                        //         $percentage = 40;
                        //     } elseif ($total_point >= -30 && $total_point < 0) {
                        //         $percentage = 80;
                        //     } elseif ($total_point >= 0) {
                        //         $percentage = 100;
                        //     } else {
                        //         $percentage = 0; // Default case if none of the conditions are met
                        //     }
                            
                        //     return $percentage * 0.30; // Multiplying by 30%
                        // }

                        // Example usage
                        // $total_point = -3; // Change this value as needed
                        // $result = calculatePercentage($total_point);
                        // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>(otomatis ((OE-Penawaran)/OE)x100 )</td>
                    <td>2.50%
                        <?php
                            // function calculatePercentage($value) {
                            //     // Definisikan nilai untuk P4, P5, P6, P7, dan P8
                            //     $P4 = 100;
                            //     $P5 = 75;
                            //     $P6 = 50;
                            //     $P7 = 25;
                            //     $P8 = 5;

                            //     // Menentukan nilai berdasarkan rentang
                            //     if ($value < 0) {
                            //         $percentage = $P8;
                            //     } elseif ($value >= 0 && $value < 1) {
                            //         $percentage = $P7;
                            //     } elseif ($value >= 1 && $value < 2) {
                            //         $percentage = $P6;
                            //     } elseif ($value >= 2 && $value < 3) {
                            //         $percentage = $P5;
                            //     } elseif ($value >= 3) {
                            //         $percentage = $P4;
                            //     } else {
                            //         $percentage = 0; // Default case if none of the conditions are met
                            //     }
                                
                            //     return $percentage * 0.50; // Mengalikan dengan 50%
                            // }

                            // // Contoh penggunaan
                            // $value = -8.79; // nilai dan efficiency vendor
                            // $result = calculatePercentage($value);
                            // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>Hanya Pemenang Kontrak yang ada angkanya sebelum di pilih kosong</td>
                    <td>16%
                        <?php
                            // function calculateValue($value) {
                            //     // Definisikan nilai untuk W4 sampai W9
                            //     $W4 = 100;
                            //     $W5 = 80;
                            //     $W6 = 60;
                            //     $W7 = 40;
                            //     $W8 = 20;
                            //     $W9 = 5;

                            //     // Menentukan nilai berdasarkan rentang
                            //     if ($value > 0) {
                            //         if ($value <= 2) {
                            //             $percentage = $W4;
                            //         } elseif ($value > 2 && $value <= 6) {
                            //             $percentage = $W5;
                            //         } elseif ($value > 6 && $value <= 10) {
                            //             $percentage = $W6;
                            //         } elseif ($value > 10 && $value <= 15) {
                            //             $percentage = $W7;
                            //         } elseif ($value > 15 && $value <= 20) {
                            //             $percentage = $W8;
                            //         } elseif ($value > 20) {
                            //             $percentage = $W9;
                            //         } else {
                            //             $percentage = 0; // Default case if none of the conditions are met
                            //         }
                                    
                            //         return $percentage * 0.20; // Mengalikan dengan 20%
                            //     } else {
                            //         return 0;
                            //     }
                            // }

                            // // Contoh penggunaan
                            // $value = ''; // isi berdasarkan lama kontrak
                            // $result = calculateValue($value);
                            // echo "The result is: " . $result . "%";
                        ?>
                    </td>
                    <td>Bobot 30%+50%+20%</td>
                    <td>
                        <form action="" method="POST" style="display: inline;">
                                    
                            <button type="button" class="btn btn-success" id="confirm-text">
                                <i class="fas fa-trash"></i> Konfirmasi Pemenang
                            </button>
                        </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#example1').addEventListener('click', function(event) {
        // Check if the clicked element has the ID 'confirm-text'
        if (event.target && event.target.id === 'confirm-text') {
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Pemenang',
                html: `
                    <div class="row" style="margin-right:0px !important;">
                        <div class="col-6 d-flex align-items-center justify-content-end mb-4">
                            <label for="contract-duration" class="mb-0">Lama Kontrak (Tahun):</label>
                        </div>
                        <div class="col-6 mb-4">
                            <input id="contract-duration" class="form-control custom-swal-input" type="number" placeholder="Masukkan lama kontrak" required>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <label for="confirmation" class="mb-0">Ketik "Konfirmasi":</label>
                        </div>
                        <div class="col-6">
                            <input id="confirmation" class="form-control custom-swal-input" type="text" placeholder="Ketik 'Konfirmasi'" required>
                        </div>
                    </div>


                `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Konfirmasi',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-outline-secondary waves-effect'
                },
                buttonsStyling: false,
                preConfirm: () => {
                    const contractDuration = Swal.getPopup().querySelector('#contract-duration').value;
                    const confirmationText = Swal.getPopup().querySelector('#confirmation').value;

                    // Validate input fields
                    if (!contractDuration || confirmationText !== 'Konfirmasi') {
                        Swal.showValidationMessage('Harap lengkapi form dengan benar dan ketik "Konfirmasi".');
                        return false;
                    }
                    return { contractDuration, confirmationText };
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Handle the confirmation process here
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data telah dikonfirmasi menjadi Pemenang.',
                        customClass: {
                            confirmButton: 'btn btn-success waves-effect'
                        }
                    });
                }
            });
        }
    });
});



</script>

<?php include 'footer.php'; ?>