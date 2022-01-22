<?php
include "secure-login.php";

//ADD PRODUCTS
if (isset($_POST['addProductBtn'])) {
    $prodName = mysqli_real_escape_string($conn, $_POST['prodName']);
    $prodCateg = mysqli_real_escape_string($conn, $_POST['prodCateg']);
    $prodDesc = mysqli_real_escape_string($conn, $_POST['prodDesc']);

    $file_name = $_FILES['prodImage']['name']; 
    $file_tmp = $_FILES['prodImage']['tmp_name'];
    $tmp = explode('.', $_FILES['prodImage']['name']); 
    $file_ext = strtolower(end($tmp));
    $extensions= array("jpeg","jpg","png","gif","jfif");

    $uploads_dir = 'assets'; 
    move_uploaded_file($file_tmp, $uploads_dir.'/'.$file_name);

    $product_query = "INSERT INTO `side_products`(SideProd_Name, Categ_ID, SideProd_Desc, SideProd_Image) 
                      VALUES('$prodName','$prodCateg', '$prodDesc', '$file_name')";

    if($file_name == ""){
        echo '<script>alert("NO image entered")</script>';
    }
    elseif(in_array($file_ext,$extensions) === false){
        echo '<script>alert("Extension not allowed, please choose a JPEG, PNG, GIF or JFIF file.")</script>';
    }else{

        //UPLOAD TO DATABASE
        if(mysqli_query($conn,$product_query)){
            echo '<script>alert("Product Added.")</script>';
            header('Location: ../../admin-src/products.php');

        }else{
            echo '<script>alert("Failed to add product")</script>';
        }
    }
}
?>