<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Orders</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><b>Order Details</b></h1>
    </div>

    <div class="card shadow mb-4 border-section">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-section border-section">
            <h6 class="m-0 font-weight-bold text-content"><b>Order #<?php echo $_GET['order_ID'] ?></b></h6>
            <a href="orders.php" class="btn btn-subheading">&larr; Go Back</a>
        </div>

        <!-- Card Body -->
        <div class="card-body bg-section2">
        
        <?php
        if (isset($_GET['order_ID'])) {
            require '../scripts/database/DB-connect.php';
            $conn = db_connect();
            $orderID = $_GET['order_ID'];

            // Get Order & Customer
            $query = "SELECT `orders`.*, `customer`.* FROM `orders` 
                        INNER JOIN `customer` ON `orders`.`Cust_ID`=`customer`.`Cust_ID`
                        WHERE `Order_ID`='$orderID'";
            $result = mysqli_query($conn, $query);
            $order = mysqli_fetch_assoc($result);

            // Get Payment
            $query = "SELECT * FROM `payment` WHERE `Order_ID`='$orderID'";
            $result = mysqli_query($conn, $query);
            $payment = mysqli_fetch_assoc($result);

            // Get Order Line
            $query = "SELECT `order_line`.*, `side_products`.*, `sideproduct_sizes`.* FROM `order_line` 
                        INNER JOIN `side_products` ON `order_line`.`Prod_ID`=`side_products`.`SideProd_ID`
                        INNER JOIN `sideproduct_sizes` ON `order_line`.`Size_ID`=`sideproduct_sizes`.`Size_ID`
                        WHERE `Order_ID`='$orderID'";
            $result = mysqli_query($conn, $query);
            $orderType = "Side";

            // Get Cake Order
            if (!mysqli_num_rows($result) > 0) {
                $query = "SELECT `cake_orders`.*, `cake`.*, `cake_size`.* FROM `cake_orders` 
                            INNER JOIN `cake` ON `cake_orders`.`Cake_ID`=`cake`.`Cake_ID`
                            INNER JOIN `cake_size` ON `cake`.`CakeSize_ID`=`cake_size`.`Size_ID`
                            WHERE `Order_ID`='$orderID'";
                $result = mysqli_query($conn, $query);
                $orderType = "Cake";
            }

            $orderLine = array();
            while ($row = mysqli_fetch_array($result)) {
                $orderLine[] = $row;
            }
        ?>

        <!---------- Order Details ---------->
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="text-subheading font-weight-bold">Order Details</h4> 
            <div class="d-flex">
                <input class="btn btn-subheading px-2 py-0" data-toggle="modal" data-target="#editOrderDetails" type="submit" value="Update">
            </div>
        </div>         
        <hr class="bg-section mt-0">
        <div class="mb-4 d-flex">
            <div class="col">
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Type:&nbsp;</b> <?php echo $orderType ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Method:&nbsp;</b> <?php echo $order['Order_Type'] ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Total Price:&nbsp;</b> P <?php echo $order['Total_Price'] ?></p>
            </div>
            <div class="col">
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Order Date:&nbsp;</b> <?php echo date('F d, Y (D)', strtotime($order['Order_Placement_Date'])) ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Fulfillment Date:&nbsp;</b> <span class="text-titleColor"><?php echo date('F d, Y (D)', strtotime($order['Order_Fullfilment_Date'])) ?></span></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Status:&nbsp;</b> <span class="<?php 
                    switch ($order['Order_Status']) {
                        case 'Pending': echo "text-titleColor"; break;
                        case 'In progress': echo "text-info"; break;
                        case 'Ready for pick-up': echo "text-warning"; break;
                        case 'Delivering': echo "text-warning"; break;
                        case 'Delivery failed': echo "text-danger"; break;
                        case 'Claimed': echo "text-success"; break;
                        case 'Cancelled': echo "text-danger"; break;
                    }
                ?>"><?php echo $order['Order_Status'] ?></span></p>
            </div>
        </div>
        <!---------- Order Details ---------->
        
        <!---------- Customer Info ---------->
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="text-subheading font-weight-bold">Customer Info</h4> 
            <form action="" method="POST" class="d-flex">
            <?php if (!isset($_POST["editCustomerDetails"])) { ?>   
                <input class="btn btn-subheading px-2 py-0" name="editCustomerDetails" type="submit" value="Update">
            <?php } else {?>
                <input class="btn btn-outline-danger px-2 py-0" name="cancelEditCustomerDetails" type="submit" value="Cancel">
            <?php }?>
            </form>
        </div>         
        <hr class="bg-section mt-0">
        <div class="mb-4 d-flex">
            <div class="col">
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Customer:&nbsp;</b> <?php echo $order['Cust_FName'] . " " . $order['Cust_LName'] ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Contact Number:&nbsp;</b> <?php echo $order['Cust_ContactNo'] ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Address:&nbsp;</b> <?php echo $order['Cust_Address'] ?></p>
            </div>
            <div class="col">
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Payment Type:&nbsp;</b> <?php echo $payment['Payment_Type'] ?></p>
                <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Payment Status:&nbsp;</b> <span class="<?php 
                    switch ($payment['Payment_Status']) {
                        case 0: echo "text-danger"; break;
                        case 1: echo "text-warning"; break;
                        case 2: echo "text-success"; break;
                    }
                ?>"><?php 
                    switch ($payment['Payment_Status']) {
                        case 0: echo "Not paid"; break;
                        case 1: echo "Partially paid"; break;
                        case 2: echo "Paid"; break;
                    }
                ?></span></p>
            </div>
        </div>
        <!---------- Customer Info ---------->

        <?php if ($orderType == "Side") { ?>

            <!-------------- Items -------------->
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="text-subheading font-weight-bold">Items</h4> 
            </div>         
            <hr class="bg-section mt-0">
            <div class="mb-4">
                <div class="col">
                    <ol class="pl-3 d-flex flex-wrap">
                    <?php foreach ($orderLine as $item) { ?>
                        <li class="col-3 text-content font-weight-bold mb-4"><b class="font-weight-bolder"><?php echo $item['SideProd_Name'] ?></b>
                        <img class="card-img mt-2" style="width:150px;height:155px;object-fit:cover" src="../assets/<?php echo $item['SideProd_Image'] ?>" alt="<?php echo $item['SideProd_Name'] ?>">
                        <p class="text-content font-weight-bold my-2"><b class="font-weight-bolder">Size:&nbsp;</b> <?php echo $item['Size_Description'] ?></p>
                        <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Quantity:&nbsp;</b> <?php echo $item['Order_Quantity'] ?></p>
                        <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Line Price:&nbsp;</b> P <?php echo $item['Line_Price'] ?></p>
                    <?php } ?>
                    </ol>
                </div>
            </div>
            <!-------------- Items -------------->

        <?php } else if ($orderType == "Cake") { ?>

            <!---------- Cake Details ----------->
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="text-subheading font-weight-bold">Cake Details</h4>
                <form action="" method="POST" class="d-flex">
                <?php if (!isset($_POST["editCakeDetails"])) { ?>   
                    <input class="btn btn-subheading px-2 py-0" name="editCakeDetails" type="submit" value="Update">
                <?php } else {?>
                    <input class="btn btn-outline-danger px-2 py-0" name="cancelEditCakeDetails" type="submit" value="Cancel">
                <?php }?>
                </form>
            </div>         
            <hr class="bg-section mt-0">
            <div class="mb-4 d-flex">
                <div class="col">
                    <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Flavor:&nbsp;</b> <?php echo $orderLine[0]['Flavor_Name'] ?></p>
                    <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Design Name:&nbsp;</b> "<?php echo $orderLine[0]['Design_Name'] ?>"</p>
                    <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Description:&nbsp;</b> "<?php echo $orderLine[0]['Design_Description'] ?>"</p>
                    <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Size:&nbsp;</b> <?php echo $orderLine[0]['Layer_Count'] . " layer/s, " . $orderLine[0]['Layer_Size'] ?></p>
                </div>
                <div class="col">
                    <p class="text-content font-weight-bold my-2"><b class="font-weight-bolder">Price:&nbsp;</b> <span class="<?php 
                        switch ($orderLine[0]['Price_Status']) {
                            case 'Not Set': echo 'text-danger'; break;
                            case 'Set': echo 'text-success'; break;
                        }
                    ?>"><?php echo $orderLine[0]['Price_Status'] ?></span></p>
                    <p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Status:&nbsp;</b> <span class="<?php 
                        switch ($orderLine[0]['Status']) {
                            case 'Pending': echo 'text-titleColor'; break;
                            case 'Accepted': echo 'text-success'; break;
                            case 'Rejected': echo 'text-danger'; break;
                        }
                    ?>"><?php echo $orderLine[0]['Status'] ?></span></p>
                </div>
            </div>
            <!---------- Cake Details ----------->

        <?php }} ?>
        </div>
    </div>                
</div>
<!-- End of Main Content -->

<!-- Add Information Modal -->
<div class="modal fade" id="editOrderDetails" tabindex="-1" role="dialog" aria-labelledby="editOrderDetailsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-subheading" id="editOrderDetailsModal"><b>Update Order Details</b></h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="../scripts/database/admin-crud.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="orderID" value="<?php echo $_GET['order_ID'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-content font-weight-bold">Total Price</label>
                        <input type="number" step='0.01' name="newPrice" class="form-control border-section text-content" value="<?php echo $order['Total_Price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="text-content font-weight-bold">Status</label>
                        <select class="form-control border-section text-content" name="newStatus" required>
                            <option value="Pending" <?php if ($order['Order_Status'] == "Pending") echo "selected" ?>>Pending</option>
                            <option value="In Progress" <?php if ($order['Order_Status'] == "In Progress") echo "selected" ?>>In Progress</option>
                            <option value="Ready for pick-up" <?php if ($order['Order_Status'] == "Ready for pick-up") echo "selected" ?>>Ready for pick-up</option>
                            <option value="Delivering" <?php if ($order['Order_Status'] == "Delivering") echo "selected" ?>>Delivering</option>
                            <option value="Delivery failed" <?php if ($order['Order_Status'] == "Delivery failed") echo "selected" ?>>Delivery failed</option>
                            <option value="Claimed" <?php if ($order['Order_Status'] == "Claimed") echo "selected" ?>>Claimed</option>
                            <option value="Cancelled" <?php if ($order['Order_Status'] == "Cancelled") echo "selected" ?>>Cancelled</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="editOrderDetails" class="btn btn-titleColor">Confirm</button>
                    </div>
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


