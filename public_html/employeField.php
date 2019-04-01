<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
}
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
        <link type="text/css" rel="stylesheet" href="./css/titles.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/><br/>
        <br/><br/>
        <br/><br/>
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
                                <h4 class="card-title titleH1">Tâches d'aujourd'hui</h4>
                                <p class="card-text titleP"><?php echo $_SESSION["notes"]; ?></p>
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

                                            <a href="consulterProduit.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Consulter la liste de Produits</a>
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
        <p></p>
        <p></p>

        <br>
        <br>
        <!--<div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="card text-center text-center">
                        <div class="card-body" style="box-shadow:0 0 15px 0 lightgrey;">
                            <h4 class="card-title">Fournisseur</h4>
                            <p class="card-text">Ici, vous pouvez gérer vos employés ajouter un nouveau supprimer ou mettre à jour.</p>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <a href="#" data-toggle="modal" data-target="#form_fournisseur" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Ajouter</a>
                                    <a href="manage_fournisseur.php" class="btn btn-secondary"><i class="fa fa-edit">&nbsp;</i>Gérer</a>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>-->
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

    </body>
</html>