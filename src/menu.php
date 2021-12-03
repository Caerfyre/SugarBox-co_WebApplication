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
                    <a href="custom-order.php"><button class="btn btn-titleColor text-light mt-3">ORDER CUSTOM CAKE</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="px-5 py-6">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <h2 class="text-titleColor text-center">DESSERTS MENU</h2>
                <img class="col-md-5 img-fluid mt-n4" src="../assets/leaves.svg" draggable="false" alt="">
            </div>
            <div class="row gy-4">
                <div class="col-md-2 p-0 me-5">
                    <div class="container-fluid bg-section rounded-2 fw-bolder ps-4 pt-4 pb-3">
                        <p class="mt-2 mb-4 ms-2"><a class="text-decoration-none text-subheading" href="#">Brownies</a></p>
                        <p class="ms-2 mb-4"><a class="text-decoration-none text-subheading" href="#">Cheesecakes</a></p>
                        <p class="ms-2 mb-4"><a class="text-decoration-none text-subheading" href="#">Cookies</a></p>
                        <p class="ms-2 mb-4"><a class="text-decoration-none text-subheading" href="#">Cupcakes</a></p>
                        <p class="ms-2 mb-4"><a class="text-decoration-none text-subheading" href="#">Pandesal</a></p>
                    </div>
                </div>
                <div class="col container-fluid">
                    <div class="row justify-content-center">
                        <!-- Products -->
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                            <p class="text-subheading fs-5 fw-bold mt-3">Assorted Cookies</p>
                            <p class="text-content">Includes: Oatmeal, Matcha, Chocolate chip, Red Velvet, Oreo, Double Choc Chip, Brookie Flavors and More!</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                            <p class="text-subheading fs-5 fw-bold mt-3">Mini Cheesecakes</p>
                            <p class="text-content">Includes: Strawberry, Blueberry, & Mango Toppings.</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                            <p class="text-subheading fs-5 fw-bold mt-3">Ube Cheese Pandesal</p>
                            <p class="text-content">Homemade soft Ube cheese pandesal. Also available: Ube Macapuno filling.</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                            <p class="text-subheading fs-5 fw-bold mt-3">Assorted Cookies</p>
                            <p class="text-content">Includes: Oatmeal, Matcha, Chocolate chip, Red Velvet, Oreo, Double Choc Chip, Brookie Flavors and More!</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                            <p class="text-subheading fs-5 fw-bold mt-3">Mini Cheesecakes</p>
                            <p class="text-content">Includes: Strawberry, Blueberry, & Mango Toppings.</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                            <p class="text-subheading fs-5 fw-bold mt-3">Ube Cheese Pandesal</p>
                            <p class="text-content">Homemade soft Ube cheese pandesal. Also available: Ube Macapuno filling.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>

</body>

</html>