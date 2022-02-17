<nav class="px-5 navbar navbar-expand-lg navbar-light bg-primary sticky-top shadow p-3">
    <div class="container-fluid">
        <a href="home.php"><img class="me-3" draggable="false" alt="SugarBox Logo" src="../assets/sblogo-1.svg"></a>
        <button class="navbar-toggler border-icon border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
            <img draggable="false" src="../assets/iconmenu.svg" alt="Menu">
        </button>
        <div class="collapse navbar-collapse" id="navbarID">
            <div class="d-flex flex-row justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="home.php">HOME</a>
                    </li>
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="menu.php">MENU</a>
                    </li>
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="about-us.php">ABOUT US</a>
                    </li>
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="gallery.php">GALLERY</a>
                    </li>
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="contact-us.php">CONTACT US</a>
                    </li>
                </ul>
            </div>

            <!-- Nav Icons -->
            <form class="col-auto ms-auto px-0" action="../scripts/functions/navicons.php" method="post">
                <div class="d-flex flex-row-reverse justify-content-center">
                    <button class="btn btn-primary rounded-3 px-0 ms-1" name="navIcon" value="toggleCart" type="submit">
                        <img class="py-1 px-3" draggable="false" src="../assets/iconbasket.svg" alt="Cart_icon">
                    </button>
                    <button class="btn btn-primary rounded-3 px-0 ms-1" name="navIcon" value="toggleOptions" type="submit">
                        <img class="py-1 px-3" draggable="false" src="../assets/iconprofile.svg" alt="Profile_icon">
                    </button>
                    <button class="btn btn-primary rounded-3 px-0 ms-1" name="navIcon" value="toggleSearch" type="submit">
                        <img class="py-1 px-3" draggable="false" src="../assets/iconsearch.svg" alt="Search_icon">
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Your Order -->
<?php if (isset($_SESSION['functions']['toggleCart']) && $_SESSION['functions']['toggleCart']) { ?>
    <div class="container-fluid fixed-top bg-black bg-opacity-25" style="height:100%;">
        <div class="row justify-content-end overflow-auto" style="max-height:100%;">
            <div class="col-4 bg-light py-3 px-4">
                <div class="row pt-3 pb-2 ps-4 pe-5">
                    <div class="col">
                        <p class="fs-5 fw-bolder text-content">YOUR ORDERS</p>
                    </div>
                    <form class="col-auto text-end" action="../scripts/functions/navicons.php" method="post">
                        <button class="btn rounded-3 px-0 py-0" name="navIcon" value="toggleCart" type="submit">
                            <img class="img-fluid" draggable="false" src="../assets/iconbasket.svg" alt="Purchase_icon"></a>
                        </button>
                    </form>
                </div>
                <div class="row mx-2">
                    <hr class="border-bottom border-2 border-content">
                </div>
                <?php if (!isset($_SESSION['cart'])) { ?>
                    <div class="row text-content mx-2 mt-5">
                        <p class="text-center fw-bold">Your cart is empty...</p>
                        <a class="text-center text-titleColor" href="#">Order something!</a>
                    </div>
                <?php } else { ?>
                <?php $index = -1 ?>
                <?php foreach ($_SESSION['cart'] as $cartItem) { ?>
                    <?php $cartProduct = getProduct($cartItem['id']); ?>
                    <?php $index++; ?>
                    <!-- Product -->
                    <div class="row mx-2 mb-3 bg-section align-items-center">
                        <div class="col-4 ps-0 overflow-hidden d-flex justify-content-center" style="max-height: 150px;">
                            <img src="../assets/<?php echo $cartProduct[0]['SideProd_Image'] ?>" alt="Product_img">
                        </div>
                        <div class="col my-3 d-flex flex-column align">
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bolder text-subheading"><?php echo $cartProduct[0]['SideProd_Name'] ?></p>
                                </div>
                                <form class="col-auto ps-0 mt-n2" action="?item=<?php echo $index ?>" method="post">
                                    <button class="btn p-0" type="submit" name="delOrder">
                                        <i class="bi bi-x fs-3"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="row flex-grow-1">
                                <div class="col">
                                    <p class="text-content">
                                        <?php foreach ($cartProduct as $details) {
                                            if ($details['Size_Price'] == $cartItem['price'])
                                                echo $details['Size_Description'] . " - P" . $details['Size_Price'];
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <span class="text-content"><b>TOTAL: &nbsp;</b> P<?php echo $cartItem['price'] * $cartItem['quantity'] ?></span>
                                </div>
                                <div class="col-auto bg-light d-flex align-items-center rounded-2 border border-content px-0 me-3">
                                    <form class="d-flex align-items-center" action="?item=<?php echo $index ?>" method="post">
                                        <input class="btn py-0" type="submit" name="decCount" value="-">
                                        <span><?php echo $cartItem['quantity'] ?></span>
                                        <input class="btn py-0" type="submit" name="incCount" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                <!-- Checkout -->
                <div class="row mx-2 mt-6">
                    <hr class="border-bottom border-2 border-content">
                </div>
                <div class="row mx-2">
                    <div class="col fs-5 fw-bolder px-0">
                        <p class="text-content">TOTAL:</p>
                    </div>
                    <div class="col-auto fs-5 fw-bold px-0">
                        <p class="text-content">
                        <?php
                            if (!isset($_SESSION['cart'])) {
                                echo "P0";
                            } else {
                                $total = 0;
                                foreach ($_SESSION['cart'] as $cartItem) {
                                    $total += $cartItem['price'] * $cartItem['quantity'];
                                }
                                echo "P" . $total;
                            }
                        ?>
                        </p>
                    </div>
                </div>
                <div class="row mx-2 my-3 justify-content-center">
                    <div class="col px-0 text-center">
                        <form action="../scripts/functions/navicons.php" method="post">
                            <input <?php if (!isset($_SESSION['cart'])) echo "disabled" ?> class="btn btn-titleColor text-light" type="submit" name="checkout" value="Checkout">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Profile Options -->
<?php if (isset($_SESSION['functions']['toggleOptions']) && $_SESSION['functions']['toggleOptions']) { ?>
    <div class="container-fluid fixed-top bg-black bg-opacity-25" style="height:100%;">
        <div class="row justify-content-end overflow-auto" style="max-height:100%;">
            <div class="col-4 bg-light py-3 px-4">
                <div class="row pt-3 pb-2 ps-4 pe-5">
                    <div class="col">
                        <p class="fs-5 fw-bolder text-content">OPTIONS</p>
                    </div>
                    <form class="col-auto text-end" action="../scripts/functions/navicons.php" method="post">
                        <button class="btn rounded-3 px-0 py-0" name="navIcon" value="toggleOptions" type="submit">
                            <img class="img-fluid" draggable="false" src="../assets/iconprofile.svg" alt="Profile_icon"></a>
                        </button>
                    </form>
                </div>
                <div class="row mx-2">
                    <hr class="border-bottom border-2 border-content">
                </div>
                <div class="row mx-2 text-center">
                    <p class="text-subheading fw-bold fs-5">Hi, <?php echo $_SESSION['user']['accUsername'] ?>.</p>
                </div>
                <div class="row mx-2 mb-2">
                    <form class="px-0" action="../scripts/functions/navicons.php" method="post">
                        <!-- View Profile -->
                        <div class="input-group">
                            <i class="bi bi-person-fill input-group-text text-subheading bg-section2 border-0 mb-1"></i>
                            <input class="form-control btn btn-section2 text-start text-subheading fw-bold mb-1" name="viewProfile" type="submit" value="View Profile">
                        </div>
                        <!-- Order History -->
                        <div class="input-group">
                            <i class="bi bi-clock-fill input-group-text text-subheading bg-section2 border-0 mb-1"></i>
                            <input class="form-control btn btn-section2 text-start text-subheading fw-bold mb-1" name="viewHistory" type="submit" value="Order History">
                        </div>
                    </form>
                    <form class="px-0" action="../scripts/database/login-logout.php" method="post">
                        <!-- Logout -->
                        <div class="input-group">
                            <i class="bi bi-door-open-fill input-group-text text-subheading bg-section2 border-0"></i>
                            <input class="form-control btn btn-section2 text-start text-subheading fw-bold" name="logout" type="submit" value="Logout">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Search -->
<?php if (isset($_SESSION['functions']['toggleSearch']) && $_SESSION['functions']['toggleSearch']) { ?>
    <div class="container-fluid fixed-top bg-black bg-opacity-25" style="height:100%;">
        <div class="row justify-content-end overflow-auto" style="max-height:100%;">
            <div class="col-4 bg-light py-3 px-4">
                <div class="row pt-3 pb-2 ps-4 pe-5">
                    <div class="col">
                        <p class="fs-5 fw-bolder text-content">SEARCH</p>
                    </div>
                    <form class="col-auto text-end" action="../scripts/functions/navicons.php" method="post">
                        <button class="btn rounded-3 px-0 py-0" name="navIcon" value="toggleSearch" type="submit">
                            <img class="img-fluid" draggable="false" src="../assets/iconsearch.svg" alt="Search_icon"></a>
                        </button>
                    </form>
                </div>
                <div class="row mx-2">
                    <hr class="border-bottom border-2 border-content">
                </div>
                <div class="row mx-2 mb-3">
                    <form class="px-0" action="" method="post">
                        <div class="input-group">
                            <input class="form-control text-content" type="text" name="searchTerm" placeholder="Input search term">
                            <input class="btn btn-titleColor text-light" type="submit" value="Search">
                        </div>
                    </form>
                </div>
                <!-- Product -->
                <!-- <a href="../src/order-item.php?id=1" class="row mx-2 mb-3 bg-section text-decoration-none">
                    <div class="col-4 ps-0 overflow-hidden d-flex justify-content-center" style="max-height: 150px;">
                        <img src="../assets/pandesal.png" alt="Product_img">
                    </div>
                    <div class="col my-3 px-3 d-flex flex-column">
                        <div class="row">
                            <div class="col">
                                <p class="fw-bolder text-subheading">Ube Cheese Pandesal</p>
                            </div>
                        </div>
                        <div class="row flex-grow-1">
                            <div class="col">
                                <p class="text-content">P75</p>
                            </div>
                        </div>
                    </div>
                </a> -->
            </div>
        </div>
    </div>
<?php } ?>
