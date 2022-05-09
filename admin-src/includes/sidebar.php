
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion fixed-top" id="accordionSidebar" style="background-color:#3a3937;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img class="img-fluid" src="../assets/sblogo-2.svg" alt="SugarBox&co. logo" draggable="false">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active' ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <!-- Nav Item - Products -->
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'products.php') echo 'active' ?>">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - Customers -->
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'customers.php') echo 'active' ?>">
                <a class="nav-link" href="customers.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customers</span></a>
            </li>

            <!-- Nav Item - Suppliers -->
            <!-- <li class="nav-item <?php #if(basename($_SERVER['PHP_SELF']) == 'suppliers.php') echo 'active' ?>">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Suppliers</span></a>
            </li> -->

             
            <!-- Nav Item - Orders -->
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'orders.php') echo 'active' ?>">
                <a class="nav-link" href="orders.php">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Fulfillment -->
            <!-- <li class="nav-item <?php #if(basename($_SERVER['PHP_SELF']) == 'fulfillment.php') echo 'active' ?>">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Fulfillment</span></a>
            </li> -->

            <!-- Nav Item - Inventory -->
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'inventory.php') echo 'active' ?>">
                <a class="nav-link" href="inventory.php">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Inventory</span></a>
            </li>

            <!-- Nav Item - Sales Reports -->
            <!-- <li class="nav-item <?php #if(basename($_SERVER['PHP_SELF']) == 'salesreports.php') echo 'active' ?>">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Sales Reports</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>        

        </ul>
        <!-- End of Sidebar -->

        
        <!-- Fake Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img class="img-fluid" src="../assets/sblogo-2.svg" alt="SugarBox&co. logo" draggable="false">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - Customers -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customers</span></a>
            </li>

            <!-- Nav Item - Suppliers -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Suppliers</span></a>
            </li>

             
            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Fulfillment -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Fulfillment</span></a>
            </li>

            <!-- Nav Item - Inventory -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Inventory</span></a>
            </li>

            <!-- Nav Item - Sales Reports -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Sales Reports</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>        

        </ul>
        <!-- End of Fake Sidebar -->