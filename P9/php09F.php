<!DOCTYPE html> <html lang='en-GB'>
<head>
    <title>PHP09 F</title>
</head>
<body>
    <h1>PHP and Databases</h1>
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
            echo "<h2>Data in meeting table (While loop)</h2>\n";
            $stmt = $pdo->query("select * from meeting order by slot asc");
            echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n";
            echo "<table style='border:1px solid black;border-collapse:collapse'>";
                echo "<tr>";
                    echo "<th style='border:1px solid black'>Slot</th>";
                    echo "<th style='border:1px solid black'>Name</th>";
                    echo "<th style='border:1px solid black'>Email</th>";
                echo "</tr>";
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                    echo "<td style='border:1px solid black'>",$row["slot"], "</td>";
                    echo "<td style='border:1px solid black'>",$row["name"], "</td>";
                    echo "<td style='border:1px solid black'>",$row["email"],"</td>";
                    echo "<td style='border:1px solid black'><a href='php09G.php?slot=",$row["slot"],"'><img src='pencil.png'
                    style='width:30px;height:30px;'></a>";
                    echo "<a href='php09H.php?slot=",$row["slot"],"'><img src='eraser.png'
                    style='width:30px;height:30px;'></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<h2>Data in meeting table (Foreach loop)</h2>\n";
            $stmt = $pdo->query("select * from meeting");
            echo "<table style='border:1px solid black;border-collapse:collapse'>";
                echo "<tr>";
                    echo "<th style='border:1px solid black'>Slot</th>";
                    echo "<th style='border:1px solid black'>Name</th>";
                    echo "<th style='border:1px solid black'>Email</th>";
                echo "</tr>";
            foreach($stmt as $row) {
                echo "<tr>";
                    echo "<td style='border:1px solid black'>",$row["slot"], "</td>";
                    echo "<td style='border:1px solid black'>",$row["name"], "</td>";
                    echo "<td style='border:1px solid black'>",$row["email"],"</td>";
                    echo "<td style='border:1px solid black'><a href='php09G.php?slot=",$row["slot"],"'><img src='pencil.png'
                    style='width:30px;height:30px;'></a>";
                    echo "<a href='php09H.php?slot=",$row["slot"],"'><img src='eraser.png'
                    style='width:30px;height:30px;'></a>";
                echo "</tr>";
            }            
            echo "</table>";
            echo "<a href='php09E.php'><button>Tambah Data</button></a>";
            $pdo = NULL;
        }
        catch (PDOException $e) {
            exit("PDO Error: ".$e->getMessage()."<br>");
        }
    ?>
</body>
</html>