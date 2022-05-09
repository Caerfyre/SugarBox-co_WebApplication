<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Inventory</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><strong>Inventory</strong></h1>
    </div>

    <!-- Ingredient List -->
    <div class="card shadow mb-4 border-section">
        <div class="card-header py-3 bg-section border-section">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-content"><strong>Ingredient List</strong></h6>
                <div>
                    <a href="#" type="button" class="btn btn-titleColor">Add Ingredient</a>
                </div>
            </div>
        </div>

        <div class="card-body bg-section2 border-section">
            <div class="table-responsive">

            <?php
            require '../scripts/database/DB-connect.php';
            $conn = db_connect();

            $ingredients_query = "SELECT * FROM `ingredients` ORDER BY `Ingr_ID`";

            $ingredients_query_run = mysqli_query($conn, $ingredients_query);
            $check_ingredients = mysqli_num_rows($ingredients_query_run) > 0;
            
            if($check_ingredients) {
            ?>

                <table class="table table-sm table-bordered table-striped border-content table-content bg-section2 text-content" id="dataTable">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Ingredient ID</th>
                            <th>Name</th>
                            <th>Unit Per Purchase</th>
                            <th>Unit Price</th>
                            <th>Qty. Remaining</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-light text-center" >
                        <tr>
                            <th>Ingredient ID</th>
                            <th>Name</th>
                            <th>Unit Per Purchase</th>
                            <th>Unit Price</th>
                            <th>Qty. Remaining</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <?php while($row = mysqli_fetch_assoc($ingredients_query_run)) { ?>
                        <?php
                            $unit = explode(" ", $row['Unit_Per_Purchase']);
                            $amount = $unit[0];
                            unset($unit[0]);
                            $unit = implode(" ", $unit);
                        ?>
                        <tr>
                            <td><?php echo $row['Ingr_ID'] ?></td>
                            <td><?php echo $row['Ingr_Name'] ?></td>
                            <td><?php echo $row['Unit_Per_Purchase'] ?></td>
                            <td><?php echo "P " . $row['Unit_Price'] ?></td>
                            <td class="<?php
                                if ($row['Qty_Remaining'] > $amount * .75) echo 'table-success';
                                else if ($row['Qty_Remaining'] > $amount * .5) echo 'table-info';
                                else if ($row['Qty_Remaining'] > $amount * .25) echo 'table-warning';
                                else echo 'table-danger';
                            ?>"><?php echo $row['Qty_Remaining'] + 0 . " " . $unit ?></td>
                            <td>
                                <a href="#?ingredient_ID=<?php echo $row['Ingr_ID'] ?>" type="button" class="btn btn-subheading px-2 py-1">Edit</a>
                                <a href="#?ingredient_ID=<?php echo $row['Ingr_ID'] ?>" type="button" class="btn btn-danger px-2 py-1">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } else { ?> 
                <!-- No Ingredients -->
                <p class="text-center lead text-content font-weight-bolder my-5">No Ingredients To Be Found</p>
            <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php
mysqli_close($conn);
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


