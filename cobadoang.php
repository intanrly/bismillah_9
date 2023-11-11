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

    td {
        border: 1px solid #0b3d61;
        background-color: #ffffff;
        padding: 10px;
        color: #0b3d61;
    }

    th {
        border: 1px solid #ffffff;
        background-color: #0b3d61;
        padding: 10px;
        color: #ffffff;
    }

    #id,
    #firstName,
    #LastName,
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
        <form id="addForm" method="post" action="">
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" placeholder="Masukkan Id Anda" required><br><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Masukkan Nama Awal Anda" required><br><br>
            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" placeholder="Masukkan Nama Akhir Anda" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required><br><br>
            <label for="email2">Confirm Email:</label>
            <input type="email" id="email2" name="email2" placeholder="Pastikan Email Anda Sama" required><br><br>
            <label for="profesi">Profesi:</label>
            <input type="text" id="profesi" name="profesi" placeholder="Masukkan Profesi Anda." required><br><br>
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
            <th>Confirm Email</th>
            <th>Profesi</th>
        </tr>
        <?php
        // Memproses data yang dikirim dari formulir
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $firstName = $_POST["firstName"];
            $email = $_POST["email"];
            $email2 = $_POST["email2"];
            $profesi = $_POST["profesi"];
            $LastName = $_POST["LastName"];

            // Membaca data dari file CSV
            $file = fopen("datapribadi.csv", "a+");
            if ($file) {
                // Menambahkan data ke dalam file CSV
                fputcsv($file, [$id, $firstName, $LastName, $email, $email2, $profesi]);
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