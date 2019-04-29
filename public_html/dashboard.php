<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
} else if ($_SESSION["role"] == "Employe") {
    header("location:" . DOMAIN . "/employeField.php");
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
        <script type="text/javascript" src="./js/manage.js"></script>
        <link type="text/css" href="css/cursor.css" rel="stylesheet">
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
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-home"></i>
                        <span>Accueil</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Ordres
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="far fa-newspaper"></i>
                        <span>Facture</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Nouvelle Commande</h6>
                            <a class="collapse-item" href="new_order.php">Faire</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Gérer Les Factures</h6>
                            <a class="collapse-item" href="manage_factures.php">Consulter</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Espaces
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="manage_users.php" >
                        <i class="fas fa-user-cog"></i>
                        <span>Employes</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="manage_fournisseur.php">
                        <i class="fas fa-dolly-flatbed"></i>
                        <span>Fournisseurs</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestions
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="manage_categories.php">
                        <i class="fab fa-accusoft"></i>
                        <span>Gestion De Categories</span>
                    </a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-tools"></i>
                        <span>Gestion De Produits</span></a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Gestion</h6>
                            <a class="collapse-item" href="manage_product.php">Gérer</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Voir La liste</h6>
                            <a class="collapse-item" href="consulterProduit.php">Consulter</a>
                        </div>
                    </div>
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
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">La Zakat</span>
                                    <i class="fas fa-gift fa-sm fa-fw mr-2 text-gray-400" title="Zakat Al Maal"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#zakat_card" id="zakat_dis">
                                        <i class="fas fa-gift fa-sm fa-fw mr-2 text-gray-400"></i>
                                        les progrès de Zakat
                                    </a>
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
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div id="alertmsg" class="alert alert-success alert-dismissible fade show d-none" role="alert"></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <br><p></p>
                                    <div class="card mx-auto" style="box-shadow:0 0 25px 0 lightgrey;">
                                        <div class="card-body"><h3 style="text-align: center;">Bienvenue Admin</h3></div>

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
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <!-- Content Row -->
                                    <div class="row">

                                        <div class="row mx-auto">
                                            <h3>Statistiques</h3>
                                        </div>
                                        <!-- Earnings (Monthly) Card Example -->
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 mb-4">
                                                <div class="card border-left-primary shadow h-100 py-2 pointer" id="box" location="http://localhost/inv_project/public_html/manage_factures.php">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Totale Commandes</div>
                                                                <div id="cms" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 mb-4">
                                                <div class="card border-left-info shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Factures payées</div>
                                                                <div class="row no-gutters align-items-center">
                                                                    <div class="col-auto">
                                                                        <div id="paids" class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="progress progress-sm mr-2">
                                                                            <div id="stat" class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 pointer" id="box2" location="http://localhost/inv_project/public_html/manage_product.php">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Totale Produits</div>
                                                                <div id="ps" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 mb-4">
                                                <div class="card border-left-warning shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Totale Categories</div>
                                                                <div id="cs" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fab fa-accusoft fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-4" id="top">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <br>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="row mx-auto">
                                    <h2>Accès rapide</h2>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Fournisseur</h4>
                                            <p class="card-text">Ici, vous pouvez gérer les fournisseurs et ajouter un nouveau</p>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <a href="#" data-toggle="modal" data-target="#form_fournisseur" class="btn btn-primary cell"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                                    <a href="manage_fournisseur.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <div class="card-body text-center" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Nouvelles commandes</h4>
                                            <p class="card-text">Ici, vous pouvez faire des factures et créer de nouvelles commandes</p>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8"><a href="new_order.php" class="btn btn-primary"><i class="fas fa-newspaper">&nbsp;</i>Nouvelle commande</a></div>
                                                <div class="col-md-2"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>	
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Employes</h4>
                                            <p class="card-text">Ici, vous pouvez gérer vos employés ajouter, supprimer ou mettre à jour</p>

                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <a href="#" data-toggle="modal" data-target="#form_employe" class="btn btn-primary cell"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                                    <a href="manage_users.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Categories</h4>
                                            <p class="card-text">Ici, vous pouvez gérer vos catégories et ajouter de Superieur et sous catégories.</p>

                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary cell"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                                    <a href="manage_categories.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="card text-center">
                                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Factures</h4>
                                            <p class="card-text">Ici, vous pouvez aperçu vos factures et les gérer.</p>

                                            <!--<div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">-->
                                            <a href="manage_factures.php"  class="btn btn-primary"><i class="fas fa-glasses">&nbsp;</i>Consulter</a>
                                            <!--</div>
                                            <div class="col-md-2"></div>
                                        </div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                                            <h4 class="card-title">Produits</h4>
                                            <p class="card-text">Ici, vous pouvez gérer vos produits et ajouter de nouveaux produits.</p>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary cell"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                                    <a href="manage_product.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <br>                        
                        <br>
                        <div class="container d-none" id="zakat_card">
                            <div class="row">
                                <div class="row mx-auto">
                                    <h2>Zakat Al Maal</h2>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">LA ZAKAT</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Options</div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#zakat_info">Zakat Info</a>
                                                    <a class="dropdown-item zakat_info" href="#" data-toggle="modal" data-target="#zakat_modal">Vos Progrès</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" id="zakat_close">Fermer</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body" id="zakat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <br>
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
                <!-- End of Content Wrapper -->

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