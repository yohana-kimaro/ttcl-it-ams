<!-- Modal -->
<div class="modal fade" id="modal-delete-toner-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-delete-toner-request" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="delete-toner-request-id" name="delete-toner-request-id" readonly>
                        <input type="hidden" class="form-control" id="delete-toner-request-pfno" name="delete-toner-request-pfno" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" id="submit-delete-toner-request" name="submit-delete-toner-request">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>