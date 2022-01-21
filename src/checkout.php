<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Checkout</title>
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
            <div class="col pe-5 pt-3">
                <h2 class="text-titleColor text-center">Order Details</h2>
                <div class="row-cols-2 text-center mt-n3">
                    <img class="img-fluid" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                <form class="container-fluid px-0 mt-5 pb-4" action="" method="post">
                    <div class="row mb-5">
                        <label class="form-label text-subheading fw-bolder mb-2" for="type">ORDER TYPE:</label>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="pickup">
                            <label class="form-check-label text-content" for="pickup">Pick-up</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="delivery">
                            <label class="form-check-label text-content" for="delivery">Delivery</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="form-label text-subheading fw-bolder mb-2" for="method">PAYMENT METHOD:</label>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="cash">
                            <label class="form-check-label text-content" for="cash">Cash</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="gcash">
                            <label class="form-check-label text-content" for="gcash">GCash</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="paypal">
                            <label class="form-check-label text-content" for="paypal">Paypal</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="bdo">
                            <label class="form-check-label text-content" for="bdo">BDO</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" value="bpi">
                            <label class="form-check-label text-content" for="bpi">BPI</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-5">
                            <label class="form-label text-subheading fw-bolder mb-2" for="date">PICK-UP/DELIVERY DATE:</label>
                            <input class="form-control text-content" type="date" name="date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-3">CONTACT INFORMATION:</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="fname">First Name:</label>
                            <input class="form-control text-content" type="text" name="fname">
                        </div>
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="lname">Last Name:</label>
                            <input class="form-control text-content" type="text" name="lname">
                        </div>
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="number">Contact Number:</label>
                            <input class="form-control text-content" type="number" name="number">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <input class="btn btn-titleColor text-light px-5" type="submit" value="Confirm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 bg-section pt-4 pb-4 px-2">
                <div class="container-fluid d-flex flex-column justify-content-between h-100">
                    <!-- Regular Checkout -->
                    <?php if ($_GET['type'] == 1) { ?>
                    <div class="row justify-content-center">
                        <p class="text-center text-titleColor fs-5 fw-bolder">YOUR CART ITEMS</p>
                        <hr class="bg-content">
                        <!-- Product -->
                        <div class="row mb-3 bg-section2 p-0">
                            <div class="col-4 ps-0 overflow-hidden d-flex justify-content-center" style="max-height: 150px;">
                                <img src="../assets/pandesal.png" alt="Product_img">
                            </div>
                            <div class="col d-flex flex-column my-2">
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bolder text-subheading">Ube Cheese Pandesal</p>
                                    </div>
                                </div>
                                <div class="row flex-grow-1">
                                    <div class="col">
                                        <p class="text-content">Box of 6</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <span class="text-content"><b>TOTAL: &nbsp;</b> P150</span>
                                    </div>
                                    <div class="col-5 d-flex align-items-center">
                                        <span class="text-content"><b>QTY: &nbsp;</b> 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product -->
                        <div class="row mb-3 bg-section2 p-0">
                            <div class="col-4 ps-0 overflow-hidden d-flex justify-content-center" style="max-height: 150px;">
                                <img src="../assets/pandesal.png" alt="Product_img">
                            </div>
                            <div class="col d-flex flex-column my-2">
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bolder text-subheading">Ube Cheese Pandesal</p>
                                    </div>
                                </div>
                                <div class="row flex-grow-1">
                                    <div class="col">
                                        <p class="text-content">Box of 6</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <span class="text-content"><b>TOTAL: &nbsp;</b> P150</span>
                                    </div>
                                    <div class="col-5 d-flex align-items-center">
                                        <span class="text-content"><b>QTY: &nbsp;</b> 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <hr class="bg-content">
                        <div class="row p-0">
                            <div class="col d-flex align-items-center">
                                <span class="text-content"><b>OVERALL:</b></span>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-content fs-5 fw-bold">P250</span>
                            </div>
                        </div>
                    </div>
                    <!-- Custom Order Checkout -->
                    <?php } else if ($_GET['type'] == 2) { ?>
                    <div class="row justify-content-center">
                        <p class="text-center text-titleColor fs-5 fw-bolder">CUSTOM CAKE</p>
                        <hr class="bg-content">
                        <p class="text-content"><b class="text-subheading">FLAVOR: &nbsp;</b> CHOCOLATE</p>
                        <p class="text-content"><b class="text-subheading">SIZE: &nbsp;</b> 7 INCHES</p>
                        <p class="text-content"><b class="text-subheading">LAYERS: &nbsp;</b> 2</p>
                        <p class="text-content"><b class="text-subheading">NAME: &nbsp;</b> SPORTS THEME</p>
                        <p class="text-content"><b class="text-subheading">DESCRIPTION: &nbsp;</b> </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>
</body>
</html>
