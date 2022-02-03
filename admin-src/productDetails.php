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

                if(isset($_POST['viewDetails']))
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
                                <h4 class="card-title text-titleColor font-weight-bold"><?php echo $row['SideProd_Name']; ?></h4>
                                <p class="text-content"><b><?php echo $row['Categ_Name']; ?></b></p>
                                <p class="card-text"><?php echo $row['SideProd_Desc']; ?></p>
                                <hr class="bg-section">
                                <h5 class="font-weight-bold">Price Information:</h5>

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
                                    <li><?php echo $row['Size_Description'];?> - <span>&#8369;</span> <?php echo $row['Size_Price'];?></li>
                                    <?php } ?>
                                    </ul>

                                <?php } else { ?>
                                <button class="btn btn-sm btn-titleColor">Add Price Information</button>
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

