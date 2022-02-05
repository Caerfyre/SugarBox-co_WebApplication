<?php include '../scripts/database/secure-login.php'?>
<?php include '../scripts/database/DB-connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Custom Order</title>
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
                <h2 class="text-titleColor text-center">CUSTOM CAKE ORDER FORM</h2>
                <div class="text-center">
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                <form class="container-fluid px-0 mt-5" action="./checkout.php?type=2" method="post">
                    <div class="row mb-4">
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="flavor">CAKE FLAVOR:</label>
                            <select class="form-select text-content" name="flavor" required aria-label="Default select example">
                                <option <?php if (!isset($_GET['flavor'])) echo "selected" ?>>Select a flavor</option>
                                <?php $flavors = getFlavors() ?>
                                <?php foreach ($flavors as $flavor) { ?>
                                    <option <?php if (isset($_GET['flavor']) && $_GET['flavor'] == $flavor['Flavor_Name']) echo "selected" ?> value="<?php echo $flavor['Flavor_Name'] ?>">
                                        <?php echo $flavor['Flavor_Name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="layers">NUMBER OF LAYERS:</label>
                            <select class="form-select text-content" name="layers" required aria-label="Default select example">
                                <option <?php if (!isset($_GET['layers'])) echo "selected" ?>>Select number of layers</option>
                                <?php $layers = getLayers() ?>
                                <?php foreach ($layers as $layer) { ?>
                                    <option <?php if (isset($_GET['layers']) && $_GET['layers'] == $layer['Layer_Count']) echo "selected" ?> value="<?php echo $layer['Layer_Count'] ?>">
                                        <?php echo $layer['Layer_Count'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="size">CAKE SIZE:</label>
                            <select class="form-select text-content" name="size" required aria-label="Default select example">
                                <option <?php if (!isset($_GET['size'])) echo "selected" ?>>Select size</option>
                                <?php $sizes = getSizes() ?>
                                <?php foreach ($sizes as $size) { ?>
                                    <option <?php if (isset($_GET['size']) && $_GET['size'] == $size['Layer_Size']) echo "selected" ?> value="<?php echo $size['Layer_Size'] ?>">
                                        <?php echo $size['Layer_Size'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="name">DESIGN NAME:</label>
                            <input class="form-control text-content" type="text" name="name" required 
                                value="<?php if (isset($_GET['name'])) echo $_GET['name'] ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="description">DESIGN DESCRIPTION:</label>
                            <p class="form-label text-content fw-bold mb-3">Describe what your cake's design will be. Feel free to be as detailed as possible. You are also welcome to send a link to a reference photo.</p>
                            <textarea class="form-control text-content" rows="10" name="description" required><?php if (isset($_GET['description'])) echo $_GET['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <input class="btn btn-titleColor text-light px-4" type="submit" name="CustomCheckout" value="Checkout">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        /**
         * Returns the available cake flavors.
         * @return array The available cake flavors.
         */
        function getFlavors() {
            $conn = db_connect();

            $query = "SELECT * FROM `cake_flavor` ORDER BY `Flavor_Name` ASC";
            $result = mysqli_query($conn, $query);
            $flavors = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $flavors[] = $row;
            }

            mysqli_close($conn);
            return $flavors;
        }

        /**
         * Returns the available cake layers.
         * @return array The available cake layers.
         */
        function getLayers() {
            $conn = db_connect();

            $query = "SELECT DISTINCT `Layer_Count` FROM `cake_size` ORDER BY `Layer_Count` ASC";
            $result = mysqli_query($conn, $query);
            $layers = array();
            while ($row = mysqli_fetch_array($result)) {
                $layers[] = $row;
            }

            mysqli_close($conn);
            return $layers;
        }

        /**
         * Returns the available cake sizes.
         * @return array The available cake sizes.
         */
        function getSizes() {
            $conn = db_connect();

            $query = "SELECT `Layer_Size` FROM `cake_size` ORDER BY `Layer_Count` ASC";
            $result = mysqli_query($conn, $query);
            $sizes = array();
            while ($row = mysqli_fetch_array($result)) {
                $sizes[] = $row;
            }

            mysqli_close($conn);
            return $sizes;
        }
    ?>

    <?php include '../common/footer.php' ?>

</body>

</html>