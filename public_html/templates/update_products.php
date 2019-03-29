<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="update_product_form" onsubmit="return false;" enctype="multipart/form-data">
                    <!--<div class="form-group text-center">
                        <label>Produit Picture</label>
                        <div id="my_Btn" name="my_Btn" onclick="getFile()">Cliquer pour choisir un fichier</div>
                        <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" name="upfile" type="file" value="upload" onchange="sub(this)"/> <input type="text" id="image" name="image"></div>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("d/m/Y"); ?>" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="pid" id="pid" value=""/>
                            <label>Nom de Produit</label>
                            <input type="text" class="form-control" name="update_product" id="update_product" placeholder="Entrer Le nom de Produit" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <select class="form-control" id="select_cat" name="select_cat" required/>



                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fournisseur</label>
                        <select class="form-control" id="select_four" name="select_four" required/>



                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="product_des" id="product_des" placeholder="Entrer La description de Produit" required>
                    </div>
                    <div class="form-group">
                        <label>Prix d'achat</label>
                        <input type="text" class="form-control" id="product_pprice" name="product_pprice" placeholder="Entrer le prix d'achat de produit" required>
                    </div>
                    <div class="form-group">
                        <label>Prix de vente</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Entrer le prix de vente de produit" required/>
                    </div>
                    <div class="form-group">
                        <label>Quantite</label>
                        <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Entrer La Quantite en Stock" required/>
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