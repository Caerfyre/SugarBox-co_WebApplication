<?php
include "secure-login.php";
include "./DB-connect.php";

// CLIENT FUNCTIONS ----------------------

if (!isset($_SESSION["customer"])) {
    $_SESSION["customer"] = array(
        "fname" => "",
        "lname" => "",
        "contact" => "",
        "address" => ""
    );
}

/**
 * Adds customer information to the SESSION:
 * - First Name
 * - Last Name
 * - Contact Number
 * - Address
 * @param int $accID The Account ID of the customer.
 */
function getCustomer($accID)
{
    include "./DB-connect.php";
    $conn = db_connect();

    $query = "SELECT * FROM `customer` WHERE `Cust_ID`='$accID' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $custInfo = mysqli_fetch_array($result);
    
    if ($custInfo) {
        $_SESSION["customer"]["fname"] = $custInfo["Cust_FName"];
        $_SESSION["customer"]["lname"] = $custInfo["Cust_LName"];
        $_SESSION["customer"]["contact"] = $custInfo["Cust_ContactNo"];
        $_SESSION["customer"]["address"] = $custInfo["Cust_Address"];
    }
    
    mysqli_close($conn);
}

// Add/Update Contact Details
if (isset($_POST['updateContact'])) {
    $conn = db_connect();

    $accID = $_SESSION['user']['accID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query = "SELECT * FROM `customer` WHERE `Cust_ID`='$accID' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $custInfo = mysqli_fetch_array($result);

    if ($custInfo) {
        $query = "UPDATE `customer` SET `Cust_FName` = '$fname',`Cust_LName` = '$lname', 
                `Cust_ContactNo` = '$contact', `Cust_Address` = '$address' WHERE `Cust_ID` = '$accID'";
    } else {
        $query = "INSERT INTO `customer`(`Cust_ID`, `Cust_FName`, `Cust_LName`, `Cust_ContactNo`, `Cust_Address`) 
                VALUES('$accID', '$fname','$lname', '$contact', '$address')";
    }

    if (mysqli_query($conn, $query)) {
        getCustomer($accID);
        echo '<script>console.log("Contact details updated.")</script>';
    } else {
        echo '<script>console.log("Failed to update contact details...")</script>';
        // echo mysqli_error($conn);
    }

    mysqli_close($conn);    
    header('Location: ../../src/account.php');
}

// Update Account Details
if (isset($_POST['updateAccount'])) {
    $conn = db_connect();
    
    $accID = $_SESSION['user']['accID'];
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];
    $valPassword = $_POST['valPassword'];
    
    if ($newPassword != "" && $newPassword === $valPassword) {
        $query = "UPDATE `accounts` SET `Acc_Username` = '$username', `Acc_Password` = '$newPassword'
                WHERE `Account_ID` = '$accID'";
        $password = $newPassword;
    } elseif ($newPassword === "") {
        $query = "UPDATE `accounts` SET `Acc_Username` = '$username'
                WHERE `Account_ID` = '$accID'";
    } else {
        // error
    }
    
    if (isset($query) && mysqli_query($conn, $query)) {
        $_SESSION['user']['accUsername'] = $username;
        if ($newPassword != "") {
            $_SESSION['user']['accPassword'] = $newPassword;
        }
        echo '<script>console.log("Account updated.")</script>';
    } else {
        echo '<script>console.log("Failed to update account...")</script>';
    }

    mysqli_close($conn);    
    header('Location: ../../src/account.php');
}

// ADMIN FUNCTIONS -----------------------

// Add Product
if (isset($_POST['addProductBtn'])) {
    $conn = db_connect();

    $prodName = mysqli_real_escape_string($conn, $_POST['prodName']);
    $prodCateg = mysqli_real_escape_string($conn, $_POST['prodCateg']);
    $prodDesc = mysqli_real_escape_string($conn, $_POST['prodDesc']);

    $file_name = $_FILES['prodImage']['name'];
    $file_tmp = $_FILES['prodImage']['tmp_name'];
    $tmp = explode('.', $_FILES['prodImage']['name']);
    $file_ext = strtolower(end($tmp));
    $extensions = array("jpeg", "jpg", "png", "gif", "jfif");

    $uploads_dir = 'assets';
    move_uploaded_file($file_tmp, $uploads_dir . '/' . $file_name);

    $product_query = "INSERT INTO `side_products`(SideProd_Name, Categ_ID, SideProd_Desc, SideProd_Image) 
                    VALUES('$prodName','$prodCateg', '$prodDesc', '$file_name')";

    if ($file_name == "") {
        echo '<script>alert("NO image entered")</script>';
    } elseif (in_array($file_ext, $extensions) === false) {
        echo '<script>alert("Extension not allowed, please choose a JPEG, PNG, GIF or JFIF file.")</script>';
    } else {
        // UPLOAD TO DATABASE
        if (mysqli_query($conn, $product_query)) {
            echo '<script>alert("Product Added.")</script>';
            header('Location: ../../admin-src/products.php');
        } else {
            echo '<script>alert("Failed to add product")</script>';
        }
    }

    mysqli_close($conn);   
}
