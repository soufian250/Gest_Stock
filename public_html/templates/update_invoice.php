<!-- Modal -->
<div class="modal fade" id="form_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mis a Jour La Facture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_invoice_form" onsubmit="return false">
                    <div class="form-group row">
                        <input type="hidden" name="invoice_id" id="invoice_id" value=""/>
                        <label for="net_total" class="col-sm-3 col-form-label" align="right">Totale TTC</label>
                        <div class="col-sm-8">
                            <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paid" class="col-sm-3 col-form-label" align="right">Payé</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="paid" id="paid" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paid" class="col-sm-3 col-form-label" align="right">Paiement</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="plpaid" id="plpaid">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="due" class="col-sm-3 col-form-label" align="right">Reste</label>
                        <div class="col-sm-8">
                            <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required/>
                        </div>
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