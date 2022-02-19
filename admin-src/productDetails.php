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
                    <h6 class="m-0 font-weight-bold text-content"><b>Product #<?php echo $_GET['prod_ID'];?> Details</b></h6>
                    <a href="products.php" class="btn btn-titleColor">&larr; Go Back</a>
                </div>

                <!-- Card Body -->
                <div class="card-body bg-section2">

                <?php
                require '../scripts/database/DB-connect.php';
                $conn = db_connect();

                if(isset($_POST['viewDetails']) || isset($_GET['prod_ID']))
                {
                    $prod_ID = $_GET['prod_ID'];

                    $query = "SELECT side_products.SideProd_ID,
                                    side_products.SideProd_Name, 
                                    side_products.SideProd_Desc, 
                                    side_products.SideProd_Image,
                                    side_categories.Categ_ID,
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
                                <figure class="effect-ming tm-video-item">
                                    <img class="card-img modal-image" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>">
                                    <figcaption class="d-flex align-items-center justify-content-center">
                                        <h2>Edit</h2>
                                        <a data-toggle="modal" href="#editImage">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <!-- EDIT PRODUCT INFORMATION -->
                            <?php if (!isset($_POST["editPriceInfo"])) { ?> 
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h4 class="text-subheading font-weight-bold">Product Information</h4>
                                    <form action="" method="post">
                                    <?php if (!isset($_POST["editInfo"])) { ?>
                                        <input class="btn fs-5 text-subheading p-0" name="editInfo" type="submit" value="EDIT">
                                    <?php } else { ?>
                                        <input class="btn fs-5 text-subheading p-0" name="cancelEditInfo" type="submit" value="CANCEL">
                                    <?php } ?>
                                    </form>     
                                </div>         
                                <hr class="bg-section mt-0">
                                 <?php if (!isset($_POST["editInfo"])) { ?>
                                    <div class="mb-4">
                                        <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Product Name:</b> <?php echo $row['SideProd_Name']; ?></p>
                                        <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Category:</b> <?php echo $row['Categ_Name']; ?></p>
                                        <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Description:</b> <?php echo $row['SideProd_Desc']; ?></p>   
                                    </div>
                                <?php } else {?>
                                    <form action="../scripts/database/crud.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="prodID" value="<?php echo $row['SideProd_ID']; ?>">
                                        <p class="text-content font-weight-bold">Edit Product Name:<input class="form-control bg-light border-0" type="text" name="prodName" value="<?php echo $row['SideProd_Name']; ?>"></p>
                                        <p class="text-content font-weight-bold">Edit Product Category:
                                            <?php
                                            $categ_id = $row['Categ_ID'];
                                            $categ_query = "SELECT * FROM side_categories WHERE Categ_ID != '$categ_id' ORDER BY Categ_ID ASC";
                                            $categ_query_run = mysqli_query($conn, $categ_query);
                                            $check_categ = mysqli_num_rows($categ_query_run) > 0;

                                            if($check_categ){?>

                                            <select class="form-control bg-light border-0" name="prodCateg" id="categ" required>
                                                <option selected value="<?php echo $categ_id; ?>"><?php echo $row['Categ_Name']; ?></option>
                                                <?php while($res = mysqli_fetch_assoc($categ_query_run)){ ?>
                                                    <option value="<?php echo $res['Categ_ID']?>"><?php echo $res['Categ_Name']?></option> 
                                                <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </p>

                                        <p class="text-content font-weight-bold">Edit Product Description:<textarea class="form-control bg-light border-0" name="prodDesc"><?php echo $row['SideProd_Desc']; ?></textarea></p>
            
                                    </div>
                                    <hr class="mt-0">
                                    <div class="text-right">
                                        <button type="submit" name="editProdInfoBtn" class="btn btn-sm btn-titleColor">Save Changes</button>
                                    </div>
                                    
                                    </form> 

                                <?php
                                }
                            }

                                $info_query = "SELECT sideproduct_sizes.Size_ID, sideproduct_sizes.Size_Description, sideproduct_sizes.Size_Price
                                FROM side_products
                                RIGHT JOIN sideproduct_sizes
                                ON side_products.SideProd_ID = sideproduct_sizes.Prod_ID
                                WHERE side_products.SideProd_ID = $prod_ID
                                ORDER BY sideproduct_sizes.Size_Price ASC";

                                $info_query_run = mysqli_query($conn, $info_query);
                                $check_prodinfo = mysqli_num_rows($info_query_run) > 0;
                                ?>

                            <!-- EDIT PRICE INFORMATION -->
                            <?php if (!isset($_POST["editInfo"])) { ?>
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h4 class="text-subheading font-weight-bold">Price Information</h4>
                                    <div class="d-flex">

                                    <?php if($check_prodinfo){?>
                                        <?php if (!isset($_POST["editPriceInfo"])) { ?>   
                                            <button class="btn fs-5 text-subheading p-0" data-toggle="modal" data-target="#addPriceInfo">ADD</button>
                                        <?php }else{?>
                                            <form action="" method="post">
                                            <input class="btn fs-5 text-subheading p-0" name="cancelEditPriceInfo" type="submit" value="CANCEL">
                                            </form>
                                            <?php }?>   
                                    <?php }?>    
                                    </div>
                                      

                                </div>
                                <hr class="bg-section mt-0">       

                                <?php if($check_prodinfo){ ?>
                                    <?php if (!isset($_POST["editPriceInfo"])) { ?>
                                        <ul>
                                        <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                        <div class="d-sm-flex align-items-center">
                                        <li class="text-content font-weight-bold"><?php echo $row['Size_Description'];?> - <span>&#8369;</span> <?php echo $row['Size_Price'];?></li>
                                        <!-- Edit -->
                                        <form action="" method="post">
                                            <?php if (!isset($_POST["editPriceInfo"])) { ?>
                                                <input type="hidden" name="sizeID" value="<?php echo $row['Size_ID']; ?>">
                                                <input type="hidden" name ="desc" value="<?php echo $row['Size_Description'];?>">
                                                <input type="hidden" name ="price" value="<?php echo $row['Size_Price'];?>">
                                                <input class="btn fs-5 text-titleColor ml-2 mr-1 p-0" name="editPriceInfo" type="submit" value="Edit">
                                            <?php }?>
                                        </form>
                                        <!-- Delete -->
                                        <form action="" method="post">
                                            <input name="deleteProdID" type="hidden" value="<?php  echo $row['Size_ID'];?>">
                                            <button class="btn fs-5 text-danger p-0" name="deletePriceInfo" type="submit">Delete</button>   
                                        </form>
                                        </div>
                                        <?php } ?>
                                        </ul>
                                    <?php } else { ?>
                                        <?php if (isset($_POST["editPriceInfo"])){?> 
                                        <form action="../scripts/database/crud.php" method="post">
                                
                                            <div class="form-row">
                                                <input type="hidden" name="sizeID" value="<?php echo $_POST['sizeID']; ?>">
                                                <input type="hidden" name="prodID" value="<?php echo $_GET['prod_ID']; ?>">
                                                <div class="form-group col-md-6">
                                                <label class="text-content font-weight-bold">Size Description:</label>
                                                <input class="form-control bg-light border-0 mr-1" type="text" name="sizeDesc" value="<?php echo $_POST['desc'];; ?>"> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="text-content font-weight-bold">Size Prize:</label>
                                                <input class="form-control bg-light border-0" type="number" name="sizePrice" value="<?php echo $_POST['price']; ?>">  
                                                </div>
                                            </div>  
                                            
                                            <hr class="mt-0">
                                            <div class="text-right">
                                                <button type="submit" name="editPriceInfoBtn" class="btn btn-sm btn-titleColor text-right">Save Changes</button>
                                            </div>

                                        </form>
                                        <?php }?>
                                       

                                    <?php } ?>

                                <?php } else { ?>
                                <div class="text-center">
                                <p class="text-content">No Price Information Available.</p>
                                <button class="btn btn-sm btn-titleColor" data-toggle="modal" data-target="#addPriceInfo">Add Price Information</button>
                                </div>
                                <?php } ?>

                            <?php } ?>

                            </div>
                            <!-- End of Card Body -->
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
        <h5 class="modal-title text-subheading" id="addPriceInfoModal"><b>Add Price Information</b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <input type="hidden" name="prodID" value="<?php echo $_GET['prod_ID'];?>">

                <label class="text-content font-weight-bold">Size Description</label>
                <input type="text" name="sizeDesc" class="form-control border-section text-content" placeholder="Enter Size Description" required>
            </div>
            
            <div class="form-group">
                <label class="text-content font-weight-bold">Size Price</label>
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

<!-- Edit Image Modal -->
<div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="editImageModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-subheading" id="editImageModal"><b>Edit Image</b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <input type="hidden" name="prodID" value="<?php echo $_GET['prod_ID'];?>">
                <label class="text-content font-weight-bold">Product Image</label>
                <br>
                <input class="form-control-input" type="file" name="prodImage" required>

            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="editImgBtn" class="btn btn-titleColor">Edit</button>
        </div>
      </form>
  
    </div>
  </div>
</div>

</div>

<?php
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


