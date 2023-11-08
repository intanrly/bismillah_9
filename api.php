<?php
// Pastikan ini adalah file CSV yang benar-benar ada
$csvfile = 'C:\xampp\htdocs\week9\coba.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima data dari formulir
    $Id = $_POST['Id'];
    $F_Name = $_POST['F_Name'];
    $L_Name = $_POST['L_Name'];
    $Email = $_POST['Email'];
    $Email2 = $_POST['Email2'];
    $Profesi = $_POST['Profesi'];
    // Dapatkan data dari bidang lainnya

    // Validasi data jika diperlukan
    if (empty($Id) || empty($F_Name) || empty($L_Name) || empty($Email) || empty($Email2) || empty($Profesi)) {
        $response = array('success' => false, 'message' => 'Data tidak lengkap.');
    } else {
        // Simpan data ke file CSV (tambahkan validasi dan pengolahan data lainnya jika diperlukan)
        $data = "$Id, $F_Name, $L_Name, $Email, $Email2, $Profesi\n";
        file_put_contents($csvfile, $data, FILE_APPEND);
        $response = array('success' => true, 'message' => 'Data berhasil disimpan.');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Tampilkan data dari file CSV sebagai respons API
    $csv = array_map('str_getcsv', file($csvfile));
    header('Content-Type: application/json');
    echo json_encode($csv);
}
?>
