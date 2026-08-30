<?php
require 'db.php';
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    addSubject(
        $sql,
        $_POST['name'],
        $_POST['description'],
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
    <title>Přidejte nový předmět</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Přidejte nový předmět:</h1>
            </div>

            <div class="form">
            <form method="post" class="subject-add">
            <label>Název předmětu:</label>
            <input type="text" name="name" placeholder="Název předmětu"><br>
            <label>Popis předmětu:</label>
            <textarea name="description">Popis předmětu</textarea>
            <label>Vyberte školu:</label>
            <select name="school_id">
                <?php foreach($schools as $school): ?>
                    <option value="<?= $school['id']?>"><?= $school['name']?></option>
                <?php endforeach;?>
            </select>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>
    
</body>
</html>