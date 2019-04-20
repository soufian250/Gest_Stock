<!-- Modal -->
<div class="modal fade" id="update_fournisseur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_fournisseur_form" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value=""/>
                        <label>Le nom de Fournisseur</label>
                        <input type="text" class="form-control" name="fuser" id="fuser" placeholder="Entrer le nom de Fournisseur" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="femail" id="fuemail" placeholder="Entrer L'Email" required>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class='form-control' id="futele" name="futele" placeholder="Donner Le Numero de Telephone">
                        <small id="ft_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="fspecialite">Specialite</label>
                        <input type="text" name="fspec" class="form-control"  id="fuspec" placeholder="Specialite de Fournisseur">
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