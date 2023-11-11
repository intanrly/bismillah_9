<!DOCTYPE html>
<html>
<head>
    <title>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</title>
</head>
<body>
    <h1>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</h1>
    <h2>INTAN NURUL LAILY - 164221060</h2>
    <h3>Post Data</h3>

    <div id="container">
        <form id="addForm" method="post" action="">
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" required><br><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="Terakhir Name Required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="email2">Email2:</label>
            <input type="email" id="email2" name="email2" required><br><br>
            <label for="profesi">Profesi:</label>
            <input type="text" id="profesi" name="profesi" required><br><br>
            <input type="submit" id="submit" value="Submit">
        </form>
    </div>

    <label for="searchInput">Search:</label>
    <input type="text" id="searchInput" oninput="searchTable()" placeholder="Cari berdasarkan ID atau Nama...">

    <table id="mahasiswaTable">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Email2</th>
            <th>Profesi</th>
        </tr>
        <?php
        // Memproses data yang dikirim dari formulir
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $email2 = $_POST["email2"];
            $profesi = $_POST["profesi"];

            // Membaca data dari file CSV
            $file = fopen("datapribadi.csv", "a+");
            if ($file) {
                // Menambahkan data ke dalam file CSV
                fputcsv($file, [$id, $firstName, $lastName, $email, $email2, $profesi]);
                fclose($file);
            }
        }

        // Membaca data dari file CSV dan menampilkannya dalam tabel
        $file = fopen("datapribadi.csv", "r");
        if ($file) {
            while (($data = fgetcsv($file, 1000, ",")) !== false) {
                echo "<tr>";
                foreach ($data as $cell) {
                    echo "<td>" . $cell . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        }
        ?>
    </table>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('mahasiswaTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(input)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>