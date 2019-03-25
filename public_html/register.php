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
        <link rel="stylesheet" type="text/css" href="./includes/style.css">
        <script type="text/javascript" src="./js/main.js"></script>
    </head>
    <body>
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/><br/>
        <div class="container">
            <div class="card mx-auto" style="width: 30rem;">
                <div class="card-header">Registre</div>
                <div class="card-body">
                    <form id="register_form" onsubmit="return false" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Nom Complet</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                            <small id="u_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Address Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="e_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password1">Mot de Passe</label>
                            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
                            <small id="p1_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password2">Rentrer le Mot de Passe</label>
                            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
                            <small id="p2_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Role</label>
                            <select name="usertype" class="form-control" id="usertype">
                                <option value="">Sélectionner le type de l'utilisateur</option>
                                <option value="Admin">Admin</option>
                                <option value="Employe">Employe</option>
                            </select>
                            <small id="t_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Registrer</button>
                        <span><a href="index.php">Login</a></span>
                    </form>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>

    </body>
</html>