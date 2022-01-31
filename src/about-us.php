<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | About Us</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
    .img2 img {
	width: 140px;
	height: 140px;
	border: 7px solid white;
	margin-top: -60px;
    }
    .card:hover .img2 img {
        border-color: #F3E4D9;
        transition: 1s;
    }
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">

    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- ABOUT COMPANY -->
    <div class="px-5 py-6">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-5 gx-5">
                <div class="col-md text-center">
                    <h2 class="text-center text-titleColor">ABOUT THE COMPANY</h2>
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                    <p class="text-content fw-bold m-3">Sugarbox&co. was conceptualized and formed in the year 2020
                        to bring homemade treats and sweets to families and friends stuck at home. We
                        strive to allow our customers the creative freedom to customize their own goodies.
                        Today, Sugarbox&co. has satisfied numerous customers since its early days.</p>
                    <a href="contact-us.php"><button class="btn btn-titleColor text-light mt-3">Contact Us</button></a>
                </div>
                <div class="col-md-5 text-center">
                    <img class="img-fluid" src="../assets/about-us.png" alt="About_us">
                </div>
            </div>
        </div>
    </div>

    <!-- MISSION -->
    <div class="bg-section px-5 py-6">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-5 gx-5">
                <div class="col-md-5 text-center">
                    <img class="img-fluid" src="../assets/about-us.png" alt="About_us">
                </div>
                <div class="col-md text-center">
                    <h2 class="text-center text-titleColor">OUR MISSION</h2>
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                    <p class="text-content fw-bold m-3">We believe in the art of homemade baked goods,
                        that's why we never skimp. We handcraft each pastry with high quality natural ingredients and passion in our hearts,
                        providing each customer the best pastry that they can enjoy with their family and friends.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOUNDERS -->
    <div class="px-5 py-6">
        <div class="profile-area container">
            <div class="row justify-content-center align-items-center gy-5 gx-5">
                <div class="col-md text-center">
                    <h2 class="text-center text-titleColor">THE FOUNDERS</h2>
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                    <div class="row justify-content-center pt-5 gy-5">
                        <!-- Founder Card -->
                        <div class="col-lg-4">
                            <div class="card bg-white shadow-lg rounded-3">
                                <div class="col">
                                    <img class="img-fluid rounded-3 rounded-bottom" src="../assets/splash.svg" alt="Background">
                                </div>
                                <div class="img2 d-flex justify-content-center">
                                    <img class="rounded-circle" src="../assets/pandesal.png" alt="Founder">
                                </div>
                                <div class="mx-5">
                                    <h3 class="text-titleColor mt-3 mb-4">FOUNDER</h3>
                                    <p class="text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="text-icon fs-4 pt-3 pb-4">
                                    <i class="bi bi-facebook px-3"></i>
                                    <i class="bi bi-instagram px-3"></i>
                                    <i class="bi bi-twitter px-3"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Founder Card -->
                        <div class="col-lg-4">
                            <div class="card bg-white shadow-lg rounded-3">
                                <div class="col">
                                    <img class="img-fluid rounded-3 rounded-bottom" src="../assets/splash.svg" alt="Background">
                                </div>
                                <div class="img2 d-flex justify-content-center">
                                    <img class="rounded-circle" src="../assets/pandesal.png" alt="Founder">
                                </div>
                                <div class="mx-5">
                                    <h3 class="text-titleColor mt-3 mb-4">FOUNDER</h3>
                                    <p class="text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="text-icon fs-4 pt-3 pb-4">
                                    <i class="bi bi-facebook px-3"></i>
                                    <i class="bi bi-instagram px-3"></i>
                                    <i class="bi bi-twitter px-3"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Founder Card -->
                        <div class="col-lg-4">
                            <div class="card bg-white shadow-lg rounded-3">
                                <div class="col">
                                    <img class="img-fluid rounded-3 rounded-bottom" src="../assets/splash.svg" alt="Background">
                                </div>
                                <div class="img2 d-flex justify-content-center">
                                    <img class="rounded-circle" src="../assets/pandesal.png" alt="Founder">
                                </div>
                                <div class="mx-5">
                                    <h3 class="text-titleColor mt-3 mb-4">FOUNDER</h3>
                                    <p class="text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="text-icon fs-4 pt-3 pb-4">
                                    <i class="bi bi-facebook px-3"></i>
                                    <i class="bi bi-instagram px-3"></i>
                                    <i class="bi bi-twitter px-3"></i>
                                </div>
                            </div>
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