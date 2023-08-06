<?php
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
        $sql = "select * from meeting";
        $stmt = $pdo->query($sql)->fetchAll();
        if ($stmt) { //if query result is not empty
            foreach($stmt as $row) {
            $item[] = array(
            'slot'=> $row["slot"],
            'name'=> $row["name"],
            'email'=>$row["email"]
            );
            }
            }
            $response = array(
            'status'=>'200 OK',
            'data' => $item
            );
            echo json_encode($response);
        $pdo = NULL;
    }
    catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>