<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'scripts/functions/functions.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta property='og:title' content='SugarBox&co.' />
    <meta property='og:description' content='Sugarbox&co is a growing small-scale pastry business based on Cebu, Philippines that specializes in creating custom desserts such as cakes, cupcakes, cookies and more.' />
    <meta property='og:image' content='assets/about-us.svg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" sizes="16x16" href="assets/sblogo-1.svg">
    <link rel="stylesheet" href="css/main.min.css">
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
                <img class="img-fluid" src="assets/sblogo-2.svg" alt="SugarBox&co. logo" draggable="false">
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 bg-section rounded-2 py-4">
                <h3 class="text-titleColor">LOGIN</h3>
                <form class="container px-5" action="./scripts/database/login-logout.php" method="post">
                    <div class="row text-start mt-5">
                        <label class="form-label text-subheading fw-bolder ps-1" for="username">Username:</label>
                        <input class="form-control <?php if (isset($_SESSION['loginErr']) && $_SESSION['loginErr'] == 2) echo 'border-danger'; ?>" type="text" name="username" id="username">
                    </div>
                    <div class="row text-start mt-4">
                        <label class="form-label text-subheading fw-bolder ps-1" for="password">Password:</label>
                        <input class="form-control <?php if (isset($_SESSION['loginErr']) && $_SESSION['loginErr'] >= 1) echo 'border-danger'; ?>" type="password" name="password" id="password">
                    </div>
                    <input class="btn btn-titleColor text-light px-5 my-5" type="submit" name="signin" value="SIGN IN">
                </form>
                <p class="text-content mb-2"><a class="link-titleColor" href="#">Forgot Password?</a></p>
                <p class="text-content">Don't have an account? <a class="link-titleColor" href="src/signup.php">Sign up</a></p>
            </div>
        </div>
    </div>

</body>

</html>