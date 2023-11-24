<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABEL KECAMATAN</title>
</head>

<body>
    <h1>
        TABEL REKAP PELAPORAN JUMLAH SENTRA INDUSTRI KECIL MENENGAH KAB. SLEMAN
    </h1>
    <?php
    // Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgweb_responsi";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM tabel_sentra";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
                <th>Nama Sentra</th>
                <th>Alamat</th>
                <th>Kelompok Cabang</th>
                <th>Tahun Berdiri</th>
                <th>Latitude</th>
                <th>Longitude</th>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Nama_Sentra"] . "</td><td>" .
                $row["Alamat"] . "</td><td align='center'>" . $row["Kelompok_Cabang"] . "</td><td align='center'>" .
                $row["Tahun_Berdiri"] . "</td><td align='center'>" .
                $row["Latitude"] . "</td><td align='center'>" . $row["Longitude"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>