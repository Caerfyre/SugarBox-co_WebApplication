<?php include '../scripts/database/secure-login.php'?>

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
                                <?php $flavors = ["ube", "mocha", "banana", "vanilla", "chocolate", "redvelvet", "strawberry", "lemonvanilla"] ?>
                                <?php foreach ($flavors as $flavor) { ?>
                                    <option <?php if (isset($_GET['flavor']) && $_GET['flavor'] == $flavor) echo "selected" ?> value="<?php echo $flavor ?>"><?php echo ucfirst($flavor) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="layers">NUMBER OF LAYERS:</label>
                            <select class="form-select text-content" name="layers" required aria-label="Default select example">
                                <option <?php if (!isset($_GET['layers'])) echo "selected" ?>>Select number of layers</option>
                                <?php $layers = ["onelayered", "twolayered"] ?>
                                <?php foreach ($layers as $layer) { ?>
                                    <option <?php if (isset($_GET['layers']) && $_GET['layers'] == $layer) echo "selected" ?> value="<?php echo $layer ?>">
                                    <?php switch ($layer) {
                                        case 'onelayered': echo "One Layer"; break;
                                        case 'twolayered': echo "Two Layers"; break;
                                    } ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="size">CAKE SIZE:</label>
                            <select class="form-select text-content" name="size" required aria-label="Default select example">
                                <option <?php if (!isset($_GET['size'])) echo "selected" ?>>Select size</option>
                                <?php $sizes = ["5in", "6in", "7in", "8in", "5in7in", "7in8in"] ?>
                                <?php foreach ($sizes as $size) { ?>
                                    <option <?php if (isset($_GET['size']) && $_GET['size'] == $size) echo "selected" ?> value="<?php echo $size ?>">
                                    <?php switch ($size) {
                                        case '5in': echo "5 inches"; break;
                                        case '6in': echo "6 inches"; break;
                                        case '7in': echo "7 inches"; break;
                                        case '8in': echo "8 inches"; break;
                                        case '5in7in': echo "5 & 7 inches"; break;
                                        case '7in8in': echo "7 & 8 inches"; break;
                                    } ?> </option>
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
    <?php include '../common/footer.php' ?>

</body>

</html>