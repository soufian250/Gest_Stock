<?php
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
            <div class="card mx-auto" style="width: 20rem;">
                <br>
                <div class="card-body">
                    <form id="form_reset" onsubmit="return false">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Mot de passe oublié?</h1>
                            <p class="mb-4">Nous l'obtenons, des choses se passent. Entrez simplement votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe!</p>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="logf_email" id="logf_email" placeholder="Enter Votre Email Adresse">
                            <small id="ef_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fa fa-lock">&nbsp;</i>réinitialiser le mot de passe</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="small" href="index.php">Vous avez déjà un compte? S'identifier!</a>
                    </div>
                </div>
            </div>


        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="js/sb-admin-2.min.js"></script>

        <script src="vendor/chart.js/Chart.min.js"></script>

        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>

