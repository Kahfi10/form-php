<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Koneksi ke database

        $conn = new mysqli('localhost', 'root', '', 'form');
        if ($conn->connect_error) {
            die("Connection failed: {$conn->connect_error}");
        } else {
            $stmt = $conn->prepare("INSERT INTO re (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();
            echo "<h1 class='success'>Data berhasil disimpan</h1>";
            echo "<h2 class='success'>Nama: $name</h2>";
            echo "<h2 class='success'>Email: $email</h2>";
            echo "<h2 class='success'>Pesan: $message</h2>";
            echo "<a href='index.html' class='btn'>Kembali</a>";
            $stmt->close();
            $conn->close();
        }
    }
?>
</body>
</html>