<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 09B</title>
</head>
<body>
    <?php
        echo 'Item: ', $_REQUEST['item'], "<br>";
        echo '
        <form action="php09C.php" method="post">
        <label>Address: <input type="text" name="address"></label>
        <input type="hidden" value=',$_REQUEST['item'],' name="item">
        </form>';
    ?>
</body>
</html>