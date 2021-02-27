<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['admin']))
    {
        header('location:login.html');
        exit;
    }
    include '../config.php';
    include '../function.php';
    spl_autoload_register("loadClass");

    $tour = new Tour;
    $allTour = $tour -> getAllTour();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include 'subpage/head.php'; ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <?php include 'subpage/header.php'; ?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <?php include 'subpage/menu.php'; ?>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Tour Table</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard</a></li>
                            </ol>
                            <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                                to Pro</a> -->
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Tour Table</h3>
                            <!-- <p class="text-muted">Add class <code>.table</code></p> -->
                            <button class="btn btn-info" onclick="window.location.href='form_insert_tour.php'">Insert Tour</button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id Tour</th>
                                            <th class="border-top-0">Name Tour</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Time</th>
                                            <th class="border-top-0">Place</th>
                                            <!-- <th class="border-top-0">Zone</th> -->
                                            <th class="border-top-0">Travel Type</th>
                                            <th class="border-top-0">Zone</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Author</th>
                                            <th class="border-top-0">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($allTour as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value['idtour'] ?></td>
                                                    <td><?php echo $value['name'] ?></td>
                                                    <td><?php echo number_format($value['price']) ?></td>
                                                    <td><?php echo $value['time'] ?> Days</td>
                                                    <td width="300px"><?php echo $value['place'] ?></td>
                                                    <!-- <td><?php echo $value['zone'] ?></td> -->
                                                 	<td><?php echo $value['traveltype'] ?></td>
                                                 	<td><?php echo $value['zone'] ?></td>
                                                 	<td><img width="150px;" height="100px;" src="../img/imgtour/<?php echo $value['image'] ?>" alt="<?php echo $value['image'] ?>"></td>
                                                    <td><?php echo $value['author'] ?></td>
                                                    <td><button class="btn btn-danger" onclick="window.location.href='tour/delete.php?idtour=<?php echo $value['idtour'] ?>'">Delete</button></td>
                                                    <td><button class="btn btn-danger" onclick="window.location.href='profile_tour.php?idtour=<?php echo $value['idtour'] ?>'">Update</button></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <?php include 'subpage/footer.php'; ?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>