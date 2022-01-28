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
        <h1 class="h3 mb-0 text-content"><b>Products</b></h1>
    </div>

    <!-- Products -->
    <div class="card shadow mb-4 border-section">
        <div class="card-header py-3 bg-section border-section">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-content"><b>Side Products</b></h6>
                <button type="button" class="btn btn-titleColor" data-toggle="modal" data-target="#addProducts">
                Add New Product
                </button>
            </div>
            
        </div>
        <div class="card-body bg-section2 border-section">
            <div class="table-responsive">

            <?php
            require '../scripts/database/DB-connect.php';
            $conn = db_connect();

            // $prod_query = "SELECT * FROM side_products ORDER BY SideProd_ID ASC";
            $prod_query = "SELECT side_products.SideProd_ID,
                                    side_products.SideProd_Name, 
                                    side_products.SideProd_Desc, 
                                    side_products.SideProd_Image,
                                    side_categories.Categ_Name  
                            FROM side_products 
                            INNER JOIN side_categories
                            ON side_products.Categ_ID=side_categories.Categ_ID
                            ORDER BY side_products.SideProd_ID ASC";

            $prod_query_run = mysqli_query($conn, $prod_query);
            $check_products = mysqli_num_rows($prod_query_run) > 0;
            
            if($check_products) {   
            ?>

                <table class="table table-bordered border-content table-content bg-section2 text-content" id="dataTable">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Product ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($prod_query_run)) { ?>
                        <tr>
                            <td><?php echo $row['SideProd_ID']; ?></td>
                            <td><img class="table-image" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>"></td>
                            <td><?php echo $row['SideProd_Name']; ?></td>
                            <td><?php echo $row['Categ_Name']; ?></td>
                            <td>
                            <button class="btn btn-titleColor" data-toggle="modal" data-target="#DetailsModal<?php echo $row['SideProd_ID']; ?>">View Details</button>
                            <button class="btn btn-danger">Delete Product</button>
                            </td>
                        </tr>

                        <!-- Details Modal -->
                        <div class="modal fade" id="DetailsModal<?php echo $row['SideProd_ID']; ?>" 
                        tabindex="-1" role="dialog" aria-labelledby="DetailsModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DetailsModal">Product #<?php echo $row['SideProd_ID']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Modal Content -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="modal-image" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>">                                               
                                    </div>
                                    <div class="col-8">
                                        <h4 class="font-weight-bold"><?php echo $row['SideProd_Name']; ?></h4>
                                        <p class="text-content"><b><?php echo $row['Categ_Name']; ?></b></p>
                                        <p class=""><?php echo $row['SideProd_Desc']; ?></p>
                                        <hr class="bg-section">
                                        <h5 class="font-weight-bold">Price Information:</h5>
                                        <?php
                                        $prodID = $row['SideProd_ID'];
                                        
                                        $info_query = "SELECT sideproduct_sizes.Size_Description, sideproduct_sizes.Size_Price
                                        FROM side_products
                                        RIGHT JOIN sideproduct_sizes
                                        ON side_products.SideProd_ID = sideproduct_sizes.Prod_ID
                                        WHERE side_products.SideProd_ID = $prodID
                                        ORDER BY sideproduct_sizes.Size_Price ASC";

                                        $info_query_run = mysqli_query($conn, $info_query);
                                        $check_prodinfo = mysqli_num_rows($info_query_run) > 0;
                                        if($check_prodinfo){ ?>

                                            <ul>
                                            <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                            <li><?php echo $row['Size_Description'];?> - <?php echo $row['Size_Price'];?></li>
                                            <?php } ?>
                                            </ul>

                                        <?php } else { ?>
                                        <button class="btn btn-sm btn-titleColor">Add Price Information</button>
                                        <p class="text-sm mt-2">Price Information not yet added</p>  
                                        <?php } ?>

                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Modal Content -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="registerbtn" class="btn btn-titleColor">Save</button>
                            </div>
                            </form>
                        
                            </div>
                        </div>
                        </div>
                        <?php } ?>
                        <!-- End of Details Modal -->

                    </tbody>
                </table>

        <?php
            } 
            else
            {  ?> 
                <!-- NO Products -->
                    <p class="text-center lead text-content my-5">No Products To Be Found</p>
                <!-- NO Products -->
            <?php } ?>

            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->


<!-- Add Products Modal -->
<div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="addProductsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add New Product</b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="prodName" class="form-control border-section text-content" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label>Product Type</label>

                <?php
                $categ_query = "SELECT * FROM side_categories ORDER BY Categ_ID ASC";
                $categ_query_run = mysqli_query($conn, $categ_query);
                $check_categ = mysqli_num_rows($categ_query_run) > 0;

                if($check_categ){?>

                <select class="form-control border-section text-content" name="prodCateg" id="categ" required>
                    <?php while($res = mysqli_fetch_assoc($categ_query_run)){ ?>
                        <option value="<?php echo $res['Categ_ID']?>"><?php echo $res['Categ_Name']?></option> 
                    <?php } ?>
                </select>

                <?php }else{?>
                    <p class="small text-danger">No categories available</p>
                <?php } ?>
                
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control text-content border-section" name="prodDesc" id="prodDesc" placeholder="Enter product description..." required></textarea>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <br>
                <input class="form-control-input" type="file" name="prodImage" required>
                
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addProductBtn" class="btn btn-titleColor">Add Product</button>
        </div>
      </form>
  
    </div>
  </div>
</div>


<?php
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


