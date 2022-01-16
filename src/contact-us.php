<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Contact Us</title>
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
            <div class="col bg-section p-5">
                <h2 class="text-titleColor">CONTACT US</h2>
                <p class="text-content fw-bold mt-3">Have a question? Send us a message.</p>
                <form class="container-fluid px-0 mt-5" action="" method="post">
                    <div class="row mb-4">
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="name">NAME:</label>
                            <input class="form-control text-content" type="text" name="name">
                        </div>
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="email">EMAIL:</label>
                            <input class="form-control text-content" type="text" name="email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="subject">SUBJECT:</label>
                            <input class="form-control text-content" type="text" name="subject">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="message">MESSAGE:</label>
                            <textarea class="form-control text-content" rows="10" name="message"></textarea>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <input class="btn btn-titleColor text-light px-5" type="submit" value="Send">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 bg-section2 py-5 px-4">
                <div class="container-fluid">
                    <div class="row mb-5">
                        <p class="text-subheading fw-bolder mb-2 ps-2">EMAIL</p>
                        <div class="col-auto pe-0">
                            <i class="bi bi-envelope text-content fs-4"></i>
                        </div>
                        <div class="col">
                            <p class="text-content fw-bold mt-1 mb-0">sugarboxco.ph@gmail.com</p>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <p class="text-subheading fw-bolder mb-2 ps-2">CONTACT NUMBER</p>
                        <div class="col-auto pe-0">
                            <i class="bi bi-telephone text-content fs-4"></i>
                        </div>
                        <div class="col">
                            <p class="text-content fw-bold mt-1 mb-0">495-8583</p>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <p class="text-subheading fw-bolder mb-2 ps-2">LOCATION</p>
                        <div class="col-auto pe-0">
                            <i class="bi bi-geo-alt text-content fs-4"></i>
                        </div>
                        <div class="col">
                            <p class="text-content fw-bold mt-1 mb-0">Lapu-Lapu City Philippines</p>
                        </div>
                    </div>
                    <div class="row">
                        <p class="text-subheading fw-bolder mb-2 ps-2">SOCIAL MEDIA</p>
                        <div class="col-auto pe-0">
                            <i class="bi bi-instagram text-content fs-4"></i>
                        </div>
                        <div class="col">
                            <p class="text-content fw-bold mt-1 mb-0">@sugarboxco.ph</p>
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