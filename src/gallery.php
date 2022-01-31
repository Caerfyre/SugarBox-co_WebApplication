<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <link rel="stylesheet" href="../css/styleimg.css">
    <title>SugarBox&co. | Gallery</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">

    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <div class="container-fluid px-6 py-6">
        <div class="row">
            <div class="col bg-section rounded-2 p-5">
                <h2 class="text-titleColor text-center">DESSERTS GALLERY</h2>
                <div class="text-center">
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                <div class="row mt-4 tm-gallery text-content">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/cheesecake.png" alt="Image" width="500" height="600" class="img-fluid ">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Cheesecake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">16 Oct 2021</span>
                            <span>12,460 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/bentocake.png" alt="Image" width="500" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Bento Cake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">12 Oct 2021</span>
                            <span>11,402 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/pandesal.png" alt="Image" width="5000" height="600" class="img-fluid text-">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Ube Pandesal</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">8 Oct 2021</span>
                            <span>9,906 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/cookies.png" alt="Image" width="500" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Cookies</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">6 Oct 2021</span>
                            <span>16,100 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/chococake.png" alt="Image" width="5000" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Choco Cake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">26 Sep 2021</span>
                            <span>16,008 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/rosecake.png" alt="Image" width="500" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Rose Cake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">22 Sep 2021</span>
                            <span>12,860 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/sunflowercake.png" alt="Image" width="500" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Sunflower Cake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">12 Sep 2021</span>
                            <span>10,900 views</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="../assets/toycake.png" alt="Image" width="5000" height="600" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Toy Cake</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">4 Sep 2021</span>
                            <span>11,300 views</span>
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