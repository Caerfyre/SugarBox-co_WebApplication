<?php
session_start();
include 'DB-connect.php';

if($conn)
{
    echo "Database Connected";
}
else
{
    header("Location: scripts/DB-connect.php");
}

//Login
if(!$_SESSION['user'])
{
    header('Location: ../index.php');
}

?>
