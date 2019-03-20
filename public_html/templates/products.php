<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="product_form" onsubmit="return false" enctype="multipart/form-data">
                    <!--<input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>Produit Picture</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom de Produit</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Entrer Le nom de Produit">
                            <small id="n_error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <select class="form-control" id="select_cat" name="select_cat"/>



                        </select>
                        <small id="c_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="select_brand" name="select_brand" />



                        </select>
                        <small id="st_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Prix de produit</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Entrer le prix de Produit"/>
                        <small id="prix_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Quantite</label>
                        <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Entrer La Quantite en Stock"/>
                        <small id="q_error" class="form-text text-muted"></small>
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