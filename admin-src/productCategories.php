<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Product Categories</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><b>Product Categories</b></h1>
    </div>

        <div class="card shadow mb-4 border-section">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-section border-section">
                    <h6 class="m-0 font-weight-bold text-content"><b>Categories List</b></h6>
                    <div>
                    <button type="button" class="btn btn-titleColor" data-toggle="modal" data-target="#addCateg">
                    Add Category
                    </button>
                       <a href="products.php" class="btn btn-subheading">&larr; Go Back</a>  
                    </div>
                   
                </div>

                <!-- Card Body -->
                <div class="card-body bg-section2">
                    <!-- Table Start -->
                    <div class="table-responsive">

                    <?php
                    require '../scripts/database/DB-connect.php';
                    $conn = db_connect();

                    $categ_query = "SELECT * FROM `side_categories`
                                    ORDER BY `Categ_Name` ASC";

                    $categ_query_run = mysqli_query($conn, $categ_query);
                    $check_categs = mysqli_num_rows($categ_query_run) > 0;

                    if($check_categs) {   
                    ?>

                        <table class="table table-sm table-bordered table-striped border-content table-content bg-section2 text-content" id="dataTable">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-light text-center" >
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody class="text-center">
                                <?php while($row = mysqli_fetch_assoc($categ_query_run)) { ?>
                                <tr>
                                    <td><?php echo $row['Categ_ID']; ?></td>
                                    <td><?php echo $row['Categ_Name']; ?></td>
                                    <td class="d-sm-flex align-items-center justify-content-center">
                                    <button class="btn btn-subheading" data-toggle="modal" data-target="#editCateg<?php echo $row['Categ_ID']; ?>">Edit</button>
                                    &nbsp;
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCateg<?php echo $row['Categ_ID']; ?>">Delete</button>
                                    </td>
                                </tr>

                                <!-- Edit Categ Modal -->
                                <div class="modal fade" id="editCateg<?php echo $row['Categ_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editCategModal"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCategModal"><b>Edit Category #<?php echo $row['Categ_ID']; ?></b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            
                                           <form action="../scripts/database/admin-crud.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="text-content font-weight-bold">Category Name</label>
                                                    <input type="hidden" name="categID" value="<?php echo $row['Categ_ID']; ?>">
                                                    <input type="text" name="categName" class="form-control border-section text-content" value="<?php echo $row['Categ_Name']; ?>" required>
                                                </div>  
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-danger" name="EditCategBtn" type="submit">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Categ Modal -->
                                
                                <!-- Delete Categ Modal -->
                                <div class="modal fade" id="deleteCateg<?php echo $row['Categ_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteCategModal"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCategModal"><b>Delete</b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                
                                            <div class="modal-body text-center h4 my-3">
                                                <i class="fas fa-exclamation-circle fa-5x text-danger mb-3"></i>
                                                <p>Are you sure you want to delete 
                                                    <br><b class="text-titleColor"><?php echo $row['Categ_Name']; ?> ?</b>
                                                </p>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <form action="../scripts/database/admin-crud.php" method="post">
                                                    <input name="deleteCategID" type="hidden" value="<?php echo $row['Categ_ID']; ?>">
                                                    <button class="btn btn-danger" name="deleteCategBtn" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Categ Modal -->

                                <?php } ?>
                            

                            </tbody>
                        </table>

                    <?php
                    } 
                    else
                    {  ?> 
                        <!-- NO Categories -->
                            <p class="text-center lead text-content font-weight-bolder my-5">No Categories To Be Found</p>
                        <!-- NO Categories -->
                    <?php } ?>

                    </div>
                    <!-- Table End -->

                </div>
                <!-- Card Body End -->
                
        </div>


                
</div>
<!-- End of Main Content -->

<!-- Add Category Modal -->
<div class="modal fade" id="addCateg" tabindex="-1" role="dialog" aria-labelledby="addCategModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-subheading" id="addCategModal"><b>Add New Category</b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../scripts/database/admin-crud.php" method="POST">
        <div class="modal-body">

            <div class="form-group">
                <label class="text-content font-weight-bold">Category Name</label>
                <input type="text" name="categName" class="form-control border-section text-content" placeholder="Enter Category Name" required>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addCategBtn" class="btn btn-titleColor">Add Category</button>
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


