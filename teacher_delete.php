<?php
require 'db.php';
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteTeacher($sql, $id);
}

header('Location: index.php');
exit;