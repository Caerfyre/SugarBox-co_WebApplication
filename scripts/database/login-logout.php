<?php
include "secure-login.php";
include "./crud.php";

//------ LOGIN ------//
if (isset($_POST['signin'])) {
    $uName = $_POST["username"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM `accounts` WHERE `Acc_Username`='$uName' AND `Acc_Password`='$pass' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $userAccount = mysqli_fetch_array($result);

    if ($userAccount) {
        if ($uName == $userAccount['Acc_Username'] && $pass == $userAccount['Acc_Password']) {
            $_SESSION['user'] = $user = array(
                "accID" => $userAccount['Account_ID'],
                "accUsername" => $userAccount['Acc_Username'],
                "accPassword" => $userAccount['Acc_Password']
            );
            if ($userAccount['User_Type'] == 0) {
                header('Location: ../../admin-src/index.php');
            } elseif ($userAccount['User_Type'] == 1) {
                getCustomer($userAccount['Account_ID']);
                header('Location: ../../src/home.php');
            }
            if (isset($_SESSION['loginErr'])) unset($_SESSION['loginErr']);
        }
    } else {
        $query = "SELECT * FROM `accounts` WHERE `Acc_Username`='$uName' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $userAccount = mysqli_fetch_array($result);
        // 1 = username correct, password incorrect
        // 2 = username and password incorrect
        if ($userAccount) {
            $_SESSION['loginErr'] = 1;
        } else {
            $_SESSION['loginErr'] = 2;
        }
        header('Location: ../../index.php');
    }
}

//------ LOGOUT ------//
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../../index.php');
}
