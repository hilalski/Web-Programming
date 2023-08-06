<?php
    $db_hostname = "localhost";
    $db_database = "praktikum9"; // Write your own db name here
    $db_username = "root"; // Write your own username here
    $db_password = ""; // Write your own password here
    $db_charset = "utf8mb4"; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        //Code 6
        $query = "SELECT name FROM meeting WHERE name LIKE ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array("%" . $_GET["keyword"] . "%"));
        // lookup all hints if query result is not empty
        $hint = "";
        if ($stmt) {
                foreach($stmt as $row) {
                    if ($hint === "") {
                        $hint = $row["name"];
                    } else {
                        $hint .= ", " .$row["name"];
                    }
                }
        }
        // Output "no suggestion" if no hint was found or output correct values
        echo $hint === "" ? "no suggestion" : $hint;
        $pdo = NULL;
    }
    catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>