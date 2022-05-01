<?php
include "secure-login.php";
include "./DB-connect.php";

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
function getCustomer($accID) {
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

// Add/Update Contact Details -----------------------------
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

// Update Account Details ---------------------------------
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

// Add New Order ------------------------------------------
if (isset($_POST['pushOrder'])) {
    $conn = db_connect();

    // order details
    $accID = $_SESSION['user']['accID'];
    $type = $_POST['type'];
    $method = $_POST['method'];
    $date = $_POST['date'];
    $total = 0;

    // contact details
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['number'];
    $address = $_POST['address'];

    if (isset($_GET["type"]) && $_GET["type"] == "custom") {
        // cake details
        $flavor = $_GET['flavor'];
        $layers = $_GET['layers'];
        $size = $_GET['size'];
        $designName = $_GET['name'];
        $description = $_GET['description'];
    } else {
        // cart details
        foreach ($_SESSION['cart'] as $cartItem) {
            $total += $cartItem['price'] * $cartItem['quantity'];
        }
    }

    // INSERT into ORDERS table
    $query = "INSERT INTO `orders`(`Cust_ID`, `Order_Fullfilment_Date`, `Order_Type`, `Order_Status`, `Total_Price`) 
                VALUES ('$accID', '$date', '$type', 'Pending', '$total')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>console.log("Order submitted.")</script>';
    } else {
        echo '<script>console.log("Failed to submit order...")</script>';
        // echo mysqli_error($conn);
    }

    // GET Order_ID from ORDERS table
    $query = "SELECT LAST_INSERT_ID()";
    $result = mysqli_query($conn, $query);
    $orderID = mysqli_fetch_array($result);
    $orderID = $orderID[0];

    if (isset($_GET["type"]) && $_GET["type"] == "custom") {
        // GET Size_ID from CAKE_SIZE table
        $query = "SELECT `Size_ID` FROM `cake_size` WHERE `Layer_Size`='$size' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $sizeID = mysqli_fetch_array($result);
        $sizeID = $sizeID[0];

        // INSERT into CAKE table
        $query = "INSERT INTO `cake`(`Flavor_Name`, `Design_Name`, `Design_Description`, `CakeSize_ID`) 
                    VALUES ('$flavor', '$designName', '$description', '$sizeID')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>console.log("Custom cake submitted.")</script>';
        } else {
            echo '<script>console.log("Failed to submit custom cake...")</script>';
            // echo mysqli_error($conn);
        }

        // GET Cake_ID from CAKE table
        $query = "SELECT LAST_INSERT_ID()";
        $result = mysqli_query($conn, $query);
        $cakeID = mysqli_fetch_array($result);
        $cakeID = $cakeID[0];

        // INSERT into CAKE_ORDERS table
        $query = "INSERT INTO `cake_orders`(`Order_ID`, `Cake_ID`, `Price_Status`, `Status`) 
                    VALUES ('$orderID', '$cakeID', 'Not Set', 'Pending')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>console.log("Custom cake order submitted.")</script>';
        } else {
            echo '<script>console.log("Failed to submit custom cake order...")</script>';
            // echo mysqli_error($conn);
        }
    } else {
        // INSERT into ORDER_LINE table
        foreach ($_SESSION['cart'] as $cartItem) {
            $prodID = $cartItem['id'];
            $quantity = $cartItem['quantity'];
            $price = $cartItem['price'];

            // GET Size_ID from SIDEPRODUCT_SIZES table
            $query = "SELECT `Size_ID` FROM `sideproduct_sizes` WHERE `Prod_ID`='$prodID' AND `Size_Price`='$price' LIMIT 1";
            $result = mysqli_query($conn, $query);
            $sizeID = mysqli_fetch_array($result);

            $sizeID = $sizeID[0];
            $price = $cartItem['price'] * $quantity;

            $query = "INSERT INTO `order_line`(`Order_ID`, `Prod_ID`, `Size_ID`, `Order_Quantity`, `Line_Price`) 
                    VALUES ('$orderID', '$prodID', '$sizeID', '$quantity', '$price')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script>console.log("Order line submitted.")</script>';
            } else {
                echo '<script>console.log("Failed to submit order line...")</script>';
                // echo mysqli_error($conn);
            }
        }
        // Empty the cart
        unset($_SESSION['cart']);
    }

    // INSERT into PAYMENT table
    $query = "INSERT INTO `payment`(`Order_ID`, `Payment_Type`, `Payment_Status`) 
                VALUES ('$orderID', '$method', '0')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>console.log("Payment submitted.")</script>';
    } else {
        echo '<script>console.log("Failed to submit payment...")</script>';
        // echo mysqli_error($conn);
    }

    // ADD/UPDATE CUSTOMER table
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
    header('Location: ../../src/account.php#orderHistory');
}

// Update Cake Order Status (Accept) ---------------------------------
if (isset($_POST['acceptPrice'])) {
    $conn = db_connect();

    $orderID = $_POST['acceptPrice'];

    $query = "UPDATE `cake_orders`
            SET `Status` = 'Accepted'
            WHERE `Order_ID` = '$orderID'";

    if (mysqli_query($conn, $query)) {
        echo '<script>console.log("Account updated.")</script>';
    } else {
        echo '<script>console.log("Failed to update cake order status...")</script>';
    }

    mysqli_close($conn);
    header('Location: ../../src/account.php#orderHistory');
}

// Update Cake Order Status (Reject) ---------------------------------
if (isset($_POST['rejectPrice'])) {
    $conn = db_connect();

    $orderID = $_POST['rejectPrice'];

    $query = "UPDATE `cake_orders`
            SET `Status` = 'Rejected'
            WHERE `Order_ID` = '$orderID'";

    if (mysqli_query($conn, $query)) {
        echo '<script>console.log("Account updated.")</script>';
    } else {
        echo '<script>console.log("Failed to update cake order status...")</script>';
    }

    mysqli_close($conn);
    header('Location: ../../src/account.php#orderHistory');
}
