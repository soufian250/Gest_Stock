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
        <script type="text/javascript" src="./js/order.js"></script>
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

                <li class="nav-item active">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                    <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                                        <div class="card-header">
                                            <h4>Nouvelles commandes</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="get_order_data" onsubmit="return false">
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label class="col-sm-3 col-form-label" align="right">Date de commande</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("d/m/Y"); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-7"></div>
                                                                <div class="col-md-5">
                                                                    <label class="col-form-label" style="text-align: right;">Nom de client</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Entrer le nom de Client"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group d-none" id="numero_div">
                                                            <div class="row">
                                                                <div class="row mx-auto">
                                                                    <label class="col-form-label" title="IDENTIFIANT COMMUN DE L'ENTREPRISE">ICE</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="numero" name="numero"class="form-control form-control-sm" placeholder="Entrer le Numero"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-groupe">
                                                            <label class="col-form-label" align="right">Type de client</label>
                                                            <div>
                                                                <select class="form-control form-control-sm" id="type_client" name="type_client">
                                                                    <option value="Personne">Personne</option>
                                                                    <option value="Etablissement">Etablissement</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                                    <div class="card-body" style="text-align: center;">
                                                        <h4>Choisissez les produits commandé</h4><br>
                                                        <table align="center" style="width:800px;">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th style="text-align:center;">Nom de Produit</th>
                                                                    <th style="text-align:center;">Quantite en Stock</th>
                                                                    <th style="text-align:center;">Quantite</th>
                                                                    <th style="text-align:center;">Prix</th>
                                                                    <th>Totale</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="invoice_item">
                                <!--<tr>
                                    <td><b id="number">1</b></td>
                                    <td>
                                        <select name="pid[]" class="form-control form-control-sm" required>
                                            <option>Washing Machine</option>
                                        </select>
                                    </td>
                                    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
                                    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                                    <td>Rs.1540</td>
                                </tr>-->
                                                            </tbody>
                                                        </table> <!--Table Ends-->
                                                        <center style="padding:10px;">
                                                            <button id="add" style="width:150px;" class="btn btn-success" title="Ajouter un nouveau produit">Nouveau</button>
                                                            <button id="remove" style="width:150px;" class="btn btn-danger" title="Supprimer le derniere produit">Supprimer</button>
                                                        </center>
                                                    </div> <!--Crad Body Ends-->
                                                </div> <!-- Order List Crad Ends-->

                                                <p></p>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="sub_total" class="col-sm-3 col-form-label" align="right">Totale HT</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="gst" class="col-sm-3 col-form-label" align="right" title="Taxe sur les produits et services">TVA (20%)</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" readonly name="gst" class="form-control form-control-sm" id="gst"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="discount" class="col-sm-3 col-form-label" align="right">Remise</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="discount" class="form-control form-control-sm" id="discount"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="net_total" class="col-sm-3 col-form-label" align="right">Totale TTC</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="paid" class="col-sm-3 col-form-label" align="right">Payé</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="paid" class="form-control form-control-sm" id="paid">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="due" class="col-sm-3 col-form-label" align="right">Reste</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">   
                                                    </div>
                                                    <label for="payment_type" class="col-sm-3 col-form-label" align="right">Type de paiement</label>
                                                    <div class="col-sm-5">
                                                        <select name="payment_type" class="form-control form-control-sm" id="payment_type"/>
                                                        <option>Cash</option>
                                                        <option>Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <center>
                                                    <input type="submit" id="order_form" style="width:160px;" class="btn btn-info" value="Commander" title="Passer une Commande">
                                                    <button id="print_invoice" style="width:160px;" class="btn btn-success d-none"><i class="fas fa-print">&nbsp;</i>Imprimer Devis</button>
                                                </center>


                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
        ?>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>