<?php
require 'db.php';
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    addTeacherSubject(
        $sql,
        $_POST['teacher_id'],
        $_POST['subject_id']
    );

    header('Location: index.php');
    exit;

}

$teachers = getTeachers($sql);
$subjects = getSubjects($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidejte vyučujícímu nový předmět</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>
        
        <div class="content">

            <div class="header">
                <h1>Přidejte vyučujícímu nový předmět:</h1>
            </div>

            <div class="form">
            <form method="post" class="subject-add">
            <label>Vyberte učitele:</label>
            <select name="teacher_id">
                <?php foreach($teachers as $teacher): ?>
                    <option value="<?= $teacher['id']?>"><?= $teacher['name']?></option>
                <?php endforeach;?>
            </select>
            <label>Vyberte předmět:</label>
            <select name="subject_id">
                <?php foreach($subjects as $subject): ?>
                    <option value="<?= $subject['id']?>"><?= $subject['name']?></option>
                <?php endforeach;?>
            </select>
            <button type="submit">Odeslat</button>
            </form>
            
            </div>
        </div>
    </div>
    
</body>
</html>