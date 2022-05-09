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
        <h1 class="h3 mb-0 text-content"><strong>Products</strong></h1>
    </div>

    <!-- Products -->
    <div class="card shadow mb-4 border-section">
        <div class="card-header py-3 bg-section border-section">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-content"><strong>Side Products List</strong></h6>
                <div>
                    <button type="button" class="btn btn-titleColor" data-toggle="modal" data-target="#addProducts">
                    Add Product
                    </button>
                    <a href="productCategories.php" class="btn btn-subheading">View Categories</a>
                </div>
            </div>
        </div>
        <div class="card-body bg-section2 border-section">
            <div class="table-responsive">
            <?php
            require '../scripts/database/DB-connect.php';
            $conn = db_connect();

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
            
            if ($check_products) { ?>
                <table class="table table-sm table-bordered table-striped border-content table-content bg-section2 text-content" id="dataTable">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Product ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-light text-center" >
                        <tr>
                        <th>Product ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <?php while($row = mysqli_fetch_assoc($prod_query_run)) { ?>
                        <tr>
                            <td class="align-middle"><?php echo $row['SideProd_ID']; ?></td>
                            <td class="align-middle"><img class="img-fluid" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>" style="width: 120px; height: 80px; object-fit:cover"></td>
                            <td class="align-middle"><?php echo $row['SideProd_Name']; ?></td>
                            <td class="align-middle"><?php echo $row['Categ_Name']; ?></td>
                            <td class="align-middle">
                            <div class="d-sm-flex align-items-center justify-content-center">
                                <a href="productDetails.php?prod_ID=<?php echo $row['SideProd_ID'];?>" class="btn btn-subheading px-2 py-1">View</a>
                                &nbsp;<button class="btn btn-danger px-2 py-1" data-toggle="modal" data-target="#deleteProd<?php echo $row['SideProd_ID'];?>">Delete</button>
                            </div>
                            </td>
                        </tr>
                        
                        <!-- Delete Product Modal -->
                        <div class="modal fade" id="deleteProd<?php echo $row['SideProd_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteProdModal"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProdModal"><strong>Delete</strong></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center justify-content-center pb-3">
                                            <div><em class="fas fa-exclamation-circle fa-3x text-danger pr-3"></em></div>
                                            <div>
                                                Are you sure you want to delete 
                                                <br><strong class="text-titleColor"><?php echo $row['SideProd_Name'];?> (Product #<?php  echo $row['SideProd_ID'];?>)?</strong>
                                            </div>
                                        </div>
                                    
                                        <img class="card-img" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../scripts/database/admin-crud.php" method="post">
                                            <input name="deleteProdID" type="hidden" value="<?php  echo $row['SideProd_ID'];?>">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-danger" name="deleteProdBtn" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {  ?>
                <!-- NO Products -->
                <p class="text-center lead text-content font-weight-bolder my-5">No Products To Be Found</p>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Add Products Modal -->
<div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="addProductsModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-subheading" id="addProductsModal"><strong>Add Product</strong></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/admin-crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="text-content font-weight-bold">Name</label>
                <input type="text" name="prodName" class="form-control border-section text-content" placeholder="Enter product name..." required>
            </div>
            <div class="form-group">
                <label class="text-content font-weight-bold">Type</label>
                <?php
                $categ_query = "SELECT * FROM side_categories ORDER BY Categ_ID ASC";
                $categ_query_run = mysqli_query($conn, $categ_query);
                $check_categ = mysqli_num_rows($categ_query_run) > 0;

                if ($check_categ) { ?>
                <select class="form-control border-section text-content" name="prodCateg" id="categ" required>
                    <?php while($res = mysqli_fetch_assoc($categ_query_run)){ ?>
                        <option value="<?php echo $res['Categ_ID']?>"><?php echo $res['Categ_Name']?></option> 
                    <?php } ?>
                </select>
                <?php } else {?>
                    <p class="small text-danger">No categories available</p>
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="text-content font-weight-bold">Description</label>
                <textarea class="form-control text-content border-section" name="prodDesc" id="prodDesc" placeholder="Enter product description..." required></textarea>
            </div>
            <div class="form-group">
                <label class="text-content font-weight-bold">Image</label><br>
                <input class="form-control-input" type="file" name="prodImage" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addProductBtn" class="btn btn-titleColor">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
mysqli_close($conn);
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


