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
        <h1 class="h3 mb-0 text-content"><b>Orders</b></h1>
    </div>

    <!-- Orders -->
    <div class="card shadow mb-4 border-section">
        <div class="card-header py-3 bg-section border-section">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-content"><b>All Orders</b></h6>
                <div>
                    <button type="button" class="btn btn-subheading">All</button>
                    <button type="button" class="btn btn-outline-subheading">Side Products</button>
                    <button type="button" class="btn btn-outline-subheading">Cakes</button>
                </div>
            </div>
        </div>

        <div class="card-body bg-section2 border-section">
            <div class="table-responsive">

            <?php
            require '../scripts/database/DB-connect.php';
            $conn = db_connect();

            $orders_query = "SELECT 
                            `orders`.`Order_ID`, 
                            `orders`.`Cust_ID`, 
                            `orders`.`Order_Placement_Date`, 
                            `orders`.`Order_Fullfilment_Date`, 
                            `orders`.`Order_Type`, 
                            `orders`.`Order_Status`, 
                            `orders`.`Total_Price`,
                            `customer`.`Cust_FName`, 
                            `customer`.`Cust_LName`
                            FROM `orders` 
                            INNER JOIN `customer` ON `orders`.`Cust_ID`=`customer`.`Cust_ID` 
                            ORDER BY `orders`.`Order_ID`";

            $orders_query_run = mysqli_query($conn, $orders_query);
            $check_orders = mysqli_num_rows($orders_query_run) > 0;
            
            if($check_orders) {   
            ?>

                <table class="table table-sm table-bordered table-striped border-content table-content bg-section2 text-content" id="dataTable">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Placement Date</th>
                            <th>Fulfillment Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <!-- <tfoot class="bg-light text-center" >
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Placement Date</th>
                            <th>Fulfillment Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </tfoot> -->
                    <tbody class="text-center">
                        <?php while($row = mysqli_fetch_assoc($orders_query_run)) { ?>
                        <tr>
                            <td><?php echo $row['Order_ID'] ?></td>
                            <td><?php echo $row['Cust_FName'] . " " . $row['Cust_LName'] ?></td>
                            <td><?php echo date('D d F, Y', strtotime($row['Order_Placement_Date'])) ?></td>
                            <td><?php echo date('D d F, Y', strtotime($row['Order_Fullfilment_Date'])) ?></td>
                            <td><?php echo $row['Order_Type'] ?></td>
                            <td><?php echo $row['Order_Status'] ?></td>
                            <td><?php echo $row['Total_Price'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } else { ?> 
                <!-- No Orders -->
                <p class="text-center lead text-content font-weight-bolder my-5">No Orders To Be Found</p>
            <?php } ?>

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


