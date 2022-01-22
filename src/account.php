<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Account</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">
    
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center flex-column">
            <div class="col">
                <h2 class="text-center text-titleColor">PROFILE</h2>
            </div>
            <div class="col-4 text-center mt-n3">
                <img class="img-fluid" src="../assets/leaves.svg" draggable="false" alt="">
            </div>
        </div>
    </div>

    <div class="mx-6 mb-4">
        <div class="container-fluid">
            <div class="row gap-4">
                <div class="col-lg bg-section rounded-1 p-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text-titleColor">Contact Details</h3>
                        <a href="#" class="text-decoration-none"><p class="fs-5 text-subheading mb-0">EDIT</p></a>
                    </div>
                    <hr class="bg-content mb-4 mt-2">
                    <p class="text-content fw-bolder">Full Name:</p>
                    <p class="text-content fw-bolder">Contact Number:</p>
                    <p class="text-content fw-bolder">Address:</p>
                </div>
                <div class="col-lg bg-section rounded-1 p-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text-titleColor">Account Details</h3>
                        <a href="#" class="text-decoration-none"><p class="fs-5 text-subheading mb-0">EDIT</p></a>
                    </div>
                    <hr class="bg-content mb-4 mt-2">
                    <p class="text-content fw-bolder">Username:</p>
                    <p class="text-content fw-bolder">Password:</p>
                    <a href="#" class="text-decoration-none"><p class="text-danger fw-bold">Delete Account</p></a>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="mx-6 mb-6">
        <a id="orderHistory"></a>
        <div class="bg-section rounded-1 p-5" id="orderHistory">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="text-titleColor">Order History</h3>
                <a href="#" class="text-decoration-none"><p class="fs-5 text-subheading mb-0">SEE ALL</p></a>
            </div>
            <hr class="bg-content mb-4 mt-2">
            <div class="bg-section2 rounded-2 p-3 mb-3 text-content">
                Order
            </div>
            <div class="bg-section2 rounded-2 p-3 mb-3 text-content">
                Order
            </div>
            <div class="bg-section2 rounded-2 p-3 mb-3 text-content">
                Order
            </div>
            <div class="bg-section2 rounded-2 p-3 mb-3 text-content">
                Order
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>
</body>
</html>
