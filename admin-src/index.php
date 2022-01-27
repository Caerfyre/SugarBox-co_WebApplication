<?php 
include '../scripts/database/secure-login.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/topbar.php'
?>

<head>
    <title>SugarBox&co. Admin - Dashboard</title>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-content"><b>Dashboard</b></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Items Sold Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-section2 border-section">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Items Sold</div>
                            <div class="h5 mb-0 font-weight-bold text-content">56</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 bg-section2 border-section">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-content">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-section2 border-section">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Customers
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-content">67</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-section2 border-section">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Revenue</div>
                            <div class="h5 mb-0 font-weight-bold text-content">P 3,456.00</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        
        <!-- ORDERS TABLE -->
        <div class="col-xl-8 col-lg-7">

            <!-- DataTales Example -->
            <div class="card shadow mb-4 border-section">
                        <div class="card-header py-3 bg-section border-section">
                            <h6 class="m-0 font-weight-bold text-content"><b>Recent Orders</b></h6>
                        </div>
                        <div class="card-body bg-section2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-content bg-section2 text-content" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date Ordered</th>
                                            <th>Fulfillment Date</th>
                                            <th>Customer Name</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>01/14/2022</td>
                                            <td>01/20/2022</td>
                                            <td>John Doe</td>
                                            <td>In Progress</td>
                                            <td>P 550.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>01/14/2022</td>
                                            <td>01/22/2022</td>
                                            <td>James Doe</td>
                                            <td>Pending</td>
                                            <td>P 650.00</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>01/14/2022</td>
                                            <td>01/23/2022</td>
                                            <td>Joe Doe</td>
                                            <td>Pending</td>
                                            <td>P 750.00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>01/14/2022</td>
                                            <td>01/18/2022</td>
                                            <td>Jean Doe</td>
                                            <td>Pending</td>
                                            <td>P 950.00</td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>01/14/2022</td>
                                            <td>01/18/2022</td>
                                            <td>Jean Doe</td>
                                            <td>Pending</td>
                                            <td>P 950.00</td>
                                        </tr>
                                                                  
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 border-section">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-section bg-section">
                    <h6 class="m-0 font-weight-bold text-content"><b>Revenue Sources</b></h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-content"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body bg-section2">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center text-content small">
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#4e73df;"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#1cc88a;"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#36b9cc;"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-5mb-7 mb-4">
        <div class="card shadow mb-4 border-section">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-section border-section">
                    <h6 class="m-0 font-weight-bold text-content"><b>Earnings Overview</b></h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-content"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body bg-section2">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
             
                    
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include 'includes/footer.php';
include 'includes/logoutModal.php';
include 'includes/scripts.php'
?>


