<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 10E</title>
</head>
<body>
<div class="wrapper">
        <h1>Form Menambahkan Data Meeting</h1>

        <form action="php11E_action.php" method="post">
            <div class="input_field">
                <label>Slot: </label>
                    <input type="text" name="slot">
                <br>
            </div>    
            <div class="input_field">
                <label>Name: </label>
                    <input type="text" name="name">
                <br>
            </div>    
            <div class="input_field">
                <label>Email: </label>
                    <input type="text" name="email">
                <br>
            </div>    
            <!-- <label>Email: <input type="text" name="email"></label><br> -->
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>