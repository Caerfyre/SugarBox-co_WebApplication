<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co.</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">
    
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Order -->
    <div class="bg-section shadow">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col py-5" style="background-image: url('../assets/pandesal.png'); background-size: cover;">
                    <div class="py-6"></div>
                    <div class="py-6"></div>
                </div>
                <div class="col-7 text-center">
                    <h3 class="text-titleColor">Ube Cheese Pandesal</h3>
                    <p class="text-content mt-4">Homemade soft Ube cheese pandesal.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- You might also like... -->
    <div class="bg-section px-5 py-4 my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-titleColor pb-3">YOU MIGHT ALSO LIKE...</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md text-center mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                    <p class="text-subheading fs-6 fw-bold mt-3">Assorted Cookies</p>
                </div>
                <div class="col-md text-center mb-4">
                    <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                    <p class="text-subheading fs-6 fw-bold mt-3">Ube Cheese Pandesal</p>
                </div>
                <div class="col-md text-center mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                    <p class="text-subheading fs-6 fw-bold mt-3">Mini Cheesecakes</p>
                </div>
                <div class="col-md text-center mb-4">
                    <img class="img-fluid rounded-2" src="../assets/bentocake.png" alt="Bento Cakes">
                    <p class="text-subheading fs-6 fw-bold mt-3">Bento Cakes</p>
                </div>  
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include '../common/footer.php' ?>
</body>
</html>
