<?php
require 'db.php';
require 'functions.php';

$subjects = getSubjects($sql);
$school_id = $_GET['id'];
getSubjectsOfSchool($sql, $school_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Předměty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>

        <div class="content">
            <div class="header">
                <a href="subjects_school.php?id=<?= $subject["school_id"] ?>">Přidat předměty</a>
                <h1>Předměty vyučované na škole:</h1>
            </div>
            <div class="subject-list">
                <?php foreach($subjects as $subject):?>
                    <h2>Název:<?= $subject['name'] ?></h2>
                    <p>Popis:<?= $subject['description'] ?></p>
                    <a href="ppl_subjects.php?id=<?= $subject["id"] ?>">Studenti a vyučující</a>
                    <a href="subject_edit.php?id=<?= $subject["id"] ?>">Upravit</a>
                    <a href="subject_delete.php?id=<?= $subject["id"] ?>">Smazat</a>
                    <?php endforeach;?>

            </div>
        </div>

    </div>
    
</body>
</html>