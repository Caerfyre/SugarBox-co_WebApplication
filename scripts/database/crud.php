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

// Add New Order
if (isset($_POST['pushOrder'])) {
    $conn = db_connect();

    // cart details
    $total = 0;
    foreach ($_SESSION['cart'] as $cartItem) {
        $total += $cartItem['price'] * $cartItem['quantity'];
    }

    // order details
    $accID = $_SESSION['user']['accID'];
    $type = $_POST['type'];
    $method = $_POST['method'];
    $date = $_POST['date'];

    // contact details
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['number'];
    $address = $_POST['address'];

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

    // INSERT into ORDER_LINE table
    foreach ($_SESSION['cart'] as $cartItem) {
        $prodID = $cartItem['id'];
        $quantity = $cartItem['quantity'];
        $price = $cartItem['price'] * $quantity;

        $query = "INSERT INTO `order_line`(`Order_ID`, `Prod_ID`, `Order_Quantity`, `Line_Price`) 
                VALUES ('$orderID', '$prodID', '$quantity', '$price')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>console.log("Order line submitted.")</script>';
        } else {
            echo '<script>console.log("Failed to submit order line...")</script>';
            // echo mysqli_error($conn);
        }
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

    // Empty the cart
    unset($_SESSION['cart']);

    mysqli_close($conn);    
    header('Location: ../../src/account.php#orderHistory');
}


// ADMIN FUNCTIONS -----------------------

// Add Product
if (isset($_POST['addProductBtn'])) {
    $conn = db_connect();

    //Product info
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
        $_SESSION['status'] = "Extension not allowed, please choose a JPEG, PNG, GIF or JFIF file.";
        $_SESSION['status_code'] = "error";
        header('Location: ../../admin-src/products.php');
    } else {
        // UPLOAD TO DATABASE
        if (mysqli_query($conn, $product_query)) {
            $_SESSION['status'] = "Product Successfully Added!";
            $_SESSION['status_code'] = "success";
            header('Location: ../../admin-src/products.php');
        } else {
            $_SESSION['status'] = "Failed to Add Product. Try Again.";
            $_SESSION['status_code'] = "error";
            header('Location: ../../admin-src/products.php');
        }
    }

    mysqli_close($conn);   
}

// Delete Product
if (isset($_POST['deleteProdBtn'])) {
    $conn = db_connect();

    $productID = $_POST['deleteProdID'];

    $delete_query = "DELETE FROM `side_products` WHERE `SideProd_ID` = '$productID' LIMIT 1";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Product Successfully Deleted!";
        $_SESSION['status_code'] = "success";
        header('Location: ../../admin-src/products.php');      
    } else {
        $_SESSION['status'] = "Failed to Delete Product";
        $_SESSION['status_code'] = "error";
        header('Location: ../../admin-src/products.php');
    }

    mysqli_close($conn);
}

// Edit Product Info
if (isset($_POST['editProdInfoBtn'])){
    $conn = db_connect();
    
    //Product info
    $prodID = $_POST['prodID'];
    $categID = $_POST['prodCateg'];
    $prodName = mysqli_real_escape_string($conn, $_POST['prodName']);
    $desc = mysqli_real_escape_string($conn, $_POST['prodDesc']);

    $edit_query = "UPDATE `side_products` SET
                   `SideProd_Name` = '$prodName',
                   `Categ_ID` = '$categID',
                   `SideProd_Desc` = '$desc'
                   WHERE SideProd_ID = '$prodID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Product Information Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }else{
        $_SESSION['status'] = "Failed to Update Product Information";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }

    mysqli_close($conn);

}

//Edit Product Image
if (isset($_POST['editImgBtn'])){
    $conn = db_connect();

    $prodID = $_POST['prodID'];
    $file_name = $_FILES['prodImage']['name'];
    $file_tmp = $_FILES['prodImage']['tmp_name'];
    $tmp = explode('.', $_FILES['prodImage']['name']);
    $file_ext = strtolower(end($tmp));
    $extensions = array("jpeg", "jpg", "png", "gif", "jfif");

    $uploads_dir = 'assets';
    move_uploaded_file($file_tmp, $uploads_dir . '/' . $file_name);

    $edit_query = "UPDATE `side_products` SET
                   `SideProd_Image` = '$file_name'
                   WHERE SideProd_ID = '$prodID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if ($file_name == "") {
        echo '<script>alert("NO image entered")</script>';
    } elseif (in_array($file_ext, $extensions) === false) {
        $_SESSION['status'] = "Extension not allowed, please choose a JPEG, PNG, GIF or JFIF file.";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    } else {
        // UPDATE IMAGE
        if($edit_query_run){
            $_SESSION['status'] = "Product Image Successfully Updated!";
            $_SESSION['status_code'] = "success";
            header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
        }else{
            $_SESSION['status'] = "Failed to Update Product Image";
            $_SESSION['status_code'] = "error";
            header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
        }
    }

    mysqli_close($conn);
}

//Add Price Information
if (isset($_POST['addPriceInfoBtn'])){
    $conn = db_connect();

    $prodID = $_POST['prodID'];
    $sizePrice = $_POST['sizePrice'];
    $sizeDesc = mysqli_real_escape_string($conn, $_POST['sizeDesc']);

    $add_query = "INSERT INTO `sideproduct_sizes` (`Prod_ID`, `Size_Description`, `Size_Price`)
                  VALUES ('$prodID', '$sizeDesc', '$sizePrice')";
    $add_query_run = mysqli_query($conn, $add_query);

    if($add_query_run){
        $_SESSION['status'] = "Price Info Successfully Added!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }else{
        $_SESSION['status'] = "Failed to Add Price Info";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }

    mysqli_close($conn);

}

//Edit Price Info
if (isset($_POST['editPriceInfoBtn'])){
    $conn = db_connect();

    $sizeID = $_POST['sizeID'];
    $prodID = $_POST['prodID'];
    $sizePrice = $_POST['sizePrice'];
    $sizeDesc = mysqli_real_escape_string($conn, $_POST['sizeDesc']);

    $edit_query = "UPDATE `sideproduct_sizes` SET
                  `Size_Description` = '$sizeDesc',
                  `Size_Price` = '$sizePrice'
                  WHERE Size_ID = '$sizeID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Price Info Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }else{
        $_SESSION['status'] = "Failed to Update Price Info";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }

    mysqli_close($conn);
}

//Delete Price Info
if (isset($_POST['deletePriceInfoBtn'])) {
    $conn = db_connect();

    $sizeID = $_POST['deleteSizeID'];
    $prodID = $_POST['prodID'];

    $delete_query = "DELETE FROM `sideproduct_sizes` WHERE `Size_ID` = '$sizeID' LIMIT 1";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Price Info Successfully Deleted!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");      
    } else {
        $_SESSION['status'] = "Failed to Delete Price Info";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productDetails.php?prod_ID=$prodID");
    }

    mysqli_close($conn);
}