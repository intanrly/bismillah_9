<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b22f1;
            margin: 0;
            padding: 0;
        }
        
        #container {
            text-align: center;
            background-color: #48c8f3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        
        /* Judul */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #67bbf7;
        }
        
        table, th, td {
            border: 1px solid #4107ff;
            padding: 10px;
        }

        #Id {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #F_Name {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #L_Name {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Email {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Email2 {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Profesi {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #simpan-button {
            background-color: #007BFF;
            color: #fff;
            border: 1px solid #fff;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div id="container">
            <h1>PRAKTIKUM WEEK 9 ALGORITMA PEMROGRAMAN 2</h1>
            <h2>INTAN NURUL LAILY - 164221060</h2>
            <h3>Post Data</h3>

            <form id= "dataForm">
            <label for="Id">Id:</label>
            <input type="text" name="Id" id="Id" required>
            <br>
            <label for="F_Name">First Name:</label>
            <input type="text" name="F_Name" id="F_Name" required>
            <br>
            <label for="L_Name">Last Name:</label>
            <input type="text" name="L_Name" id="L_Name" required>
            <br>
            <label for="Email">Email:</label>
            <input type="email" name="Email" id="Email" required>
            <br>
            <label for="Email2">Email2:</label>
            <input type="email" name="Email2" id="Email2" required>
            <br>
            <label for="Profesi">Profesi:</label>
            <input type="text" name="Profesi" id="Profesi" required>
            <br>
            <button type="submit" id="simpan-button">Submit</button>
        </form>

        <div id="response">
        <?php
            // Pastikan ini adalah file CSV yang benar-benar ada
            $csvfile = 'datapribadi.csv';

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
        </div>
    </div>

    
    <script>
        document.getElementById('dataForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Ambil data dari formulir
        const data = new FormData(this);

        // Kirim data ke API menggunakan fetch
        fetch('api.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Data berhasil dikirim ke API
                // Tampilkan respons API atau lakukan apa yang Anda butuhkan
                document.getElementById('response').innerHTML = 'Data berhasil dikirim.';
            } else {
                // Terjadi kesalahan dalam API
                document.getElementById('response').innerHTML = 'Terjadi kesalahan: ' + data.message;
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
        });
    });

    </script>
</body>
</html>