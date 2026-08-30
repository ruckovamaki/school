<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];
$school = getSchool($sql, $id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    editSchool(
        $sql,
        $_POST['name'],
        $_POST['principal'],
        $_POST['city'],
        $_POST['street'],
        $_POST['zip'],
        $_POST['in'],
        $_POST['tin'],
        $id
    );

    header('Location: index.php');
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravte školu</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Upravte školu:</h1>
            </div>

            <div class="form">
            <form method="post" class="school-edit">
            <label>ID školy:</label>
            <input type="number" name="id" value="<?= $school['id']?>"><br>
            <label>Název školy:</label>
            <input type="text" name="name" value="<?= $school['name']?>"><br>
            <label>Jméno a příjmení ředitele:</label>
            <input type="text" name="principal" value="<?= $school['principal']?>"><br>
            <label>Město:</label>
            <input type="text" name="city" value="<?= $school['city']?>"><br>
            <label>Ulice:</label>
            <input type="text" name="street" value="<?= $school['street']?>"><br>
            <label>Směrovací číslo:</label>
            <input type="number" name="zip" value="<?= $school['zip']?>"><br>
            <label>IČ:</label>
            <input type="number" name="idn" value="<?= $school['idn']?>"><br>
            <label>DIČ:</label>
            <input type="text" name="tin" value="<?= $school['tin']?>"><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>



    
</body>
</html>