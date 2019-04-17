<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
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
        <link rel="stylesheet" type="text/css" href="./includes/style.css">
        <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
    </head>
    <body class="bg-gradient-primary">
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->

        <br/><br/><br/><br/>
        <div class="container">
            <?php
            if (isset($_GET["msg"]) AND ! empty($_GET["msg"])) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_GET["msg"]; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <div class="card mx-auto" style="width: 20rem;">
                <br>
                <img class="card-img-top mx-auto" style="width:60%;" src="./images/lock.png" alt="Login Icon">
                <div class="card-body">
                    <form id="form_login" onsubmit="return false">
                        <div class="text-center">
                            <h1 class="h4">Nous saluons le retour!</h1>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter Votre Email Adresse">
                            <small id="e_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Entrer Votre Mot De Passe">
                            <small id="p_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fa fa-lock">&nbsp;</i>Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="#" data-toggle="modal" data-target="#form_register">Créer un compte!</a>
                    </div>
                </div>
            </div>


        </div>
        
        <?php include_once 'templates/register.php';?>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="js/sb-admin-2.min.js"></script>

        <script src="vendor/chart.js/Chart.min.js"></script>

        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>