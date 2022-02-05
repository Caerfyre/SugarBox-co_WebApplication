<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Menu</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">

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
    <div class="px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2 bg-section2 border-top border-light p-0 me-5 pt-4">
                    <div class="mx-3 mb-4">
                        <input class="form-control form-control-sm text-content border-primary" type="search" placeholder="Search the menu">
                    </div>
                    <div>
                        <p class="m-3"><b class="text-content">Types</b></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Cakes</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Sides</a></p>
                    </div>
                    <hr class="bg-content mx-3 my-4">
                    <div>
                        <p class="m-3"><b class="text-content">Categories</b></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">All</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Brownies</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Cheesecakes</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Cookies</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Cupcakes</a></p>
                        <p class="m-3"><a class="text-decoration-none text-content" href="#">Pandesal</a></p>
                    </div>
                </div>
                <div class="col container-fluid py-6">
                <div class="row justify-content-center pb-5">
                    <h2 class="text-titleColor text-center">DESSERTS MENU</h2>
                    <img class="col-md-7 img-fluid mt-n4" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                    <div class="row justify-content-center">
                        <!-- Products -->
                        <a href="./order-item.php?id=1" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                            <p class="text-subheading fs-5 fw-bold mt-3">Assorted Cookies</p>
                            <p class="text-content">Includes: Oatmeal, Matcha, Chocolate chip, Red Velvet, Oreo, Double Choc Chip, Brookie Flavors and More!</p>
                        </a>
                        <a href="./order-item.php?id=2" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                            <p class="text-subheading fs-5 fw-bold mt-3">Mini Cheesecakes</p>
                            <p class="text-content">Includes: Strawberry, Blueberry, & Mango Toppings.</p>
                        </a>
                        <a href="./order-item.php?id=3" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                            <p class="text-subheading fs-5 fw-bold mt-3">Ube Cheese Pandesal</p>
                            <p class="text-content">Homemade soft Ube cheese pandesal. Also available: Ube Macapuno filling.</p>
                        </a>
                        <a href="./order-item.php?id=1" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                            <p class="text-subheading fs-5 fw-bold mt-3">Assorted Cookies</p>
                            <p class="text-content">Includes: Oatmeal, Matcha, Chocolate chip, Red Velvet, Oreo, Double Choc Chip, Brookie Flavors and More!</p>
                        </a>
                        <a href="./order-item.php?id=2" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                            <p class="text-subheading fs-5 fw-bold mt-3">Mini Cheesecakes</p>
                            <p class="text-content">Includes: Strawberry, Blueberry, & Mango Toppings.</p>
                        </a>
                        <a href="./order-item.php?id=3" class="text-decoration-none col-md-4 text-center mb-4">
                            <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                            <p class="text-subheading fs-5 fw-bold mt-3">Ube Cheese Pandesal</p>
                            <p class="text-content">Homemade soft Ube cheese pandesal. Also available: Ube Macapuno filling.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>

</body>

</html>