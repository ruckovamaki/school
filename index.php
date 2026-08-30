<?php
require 'db.php';
require 'functions.php';

$schools = getSchools($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukační systém</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Domů</a>
        </nav>

        <div class="content">
            <div class="header">
                <h1>Seznam škol</h1>
            </div>
            <div class="school-list">
                <?php foreach($schools as $school):?>
                    <h2>Název školy:<?= $school['name'] ?></h2>
                    <p>Ředitel:<?= $school['principal'] ?></p>
                    <p>Město:<?= $school['city'] ?></p>
                    <p>Ulice:<?= $school['street'] ?></p>
                    <p>Směrovací číslo:<?= $school['zip'] ?></p>
                    <p>IČ:<?= $school['idn'] ?></p>
                    <p>DIČ:<?= $school['tin'] ?></p>
                    <a href="subjects.php?id=<?= $school["id"] ?>">Předměty</a>
                    <a href="subjects_school.php?id=<?= $school["id"] ?>">Přidat předměty</a>
                    <a href="school_edit.php?id=<?= $school["id"] ?>">Upravit</a>
                    <a href="school_delete.php?id=<?= $school["id"] ?>">Smazat</a>
                    <?php endforeach;?>

            </div>
        </div>

    </div>
    
</body>
</html>