<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
}
?>
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
        <script type="text/javascript" src="./js/order.js"></script>
    </head>
    <body>
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->
        <?php include_once("./templates/header.php"); ?>
        <br/>

        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header">
                            <h4>Nouvelles commandes</h4>
                        </div>
                        <div class="card-body">
                            <form id="get_order_data" onsubmit="return false">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Date de commande</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Nom du client</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Entrer le nom de Client"/>
                                    </div>
                                </div>


                                <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                    <div class="card-body" style="text-align: center;">
                                        <h4>Choisissez les produits commandé</h4><br>
                                        <table align="center" style="width:800px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align:center;">Nom de Produit</th>
                                                    <th style="text-align:center;">Quantite en Stock</th>
                                                    <th style="text-align:center;">Quantite</th>
                                                    <th style="text-align:center;">Prix</th>
                                                    <th>Totale</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice_item">
                <!--<tr>
                    <td><b id="number">1</b></td>
                    <td>
                        <select name="pid[]" class="form-control form-control-sm" required>
                            <option>Washing Machine</option>
                        </select>
                    </td>
                    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
                    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                    <td>Rs.1540</td>
                </tr>-->
                                            </tbody>
                                        </table> <!--Table Ends-->
                                        <center style="padding:10px;">
                                            <button id="add" style="width:150px;" class="btn btn-success" title="Ajouter un nouveau produit">Nouveau</button>
                                            <button id="remove" style="width:150px;" class="btn btn-danger" title="Supprimer le derniere produit">Supprimer</button>
                                        </center>
                                    </div> <!--Crad Body Ends-->
                                </div> <!-- Order List Crad Ends-->

                                <p></p>
                                <div class="form-group row">
                                    <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sous Totale</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gst" class="col-sm-3 col-form-label" align="right" title="Taxe sur les produits et services">GST (0%)</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="gst" class="form-control form-control-sm" id="gst" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount" class="col-sm-3 col-form-label" align="right">Remise</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="discount" class="form-control form-control-sm" id="discount" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="net_total" class="col-sm-3 col-form-label" align="right">Prix Totale</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paid" class="col-sm-3 col-form-label" align="right">Payé</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="paid" class="form-control form-control-sm" id="paid">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due" class="col-sm-3 col-form-label" align="right">Reste</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-3 col-form-label" align="right">Type de paiement</label>
                                    <div class="col-sm-6">
                                        <select name="payment_type" class="form-control form-control-sm" id="payment_type" required/>
                                        <option>Cash</option>
                                        <option>Card</option>
                                        <option>Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <center>
                                    <input type="submit" id="order_form" style="width:160px;" class="btn btn-info" value="Facturer" title="Passer une Facture">
                                    <button id="print_invoice" style="width:160px;" class="btn btn-success d-none"><i class="fas fa-print">&nbsp;</i>Imprimer facture</button>
                                </center>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>