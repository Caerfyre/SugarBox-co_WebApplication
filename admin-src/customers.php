<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Customers</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><b>Customers</b></h1>
    </div>

        <div class="card shadow mb-4 border-section">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-section border-section">
                    <h6 class="m-0 font-weight-bold text-content"><b>Customers List</b></h6>
                    <div>
                    <button type="button" class="btn btn-titleColor" data-toggle="modal" data-target="#addCustomer">
                    Add Customer
                    </button>
                    
                    <a href="customers.php?q=all" type="button" class="btn <?php echo (isset($_GET['q']) && $_GET['q'] == 'all') || !isset($_GET['q']) ? 'btn-subheading' : 'btn-outline-subheading' ?>">All</a>
                    <a href="customers.php?q=active" type="button" class="btn <?php echo isset($_GET['q']) && $_GET['q'] == 'active' ? 'btn-subheading' : 'btn-outline-subheading' ?>">Active</a>
                    <a href="customers.php?q=inactive" type="button" class="btn <?php echo isset($_GET['q']) && $_GET['q'] == 'inactive' ? 'btn-subheading' : 'btn-outline-subheading' ?>">Inactive</a>
                    <a href="customers.php?q=banned" type="button" class="btn <?php echo isset($_GET['q']) && $_GET['q'] == 'banned' ? 'btn-subheading' : 'btn-outline-subheading' ?>">Banned</a>
                 
                    </div>
                   
                </div>

                <!-- Card Body -->
                <div class="card-body bg-section2">
                    <div class="table-responsive">

                        <?php
                        require '../scripts/database/DB-connect.php';
                        $conn = db_connect();
                        $active = 0;
                        if (isset($_GET['q']) && $_GET['q'] == 'active') {
                            $account_query = "SELECT accounts.Account_ID,
                                                accounts.Acc_Username,
                                                accounts.Acc_Status,
                                                customer.Cust_FName,
                                                customer.Cust_LName 
                                        FROM accounts
                                        INNER JOIN customer
                                        ON accounts.Account_ID = customer.Cust_ID
                                        WHERE accounts.Acc_Status = '2'
                                        ORDER BY accounts.Account_ID ASC";

                            $err_message = "No Active Customers To Be Found";

                        } else if (isset($_GET['q']) && $_GET['q'] == 'inactive') {
                            $account_query = "SELECT accounts.Account_ID,
                                                accounts.Acc_Username,
                                                accounts.Acc_Status,
                                                customer.Cust_FName,
                                                customer.Cust_LName 
                                        FROM accounts
                                        INNER JOIN customer
                                        ON accounts.Account_ID = customer.Cust_ID
                                        WHERE accounts.Acc_Status = '1'
                                        ORDER BY accounts.Account_ID ASC";

                            $err_message = "No Inactive Customers To Be Found";

                        } else if (isset($_GET['q']) && $_GET['q'] == 'banned') {

                            $account_query = "SELECT accounts.Account_ID,
                                                accounts.Acc_Username,
                                                accounts.Acc_Status,
                                                customer.Cust_FName,
                                                customer.Cust_LName 
                                        FROM accounts
                                        INNER JOIN customer
                                        ON accounts.Account_ID = customer.Cust_ID
                                        WHERE accounts.Acc_Status = '0'
                                        ORDER BY accounts.Account_ID ASC";

                            $err_message = "No Banned Customers To Be Found";

                        } else {

                            $account_query = "SELECT accounts.Account_ID,
                                                accounts.Acc_Username,
                                                accounts.Acc_Status,
                                                customer.Cust_FName,
                                                customer.Cust_LName 
                                        FROM accounts
                                        INNER JOIN customer
                                        ON accounts.Account_ID = customer.Cust_ID                           
                                        ORDER BY accounts.Account_ID ASC";

                            $err_message = "No Customers To Be Found";
                        }
                        

                        $acc_query_run = mysqli_query($conn, $account_query);
                        $check_accounts = mysqli_num_rows($acc_query_run) > 0;

                        if($check_accounts) {   
                        ?>

                            <table class="table table-sm table-bordered table-striped border-content table-content bg-section2 text-content" id="dataTable">
                                <thead class="bg-light text-center">
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer Username</th>
                                        <th>Customer Name</th>
                                        <th>Account Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot class="bg-light text-center" >
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer Username</th>
                                        <th>Customer Name</th>
                                        <th>Account Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody class="text-center">
                                    <?php while($row = mysqli_fetch_assoc($acc_query_run)) { 

                                        switch($row['Acc_Status']){
                                            case 0: $status = "Banned";
                                                    $style = "text-danger";
                                                    break;
                                            case 1: $status = "Inactive";
                                                    $style = "text-gray-600";
                                                    break;
                                            case 2: $status = "Active";
                                                    $style = "text-success";
                                                    break;
                                            default: $status = $row['Acc_Status'];
                                                     $style = "text-subheading"; 
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $row['Account_ID']; ?></td>
                                        <td><?php echo $row['Acc_Username']; ?></td>        
                                        <td><?php echo $row['Cust_FName'];?> <?php echo $row['Cust_LName']; ?></td>
                                        <td class="font-weight-bold <?php echo $style ?>"><?php echo $status ?></td>
                                        <td class="d-sm-flex align-items-center justify-content-center">
                                        <button class="btn btn-subheading" data-toggle="modal" data-target="#viewDetails<?php echo $row['Account_ID'];?>">View Details</button>
                                        &nbsp;
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUser<?php echo $row['Account_ID'];?>">Remove User</button>
                                        </td>
                                    </tr>                      

                                    <!-- Details Modal -->
                                    <div class="modal fade" id="viewDetails<?php echo $row['Account_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-subheading" id="viewDetails"><b>Customer #<?php echo $row['Account_ID'];?> Details</b></h5>
                                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <?php 
                                        $conn = db_connect();
                                        $acc_ID = $row['Account_ID'];
                                        $cust_query = "SELECT accounts.Date_Created,
                                                              customer.Cust_ContactNo,
                                                              customer.Cust_Address
                                                        FROM accounts
                                                        INNER JOIN customer
                                                        ON accounts.Account_ID = customer.Cust_ID
                                                        WHERE accounts.Account_ID = $acc_ID";
                
                                        $cust_query_run = mysqli_query($conn, $cust_query);
                                        $row2 = mysqli_fetch_assoc($cust_query_run)
                                        ?>

                                        <div class="modal-body">
                                            <div class="text-center">
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2 text-right"><b class="font-weight-bolder">Customer ID:</b></p></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $row['Account_ID'];?></p></div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Username:</b></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $row['Acc_Username'];?></p></div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Status:</b></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $status;?></p></div>
                                                    </div> 
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Customer Name:</b></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $row['Cust_FName'];?> <?php echo $row['Cust_LName']; ?></p></div>
                                                    </div> 
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Contact Number:</b></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $row2['Cust_ContactNo'];?></p></div>
                                                    </div>    
                                                    <div class="row justify-content-center">
                                                        <div class="col text-right"><p class="text-content font-weight-bold mb-2"><b class="font-weight-bolder">Address:</b></div>
                                                        <div class="col text-left"><p class="text-content font-weight-bold mb-2"><?php echo $row2['Cust_Address'];?></p></div>
                                                    </div>   
                                                </div>

                                            </div>             
                                        </div>  

                                        </div>
                                    </div>
                                    </div>
                                    <!-- End of Modal -->

                                    <?php } ?>                   

                                </tbody>
                            </table>

                        <?php
                        } 
                        else
                        {  ?> 
                            <!-- NO Customers -->
                                <p class="text-center lead text-content font-weight-bolder my-5"><?php echo $err_message ?></p>
                            <!-- NO Customers -->
                        <?php } ?>

                    </div>                    

                </div>
                <!-- Card Body End -->
                
        </div>


                
</div>
<!-- End of Main Content -->



<?php
mysqli_close($conn);
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


