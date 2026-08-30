<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];
$schools = getSchools($sql, $id);
$student = getStudent($sql, $id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    editStudent(
        $sql,
        $_POST['name'],
        $_POST['surname'],
        $_POST['city'],
        $_POST['street'],
        $_POST['zip'],
        $_POST['birth_number'],
        $_POST['phone'],
        $_POST['school_id'],
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
    <title>Upravte studenta</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Upravte studenta:</h1>
            </div>

            <div class="form">
            <form method="post" class="student-edit">
            <label>ID studenta:</label>
            <input type="number" name="id" value="<?= $student['id']?>"><br>
            <label>Jméno studenta:</label>
            <input type="text" name="name" value="<?= $student['name']?>"><br>
            <label>Příjmení studenta:</label>
            <input type="text" name="surname" value="<?= $student['surname']?>"><br>
            <label>Město:</label>
            <input type="text" name="city" value="<?= $student['city']?>"><br>
            <label>Ulice:</label>
            <input type="text" name="street" value="<?= $student['street']?>"><br>
            <label>Směrovací číslo:</label>
            <input type="number" name="zip" value="<?= $student['zip']?>"><br>
            <label>Rodné číslo:</label>
            <input type="number" name="birth_number" value="<?= $student['birth_number']?>"><br>
            <label>Telefonní číslo:</label>
            <input type="text" name="phone" value="<?= $student['phone']?>"><br>
            <select name="school_id">
                <?php foreach($schools as $school): ?>
                    <option value="<?= $school['id']?>" <?php if($school['id'] == $student['school_id']) echo 'selected';?>><?= $school['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>



    
</body>
</html>