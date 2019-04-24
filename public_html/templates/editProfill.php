<!-- Modal -->
<div class="modal fade" id="form_profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profil_form" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" name="pemail" id="pemail" value="<?php echo $_SESSION["email"]; ?>"/>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <label for="username">Nom Complet</label>
                                <input type="text" name="usernamen" class="form-control" id="usernamen" value="<?php echo $_SESSION["username"] ?>" placeholder="Entrer Votre Nom">
                                <small id="pu_error" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-2">
                                <br><p></p>
                                <a href="#" class="edit_name">Modifier</a>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordf">Ancien Mot de passe</label>
                        <input type="password" name="passwordf" class="form-control"  id="passwordf" placeholder="Mot de Passe Utiliser">
                        <small id="pp1_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="passwordnew">Le Nouveaux Mot de passe</label>
                        <input type="password" name="passwordnew" class="form-control"  id="passwordnew" placeholder="Mot de Passe Utiliser">
                        <small id="pn_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="passwords">Rentrer le Mot de Passe</label>
                        <input type="password" name="passwords" class="form-control"  id="passwords" placeholder="Rentrer le nouveau Mot de Passe">
                        <small id="pp2_error" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" name="user_register" class="btn btn-primary">Editer</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>