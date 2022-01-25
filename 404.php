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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/sblogo-1.png">
    <link rel="stylesheet" href="css/main.min.css">
    <title>SugarBox&co.</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */

    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body class="bg-light text-center">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <img class="img-fluid" src="assets/sblogo-2.svg" alt="SugarBox&co. logo" draggable="false">
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 bg-section py-4 rounded-2">
                <h3 class="text-content">404</h3>
                <h1 class="text-titleColor my-5">OOPS!</h1>
                <p class="fw-bold text-content">Something went terribly wrong...<br>Don't worry, try again!</p>
                <a href="./index.php"><button class="btn btn-titleColor text-light fw-bold my-5">Return to Login</button></a>
            </div>
        </div>
    </div>

</body>

</html>