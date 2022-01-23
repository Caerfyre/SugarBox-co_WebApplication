<?php

$_SESSION["customer"] = array(
    "fname" => "",
    "lname" => "",
    "contact" => "",
    "address" => ""
);

/**
 * Adds customer information to the SESSION:
 * - First Name
 * - Last Name
 * - Contact Number
 * - Address
 * @param int $accID The Account ID of the customer
 */
function getCustomer($accID) {
    include "./DB-connect.php";
    $query = "SELECT * FROM `customer` WHERE `Cust_ID`='$accID' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $custInfo = mysqli_fetch_array($result);
    $_SESSION["customer"]["fname"] = $custInfo["Cust_FName"];
    $_SESSION["customer"]["lname"] = $custInfo["Cust_LName"];
    $_SESSION["customer"]["contact"] = $custInfo["Cust_ContactNo"];
    $_SESSION["customer"]["address"] = $custInfo["Cust_Address"];
}

?>