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
        <script type="text/javascript" src="./js/manage.js"></script>
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
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Gestion de Stock</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
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
                        <span>Commandes</span>
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
                <li class="nav-item  active">
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
                        <br>                        <br>
                        <div id="alertmsg" class="alert alert-success alert-dismissible fade show d-none" role="alert"></div>
                        <h1 align="center" class="titleH1">Gestion des Employés</h1>
                        <br>
                        <div class="text-center">
                            <a href="#" data-toggle="modal" data-target="#form_employe" class="btn btn-primary" style="width: 200px;height: 40px;"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                        </div>
                        <br>
                        <br>
                        <div class="container text-center"  style="max-width: 1250px;">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom de Utilisateur</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date d'inscription</th>
                                        <th>Dernière connexion</th>
                                        <th>Actions</th>
                                        <th>Instruction</th>
                                    </tr>
                                </thead>
                                <tbody id="get_user">

                                </tbody>
                            </table>
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
        include_once("./templates/editProfill.php");
        include_once("./templates/info_profil.php");
        include_once("./templates/logout.php");
        include_once("./templates/employe.php");
        include_once("./templates/update_user.php");
        include_once("./templates/tasks.php");
        ?>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>