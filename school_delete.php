<?php
require 'db.php';
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteSchool($sql, $id, $id);
}

header('Location: index.php');
exit;