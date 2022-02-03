<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Products</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><b>Product Details</b></h1>
    </div>

        <div class="card shadow mb-4 border-section">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-section border-section">
                    <h6 class="m-0 font-weight-bold text-content"><b>Product #<?php echo $_POST['prod_ID'];?> Details</b></h6>
                    <a href="products.php" class="btn btn-titleColor">&larr; Go Back</a>
                </div>

                <!-- Card Body -->
                <div class="card-body bg-section2">

                <?php
                require '../scripts/database/DB-connect.php';
                $conn = db_connect();

                if(isset($_POST['viewDetails']) || isset($_POST['prod_ID']))
                {
                    $prod_ID = $_POST['prod_ID'];

                    $query = "SELECT side_products.SideProd_ID,
                                    side_products.SideProd_Name, 
                                    side_products.SideProd_Desc, 
                                    side_products.SideProd_Image,
                                    side_categories.Categ_Name  
                            FROM side_products 
                            INNER JOIN side_categories
                            ON side_products.Categ_ID=side_categories.Categ_ID
                            WHERE side_products.SideProd_ID = $prod_ID";

                    $query_run = mysqli_query($conn, $query);
                    
                    foreach($query_run as $row)
                    { ?>
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img class="card-img modal-image" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h4 class="text-subheading font-weight-bold">Product Information</h4>
                                    <form action="" method="post">
                                    <?php if (!isset($_POST["editPriceInfo"])) { ?>
                                        <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                        <input class="btn fs-5 text-subheading p-0" name="editPriceInfo" type="submit" value="EDIT">
                                    <?php } else { ?>
                                        <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                        <input class="btn fs-5 text-subheading p-0" name="cancelEditPriceInfo" type="submit" value="CANCEL">
                                    <?php } ?>
                                    </form>     
                                </div>         
                                <hr class="bg-section mt-0">
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Product Name:</b> <?php echo $row['SideProd_Name']; ?></p>
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Category:</b> <?php echo $row['Categ_Name']; ?></p>
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Description:</b> <?php echo $row['SideProd_Desc']; ?></p>
                                
                                <!-- <hr class="bg-section"> -->

                                <div class="d-sm-flex align-items-center justify-content-between mt-4">
                                    <h4 class="text-subheading font-weight-bold">Price Information</h4>
                                    <form action="" method="post">
                                    <?php if (!isset($_POST["editInfo"])) { ?>
                                        <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                        <input class="btn fs-5 text-subheading p-0" name="editInfo" type="submit" value="EDIT">
                                    <?php } else { ?>
                                        <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                        <input class="btn fs-5 text-subheading p-0" name="cancelEditInfo" type="submit" value="CANCEL">
                                    <?php } ?>
                                    </form>   
                                </div>
                                <hr class="bg-section mt-0">       

                                <?php
                                $info_query = "SELECT sideproduct_sizes.Size_Description, sideproduct_sizes.Size_Price
                                FROM side_products
                                RIGHT JOIN sideproduct_sizes
                                ON side_products.SideProd_ID = sideproduct_sizes.Prod_ID
                                WHERE side_products.SideProd_ID = $prod_ID
                                ORDER BY sideproduct_sizes.Size_Price ASC";

                                $info_query_run = mysqli_query($conn, $info_query);
                                $check_prodinfo = mysqli_num_rows($info_query_run) > 0;
                                if($check_prodinfo){ ?>

                                    <ul>
                                    <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                    <li class="text-content font-weight-bold"><?php echo $row['Size_Description'];?> - <span>&#8369;</span> <?php echo $row['Size_Price'];?></li>
                                    <?php } ?>
                                    </ul>

                                <?php } else { ?>
                                <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-sm btn-titleColor">Add Price Information</button>
                                </div>
                               
                                <?php } ?>
                                

                            </div>
                            </div>
                        </div>

                    <?php
                    }
                }
                ?>
                    

                </div>
                
        </div>
             
                
</div>
<!-- End of Main Content -->



<?php
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


