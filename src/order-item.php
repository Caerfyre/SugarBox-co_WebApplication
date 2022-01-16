<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Order</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">
    
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Order -->
    <div class="bg-section shadow">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col py-5" style="background-image: url('../assets/pandesal.png'); background-size: cover;">
                    <div class="py-6"></div>
                    <div class="py-6"></div>
                </div>
                <div class="col-7 text-center">
                    <div class="container">
                        <div class="row mb-4">
                            <h3 class="text-titleColor">Ube Cheese Pandesal</h3>
                            <p class="text-content mt-3">Homemade soft Ube cheese pandesal.</p>
                        </div>
                        <form action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-4 text-start me-3">
                                    <p class="fs-5 fw-bolder text-subheading">TYPE</p>
                                    <select class="form-select text-content" name="layers" aria-label="Default select example">
                                        <option selected>Select type</option>
                                        <option value="onelayered">Box of 6 - P75</option>
                                    </select>
                                    <p class="fs-5 fw-bolder text-subheading mt-5">TOTAL: &nbsp;<span class="fs-4 fw-normal text-content">P150</span></p>
                                </div>
                                <div class="col-4 text-start ms-3">
                                    <p class="fs-5 fw-bolder text-subheading">QTY.</p>
                                    <div class="col-auto bg-light d-flex align-items-center justify-content-between rounded-2 border border-primary px-0 me-3">
                                        <button class="btn border-0" onclick="document.getElementById('qty').value--">-</button>
                                        <input class="form-control border-0 bg-light text-center" type="number" name="qty" id="qty" value="0">
                                        <button class="btn border-0" onclick="document.getElementById('qty').value++">+</button>
                                    </div>
                                    <input class="btn btn-titleColor text-light mt-5" type="submit" value="Add to Cart">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- You might also like... -->
    <div class="bg-section px-5 pt-4 my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-titleColor pb-3">YOU MIGHT ALSO LIKE...</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="./order-item.php?id=1" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                    <p class="text-subheading fs-6 fw-bold mt-3">Assorted Cookies</p>
                </a>
                <a href="./order-item.php?id=2" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                    <p class="text-subheading fs-6 fw-bold mt-3">Ube Cheese Pandesal</p>
                </a>
                <a href="./order-item.php?id=3" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                    <p class="text-subheading fs-6 fw-bold mt-3">Mini Cheesecakes</p>
                </a>
                <a href="./order-item.php?id=4" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/bentocake.png" alt="Bento Cakes">
                    <p class="text-subheading fs-6 fw-bold mt-3">Bento Cakes</p>
                </a>  
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include '../common/footer.php' ?>
</body>
</html>
