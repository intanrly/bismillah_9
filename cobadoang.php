<!DOCTYPE html>
<html>
<head>
    <title>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Didot&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
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

    label {
        color: #ffffff;
        text-align: center;
        justify-content: center;
        display: grid;
        place-items: center;

    }

    input {
        text-align: center;
        align-items: center;
        background-color: #ffffff;
        color: #ffffff;
        border: 1px solid #296fa8;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 5px;
        transition: background-color 0.3s ease;
        justify-content: center;
    }

    #submit {
        background-color: #0b3d61;
        color: #fff;
        border: 1px solid #67bbf7;
    }

    #searchInput {
        text-align: center;
        background-color: #ffffff;
        color: #296fa8;
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
    <section>
        <img src ="bg.jpg" id="bg">
        <img src ="moon.png" id="moon">
        <img src ="mountain.png" id="mountain">
        <img src ="road.png" id="road">
        <h2 id="text2">INTAN NURUL LAILY - 164221060</h2>
        <h3 id="text3">Praktikum W9 - Post Data</h3>
    </section>

    <form id="addForm" method="post" action="">
        <div class="label">ID</div>
        <div class="input"><input type="text" id="id" name="id" placeholder="Masukkan Id Anda" required><br><br></div>
        <div class="label">First Name</div>
        <div class="input"><input type="text" id="firstName" name="firstName" placeholder="Masukkan Nama Awal Anda" required><br><br></div>
        <div class="label">Last Name</div>
        <div class="input"><input type="text" id="LastName" name="LastName" placeholder="Masukkan Nama Akhir Anda" required><br><br></div>
        <div class="label">Email</div>
        <div class="input"><input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required><br><br></div>
        <div class="label">Confirm Email</div>
        <div class="input"><input type="email" id="email2" name="email2" placeholder="Pastikan Email Anda Sama" required><br><br></div>
        <div class="label">Profesi</div>
        <div class="input"><input type="text" id="profesi" name="profesi" placeholder="Masukkan Profesi Anda." required><br><br></div>
        <input type="submit" id="submit" value="Submit">
    </form>

    <label for="searchInput">Search</label>
    <input type="text" id="searchInput" oninput="searchTable()" placeholder="Cari Data">

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
    <script type="text/javascript">
        let bg = document.getElementById("bg");
        let moon = document.getElementById("moon");
        let mountain = document.getElementById("mountain");
        let road = document.getElementById("road");
        let text = document.getElementById("text");

        window.addEventListener('scroll', function(){
            var value = window.scrollY;

            bg.style.top = value * 0.5 + 'px';
            moon.style.left = value * 0.5 + 'px';
            mountain.style.top = value * 0.15 + 'px';
            road.style.top = value * 0.15 + 'px';
            text.style.top = value * 1 + 'px';
        })
    </script>
</body>
</html>