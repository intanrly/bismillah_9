<?php
// Pastikan ini adalah file CSV yang benar-benar ada
$csvfile = 'datapribadi.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima data dari formulir
    $id = $_POST['id'];
    $F_name = $_POST['F_name'];
    $L_name = $_POST['L_name'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $profesi = $_POST['profesi'];
    // Dapatkan data dari bidang lainnya

    $list = array (
        array($id,$F_name,$L_name,$email,$email2,$profesi)
    );

    $file = fopen('datapribadi.csv','a');
    foreach ($list as $fields) {
        fputcsv($file, $fields);
    }

    fclose($file);
}
?>