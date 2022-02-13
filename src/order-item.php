<?php include '../scripts/database/secure-login.php'?>
<?php include '../scripts/database/DB-connect.php' ?>
<?php if (!isset($_GET['id'])) header("Location: ./menu.php"); ?>

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
                <?php $product = getProduct($_GET['id']) ?>
                <div class="col py-5" style="background-image: url('../assets/<?php echo $product[0]['SideProd_Image'] ?>'); background-size: cover;">
                    <div class="py-6"></div>
                    <div class="py-6"></div>
                </div>
                <div class="col-7 text-center">
                    <div class="container">
                        <div class="row mb-4">
                            <h3 class="text-titleColor"><?php echo $product[0]['SideProd_Name'] ?></h3>
                            <p class="text-content mt-3"><?php echo $product[0]['SideProd_Desc'] ?></p>
                        </div>
                        <form action="" method="post">
                            <div class="row justify-content-center">
                                <div class="col-4 text-start me-3">
                                    <p class="fs-5 fw-bolder text-subheading">TYPE</p>
                                    <select id="type" class="form-select text-content" name="type" 
                                        onchange="document.getElementById('price').innerHTML='P'+(this.value*document.getElementById('qty').value)">
                                        <option selected>Select type</option>
                                        <?php foreach ($product as $type) { ?>
                                        <option value="<?php echo $type['Size_Price'] ?>"><?php echo $type['Size_Description'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="fs-5 fw-bolder text-subheading mt-5">TOTAL: &nbsp;<span id="price" class="fs-4 fw-normal text-content">P0.00</span></p>
                                </div>
                                <div class="col-4 text-start ms-3">
                                    <p class="fs-5 fw-bolder text-subheading">QTY.</p>
                                    <div class="col-auto bg-light d-flex align-items-center justify-content-between rounded-2 border border-primary px-0 me-3">
                                        <div class="btn border-0" onclick="document.getElementById('qty').value--;
                                            document.getElementById('price').innerHTML='P'+(document.getElementById('qty').value*document.getElementById('type').value)">-</div>
                                        <input class="form-control border-0 bg-light text-center" type="number" name="qty" id="qty" value="0" required
                                            onchange="document.getElementById('price').innerHTML='P'+(this.value*document.getElementById('type').value)">
                                        <div class="btn border-0" onclick="document.getElementById('qty').value++;
                                            document.getElementById('price').innerHTML='P'+(document.getElementById('qty').value*document.getElementById('type').value)">+</div>
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

    <div class="text-center my-5">
        <button class="btn btn-titleColor text-light" onclick="history.back()">&larr; Go Back</button>
    </div>

    <!-- You might also like... -->
    <?php $relatedProducts = getRelatedProducts($product[0]['Categ_ID']) ?>
    <?php if ($relatedProducts != NULL) { ?>
    <div class="bg-section px-5 pt-4 my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-titleColor pb-3">YOU MIGHT ALSO LIKE...</h2>
                </div>
            </div>
            <div class="row justify-content-start">
                <?php foreach ($relatedProducts as $relatedProduct) { ?>
                    <div class="col-auto">
                        <a href="./order-item.php?id=<?php echo $relatedProduct['SideProd_ID'] ?>" class="col-md text-center text-decoration-none mb-4">
                            <img class="img-fluid rounded-2" style="height:200px" src="../assets/<?php echo $relatedProduct['SideProd_Image'] ?>" alt="<?php echo $relatedProduct['SideProd_Name'] ?>">
                            <p class="text-subheading fs-6 fw-bold mt-3"><?php echo $relatedProduct['SideProd_Name'] ?></p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Footer -->
    <?php
        /**
         * Returns information of the product with the passed id.
         * @param int $id The ID of the product.
         * @return array Information of the target product.
         */
        function getProduct($id) {
            $conn = db_connect();

            $query = "SELECT * FROM `side_products` LEFT JOIN `sideproduct_sizes`
                    ON `side_products`.`SideProd_ID` = `sideproduct_sizes`.`Prod_ID`
                    WHERE `side_products`.`SideProd_ID` = '$id'
                    ORDER BY `sideproduct_sizes`.`Size_Price` ASC";
            $result = mysqli_query($conn, $query);
            $product = array();
            while ($row = mysqli_fetch_array($result)) {
                $product[] = $row;
            }

            mysqli_close($conn);
            return $product;
        }

        /**
         * Returns at most four related (same category) products to the current product.
         * @param int $id The ID of the current product.
         * @return array The related side products.
         */
        function getRelatedProducts($id) {
            $conn = db_connect();
            $currentProduct = $_GET['id'];

            $query = "SELECT * FROM `side_products` WHERE `Categ_ID` = '$id'
                        AND `SideProd_ID` != '$currentProduct'
                        ORDER BY `SideProd_Name` ASC LIMIT 4";
            $result = mysqli_query($conn, $query);
            $products = array();
            while ($row = mysqli_fetch_array($result)) {
                $products[] = $row;
            }

            mysqli_close($conn);
            return $products;
        }
    ?>

    <?php include '../common/footer.php' ?>
</body>
</html>
