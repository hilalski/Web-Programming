<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 09D</title>
    <style>
        table, td, th, tr{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        $db_hostname = "localhost"; //Write your own db server here
        $db_database = "praktikum9"; // Write your own db name here
        $db_username = "root"; // Write your own username here
        $db_password = ""; // Write your own password here
        // For the best practice, don’t use your “real” password when submitting your work

        $db_charset = "utf8mb4"; // Optional
        $dsn ="mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $pdo = new PDO($dsn,$db_username,$db_password,$opt);
            echo "<h2>Data in meeting table (While loop)</h2>\n";
            $stmt = $pdo->query("select * from meeting");
            echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n";
            
            //modifikasi output dalam tabel
            echo "<table>";
                echo "<tr><td> Slot </td>";
                echo "<td> Name </td>";
                echo "<td> Email </td> </tr>";

            while ($row = $stmt->fetch()) {
                    echo "<tr><td>" . $row["slot"] . "</td>     <td>" . $row["name"] . "</td>     <td>" . $row["email"] . "</td>     </tr>";
            }
            echo "</table>";

            echo "<h2>Data in meeting table (Foreach loop)</h2>\n";
            $stmt = $pdo->query("select * from meeting");

            //modifikasi tabel
            echo "<table>";
                echo "<tr><td> Slot </td>";
                echo "<td> Name </td>";
                echo "<td> Email </td> </tr>";

            foreach($stmt as $row) {
                echo "<tr><td>" . $row["slot"] . "</td>     <td>" . $row["name"] . "</td>     <td>" . $row["email"] . "</td>     </tr>";
               /* echo "Slot: ",$row["slot"], "<br>\n";
                echo "Name: ",$row["name"], "<br>\n";
                echo "Email: ",$row["email"],"<br><br>\n";*/
            }
            $pdo = NULL;
            echo "</table>";
        }
        catch (PDOException $e) {
            exit("PDO Error: ".$e->getMessage()."<br>");
        }
    ?>
</body>
</html>