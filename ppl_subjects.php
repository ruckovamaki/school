<?php
require 'db.php';
require 'functions.php';

$subject_id = $_GET['id'];
$students = getStudentsOfSubject($sql, $subject_id);
$teachers = getTeachersOfSubject($sql, $subject_id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam studentů a učitelů k předmětu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
            <a href="school_add.php">Přidat školu</a>
            <a href="student_add.php">Přidat studenta</a>
            <a href="teacher_add.php">Přidat učitele</a>
        </nav>

        <div class="content">
            <div class="header">
                <h1>Studenti studující tento předmět:</h1>
            </div>
            <div class="student-list">
                <?php foreach($students as $student):?>
                    <h2>Jméno:<?= $student['name'] ?></h2>
                    <h2>Příjmení:<?= $student['surname'] ?></h2>
                    <p>Město:<?= $student['city'] ?></p>
                    <p>Ulice:<?= $student['street'] ?></p>
                    <p>Směrovací číslo:<?= $student['zip'] ?></p>
                    <p>Rodné číslo:<?= $student['birth_number'] ?></p>
                    <p>Telefon:<?= $student['phone'] ?></p>
                    <p>Škola:<?= $student['school_id'] ?></p>
                    <a href="student_edit.php?id=<?= $student["id"] ?>">Upravit</a>
                    <a href="student_delete.php?id=<?= $student["id"] ?>">Smazat</a>
                    <?php endforeach;?>

            </div>
        </div>

        <div class="content">
            <div class="header">
                <h1>Učitelé vyučující tento předmět:</h1>
            </div>
            <div class="teacher-list">
            <?php foreach($teachers as $teacher):?>
                    <h2>Jméno:<?= $teacher['name'] ?></h2>
                    <h2>Příjmení:<?= $teacher['surname'] ?></h2>
                    <p>Město:<?= $teacher['city'] ?></p>
                    <p>Ulice:<?= $teacher['street'] ?></p>
                    <p>Směrovací číslo:<?= $teacher['zip'] ?></p>
                    <p>Rodné číslo:<?= $teacher['birth_number'] ?></p>
                    <p>Telefon:<?= $teacher['phone'] ?></p>
                    <p>Interní číslo:<?= $teacher['inter_number'] ?></p>
                    <p>Škola:<?= $teacher['school_id'] ?></p>
                    <a href="teacher_edit.php?id=<?= $teacher["id"] ?>">Upravit</a>
                    <a href="teacher_delete.php?id=<?= $teacher["id"] ?>">Smazat</a>
                    <?php endforeach;?>

            </div>
        </div>

    </div>
    
</body>
</html>