<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>

    <!-- Products -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Side Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                            <?php
                            require '../scripts/database/DB-connect.php';

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
                           
                            if($check_products)
                            {   
                            ?>

                                <table class="table table-bordered" id="dataTable">
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
                                        <?php  while($row = mysqli_fetch_assoc($prod_query_run))
                                        {   ?>
                                        <tr>
                                            <td><?php echo $row['SideProd_ID']; ?></td>
                                            <td><img class="table-image" src="../assets/<?php echo $row['SideProd_Image']; ?>" alt="<?php echo $row['SideProd_Image']; ?>"></td>
                                            <td><?php echo $row['SideProd_Name']; ?></td>
                                            <td><?php echo $row['Categ_Name']; ?></td>
                                            <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#DetailsModal<?php echo $row['SideProd_ID']; ?>">View Details</button>
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
                                                        <p class=""><?php echo $row['SideProd_Desc']; ?></p>
                                                        <hr>
                                                        <h5 class="font-weight-bold">Price Information:</h5>
                                                        <?php
                                                        $prodID = $row['SideProd_ID'];
                                                        
                                                        $info_query = "SELECT sideproduct_sizes.Size_Description, sideproduct_sizes.Size_Price
                                                        FROM side_products
                                                        RIGHT JOIN sideproduct_sizes
                                                        ON side_products.SideProd_ID = sideproduct_sizes.Prod_ID
                                                        WHERE side_products.SideProd_ID = $prodID
                                                        ORDER BY sideproduct_sizes.Size_ID ASC";

                                                        $info_query_run = mysqli_query($conn, $info_query);
                                                        $check_prodinfo = mysqli_num_rows($info_query_run) > 0;
                                                        if($check_prodinfo){ ?>

                                                            <ul>
                                                            <?php while($row = mysqli_fetch_assoc($info_query_run)){ ?>
                                                            <li><?php echo $row['Size_Description'];?> - <?php echo $row['Size_Price'];?></li>
                                                            <?php } ?>
                                                            </ul>

                                                        <?php }else { ?>
                                                        <button class="btn btn-sm btn-primary">Add Price Information</button>
                                                        <p class="text-sm">Price Information not yet added</p>  
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                             
                                            </div>
                                            
                                            <!-- Modal Content -->

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
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
                                    <p class="text-center lead text-gray-800 my-5">No Products To Be Found</p>
                                <!-- NO Products -->
                            <?php } ?>


                            </div>
                        </div>
                    </div>

</div>
<!-- End of Main Content -->


<!-- Details Modal -->
<div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">
        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required>
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
            </div>

            <!-- <div class="form-group">
                <label>Usertype</label>
                    <select name="update_usertype" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
            </div> -->

                <input type="hidden" name="usertype" value="user">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
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


