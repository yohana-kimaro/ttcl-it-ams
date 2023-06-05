<!-- Modal -->
<div class="modal fade" id="modal-remove-toner-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-remove-toner-stock" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="remove-toner-stock-id" name="remove-toner-stock-id" readonly>
                        <input type="hidden" class="form-control" id="remove-toner-stock-model" name="remove-toner-stock-model" readonly>
                        <input type="hidden" class="form-control" id="remove-toner-stock-reset" name="remove-toner-stock-reset" value="0" readonly>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">You are about to reset this <h6 class="remove-toner-stock-model-name"></h6> stock to zero. There is no undo. <div class="text-danger">Be careful</div></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" id="submit-remove-toner-stock" name="submit-remove-toner-stock">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>