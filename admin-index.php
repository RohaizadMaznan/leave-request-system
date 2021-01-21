<?php session_start();

require 'config.php';

$result = "SELECT * from user WHERE  username = '".$_SESSION['username']."'";
$output = mysqli_query($conn,$result);

while($row = mysqli_fetch_assoc($output)) {
    $userId = $row['userId'];
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        
<?php 

$id = $_GET['post_type'];

if($id == 'dashboard'){
    $title = "Dashboard | Attendant System";
    echo $title;
}

if($id == 'list-leave-applied'){
    $title = "Leave Applied Listing | Attendant System";
    echo $title;
}

if($id == 'apply-leave'){
    $title = "Apply Leave | Attendant System";
    echo $title;
}

if($id == 'apply-details'){
    $title = "Update Requested Leave | Attendant System";
    echo $title;
}

if($id == 'reminder'){
    $title = "Set Reminder | Attendant System";
    echo $title;
}

if($id == 'edit-reminder'){
    $title = "Update Reminder | Attendant System";
    echo $title;
}




?>
        
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>

      <link rel="icon" href="image/favicon_io/favicon.ico" type="image/gif">
    
</head>

<body>



<?php

$execute = "dashboard-admin.php";

$id = $_GET['post_type'];

if ($id == 'dashboard'){
$execute = 'dashboard-admin.php';
}

if ($id == 'list-leave-applied'){
$execute = 'admin-listLeave.php';
}

if ($id == 'apply-details'){
$execute = 'admin-updateRequest.php';
}

if ($id == 'apply-leave'){
$execute = 'admin-applyLeave.php';
}

if ($id == 'setting'){
$execute = 'admin-setting.php';
}

if ($id == 'reminder'){
$execute = 'admin-addReminder.php';
}

if ($id == 'edit-reminder'){
$execute = 'admin-editReminder.php';
}

?>


    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h4 style="color: white; text-align: left;">ADMIN DASHBOARD</h4><!--<a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>-->
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
<?php 

$id = $_GET['post_type'];

if($id == 'list-leave-applied' or $id == 'apply-details'){
?>
                            <li><a href="admin-index.php?post_type=dashboard"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="admin-index.php?post_type=reminder&submitted=none"><i class="ti-dashboard"></i> <span>Set Reminder</span></a></li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-agenda"></i><span>Leave Records</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="admin-index.php?post_type=list-leave-applied&submitted=none">All Leave Record</a></li>
                                    <li class=""><a href="admin-index.php?post_type=apply-leave&submitted=none">Apply Leave</a>
                                    </li>
                                </ul>
                            </li>
<?php } elseif($id == 'apply-leave') { ?>
                            <li><a href="admin-index.php?post_type=dashboard"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="admin-index.php?post_type=reminder&submitted=none"><i class="ti-dashboard"></i> <span>Set Reminder</span></a></li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-agenda"></i><span>Leave Records</span></a>
                                <ul class="collapse">
                                    <li class=""><a href="admin-index.php?post_type=list-leave-applied&submitted=none">All Leave Record</a></li>
                                    <li class="active"><a href="admin-index.php?post_type=apply-leave&submitted=none">Apply Leave</a>
                                    </li>
                                </ul>
                            </li>
<?php } elseif($id == 'dashboard') { ?>
                            <li class="active"><a href="admin-index.php?post_type=dashboard"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="admin-index.php?post_type=reminder&submitted=none"><i class="ti-dashboard"></i> <span>Set Reminder</span></a></li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-agenda"></i><span>Leave Records</span></a>
                                <ul class="collapse">
                                    <li class=""><a href="admin-index.php?post_type=list-leave-applied&submitted=none">All Leave Record</a></li>
                                    <li class=""><a href="admin-index.php?post_type=apply-leave&submitted=none">Apply Leave</a>
                                    </li>
                                </ul>
                            </li>
<?php } elseif($id == 'reminder' or $id == 'edit-reminder') { ?>
                            <li><a href="admin-index.php?post_type=dashboard"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class="active"><a href="admin-index.php?post_type=reminder&submitted=none"><i class="ti-dashboard"></i> <span>Set Reminder</span></a></li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-agenda"></i><span>Leave Records</span></a>
                                <ul class="collapse">
                                    <li class=""><a href="admin-index.php?post_type=list-leave-applied&submitted=none">All Leave Record</a></li>
                                    <li class=""><a href="admin-index.php?post_type=apply-leave&submitted=none">Apply Leave</a>
                                    </li>
                                </ul>
                            </li>
<?php } else { ?>

                            <li class=""><a href="admin-index.php?post_type=dashboard"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="admin-index.php?post_type=reminder&submitted=none"><i class="ti-dashboard"></i> <span>Set Reminder</span></a></li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-agenda"></i><span>Leave Records</span></a>
                                <ul class="collapse">
                                    <li class=""><a href="admin-index.php?post_type=list-leave-applied&submitted=none">All Leave Record</a></li>
                                    <li class=""><a href="admin-index.php?post_type=apply-leave&submitted=none">Apply Leave</a>
                                    </li>
                                </ul>
                            </li>

<?php } ?>
                        </ul>
                    </nav>
                </div>
                
                
            </div>
        </div>
        <!-- sidebar menu area end -->

        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">
<?php 

$id = $_GET['post_type'];

if($id == 'apply-leave'){
    $title = "Request Leave";
    echo $title;
}
if($id == 'dashboard'){
    $title = "Dashboard";
    echo $title;
}
if($id == 'list-leave-applied'){
    $title = "Requested Leave";
    echo $title;
}

if($id == 'apply-details'){
    $title = "Request Leave";
    echo $title;
}

if($id == 'setting'){
    $title = "Setting";
    echo $title;
}

if($id == 'reminder'){
    $title = "Set Reminder";
    echo $title;
}

if($id == 'edit-reminder'){
    $title = "Set Reminder";
    echo $title;
}


?>
                            </h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin-index.php?post_type=dashboard">Home</a></li>
                                <li>
<?php 

$id = $_GET['post_type'];

if($id == 'apply-leave'){
    $breadcrumb = "<span>Apply Leave</span>";
    echo $breadcrumb;
}
if($id == 'dashboard'){
    $breadcrumb = "<span>-</span>";
    echo $breadcrumb;
}
if($id == 'list-leave-applied'){
    $breadcrumb = "<span>List Leave Applied</span>";
    echo $breadcrumb;
}
if($id == 'apply-details'){
    $breadcrumb = "<span>Make an update</span>";
    echo $breadcrumb;
}
if($id == 'reminder'){
    //$breadcrumb = "<a href='admin-index.php?post_type=list-book&submitted=none'>Book Listing</a>";
    $breadcrumb = "<span>Set a Reminder</span>";
    echo $breadcrumb;
}

if($id == 'edit-reminder'){
    //$breadcrumb = "<a href='admin-index.php?post_type=list-book&submitted=none'>Book Listing</a>";
    $breadcrumb = "<span>Update a Reminder</span>";
    echo $breadcrumb;
}

?>
                                </li>
                                
<?php 

$id = $_GET['post_type'];

if($id == 'book-details'){
    $breadcrumb = "<li><span>Updating Book</span></li>";
    echo $breadcrumb;
}


?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="image/dashboard.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle text-capitalize" data-toggle="dropdown">
                                <?php echo $_SESSION['username'];?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="admin-index.php?post_type=setting&submitted=none">Settings</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php include ("$execute");?>
        
        </div>
        

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p> Copyright © 2021. All right reserved 
            </div>
        </footer>
        <!-- footer area end-->

    </div>
    <!-- page container area end -->



    
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="../js/jquery.datetimepicker.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</body>

</html>
