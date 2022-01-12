<?php
include "secure-login.php";

//------ LOGIN ------//
if (isset($_POST['signin'])) {
    $uName = $_POST["username"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM `accounts` WHERE `Acc_Username`='$uName' AND `Acc_Password`='$pass' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $userAccount = mysqli_fetch_array($result);

    if ($userAccount) {

        if ($uName == $userAccount['Acc_Username'] && $pass == $userAccount['Acc_Password']) {
            if ($userAccount['User_Type'] == 0) {
                $_SESSION['user'] = $user = array(
                    "accID" => $userAccount['Account_ID'],
                    "accUsername" => $userAccount['Acc_Username']
                );
                header('Location: ../../admin-src/index.php');
            } elseif ($userAccount['User_Type'] == 1) {
                $_SESSION['user'] = $user = array(
                    "accID" => $userAccount['Account_ID'],
                    "accUsername" => $userAccount['Acc_Username']
                );
                header('Location: ../../src/home.php');
            }
        }
    } else {
        echo '<script>alert("Entered Wrong Username and Password")</script>';
    }
}
//------ LOGIN ------//


//------ LOGOUT ------//
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('Location: ../../index.php');
}
//------ LOGOUT ------//
