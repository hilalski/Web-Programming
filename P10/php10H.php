<?php 
    require 'config_db.php';
    $dsn ="mysql:host=$db_hostname;dbname=$db_database;";
    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
try {

    $pdo = new PDO($dsn, $db_username, $db_password, $opt); 

    $slot = $_GET['slot'];

    // SQL
    // $stmt = $pdo->query("delete from meeting where slot=$slot");
    $sql ="DELETE FROM `meeting` WHERE `slot`=$slot";
    $pdo->exec($sql);

    // kembali ke halaman php10F
?>
    
    <script>
        alert('data berhasil dihapus.');
        document.location.href = 'php10F.php';
    </script>
    
<?php
    // echo '<meta http-equiv="refresh" content="0; 
    // url=http://' . $_SERVER['SERVER_NAME'] .
    // dirname($_SERVER['REQUEST_URI']) . 
    // '/php10F.php">';

    $pdo = NULL;

}
catch(PDOException $e){
    echo "Koneksi gagal".$e->getMessage();
}
?>