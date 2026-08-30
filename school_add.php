<?php
require 'db.php';
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    addSchool(
        $sql,
        $_POST['name'],
        $_POST['principal'],
        $_POST['city'],
        $_POST['street'],
        $_POST['zip'],
        $_POST['in'],
        $_POST['tin']
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
    <title>Přidejte novou školu</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Přidejte novou školu:</h1>
            </div>

            <div class="form">
            <form method="post" class="school-add">
            <label>Název školy:</label>
            <input type="text" name="name" placeholder="Název školy"><br>
            <label>Jméno a příjmení ředitele:</label>
            <input type="text" name="principal" placeholder="Jméno a příjmení ředitele"><br>
            <label>Město:</label>
            <input type="text" name="city" placeholder="Město"><br>
            <label>Ulice:</label>
            <input type="text" name="street" placeholder="Ulice"><br>
            <label>Směrovací číslo:</label>
            <input type="number" name="zip" placeholder="Směrovací číslo"><br>
            <label>IČ:</label>
            <input type="number" name="in" placeholder="IČ"><br>
            <label>DIČ:</label>
            <input type="text" name="tin" placeholder="DIČ"><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>



    
</body>
</html>