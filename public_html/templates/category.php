<!-- Modal -->
<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5>
                <div class="col-sm-1"><a href="#" title="les catégories doivent avoir une super catégorie pour fonctionner" ><i class="fas fa-info-circle"></i></a></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form id="category_form" onsubmit="return false">
                    <div class="form-group">
                        <label>Nom de Categorie</label>
                        <input type="text" class="form-control" name="category_name" id="category_name"  placeholder="Donner Le Nom ">
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Categorie Superieur</label>
                        <select class="form-control" id="parent_cat" name="parent_cat">



                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>