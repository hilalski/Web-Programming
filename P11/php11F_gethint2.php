<?php
require 'config_db.php';
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset:$db_charset";
$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);
    
    $query = "SELECT name FROM meeting WHERE name LIKE ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array("%" . $_GET["keyword"] . "%"));
    
    // Construct an array of suggestions
    $suggestions = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
        $suggestions[] = $row["name"];
    }
    
    // Output the suggestions as JSON
    echo json_encode(array("suggestions" => $suggestions));
    
    $pdo = NULL;
} catch (PDOException $e) {
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>
