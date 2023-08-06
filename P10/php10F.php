<?php
    session_start();

    //if(!isset($_SESSION['username'])){
     //   header("Location: php10D.php");
      //  exit;
    //}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 10F</title>
    <link rel="stylesheet" href="php10F_style.css">
</head>
<body>
    <header>
        <?php include('php10F_header.php'); ?>    
    </header>

    <main>
        <h1>Menampilkan Data Meeting</h1>

        <table>
            <tr>
                <th>Slot</th>
                <th>Name</th>
                <th>Email</th>   
            </tr>

            <?php
            require 'config_db.php';
            $dsn ="mysql:host=$db_hostname;dbname=$db_database;charset:$db_charset";
            $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            try{
                $pdo = new PDO($dsn, $db_username, $db_password, $opt); 
                // menampilkan data meeting
                $stmt = $pdo->query("select * from meeting");

                foreach($stmt as $row){ ?>
                    <tr>
                        <td> <?php echo $row['slot'];?> </td>
                        <td> <?php echo $row['name'];?> </td>
                        <td> <?php echo $row['email'];?> </td>
                        <td>
                            <a href="php10G.php?slot=<?php echo $row["slot"];?>"><img src='edit.png' style='width:30px;height:30px;'></a>
                            <a href="php10H.php?slot=<?php echo $row["slot"];?>"><img src='delete.png' style='width:30px;height:30px;'></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
        </table>
        <button>
            <a href="php10E.php">Tambah</a>
        </button>  
                
            <?php
                $pdo = NULL;
            } catch (PDOException $e) {
                echo "Koneksi Gagal" . $e->getMessage();
            }

            ?>
        
    </main>
</body>
</html>