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
                <form class="container px-5" action="" method="post">
                    <div class="row text-start mt-4">
                        <label class="form-label text-subheading fw-bolder ps-1" for="username">Enter Username:</label>
                        <input class="form-control" type="text" name="username">
                    </div>
                    <div class="row text-start mt-2">
                        <label class="form-label text-subheading fw-bolder ps-1" for="password">Enter Password:</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="row text-start mt-2">
                        <label class="form-label text-subheading fw-bolder ps-1" for="password">Confirm Password:</label>
                        <input class="form-control" type="password" name="password2">
                    </div>
                    <input class="btn btn-titleColor text-light px-5 my-5" type="submit" name="signup" value="SIGN UP">
                </form>
                <p class="text-content">Already have an account? <a class="link-titleColor" href="../index.php">Sign in</a></p>
            </div>
        </div>
    </div>

</body>

</html>
