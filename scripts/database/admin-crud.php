<?php
include "secure-login.php";
include "./DB-connect.php";

// Add Product
if (isset($_POST['addProductBtn'])) {
    $conn = db_connect();

    // Product info
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
    
    // Product info
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

// Edit Product Image
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

// Add Price Information
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

// Edit Price Info 
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

// Delete Price Info
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

/// CATEGORIES ///

// Add Category
if (isset($_POST['addCategBtn'])) {
    $conn = db_connect();

    $categName = $_POST['categName'];
    $categ_query = "INSERT INTO `side_categories` (`Categ_Name`) VALUES('$categName')";
    $categ_query_run = mysqli_query($conn, $categ_query);

    if($categ_query_run){
        $_SESSION['status'] = "Category Successfully Added!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productCategories.php");
    }else{
        $_SESSION['status'] = "Failed to Add Category";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productCategories.php");
    }
    mysqli_close($conn);
}

// Edit Category
if (isset($_POST['EditCategBtn'])) {
    $conn = db_connect();

    $categID = $_POST['categID'];
    $categName = $_POST['categName'];

    $edit_query = "UPDATE `side_categories` SET `Categ_Name` = '$categName' WHERE Categ_ID = '$categID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Category Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productCategories.php");
    }else{
        $_SESSION['status'] = "Failed to Update Category";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productCategories.php");
    }
    mysqli_close($conn);
}

// Delete Category
if (isset($_POST['deleteCategBtn'])) {
    $conn = db_connect();

    $categID = $_POST['deleteCategID'];

    $delete_query = "DELETE FROM `side_categories` WHERE `Categ_ID` = '$categID' LIMIT 1";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Category Successfully Deleted!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/productCategories.php");   
    } else {
        $_SESSION['status'] = "Failed to Delete Category";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/productCategories.php");
    }

    mysqli_close($conn);
}

/// ORDER DETAILS ///

// Update Order Details
if (isset($_POST['editOrderDetails'])) {
    $conn = db_connect();

    $orderID = $_POST['orderID'];
    $newPrice = $_POST['newPrice'];
    $newStatus = $_POST['newStatus'];

    $edit_query = "UPDATE `orders` SET `Order_Status` = '$newStatus', `Total_Price` = '$newPrice' 
                    WHERE Order_ID = '$orderID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Order Details Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }else{
        $_SESSION['status'] = "Failed to Update Order Details";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }

    mysqli_close($conn);
}

// Update Customer Info
if (isset($_POST['editCustInfo'])) {
    $conn = db_connect();

    $orderID = $_POST['orderID'];
    $paymentID = $_POST['paymentID'];
    $newType = $_POST['newType'];
    $newStatus = $_POST['newStatus'];

    $edit_query = "UPDATE `payment` SET `Payment_Type` = '$newType', `Payment_Status` = '$newStatus' 
                    WHERE Payment_ID = '$paymentID'";
    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Customer Information Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }else{
        $_SESSION['status'] = "Failed to Update Customer Information";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }

    mysqli_close($conn);
}

// Update Cake Details
if (isset($_POST['editCakeDetails'])) {
    $conn = db_connect();

    $orderID = $_POST['orderID'];
    $newStatus = $_POST['newStatus'];
    $newPrice = $_POST['newPrice'];

    if ($newPrice != "") {
        $edit_query = "UPDATE `cake_orders`
                    SET `Cake_Price` = '$newPrice', `Price_Status` = 'Set' , `Status` = '$newStatus'
                    WHERE Order_ID = '$orderID'";
        $edit_query2 = "UPDATE `orders` SET `Total_Price` = '$newPrice'
                    WHERE Order_ID = '$orderID'";

        $edit_query_run2 = mysqli_query($conn, $edit_query2);
    } else {
        $edit_query = "UPDATE `cake_orders`
                    SET `Status` = '$newStatus'
                    WHERE Order_ID = '$orderID'";
    }

    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run){
        $_SESSION['status'] = "Cake Details Successfully Updated!";
        $_SESSION['status_code'] = "success";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }else{
        $_SESSION['status'] = "Failed to Update Cake Details";
        $_SESSION['status_code'] = "error";
        header("Location: ../../admin-src/orderDetails.php?order_ID=${orderID}");
    }

    mysqli_close($conn);
}
