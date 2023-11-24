<?php
$Nama_Sentra = $_POST['Nama_Sentra'];
$Alamat = $_POST['Alamat'];
$Kelompok_Cabang = $_POST['Kelompok_Cabang'];
$Tahun_Berdiri = $_POST['Tahun_Berdiri'];
$Latitude = $_POST['Latitude'];
$Longitude = $_POST['Longitude'];

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
$sql = "INSERT INTO tabel_sentra (Nama_Sentra, Alamat, Kelompok_Cabang, Tahun_Berdiri, Latitude, Longitude)
VALUES ('$Nama_Sentra', '$Alamat', '$Kelompok_Cabang', '$Tahun_Berdiri', $Latitude, $Longitude)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
//header("Location: index.html");
//exit;
?>