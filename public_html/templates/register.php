<!-- Modal -->
<div class="modal fade" id="form_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>