<?php
    require 'config_db.php';
    $dsn =
    "mysql:host=$db_hostname;dbname=$db_database;";
    $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    try {
    $pdo = new PDO($dsn, $db_username, 
    $db_password, $opt);

    $slot = (isset($_POST["slot"]) ? $_POST["slot"] : "");
    $name = (isset($_POST["name"]) ? $_POST["name"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");


    $stmt = $pdo->exec("insert into meeting 
    (slot, name, email) values ('$slot', '$name', 
    '$email')");
    // echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n";

    // kembali ke halaman 09F
    echo '<meta http-equiv="refresh" content="0; 
    url=http://' . $_SERVER['SERVER_NAME'] .
    dirname($_SERVER['REQUEST_URI']) . 
    '/php10F.php">';
    $pdo = NULL;
    } catch (PDOException $e) {
        echo "Koneksi gagal".$e->getMessage();
    }

?>