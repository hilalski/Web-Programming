<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 10D action</title>
</head>
<body>
    <?php
        require 'config_db.php';
        $dsn = "mysql:host=$db_hostname;dbname=$db_database;";
$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $conn = new PDO($dsn, $db_username, $db_password, $opt);

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username
    $sql = "SELECT * FROM user WHERE username='$username'";

    $result = $conn->query("$sql");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();

    // var_dump($row);
    if($row) {
        // cek password
        if($row['password'] === $password){
            // login berhasil
            // echo "Login berhasil";
            $_SESSION['username'] = $_POST['username'];
            header("Location: php10F.php");
            //header("Location: php10F.php"); //mengarahkan ke halaman php10F
        } else {
            // login gagal
            echo "Login gagal";
        }
    } else {
        // username tidak ditemukan
        echo "Username tidak ditemukan";
    }
    $conn = null;
}
catch(PDOException $e){
    echo " Koneksi gagal: " . $e->getMessage();
}

    ?>
</body>
</html>