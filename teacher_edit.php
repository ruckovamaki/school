<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];
$schools = getSchools($sql, $id);
$teacher = getTeacher($sql, $id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $inter_number =  $_POST['inter_number'];

    if (filter_var($inter_number, FILTER_VALIDATE_INT) !== false){
        editTeacher(
            $sql,
            $_POST['name'],
            $_POST['surname'],
            $_POST['city'],
            $_POST['street'],
            $_POST['zip'],
            $_POST['birth_number'],
            $_POST['phone'],
            $_POST['inter_number'],
            $_POST['school_id'],
            $id
        );

        header('Location: index.php');
        exit;

    } else {
        echo 'Něco se nepovedlo :(';
    }

    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravte učitele</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Upravte učitele:</h1>
            </div>

            <div class="form">
            <form method="post" class="teacher-edit">
            <label>ID učitele:</label>
            <input type="number" name="id" value="<?= $teacher['id']?>"><br>
            <label>Jméno učitele:</label>
            <input type="text" name="name" value="<?= $teacher['name']?>"><br>
            <label>Příjmení učitele:</label>
            <input type="text" name="surname" value="<?= $teacher['surname']?>"><br>
            <label>Město:</label>
            <input type="text" name="city" value="<?= $teacher['city']?>"><br>
            <label>Ulice:</label>
            <input type="text" name="street" value="<?= $teacher['street']?>"><br>
            <label>Směrovací číslo:</label>
            <input type="number" name="zip" value="<?= $teacher['zip']?>"><br>
            <label>Rodné číslo:</label>
            <input type="number" name="birth_number" value="<?= $teacher['birth_number']?>"><br>
            <label>Telefonní číslo:</label>
            <input type="number" name="phone" value="<?= $teacher['phone']?>"><br>
            <label>Interní číslo:</label>
            <input type="number" name="inter_number" value="<?= $teacher['inter_number']?>"><br>
            <select name="school_id">
                <?php foreach($schools as $school): ?>
                    <option value="<?= $school['id']?>" <?php if($school['id'] == $teacher['school_id']) echo 'selected';?>><?= $school['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>



    
</body>
</html>