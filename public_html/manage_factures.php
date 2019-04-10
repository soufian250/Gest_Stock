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
        <h1 align="center" class="titleH1">Liste de Factures</h1>
        <div class="container">
            <div align="center">
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher...">
            </div>
            <br>
            <table id="invoice_table" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de Client</th>
                        <th>Date de commande</th>
                        <th>Prix Totale</th>
                        <th>Payé</th>
                        <th>Reste à payer</th>
                        <th>Type de paiement</th>
                        <th>Modifier</th>
                        <th>Imprimer</th>

                    </tr>
                </thead>
                <tbody id="get_invoice">
                  <!--<tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>Root</td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                    </td>
                  </tr>-->
                </tbody>
            </table>
        </div>


        <?php
        include_once("./templates/update_invoice.php");
        ?>


    </body>

</html>
