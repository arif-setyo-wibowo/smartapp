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

// Cek apakah pengguna sudah login
if (!isset($_SESSION['staff'])) {
    header('Location: ../login_staff.php');
    exit();
}

include '../koneksi.php';
if (isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    } else {
        $id_project = intval($_GET['id']);
        $sql = "SELECT * FROM project WHERE id_project = $id_project";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $project = mysqli_fetch_assoc($result);
            $title = 'Ranking Penilaian Calon Vendor ' . $project['nama_project'];
            $no = 1;
            $dataCalonVendor = mysqli_query($koneksi, "SELECT c.*, p.nama_project, k.nama_kategori FROM calonvendor c JOIN project p ON c.id_project = p.id_project JOIN kategori k ON p.id_kategori = k.id_kategori WHERE c.id_project = $id_project");
            $rows = [];
            while ($d = mysqli_fetch_array($dataCalonVendor)) {
                $total = calculatePercentage30($d['total_point']) + calculatePercentage50($d['eficiency']) + calculateValue20($d['kontrak']);
                $d['total'] = $total;
                $rows[] = $d;
            }

            usort($rows, function ($a, $b) {
                return $b['total'] - $a['total'];
            });
        } else {
            $_SESSION['error'] = 'Project tidak ditemukan!';
            header('Location: index.php');
            exit();
        }
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SMART PPA /</span> Ranking</h4>

    <div class="row">
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Ranking Penilaian Calon Vendor <?= $project['nama_project'] ?></h5>
                    <div class="table-responsive ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama Project</th>
                                    <th>Nama Vendor</th>
                                    <th>Performance</th>
                                    <th>Bobot ( 30% )</th>
                                    <th>Eficiency</th>
                                    <th>Bobot ( 50% )</th>
                                    <th>Kontrak</th>
                                    <th>Bobot ( 20 % )</th>
                                    <th id="total-header">Total</th>
                                    <?php if ($project['status'] == 0) :?>
                                    <th>Action</th>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach($rows as $d) : ?>
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
                                    <?php if ($project['status'] == 0) :?>
                                    <td><button type="button" class="btn btn-success" id="confirm-text">Konfirmasi
                                            Pemenang</button></td>
                                    <?php endif;?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <a href="form-ranking.php" style="display:inline;float:right;margin:12px;"
                        class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cells = document.querySelectorAll('td.empty');

        if (cells.length > 0) {
            Swal.fire({
                title: 'Warning!',
                text: 'Ada Vendor Yang Belum Dinilai',
                icon: 'warning',
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                },
                buttonsStyling: false
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#example1').addEventListener('click', function(event) {
            // Check if the clicked element has the ID 'confirm-text'
            if (event.target && event.target.id === 'confirm-text') {
                event.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi Pemenang',
                    html: `
                    <form id="dynamic-form" style="display: inline;">
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
                    </form>
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
                        const contractDuration = Swal.getPopup().querySelector(
                            '#contract-duration').value;
                        const confirmationText = Swal.getPopup().querySelector(
                            '#confirmation').value;

                        // Validate input fields
                        if (!contractDuration || confirmationText !== 'Konfirmasi') {
                            Swal.showValidationMessage(
                                'Harap lengkapi form dengan benar dan ketik "Konfirmasi".'
                            );
                            return false;
                        }
                        return {
                            contractDuration,
                            confirmationText
                        };
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Create a form element dynamically
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = 'haha.php';
                        form.style.display = 'none'; // Hide the form

                        // Create and append input fields
                        const contractInput = document.createElement('input');
                        contractInput.type = 'hidden';
                        contractInput.name = 'contract_duration';
                        contractInput.value = result.value.contractDuration;
                        form.appendChild(contractInput);

                        const confirmationInput = document.createElement('input');
                        confirmationInput.type = 'hidden';
                        confirmationInput.name = 'confirmation';
                        confirmationInput.value = result.value.confirmationText;
                        form.appendChild(confirmationInput);

                        // Append the form to the body and submit it
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        });
    });
</script>


<?php include 'footer.php'; ?>
