<?php
    $slot = $_POST['slot'];
    $name = $_POST['name'];
    $email = $_POST['email'];
        $db_hostname = "localhost"; // Write your own db server here
        $db_database = "praktikum9"; // Write your own db name here
        $db_username = "root"; // Write your own username here
        $db_password = ""; // Write your own password here
        // For the best practice, don’t use your “real” password when submitting your work

        $db_charset = "utf8mb4"; // Optional
        $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        $stmt = "UPDATE meeting SET name='$name', email='$email' WHERE slot='$slot'";
        $pdo->exec($stmt);
        echo '<meta http-equiv="refresh" content="0;url=http://'.$_SERVER['SERVER_NAME'].
        dirname($_SERVER['REQUEST_URI']).'/php09F.php">';
    } catch (\Throwable $th) {
        echo "Error : ". $th->getMessage();
    }
?>