<?php
require 'db.php';
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteSubject($sql, $id);
}

header('Location: subjects.php');
exit;