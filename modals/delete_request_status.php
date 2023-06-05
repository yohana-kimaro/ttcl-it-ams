<!-- Modal -->
<div class="modal fade" id="modal-delete-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-delete-requests-status" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label for="exampleDropdownFormEmail1">ID</label> -->
                        <input type="hidden" class="form-control" id="staffApplicantID" name="staffApplicantID" readonly>
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleDropdownFormPassword1">PFNo</label> -->
                        <input type="hidden" class="form-control" id="staffPFNo" name="staffPFNo" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" id="submit-delete-requests" name="submit-delete-requests">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>