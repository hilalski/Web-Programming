<?php
require 'config_db.php';
$dsn =
"mysql:host=$db_hostname;dbname=$db_database;";
$opt = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try{
    $conn = new PDO($dsn, $db_username, 
    $db_password, $opt);

    $slot = $_GET['slot'];
    
    // cara 1
// $stmt =  "SELECT * FROM meeting WHERE slot='$slot'
    // ";    
    $stmt = $conn->query("select * from meeting where slot='$slot'");
    $row = $stmt->fetch();
    //cara 2
    // $result = $pdo->query("$stmt");
    // $result->setFetchMode(PDO::FETCH_ASSOC);
    // $row = $result->fetchAll();
        
    $conn = null;
}
catch(PDOException $e){
    echo "Koneksi gagal".$e->getMessage();
}
?>