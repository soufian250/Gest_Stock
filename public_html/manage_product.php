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
        <!--<style>
            #myBtn{

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
                document.getElementById("myBtn").innerHTML = fileName[fileName.length - 1];
                event.preventDefault();
            }
        </script>-->
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/><br/>
        <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <!--<th>Photo</th>-->
                        <th>Preduit</th>
                        <th>Categorie</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                        <th>Date d'Ajout</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="get_product">

                </tbody>
            </table>
        </div>


        <?php
        include_once("./templates/update_products.php");
        ?>


    </body>
</html>