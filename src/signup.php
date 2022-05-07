<?php session_start() ?>

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

<body class="bg-light text-center">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <img class="img-fluid" src="../assets/sblogo-2.svg" alt="SugarBox&co. logo" draggable="false">
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 bg-section rounded-2 py-4">
                <h3 class="text-titleColor">SIGN UP</h3>
                <form class="container px-5" action="../scripts/database/client-crud.php" method="post">
                    <div class="row text-start mt-4">
                        <label class="form-label text-subheading fw-bolder ps-1" for="username">Enter Username:</label>
                        <input class="form-control <?php if (isset($_SESSION['signupErr']) && $_SESSION['signupErr'] == 1) echo 'border-danger'; ?>" required type="text" name="username" id="username">
                    </div>
                    <div class="row text-start mt-2">
                        <label class="form-label text-subheading fw-bolder ps-1" for="password">Enter Password:</label>
                        <input class="form-control <?php if (isset($_SESSION['signupErr']) && $_SESSION['signupErr'] == 2) echo 'border-danger'; ?>" required type="password" name="password" id="password">
                    </div>
                    <div class="row text-start mt-2">
                        <label class="form-label text-subheading fw-bolder ps-1" for="password2">Confirm Password:</label>
                        <input class="form-control <?php if (isset($_SESSION['signupErr']) && $_SESSION['signupErr'] == 2) echo 'border-danger'; ?>" required type="password" name="password2" id="password2">
                    </div>
                    <?php if (isset($_SESSION['signupErr']) && $_SESSION['signupErr'] == 1) { ?>
                        <p class="text-danger mt-4 mb-n3">Error: username already exists!</p>
                    <?php } ?>
                    <?php if (isset($_SESSION['signupErr']) && $_SESSION['signupErr'] == 2) { ?>
                        <p class="text-danger mt-4 mb-n3">Error: passwords do not match!</p>
                    <?php } ?>
                    <input class="btn btn-titleColor text-light px-5 my-5" type="submit" name="signup" value="SIGN UP">
                </form>
                <p class="text-content">Already have an account? <a class="link-titleColor" href="../index.php">Sign in</a></p>
            </div>
        </div>
    </div>

</body>

</html>
