<!-- Modal -->
<div class="modal fade" id="update_tasks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ordres de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_tasks_form" onsubmit="return false">

                    <div class="form-group">
                        <input type="hidden" name="tid" id="tid" value=""/>
                        <label for="notes">Les tâches</label>
                        <textarea id="tnotes" name="tnotes" class="form-control" rows="6"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Mis a Jour</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>