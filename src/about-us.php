<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include '../scripts/functions/functions.php' ?>
    <?php include '../common/meta.php' ?>
    <link rel="stylesheet" href="../css/styleimg.css">
    <title>SugarBox&co.</title>
</head>

    <style>
      /*  div {
            border: 1px solid black;
        }*/
</style>

<body class="bg-light <?php if ($_SESSION['functions']['toggleCart'] == true) echo 'overflow-hidden' ?>">
    
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>

    <!-- Splash Image -->
    <div style="background-image: url('../assets/splash.svg'); background-size: cover;">
        <div class="px-6 py-5">
            <div class="container py-4 bg-light rounded-3" style="--bs-bg-opacity: .5;">
                <div class="row align-items-center">
                    
                    <div class="col text-center pe-3 my-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT COMPANY -->
    <div class="px-5 py-6">
        <div class="container my-3 ">
            <div class="row gx-5 gy-4 justify-content-center align-items-center">
                
                <div class="col-md-7 text-center">
                    <h3 class="text-titleColor">ABOUT COMPANY</h3>
                    <div class="mt-n4">
                        <img class="img-fluid" draggable="false" src="../assets/leaves.svg" alt="">
                    </div>
                    <p class="text-content mt-4">Sugarbox&co. was conceptualized and formed in the year 2020
                        to bring homemade treats and sweets to families and friends stuck at home. We
                        strive to allow our customers the creative freedom to customize their own goodies.
                        Today Sugarbax&co. has served numerous happy customers since its early days.</p>
                    <a href="contact-us.php"><button class="btn btn-titleColor text-white mt-3">Contact Us</button></a>
                </div>
                <div class="col-md-5 text-center">
                    <img class="img-fluid" src="../assets/about-us.png" alt="About_us">
                </div>
            </div>
        </div>
    </div>    
    <!-- MISSION -->
    <div class="bg-section px-5 py-6">
        <div class="container my-3 ">
            <div class="row gx-5 gy-4 justify-content-center align-items-center">
            <div class="col-md-5 text-center">
                    <img class="img-fluid" src="../assets/about-us.png" alt="About_us">
                </div>
                <div class="col text-center">
                    <h3 class="text-titleColor">MISSION</h3>
                    <div class="mt-n4">
                        <img class="img-fluid" draggable="false" src="../assets/leaves.svg" alt="">
                    </div>
                    <p class="text-content mt-4">We believe in the art of homemade baked goods. That's why we will never skimp, and we will handcraft each pastry with high quality, natural, and passion. 
                        Providing every customer the best pastry that they will enjoy with their family and friends. 
                    </p>
                 
                </div>
                
            </div>
            
        </div>
        
    </div>    
    <!-- FOUNDERS -->
    <div class="px-5 py-2">
            <div class="profile-area">
                <div class="container">
                    <div class="col text-center">
                    <h1 class="text-titleColor">FOUNDERS</h1>
                    <div class="mt-n4">
                        <img class="img-fluid" draggable="false" src="../assets/leaves.svg" alt="">
                    </div>
    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                            <div class="img1"><img src="../assets/about-us.png" alt="background"> </div>
                            <div class="img2"><img src="../assets/foun.jpg" alt="Founder"> </div>

                            <div class="main-text">
                            <h2>FOUNDER</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>

                            <div class="socials">
                            <i class-"fa fa-facebook"></i>
                            <i class-"fa fa-linkedin"></i>
                            <i class-"fa fa-dribble"></i>
                            <i class-"fa fa-twitter"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="card">
                            <div class="img1"><img src="../assets/about-us.png" alt="background"> </div>
                            <div class="img2"><img src="../assets/foun.jpg" alt="Founder"> </div>

                            <div class="main-text">
                            <h2>FOUNDER</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>

                            <div class="socials">
                            <i class-"fa fa-facebook"></i>
                            <i class-"fa fa-linkedin"></i>
                            <i class-"fa fa-dribble"></i>
                            <i class-"fa fa-twitter"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="card">
                            <div class="img1"><img src="../assets/about-us.png" alt="background"> </div>
                            <div class="img2"><img src="../assets/foun.jpg" alt="Founder"> </div>

                            <div class="main-text">
                            <h2>FOUNDER</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>

                            <div class="socials">
                            <i class-"fa fa-facebook"></i>
                            <i class-"fa fa-linkedin"></i>
                            <i class-"fa fa-dribble"></i>
                            <i class-"fa fa-twitter"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

    
    
            

    

    <!-- Footer -->
    <?php include '../common/footer.php' ?>

</body>
</html>
