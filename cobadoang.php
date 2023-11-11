<!DOCTYPE html>
<html>
<head>
    <title>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }

    #container {
        text-align: center;
        background-color: #67bbf7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    /* Judul */
    h1, h2, h3 {
        text-align: center;
        color: #296fa8;
        font-size: 20px;
        margin-bottom: 5px;
        text-transform: uppercase;
        font-weight: bold;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        background-color: #0b3d61;
        margin: 0 auto;
        border-radius: 10px;
    }

    th, td {
        border: 1px solid #0b3d61;
        background-color: #ffffff;
        padding: 10px;
        color: #0b3d61;
    }

    #id,
    #firstName,
    #lastName,
    #email,
    #email2,
    #profesi,
    #submit {
        text-align: center;
        background-color: #ffffff;
        color: #67bbf7;
        border: 1px solid #296fa8;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 5px;
        transition: background-color 0.3s ease;
    }

    #submit {
        background-color: #007BFF;
        color: #fff;
        border: 1px solid #67bbf7;
    }

    #searchInput {
        text-align: center;
        background-color: #ffffff;
        color: #67bbf7;
        border: 1px solid #296fa8;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 10px;
        transition: background-color 0.3s ease
    }
</style>

</head>

<body>
    <h1>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</h1>
    <h2>INTAN NURUL LAILY - 164221060</h2>
    <h3>Post Data</h3>

    <div id="container">
        <form id="addForm">
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" required><br><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>
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