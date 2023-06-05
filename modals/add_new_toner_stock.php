<?php 
date_default_timezone_set("Africa/Dar_es_salaam");
?>



<!-- Modal forms-->
<div class="modal fade" id="modal-add-new-toner-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm">
                    <form  method="post" id="form-new-toner-stock">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="new-toner-stock-id" name="new-toner-stock-id" readonly>
                            <input type="hidden" class="form-control" id="last-toner-stock-qty" name="last-toner-stock-qty" readonly>
                            <div class="form-group form-inline row">
                                <label for="staffAppliDate" class="col-sm-6 col-form-label">Last toner stock added on</label>
                                <div class="col-sm-6">
                                    <h6 class="last-toner-stock-added-on"></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="staffVerifyJustifica">Quantity</em></label>
                                    <input type="number" class="form-control" id="new-toner-stock-quantity" name="new-toner-stock-quantity" required>
                            </div>
                            <input type="hidden" class="form-control" id="new-toner-stock-added-by" name="new-toner-stock-added-by" value="<?= $_SESSION['username@ttclassetsystem']; ?>" readonly>
                            <input type="hidden" class="form-control" id="new-toner-stock-added-on" name="new-toner-stock-added-on" value="<?= date('d-m-Y H:i:s');?>" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success" id="submit-new-toner-stock" name="submit-new-toner-stock">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>