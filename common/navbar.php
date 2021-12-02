<nav class="px-5 navbar navbar-expand-lg navbar-light bg-primary sticky-top shadow p-3">
    <div class="container-fluid">
        <a href="home.php"><img class="me-3" draggable="false" alt="SugarBox Logo" src="../assets/sblogo-1.svg"></a>
        <button class="navbar-toggler border-icon border-0" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item btn-primary btn-lg text-center">
                        <a class="nav-link fw-bold text-content text-nowrap" aria-current="page" href="#">GALLERY</a>
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
                    <button class="btn btn-primary rounded-3 px-0 ms-1" name="navIcon" value="toggleProfile" type="submit">
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
<?php if ($_SESSION['functions']['toggleCart'] == true) { ?>

    <div class="container-fluid fixed-top bg-black bg-opacity-25" style="height:100%;">
        <div class="row justify-content-end overflow-auto" style="max-height:100%;">
            <div class="col-4 bg-light py-3 px-4">
                <div class="row pt-3 pb-2 ps-4 pe-5">
                    <div class="col">
                        <p class="fs-5 fw-bolder text-content">YOUR ORDER</p>
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
                <!-- Product -->
                <div class="row mx-2 mb-3 bg-section">
                    <div class="col-4 ps-0 overflow-hidden" style="max-height: 175px;">
                        <img class="" src="../assets/pandesal.png" alt="Product_img">
                    </div>
                    <div class="col my-3 px-3 d-flex flex-column">
                        <div class="row">
                            <div class="col">
                                <p class="fw-bolder text-subheading">Ube Cheesecake Pandesal</p>
                            </div>
                            <div class="col-auto ps-0 mt-n2">
                                <i class="bi bi-x fs-3"></i>
                            </div>
                        </div>
                        <div class="row flex-grow-1">
                            <div class="col">
                                <p class="text-content">Box of 6 - P75</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <span class="text-content"><b>TOTAL: &nbsp;</b> P150</span>
                            </div>
                            <div class="col-auto bg-light d-flex align-items-center rounded-2 border border-content px-0 me-3">
                                <form action="py-0" method="post">
                                    <button class="btn py-0">-</button>
                                    <span>2</span>
                                    <button class="btn py-0">+</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="row mx-2 mb-3 bg-section">
                    <div class="col-4 ps-0 overflow-hidden" style="max-height: 175px;">
                        <img class="" src="../assets/pandesal.png" alt="Product_img">
                    </div>
                    <div class="col my-3 px-3 d-flex flex-column">
                        <div class="row">
                            <div class="col">
                                <p class="fw-bolder text-subheading">Ube Cheesecake Pandesal</p>
                            </div>
                            <div class="col-auto ps-0 mt-n2">
                                <i class="bi bi-x fs-3"></i>
                            </div>
                        </div>
                        <div class="row flex-grow-1">
                            <div class="col">
                                <p class="text-content">Box of 6 - P75</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <span class="text-content"><b>TOTAL: &nbsp;</b> P150</span>
                            </div>
                            <div class="col-auto bg-light d-flex align-items-center rounded-2 border border-content px-0 me-3">
                                <form action="py-0" method="post">
                                    <button class="btn py-0">-</button>
                                    <span>2</span>
                                    <button class="btn py-0">+</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout -->
                <div class="row mx-2 mt-6">
                    <hr class="border-bottom border-2 border-content">
                </div>
                <div class="row mx-2">
                    <div class="col fs-5 fw-bolder px-0">
                        <p class="text-content">TOTAL:</p>
                    </div>
                    <div class="col-auto fs-5 fw-bold px-0">
                        <p class="text-content">P300</p>
                    </div>
                </div>
                <div class="row mx-2 my-3 justify-content-center">
                    <div class="col px-0 text-center">
                        <button class="btn btn-titleColor text-light" type="submit">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>