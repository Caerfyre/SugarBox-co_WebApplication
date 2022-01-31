<?php include '../scripts/database/secure-login.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <title>SugarBox&co. | Home</title>
</head>

<style>
    /* div {
        border: 1px solid black;
    } */
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true || $_SESSION['functions']['toggleOptions'] == true || $_SESSION['functions']['toggleSearch'] == true) echo 'overflow-hidden' ?>">
    
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Splash Image -->
    <div style="background-image: url('../assets/splash.svg'); background-size: cover;">
        <div class="px-6 py-5">
            <div class="container py-4 bg-light rounded-3" style="--bs-bg-opacity: .5;">
                <div class="row align-items-center">
                    <div class="col-md my-4">
                        <img class="img-fluid ps-4" draggable="false" src="../assets/sblogo-2.svg" alt="">
                    </div>
                    <div class="col-md-5 text-center pe-3 my-4">
                        <h3 class="text-titleColor">ORDER NOW FOR PICK-UP OR DELIVERY</h3>
                        <p class="text-content mb-4">Cakes, Cupcakes, Cookies & more!</p>
                        <a href="menu.php"><button class="btn btn-titleColor text-light">ORDER HERE</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Featured Products -->
    <div class="px-5 py-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-titleColor text-center pb-5">FEATURED PRODUCTS</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="./order-item.php?id=1" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cookies.png" alt="Assorted cookies">
                    <p class="text-subheading fs-5 fw-bold mt-3">Assorted Cookies</p>
                    <p class="text-content">Includes: Oatmeal, Matcha, Chocolate chip, Red Velvet, Oreo, Double Choc Chip, Brookie Flavors and More!</p>
                </a>
                <a href="./order-item.php?id=2" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/pandesal.png" alt="Ube Cheese Pandesal">
                    <p class="text-subheading fs-5 fw-bold mt-3">Ube Cheese Pandesal</p>
                    <p class="text-content">Homemade soft Ube cheese pandesal. Also available: Ube Macapuno filling.</p>    
                </a>
                <a href="./order-item.php?id=3" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/cheesecake.png" alt="Mini Cheesecakes">
                    <p class="text-subheading fs-5 fw-bold mt-3">Mini Cheesecakes</p>
                    <p class="text-content">Includes: Strawberry, Blueberry, & Mango Toppings.</p>
                </a>
                <a href="./order-item.php?id=4" class="col-md text-center text-decoration-none mb-4">
                    <img class="img-fluid rounded-2" src="../assets/bentocake.png" alt="Bento Cakes">
                    <p class="text-subheading fs-5 fw-bold mt-3">Bento Cakes</p>
                    <p class="text-content">Customizeable Bento Mini Cakes. Includes: 3 different flavors, toppings & decorations.</p>
                </a>  
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <a href="menu.php"><button class="btn btn-titleColor text-light">SEE MORE</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- How to get your goodies -->
    <div class="bg-section px-5 pt-6 pb-4">
        <div class="container mb-6">
            <div class="row justify-content-center flex-column">
                <div class="col">
                    <h2 class="text-center text-titleColor">HOW TO GET YOUR GOODIES</h2>
                </div>
                <div class="col text-center mt-n4">
                    <img class="img-fluid" src="../assets/leaves.svg" draggable="false" alt="">
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md text-center mb-5">
                    <img src="../assets/bag.svg" draggable="false" alt="">
                    <p class="text-subheading fs-5 fw-bold mt-4">SELECT YOUR GOODIES</p>
                    <p class="text-content">We create your homemade customized treats fresh and to order. Choose your goodie to gift
                        or keep!</p>
                </div>
            
                <div class="col-md text-center mb-5">
                    <img src="../assets/sched.svg" draggable="false" alt="">
                    <p class="text-subheading fs-5 fw-bold mt-4">SCHEDULE YOUR DELIVERY</p>
                    <p class="text-content">Whether you're a planner or a last minute giver, you can schedule your delivery up to 1
                        week in advance.</p>
                </div>
            
                <div class="col-md text-center mb-5">
                    <img src="../assets/smiley.svg" draggable="false" alt="">
                    <p class="text-subheading fs-5 fw-bold mt-4">WAIT AND GET READY</p>
                    <p class="text-content">Sit back and relax while we prepare your treats for fresh delivery or pick-up. We'll
                        notify you every step of the way.</p>
                </div>
            </div>
        </div> 
    </div>

    <!-- Check out our gallery -->
    <div class="px-5 py-6">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-4 text-center py-3">
                    <h1 class="text-titleColor">CHECK OUT OUR GALLERY</h1>
                    <a href="gallery.php"><button class="btn btn-titleColor text-white mt-4">SEE MORE</button></a>
                </div>
                <div class="col-md-8 d-flex ps-0">
                    <div class="col-3 d-flex align-items-center ps-3">
                        <img class="img-fluid rounded-2" src="../assets/chococake.png" alt="">
                    </div>
                    <div class="col-3 d-flex align-items-center ps-3">
                        <img class="img-fluid rounded-2" src="../assets/sunflowercake.png" alt="">
                    </div>
                    <div class="col-3 d-flex align-items-center ps-3">
                        <img class="img-fluid rounded-2" src="../assets/rosecake.png" alt="">
                    </div>
                    <div class="col-3 d-flex align-items-center ps-3">
                        <img class="img-fluid rounded-2" src="../assets/toycake.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Want to know more about us? -->
    <div class="bg-section px-5 py-6">
        <div class="container my-3">
            <div class="row gx-5 gy-4 justify-content-center align-items-center">
                <div class="col-md-5 text-center">
                    <img class="img-fluid" src="../assets/about-us.png" alt="About_us">
                </div>
                <div class="col text-center">
                    <h3 class="text-titleColor">WANT TO KNOW MORE ABOUT US?</h3>
                    <div class="mt-n4">
                        <img class="img-fluid" draggable="false" src="../assets/leaves.svg" alt="">
                    </div>
                    <p class="text-content mt-4">Sugarbox&co. was conceptualized and formed in the year 2020
                        to bring homemade treats and sweets to families and friends stuck at home. We
                        strive to allow our customers the creative freedom to customize their own goodies.
                        Today Sugarbax&co. has served numerous happy customers since its early days.</p>
                    <a href="about-us.php"><button class="btn btn-titleColor text-white mt-3">LEARN MORE</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../common/footer.php' ?>
</body>
</html>
