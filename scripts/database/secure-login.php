<?php
session_start();
include 'DB-connect.php';
$conn = db_connect();

if ($conn) {
    // echo "Database Connected";
} else {
    header("Location: ../../404.php");
}

// Login validation
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
