<?php include '../scripts/database/secure-login.php'?>
<?php include '../scripts/database/DB-connect.php' ?>
<?php if (isset($_GET['type']) && $_GET['type'] == 2 && !isset($_POST['CustomCheckout'])) header("Location: custom-order.php"); ?>

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
                <?php $size = urlencode($_POST['size']) ?>
                <?php $description = urlencode($_POST['description']) ?>
                <form id="confirmForm" class="container-fluid px-0 mt-5 pb-4" 
                    action="../scripts/database/crud.php<?php if (isset($_GET['type']) && $_GET['type'] == 2) 
                        echo '?type=custom' . 
                        '&flavor=' . $_POST['flavor'] . 
                        '&layers=' . $_POST['layers'] . 
                        '&size=' . $size . 
                        '&name=' . $_POST['name'] . 
                        '&description=' . $description?>" 
                    method="post">
                    <div class="row mb-5">
                        <label class="form-label text-subheading fw-bolder mb-2" for="type">ORDER TYPE:</label>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" required value="Pick-up">
                            <label class="form-check-label text-content" for="pickup">Pick-up</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="type" required value="Delivery">
                            <label class="form-check-label text-content" for="delivery">Delivery</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="form-label text-subheading fw-bolder mb-2" for="method">PAYMENT METHOD:</label>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="method" required value="cash">
                            <label class="form-check-label text-content" for="Cash">Cash</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="method" required value="gcash">
                            <label class="form-check-label text-content" for="GCash">GCash</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="method" required value="paypal">
                            <label class="form-check-label text-content" for="Paypal">Paypal</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="method" required value="bdo">
                            <label class="form-check-label text-content" for="BDO">BDO</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="method" required value="bpi">
                            <label class="form-check-label text-content" for="BPI">BPI</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-5">
                            <label class="form-label text-subheading fw-bolder mb-2" for="date">PICK-UP/DELIVERY DATE:</label>
                            <input class="form-control text-content" type="date" name="date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-3">CONTACT INFORMATION:</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <?php $contact = getContact() ?>
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="fname">First Name:</label>
                            <input class="form-control text-content" type="text" name="fname" required 
                                value="<?php if (isset($contact['Cust_FName'])) echo $contact['Cust_FName'] ?>">
                        </div>
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="lname">Last Name:</label>
                            <input class="form-control text-content" type="text" name="lname" required 
                                value="<?php if (isset($contact['Cust_LName'])) echo $contact['Cust_LName'] ?>">
                        </div>
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="number">Contact Number:</label>
                            <input class="form-control text-content" type="number" name="number" required 
                                value="<?php if (isset($contact['Cust_ContactNo'])) echo $contact['Cust_ContactNo'] ?>">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <label class="form-label text-content fw-bold mb-2" for="address">Address:</label>
                            <input class="form-control text-content" type="text" name="address" required 
                                value="<?php if (isset($contact['Cust_Address'])) echo $contact['Cust_Address'] ?>">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <?php if (isset($_GET['type']) && $_GET['type'] == 2) { ?>
                            <a class="text-decoration-none" href="custom-order.php?<?php echo "flavor={$_POST['flavor']}&layers={$_POST['layers']}&size={$size}&name={$_POST['name']}&description={$description}" ?>">
                                <input class="btn btn-content px-5" type="button" value="Edit Cake">
                            </a>
                            <?php } ?>
                            <input <?php if (!isset($_SESSION['cart']) && (!isset($_GET['type']) || $_GET['type'] == 1)) echo "disabled" ?> class="btn btn-titleColor text-light px-5" name="pushOrder" type="submit" value="Confirm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 bg-section rounded-2 pt-4 pb-4 px-2">
                <div class="container-fluid d-flex flex-column justify-content-between h-100">
                    <!-- Regular Checkout -->
                    <?php if (!isset($_GET['type']) || $_GET['type'] == 1) { ?>
                    <div class="row justify-content-center">
                        <p class="text-center text-titleColor fs-5 fw-bolder">YOUR CART ITEMS</p>
                        <hr class="bg-content">
                        <?php if (!isset($_SESSION['cart'])) { ?>
                            <div class="row text-content m-2">
                                <p class="text-center fw-bold">Your cart is empty...</p>
                                <a class="text-center text-titleColor" href="./menu.php">Order something!</a>
                            </div>
                        <?php } else { ?>
                        <?php $index = -1 ?>
                        <?php foreach ($_SESSION['cart'] as $cartItem) { ?>
                            <?php $cartProduct = getProduct($cartItem['id']); ?>
                            <?php $index++; ?>
                            <!-- Product -->
                            <div class="row mb-3 bg-section2 p-0">
                                <div class="col-4 ps-0 overflow-hidden d-flex justify-content-center" style="max-height: 150px;">
                                    <img src="../assets/<?php echo $cartProduct[0]['SideProd_Image'] ?>" alt="Product_img">
                                </div>
                                <div class="col d-flex flex-column my-2">
                                    <div class="row">
                                        <div class="col">
                                            <p class="fw-bolder text-subheading"><?php echo $cartProduct[0]['SideProd_Name'] ?></p>
                                        </div>
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
                                        <div class="col-5 d-flex align-items-center">
                                            <span class="text-content"><b>QTY: &nbsp;</b> <?php echo $cartItem['quantity'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                    <div class="row justify-content-center">
                    <hr class="bg-content">
                        <div class="row p-0">
                            <div class="col d-flex align-items-center">
                                <span class="text-content fs-5 fw-bolder">OVERALL:</span>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-content fs-5 fw-bold">
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
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Custom Order Checkout -->
                    <?php } else if ($_GET['type'] == 2) { ?>
                    <div class="row justify-content-center">
                        <p class="text-center text-titleColor fs-5 fw-bolder">CUSTOM CAKE</p>
                        <hr class="bg-content">
                        <p class="text-content"><b class="text-subheading">FLAVOR: &nbsp;</b>
                            <?php echo $_POST['flavor'] ?>
                        </p>
                        <p class="text-content"><b class="text-subheading">LAYERS: &nbsp;</b>
                            <?php echo $_POST['layers'] ?> 
                        </p>
                        <p class="text-content"><b class="text-subheading">SIZE: &nbsp;</b> 
                            <?php echo $_POST['size'] ?> 
                        </p>
                        <p class="text-content"><b class="text-subheading">NAME: &nbsp;</b>
                            <?php echo $_POST['name'] ?>
                        </p>
                        <p class="text-content"><b class="text-subheading">DESCRIPTION: &nbsp;</b>
                            <?php echo $_POST['description'] ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        /**
         * Returns the contact information of the authorized user.
         * @return array The contact information of the authorized user.
         */
        function getContact() {
            $conn = db_connect();
            $accID = $_SESSION["user"]["accID"];

            $query = "SELECT * FROM `customer` WHERE `Cust_ID`='$accID' LIMIT 1";
            $result = mysqli_query($conn, $query);
            $contact = mysqli_fetch_array($result);

            mysqli_close($conn);
            return $contact;
        }
    ?>                            

    <?php include '../common/footer.php' ?>
</body>
</html>
