<?php
     $slot = $_GET['slot'];
     require "php11G_row.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 10G</title>
</head>
<body>
<div class="wrapper">


<h1>Mengubah Data Meeting</h1>
<form action="php11G_action.php" method="post">
    <div class="input_field">
        <label>Slot: </label>
            <input type="text" name="slot" value="<?php echo $row["slot"];?>">
        <br>
    </div>    
    <div class="input_field">
        <label>Name: </label>
            <input type="text" name="name" value="<?php echo $row["name"];?>">
        <br>
    </div>    
    <div class="input_field">
        <label>Email: </label>
            <input type="text" name="email" value="<?php echo $row["email"];?>">
        <br>
    </div>    
    <!-- <label>Email: <input type="text" name="email"></label><br> -->
    <input type="submit" value="Update">
</form>
</div>
</body>
</html>