<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co.</title>
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
                <h2 class="text-titleColor text-center">CUSTOM CAKE ORDER FORM</h2>
                <div class="text-center">
                    <img class="img-fluid mt-n5" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
                <form class="container-fluid px-0 mt-5" action="" method="post">
                    <div class="row mb-4">
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="flavor">CAKE FLAVOR:</label>
                            <select class="form-select text-content" name="flavor" aria-label="Default select example">
                                <option selected>Select a flavor</option>
                                <option value="ube">Ube</option>
                                <option value="mocha">Mocha</option>
                                <option value="banana">Banana</option>
                                <option value="vanilla">Vanilla</option>
                                <option value="chocolate">Chocolate</option>
                                <option value="redvelvet">Red Velvet</option>
                                <option value="strawberry">Strawberry</option>
                                <option value="lemonvanilla">Lemon Vanilla</option>
                            </select>
                        </div>
                        <div class="col pe-4">
                            <label class="form-label text-subheading fw-bolder mb-2" for="layers">NUMBER OF LAYERS:</label>
                            <select class="form-select text-content" name="layers" aria-label="Default select example">
                                <option selected>Select number of layers</option>
                                <option value="onelayered">One layer</option>
                                <option value="twolayered">Two layers</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="size">CAKE SIZE:</label>
                            <select class="form-select text-content" name="size" aria-label="Default select example">
                                <option selected>Select size</option>
                                <option value="twolayered">5 inches</option>
                                <option value="twolayered">6 inches</option>
                                <option value="twolayered">7 inches</option>
                                <option value="twolayered">8 inches</option>
                                <option value="twolayered">5 & 7 inches</option>
                                <option value="twolayered">7 & 8 inches</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="name">DESIGN NAME:</label>
                            <input class="form-control text-content" type="text" name="name">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label text-subheading fw-bolder mb-2" for="description">DESIGN DESCRIPTION:</label>
                            <p class="form-label text-content fw-bold mb-3">Describe what your cake’s design will be. Feel free to be as detailed as possible. You are also welcome to send a link to a reference photo.</p>
                            <textarea class="form-control text-content" rows="10" name="description"></textarea>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <input class="btn btn-titleColor text-light px-4" type="submit" value="ORDER CUSTOM CAKE">
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