<!-- Modal -->
<div class="modal fade" id="update_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier l'Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_user_form" onsubmit="return false">
                    <div class="row">
                        <div class='col-md-3'></div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" id="id" value=""/>
                            <label style='margin-left: 20%;'>Modification Date</label>
                            <input type="text" class="form-control text-center" name="date" id="added_date" value="<?php echo date("d/m/Y"); ?>" readonly/>
                        </div>
                        <div class='col-md-3'></div>
                    </div>

                    <div class="form-group">
                        <label>Le nom de l'utilisateur</label>
                        <input type="text" class="form-control" name="uuser" id="uuser" placeholder="Entrer le nom de l'utilisateur" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="uemail" id="uemail" placeholder="Entrer L'Email" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="uusertype" class="form-control" id="uusertype">
                            <option value="">Sélectionner le type de l'utilisateur</option>
                            <option value="Admin">Admin</option>
                            <option value="Employe">Employe</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>