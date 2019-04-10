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
        <script type="text/javascript" src="./js/manage.js"></script>
        <link rel="stylesheet" href="./DataTable/datatables.css" type="text/css">
        <link rel="stylesheet" href="./DataTable/datatables.min.css" type="text/css">
        <script type="text/javascript" src="./DataTable/datatables.js"></script>
        <script type="text/javascript" src="./DataTable/datatables.min.js"></script>
        <link type="text/css" rel="stylesheet" href="./css/titles.css">

    </head>
    <body>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/><br/>
        <div class="container">
            <h1 class="titleH1" style="text-align: center;">Liste De Produits</h1>
            <div align="center">
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher...">
            </div>
            <br>
            <table class="table table-striped table-bordered text-center" id="produit_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <!--<th>Photo</th>-->
                        <th>Produit</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Prix de vente</th>
                        <th>Quantite</th>
                        <th>Date d'Ajout</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="get_p_consulter">

                </tbody>
            </table>
        </div>


        <?php
        include_once("./templates/update_products.php");
        ?>


    </body>
</html>
<!--<script>
    $(document).ready(function () {
        $('#produit_table').DataTable();
    });
</script>-->