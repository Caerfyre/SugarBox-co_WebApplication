<?php
session_start();
include 'DB-connect.php';
$conn = db_connect();

if ($conn) {
    // echo "Database Connected";
} else {
    header("Location: ../../404.php");
}

// Login
if (!$_SESSION['user']) {
    header('Location: ../../404.php');
}
