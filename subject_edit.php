<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];
$schools = getSchools($sql);
$subject = getSubject($sql, $id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    editSubject(
        $sql,
        $_POST['name'],
        $_POST['description'],
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
    <title>Upravte předmět</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Upravte předmět:</h1>
            </div>

            <div class="form">
            <form method="post" class="subject-edit">
            <label>ID předmětu:</label>
            <input type="number" name="id" value="<?= $subject['id']?>"><br>
            <label>Název předmětu:</label>
            <input type="text" name="name" value="<?= $subject['name']?>"><br>
            <label>Popis předmětu:</label>
            <textarea name="description"><?= $subject['description']?></textarea>
            <select name="school_id">
                <?php foreach($schools as $school): ?>
                    <option value="<?= $school['id']?>" <?php if($school['id'] == $subject['school_id']) echo 'selected';?>><?= $school['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>



    
</body>
</html>