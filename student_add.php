<?php
require 'db.php';
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    addStudent(
        $sql,
        $_POST['name'],
        $_POST['surname'],
        $_POST['city'],
        $_POST['street'],
        $_POST['zip'],
        $_POST['birth_number'],
        $_POST['phone'],
        $_POST['school_id'],
    );

    header('Location: index.php');
    exit;

}

$schools = getSchools($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidejte nového studenta</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Přidejte nového studenta:</h1>
            </div>

            <div class="form">
            <form method="post" class="student-add">
            <label>Jméno studenta:</label>
            <input type="text" name="name" placeholder="Jméno studenta"><br>
            <label>Příjmení studenta:</label>
            <input type="text" name="surname" placeholder="Příjmení studenta"><br>
            <label>Město:</label>
            <input type="text" name="city" placeholder="Město"><br>
            <label>Ulice:</label>
            <input type="text" name="street" placeholder="Ulice"><br>
            <label>Směrovací číslo:</label>
            <input type="number" name="zip" placeholder="Směrovací číslo"><br>
            <label>Rodné číslo:</label>
            <input type="number" name="birth_number" placeholder="Rodné číslo"><br>
            <label>Telefonní číslo:</label>
            <input type="number" name="phone" placeholder="Telefonní číslo"><br>
            <label>Vyberte školu:</label>
            <select name="school_id">
                <?php foreach($schools as $school): ?>
                    <option value="<?= $school['id']?>"><?= $school['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>
    
</body>
</html>