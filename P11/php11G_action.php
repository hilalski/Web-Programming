<?php
    require 'config_db.php';
    $dsn =
    "mysql:host=$db_hostname;dbname=$db_database;";
    $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try{
    $pdo = new PDO($dsn, $db_username, $db_password);

    $slot = $_POST['slot'];

    $slot = (isset($_POST["slot"]) ? $_POST["slot"] : "");
    $name = (isset($_POST["name"]) ? $_POST["name"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");


    // $stmt = $pdo->exec("update meeting set name='$name', email='$email' where slot='$slot'");
    $sql = "UPDATE `meeting` SET `name`='$name', `email`='$email' WHERE `slot`='$slot'";
    $pdo->exec("$sql");

    // kembali ke halaman 09F
    echo '<meta http-equiv="refresh" content="0; url=http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/php10F.php">';
    
    $pdo = NULL;
}
catch(PDOException $e){
    echo " Koneksi gagal: " . $e->getMessage();
}
?>