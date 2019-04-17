<!-- Modal -->
<div class="modal fade" id="info_profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information de Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form id="profil_info" onsubmit="return false">
                    <div class="form-group">
                        <h3>Votre Email</h3>
                        <label><?php echo $_SESSION["email"];?></label>
                    </div>
                    <div class="form-group">
                        <h3>Nom Complet</h3>
                        <label><?php echo $_SESSION["username"];?></label>
                    </div>
                    <div class="form-group">
                        <h3>Dernière Login</h3>
                        <label><?php echo $_SESSION["last_login"];?></label>
                    </div>
                    <div class="form-group">
                        <h3>Role</h3>
                        <label><?php echo $_SESSION["role"];?></label>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>