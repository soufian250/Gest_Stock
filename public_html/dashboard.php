<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
}

/* $db = mysqli_connect("localhost", "root", "", "project_inv");

  if (isset($_POST['image'])) {
  $nom = $_POST["product_name"];
  $cat = $_POST["select_cat"];
  $type = $_POST["select_brand"];
  $prix = $_POST["product_price"];
  $quantite = $_POST["product_qty"];
  $date = $_POST["added_date"];

  $image = $_FILES['upfile']['name'];

  $target = "images/data/" . basename($image);


  $sql = "INSERT INTO `products`
  (`cid`, `bid`, `picture` , `product_name`, `product_price`,
  `product_stock`, `added_date`, `p_status`)
  VALUES ($cat,$type,'$image','$nom',$prix,$quantite,'$date',1)";

  mysqli_query($db, $sql);

  move_uploaded_file($_FILES['upfile']['tmp_name'], $target);
 }*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gestion de Stock</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script type="text/javascript" src="./js/main.js"></script>
        <link rel="stylesheet" type="text/css" href="./Clock/clockCSS.css">
        <script type="text/javascript" src="./Clock/clockJS.js"></script>
        <!--<style>
            #my_Btn{

                margin: auto;
                font-family: calibri;
                width: 150px;
                padding: 10px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border: 1px dashed #BBB; 
                text-align: center;
                background-color: #DDD;
                cursor:pointer;
            }
        </style>
        <script type="text/javascript">
            function getFile() {
                document.getElementById("upfile").click();
            }
            function sub(obj) {
                var file = obj.value;
                var fileName = file.split("\\");
                document.getElementById("my_Btn").innerHTML = fileName[fileName.length - 1];
                document.getElementById("image").value = fileName[fileName.length - 1];
                event.preventDefault();
            }
        </script>-->
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/><br/>
        <div class="container">
            <?php
            if (isset($_GET["msg"]) AND ! empty($_GET["msg"])) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_GET["msg"]; ?>
                    <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-body"><h3 style="text-align: center;">Bienvenue Admin</h3></div>

                        <img class="card-img-top mx-auto" style="width:60%;" src="./images/admin.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Profil Informations</h4>
                            <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo $_SESSION["username"] ?></p>
                            <p class="card-text"><i class="fa fa-user-shield">&nbsp;</i><?php echo $_SESSION["role"] ?></p>
                            <p class="card-text"><i class="far fa-calendar-check">&nbsp;</i>Last Login : <?php echo $_SESSION["last_login"]; ?></p>
                            <a href="#" data-toggle="modal" data-target="#form_profil" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="jumbotron" style="width:100%;height:100%;">
                        <div class="row">
                            <div class="alert alert-dark col-md-12" role="alert">
                                <div class="row">
                                    <div class="col-md-1"><i class="far fa-chart-bar"></i></div>
                                    <div class="col-md-10 text-center"><h4>Statistique</h4></div>
                                    <div class="col-md-1"><i class="far fa-chart-bar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-md-6">
                                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center">Statistique Globale</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <i class="fas fa-tools"></i>
                                            </div>
                                            <div class="col-md-7">
                                                <span>Totale Produit:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span id="ps"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <i class="fab fa-accusoft"></i>
                                            </div>
                                            <div class="col-md-7">
                                                <span>Totale Types:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span id="ts"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <i class="fas fa-toolbox"></i>
                                            </div>
                                            <div class="col-md-7">
                                                <span>Totale Categories:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span id="cs"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center">Totale de Commandes</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fab fa-opencart"></i>
                                            </div>
                                            <div class="col-md-3">
                                                <span id="cms"></span>
                                            </div>
                                            <div class="col-md-6">
                                                Commandes
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="manage_factures.php" style="color: #fff;">Voir La list</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="box-shadow:0 0 15px 0 lightgrey;">
                            <h4 class="card-title">Factures</h4>
                            <p class="card-text">Ici, vous pouvez aperçu vos factures et les gérer.</p>

                            <!--<div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">-->
                            <a href="manage_factures.php"  class="btn btn-primary"><i class="fas fa-glasses">&nbsp;</i>Consulter</a>
                            <a href="#" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                            <!--</div>
                            <div class="col-md-2"></div>
                        </div>-->
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
                            <p class="card-text">Ici, vous pouvez gérer vos employés ajouter un nouveau supprimer ou mettre à jour</p>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <a href="#" data-toggle="modal" data-target="#form_employe" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
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
                                    <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                    <a href="manage_categories.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center text-center">
                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                            <h4 class="card-title">Produits</h4>
                            <p class="card-text">Ici, vous pouvez gérer vos produits et ajouter de nouveaux produits.</p>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                    <a href="manage_product.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center" style="box-shadow:0 0 15px 0 lightgrey;">
                            <h4 class="card-title">Types</h4>
                            <p class="card-text">Ici, vous pouvez gérer votre marque et ajouter de nouveaux types</p>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                    <a href="manage_brand.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--<div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>-->


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

    </body>
</html>