<?php>
$csvfile = 'C:\xampp\htdocs\week9\datapribadi.csv';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST["Id"];
    $F_Name = $_POST["F_Name"];
    $L_Name = $_POST["L_Name"];
    $Email = $_POST["Email"];
    $Email2 = $_POST["Email2"];
    $Profesi = $_POST["Profesi"];

    if ($Email != Email2) {
        echo "Email tidak sama, silahkan coba lagi!";
    } else {
        $data = '$Id, $F_Name, $L_Name, $Email, $Email2, $Profesi\n';
        file_put_contents('C:\xampp\htdocs\week9\datapribadi.csv', $data, FILE_APPEND);
        echo 'Data telah ditambahkan!';
    }
}
echo "<table border= '1'>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Profesi</th>
</tr>";

if (is_writable($csvfile)) {
    // Izin penulisan ada, lanjutkan menulis ke file
    // ...
} else {
    // Izin penulisan tidak ada, tampilkan pesan kesalahan
    echo 'Tidak bisa menulis ke file.';
}

if (file_exists($csvfile)) {
    $csv = array_map('str_getcsv', file($csvfile));

    foreach ($csv as $row) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "</tr>";
    }
} else {
    echo "File CSV Tidak Ada!";
}

echo "</table>";
?>