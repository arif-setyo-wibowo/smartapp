<?php
include '../koneksi.php';

if (isset($_POST['id_kategori'])) {
    $id_kategori = intval($_POST['id_kategori']);

    // Query untuk mendapatkan project berdasarkan kategori
    $query = "SELECT * FROM project WHERE id_kategori = $id_kategori";
    $result = mysqli_query($koneksi, $query);

    // Check if query was successful
    if ($result) {
        $projects = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $projects[] = $row;
        }
        // Mengatur header konten sebagai JSON
        header('Content-Type: application/json');
        echo json_encode($projects);
    } else {
        // Mengatur header konten sebagai JSON
        header('Content-Type: application/json');
        echo json_encode(array());
    }
}
?>
