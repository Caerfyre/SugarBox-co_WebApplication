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
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true) echo 'overflow-hidden' ?>">

    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Splash Image -->
    <div style="background-image: url('../assets/splash.svg'); background-size: cover;">
        <div class="px-6 py-5">
            <div class="container py-4 bg-light rounded-3" style="visibility:hidden;">
                <div class="row align-items-center">
                    <div class="col-md my-4">
                        <img class="img-fluid ps-4" draggable="false" src="../assets/sblogo-2.svg" alt="">
                    </div>
                    <div class="col-md-5 text-center pe-3 my-4">
                        <div>
                            <h3 class="text-titleColor">ORDER NOW FOR PICK-UP OR DELIVERY</h3>
                        </div>
                        <div>
                            <p class="text-content mb-4">Cakes, Cupcakes, Cookies & more!</p>
                        </div>
                        <div><button class="btn btn-titleColor text-white">ORDER HERE</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col bg-section">
                CONTACT US
            </div>
            <div class="col-4 bg-section2">
                EMAIL
                CONTACT NUMBER
                LOCATION
                SOCIAL MEDIA
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>

</body>

</html>