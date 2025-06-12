<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Submit form</title>
</head>
<body>
    <?php 
// koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // masukkan data ke dalam database
    $sql = "INSERT INTO regist (name, email, message) VALUES ('{$name}', '{$email}', '{$message}')";
    if ($conn->query($sql) === TRUE) {
        echo "<h1 class='success'>Data berhasil disimpan</h1>";
        echo "<h2 class='success'>Nama: $name</h2>";
        echo "<h2 class='success'>Email: $email</h2>";
        echo "<h2 class='success'>Pesan: $message</h2>";
        echo "<button class='btn' onclick=\"window.location.href='index.html'\">Kembali</button>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}

// tutup koneksi
$conn->close();

?>

</body>
</html>
