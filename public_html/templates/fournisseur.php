<!-- Modal -->
<div class="modal fade" id="form_fournisseur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fournisseur_form" onsubmit="return false">
                    <div class="form-group">
                        <label for="fusername">Nom Complet</label>
                        <input type="text" name="fusername" class="form-control" id="fusername" placeholder="Entrer Le nom de Fournisseur">
                        <small id="fu_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="femail">Address Email</label>
                        <input type="email" name="femail" class="form-control" id="femail" placeholder="Entrer l'Email">
                        <small id="fe_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="ftele">Telephone</label>
                        <input type="text" name="ftele" class="form-control"  id="ftele" placeholder="Numero de telephone">
                        <small id="ft_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="fspecialite">Specialite</label>
                        <input type="text" name="fspec" class="form-control"  id="fspec" placeholder="Specialite de Fournisseur">
                        <small id="fs_error" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" name="user_register" class="btn btn-primary">Ajouter</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>