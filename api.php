<?php
// Pastikan ini adalah file CSV yang benar-benar ada
$csvfile = 'datapribadi.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima data dari formulir
    $Id = $_POST['id'];
    $F_Name = $_POST['F_Name'];
    $L_Name = $_POST['L_Name'];
    $Email = $_POST['email'];
    $Email2 = $_POST['email2'];
    $Profesi = $_POST['profesi'];
    // Dapatkan data dari bidang lainnya

    $list = array (
        array($id,$firstName,$lastName,$email,$email2,$profesi)
    );

    $file = fopen('datapribadi.csv','a');
    foreach ($list as $fields) {
        fputcsv($file, $fields);
    }

    fclose($file);
}
?>