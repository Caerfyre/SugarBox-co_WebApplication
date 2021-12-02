<?php session_start() ?>
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

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true) echo 'overflow-hidden' ?>">

    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Order Custom Cakes -->
    <div class="bg-section px-5 py-6">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-5">
                <div class="col-md-4 text-center">
                    <img class="img-fluid" src="../assets/custom-cake.png" alt="Custom_cake">
                </div>
                <div class="col-md text-center">
                    <h2 class="text-center text-titleColor">ORDER CUSTOM CAKES</h2>
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                    <p class="text-content fw-bold m-3">Want something personalized to give for a special ocassion? Order a custom cake!
                        You can choose from our catalogue of flavors, sizes and more! The design is
                        completely up to YOU. What are you waiting for? Order a custom cake now!</p>
                    <button class="btn btn-titleColor text-light mt-3">ORDER CUSTOM CAKE</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include '../common/footer.php' ?>

</body>

</html>