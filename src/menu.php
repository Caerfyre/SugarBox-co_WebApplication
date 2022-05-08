<?php include '../scripts/database/secure-login.php'?>
<?php include '../scripts/database/DB-connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Menu</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">

    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Order Custom Cakes -->
    <div class="bg-section px-5 py-6">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-5">
                <div class="col-md-4 text-center">
                    <img class="img-fluid" src="../assets/custom-cake.png" alt="Custom_cake">
                </div>
                <div class="col-md text-center">
                    <h2 class="text-center text-titleColor">ORDER CUSTOM CAKES</h2>
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                    <p class="text-content fw-bold m-3">Want something personalized for a special ocassion? Order a custom cake!
                        You can choose from our catalogue of flavors, sizes and more! The design is
                        completely up to you. What are you waiting for? Order a custom cake now!</p>
                    <a href="custom-order.php"><button class="btn btn-titleColor text-light mt-3">ORDER CUSTOM CAKE</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2 bg-section2 border-top border-light p-0 me-5 pt-4">
                    <div class="mx-3 mb-4">
                        <input id="menu" class="form-control form-control-sm text-content border-primary" type="search" placeholder="Search the menu">
                    </div>
                    <div>
                        <p class="m-3"><strong class="text-content">Types</strong></p>
                        <p class="px-3 my-2"><a class="text-decoration-none text-content" href="./custom-order.php">Cakes</a></p>
                        <p class="px-3 py-2 my-2 bg-section rounded-start rounded-3"><a class="text-decoration-none text-content" href="#menu">Sides</a></p>
                    </div>
                    <hr class="bg-content mx-3 my-4">
                    <div>
                        <p class="m-3"><strong class="text-content">Categories</strong></p>
                        <p class="m-3"><a class="text-decoration-none text-content <?php if (!isset($_GET['q']) || $_GET['q'] == 'all') echo 'text-subheading' ?>"
                                          href="?q=all#menu">All</a></p>
                        <?php $categories = getCategories() ?>
                        <?php foreach ($categories as $category) { ?>
                            <p class="m-3"><a class="text-decoration-none text-content <?php if (isset($_GET['q']) && $_GET['q'] == strtolower($category['Categ_Name'])) echo 'text-subheading' ?>"
                                              href="?q=<?php echo strtolower($category['Categ_Name']) ?>#menu"><?php echo $category['Categ_Name'] ?></a></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="col container-fluid py-6">
                <div class="row justify-content-center pb-5">
                    <h2 class="text-titleColor text-center">DESSERTS MENU</h2>
                    <img class="col-md-7 img-fluid mt-n4" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                    <div class="row justify-content-center">
                        <!-- Products -->
                        <?php $products = getProducts() ?>
                        <?php foreach ($products as $product) { ?>
                            <?php if (isset($_GET['q']) && $_GET['q'] != 'all') { ?>
                                <?php if ($_GET['q'] == strtolower($product['Categ_Name'])) { ?>
                                    <a href="./order-item.php?id=<?php echo $product['SideProd_ID'] ?>" class="text-decoration-none col-md-4 text-center mb-4">
                                        <img class="img-fluid rounded-2" src="../assets/<?php echo $product['SideProd_Image'] ?>" alt="<?php echo $product['SideProd_Name'] ?>"
                                            style="height: 250px; width: 300px; object-fit: cover">
                                        <p class="text-subheading fs-5 fw-bold mt-3"><?php echo $product['SideProd_Name'] ?></p>
                                        <p class="text-content"><?php echo $product['SideProd_Desc'] ?></p>
                                    </a>
                            <?php }
                                } else { ?>
                                <a href="./order-item.php?id=<?php echo $product['SideProd_ID'] ?>" class="text-decoration-none col-md-4 text-center mb-4">
                                    <img class="img-fluid rounded-2" src="../assets/<?php echo $product['SideProd_Image'] ?>" alt="<?php echo $product['SideProd_Name'] ?>"
                                         style="height: 250px; width: 300px; object-fit: cover">
                                    <p class="text-subheading fs-5 fw-bold mt-3"><?php echo $product['SideProd_Name'] ?></p>
                                    <p class="text-content"><?php echo $product['SideProd_Desc'] ?></p>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        /**
         * Returns the available side product categories.
         * @return array The available side product categories.
         */
        function getCategories() {
            $conn = db_connect();

            $query = "SELECT * FROM `side_categories` ORDER BY `Categ_Name` ASC";
            $result = mysqli_query($conn, $query);

            $categories = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $categories[] = $row;
            }

            mysqli_close($conn);
            return $categories;
        }

        /**
         * Returns all the available side products from the database.
         * @return array The available side products.
         */
        function getProducts() {
            $conn = db_connect();

            $query = "SELECT * FROM `side_products`
                        INNER JOIN `side_categories` 
                        ON `side_categories`.`Categ_ID`=`side_products`.`Categ_ID`
                        ORDER BY `SideProd_Name` ASC";
            $result = mysqli_query($conn, $query);

            $products = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }

            mysqli_close($conn);
            return $products;
        }
    ?>

    <?php include '../common/footer.php' ?>

</body>

</html>