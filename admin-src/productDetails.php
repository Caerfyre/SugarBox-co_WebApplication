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
                                 <?php if (!isset($_POST["editInfo"])) { ?>
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Product Name:</b> <?php echo $row['SideProd_Name']; ?></p>
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Category:</b> <?php echo $row['Categ_Name']; ?></p>
                                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Description:</b> <?php echo $row['SideProd_Desc']; ?></p>
                                <?php } else {?>
                                    <form action="" method="post">
                                    <div class="form-group">
                                        <p class="text-content font-weight-bold">Product Name:<input class="form-control bg-light border-0 mt-2" type="text" name="prodName" value="<?php echo $row['SideProd_Name']; ?>"></p>
                                        <p class="text-content font-weight-bold">Product Category:<input class="form-control bg-light border-0 mt-2" type="text" name="prodCateg" value="<?php echo $row['Categ_Name']; ?>"></p>
                                        <p class="text-content font-weight-bold">Product Description:<textarea class="form-control bg-light border-0 mt-2" name="prodDesc"><?php echo $row['SideProd_Desc']; ?></textarea></p>
                                    </div>
                                    <hr>
                                    <div class="form-group text-right">
                                        <button type="submit" name="editProdInfoBtn" class="btn btn-sm btn-titleColor text-right">Save Changes</button>
                                    </div>
                                    
                                    </form> 

                                <?php
                                }

                                $info_query = "SELECT sideproduct_sizes.Size_Description, sideproduct_sizes.Size_Price
                                FROM side_products
                                RIGHT JOIN sideproduct_sizes
                                ON side_products.SideProd_ID = sideproduct_sizes.Prod_ID
                                WHERE side_products.SideProd_ID = $prod_ID
                                ORDER BY sideproduct_sizes.Size_Price ASC";

                                $info_query_run = mysqli_query($conn, $info_query);
                                $check_prodinfo = mysqli_num_rows($info_query_run) > 0;
                                ?>

                                <div class="d-sm-flex align-items-center justify-content-between mt-4">
                                    <h4 class="text-subheading font-weight-bold">Price Information</h4>
                                    <div class="d-flex">

                                    <?php if($check_prodinfo){?>
                                        <?php if (!isset($_POST["editPriceInfo"])) { ?>   
                                        <button class="btn fs-5 text-subheading p-0 mr-4" data-toggle="modal" data-target="#addPriceInfo">ADD</button>
                                        <?php } ?>
                                        
                                        <form action="" method="post">
                                          
                                            <?php if (!isset($_POST["editPriceInfo"])) { ?>
                                            <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                            <input class="btn fs-5 text-subheading p-0" name="editPriceInfo" type="submit" value="EDIT">
                                            <?php } else { ?>
                                                <input type="hidden" name="prod_ID" value="<?php echo $_POST['prod_ID'];?>">
                                                <input class="btn fs-5 text-subheading p-0" name="cancelEditPriceInfo" type="submit" value="CANCEL">
                                            <?php } ?>
                 
                                        </form>
                                    <?php }?>    
                                    </div>
                                      

                                </div>
                                <hr class="bg-section mt-0">       

                                <?php if($check_prodinfo){ ?>
                                    <?php if (!isset($_POST["editPriceInfo"])) { ?>
                                        <ul>
                                        <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                        <li class="text-content font-weight-bold"><?php echo $row['Size_Description'];?> - <span>&#8369;</span> <?php echo $row['Size_Price'];?></li>
                                        <?php } ?>
                                        </ul>
                                    <?php } else { ?>
                                        <form action="" method="post">
                                
                                            <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                          
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label class="text-content font-weight-bold">Size Descrption:</label>
                                                <input class="form-control form-control-sm bg-light border-0 mr-1" type="text" name="prodName" value="<?php echo $row['Size_Description']; ?>"> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="text-content font-weight-bold">Size Prize:</label>
                                                <input class="form-control form-control-sm bg-light border-0" type="text" name="prodName" value="<?php echo $row['Size_Price']; ?>">  
                                                </div>
                                            </div>  
                                            
                                            <?php } ?>
                                            <hr>
                                            <div class="form-group text-right">
                                                <button type="submit" name="editPriceInfoBtn" class="btn btn-sm btn-titleColor text-right">Save Changes</button>
                                            </div>

                                        </form>
                                    <?php } ?>

                                <?php } else { ?>
                                <div class="text-center">
                                <p class="text-content">No Price Information Available.</p>
                                <button class="btn btn-sm btn-titleColor" data-toggle="modal" data-target="#addPriceInfo">Add Price Information</button>
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

<!-- Add Information Modal -->
<div class="modal fade" id="addPriceInfo" tabindex="-1" role="dialog" aria-labelledby="addPriceInfoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPriceInfoModal"><b>Add Price Information</b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <input type="hidden" name="prodID" value="<?php echo $_POST['prod_ID'];?>">

                <label>Size Description</label>
                <input type="text" name="sizeDesc" class="form-control border-section text-content" placeholder="Enter Size Description" required>
            </div>
            
            <div class="form-group">
                <label>Size Price</label>
                <input type="number" name="sizePrice" class="form-control border-section text-content" min="1" placeholder="Enter Price Per Size" required>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addPriceInfoBtn" class="btn btn-titleColor">Add Price Info</button>
        </div>
      </form>
  
    </div>
  </div>
</div>

                
</div>
<!-- End of Main Content -->


<?php
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


