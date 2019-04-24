<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
} else if ($_SESSION["role"] == "Admin") {
    header("location:" . DOMAIN . "/dashboard.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Gestion de Stock</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="./css/titles.css">
        <script type="text/javascript" src="./js/main.js"></script>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Gestion de Stock</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="employeField.php">
                        <i class="fa fa-home"></i>
                        <span>Accueil</span></a>
                </li>

                <!-- Divider -->

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Consulter
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="consulterProduit.php" >
                        <i class="fas fa-glasses"></i>
                        <span>Produits</span>
                    </a>
                </li>               
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <?php
                                    if ($_SESSION["notes"] != "") {
                                        ?>
                                        <span class="badge badge-danger badge-counter" id="num_tasks">1+</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="badge badge-danger badge-counter" id="num_tasks">0</span>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Tâches à faire
                                    </h6>
                                    <?php
                                    if ($_SESSION["notes"] != "") {
                                        ?>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500"><?php echo date("d/m/Y"); ?></div>
                                                <span class="font-weight-bold"><?php echo $_SESSION["notes"]; ?></span>
                                            </div>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="row">
                                            <div class="row mx-auto">
                                                <span class="font-weight-bold">Aucune tâche n'a été envoyée!</span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"] ?></span>
                                    <img class="img-profile rounded-circle" src="images/admin.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#info_profil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Les infos de Profil
                                    </a>
                                    <a class="dropdown-item" href="#" href="#" data-toggle="modal" data-target="#form_profil">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Editer le Profil
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mx-auto" style="box-shadow:0 0 25px 0 lightgrey;">
                                        <div class="card-body"><h3 style="text-align: center;">Bienvenue Employe</h3></div>

                                        <img class="card-img-top mx-auto" style="width:60%;" src="./images/admin.png" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Profil Informations</h4>
                                            <p class="card-text"><i class="fa fa-user">&nbsp;&nbsp;</i><?php echo $_SESSION["username"] ?></p>
                                            <p class="card-text"><i class="fa fa-user-shield">&nbsp;</i><?php echo $_SESSION["role"] ?></p>
                                            <p class="card-text"><i class="far fa-calendar-check">&nbsp;</i>Dernière Login : <?php echo $_SESSION["last_login"]; ?></p>
                                            <a href="#" data-toggle="modal" data-target="#form_profil" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="card text-center text-center" style="width:100%;height:100%;">
                                            <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                                <h1 class="card-title titleAd">Tâches d'aujourd'hui</h1>
                                                <?php
                                                if ($_SESSION["notes"] != "") {
                                                    ?>
                                                    <p class="card-text titleP"><?php echo $_SESSION["notes"]; ?></p>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <p class="card-text titleP">Aucune tâche n'a été envoyée!</p>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card text-center text-center">
                                                <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                                    <h4 class="card-title">Produits</h4>
                                                    <p class="card-text">Ici, vous pouvez Consulter La liste de Produits</p>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">

                                                            <a href="consulterProduit.php" class="btn btn-secondary"><i class="fas fa-glasses">&nbsp;</i>Consulter la liste de Produits</a>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; GestionDeStock <?php echo date("Y"); ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            <?php
            //Forms
            include_once("./templates/fournisseur.php");
            include_once("./templates/zakatprogress.php");
            include_once("./templates/zakatinfos.php");
            include_once("./templates/info_profil.php");
            include_once("./templates/logout.php");
            ?>
            <?php
            //Employe Form
            include_once("./templates/employe.php");
            ?>
            <?php
            //Categpry Form
            include_once("./templates/category.php");
            ?>
            <?php
            //Brand Form
            include_once("./templates/brand.php");
            ?>
            <?php
            //Products Form
            include_once("./templates/products.php");
            ?>

            <?php
            //Profil Form
            include_once("./templates/editProfill.php");
            ?>

            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <script src="js/sb-admin-2.min.js"></script>

            <script src="vendor/chart.js/Chart.min.js"></script>

            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>