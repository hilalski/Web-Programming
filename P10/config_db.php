<?php
try{
    $db_hostname = "localhost";
    $db_database = "praktikum9"; // Write your own db name here
    $db_username = "root"; // Write your own username here
    $db_password = "";
    $db_charset = "utf8mb4"; // Optional

    $conn = new PDO("mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset", $db_username, $db_password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    // echo "Koneksi berhasil";
} catch(PDOException $e) {
    echo "Koneksi gagal".$e->getMessage( ); 
}
?>