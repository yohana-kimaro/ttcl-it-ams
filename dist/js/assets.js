// All request form
function showAllRequestForm(){ 
    $.ajax({
        url: 'data/all_request_form.php',
        success: function (data) {
            $('#all-request-form').html(data);
        },
        error: function(){
            alert('Error in fetching request form');
        }
    });
} 
showAllRequestForm(); 

// ALL REQUESTS STATUS
function showAllRequestsStatus(){
    $.ajax({
        url: 'data/all_requests_status.php',
        success: function (data) {
            $('#all-requests-status').html(data);
        },
        error: function(){
            alert('Error in showing requests status');
        }
    });
}
showAllRequestsStatus();

function deleteRequestModal(applicant_id){
    $.ajax({
        url: 'data/get_requests_status.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-delete-requests').val(data.event);
            $('#staffApplicantID').val(data.applID);
            $('#staffPFNo').val(data.pfno);
            $('#modal-delete-request').find('.modal-title').text(data.title);
            $('#modal-delete-request').modal('show');
        },
        error: function(){
            alert('Error in retrieving application status');
        }
    });
}

//save requests delete modal
$(document).on('submit', '#form-delete-requests-status', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-delete-requests').val();
    var applicant_id = $('#staffApplicantID').val();
    var pfNamb = $('#staffPFNo').val();

    if(submit  == "delete"){
        $.ajax({
            url: 'data/saving_delete_requests.php',
            type: 'post',
            dataType: 'json',
            data: {
                applicant_id:applicant_id,
                pfNamb:pfNamb
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-delete-request').modal('hide');
                        showAllRequestsStatus();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in deleting staff request status');
                }
            });
    }//end submit
});

// ALL DIRECT MANAGER REQUESTS
function showAllDirectManagerRequests(){
    $.ajax({
        url: 'data/all_direct_manager_requests.php',
        success: function (data) {
            $('#all-direct-manager-requests').html(data);
        },
        error: function(){
            alert('Error in showing direct manager requests');
        }
    });
}
showAllDirectManagerRequests();

function approveDirectManagerRequest(applicant_id){
    $.ajax({
        url: 'data/get_direct_manager_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-dmanager-approve').val(data.event);
            $('#staff-dmanager-approve-pfnamba').val(data.approveStPFNa);
            $('#staff-dmanager-approve-id').val(data.id);
            $('.staff-dmanager-designation').html(data.approveStDesigna+' - '+data.approveStRegion);
            $('.staff-dmnanager-appli-date').html(data.approveStDate);
            $('#staff-dmanager-approve-devtype').val(data.approveStDevtype);
            $('.staff-dmanager-quantity').html(data.approveStQuant);
            $('.staff-dmanager-reason-for').html(data.approveStReasonF);
            $('.staff-dmanager-justif').html(data.approveStJustifi);
            $('.staff-dmanager-fullname').html(data.approveStFName+' '+data.approveStMName+' '+data.approveStLName);
            $('#modal-dmanager-approve').find('.modal-title').text(data.title);
            $('#modal-dmanager-approve').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to approve');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-approve-dmanager', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-dmanager-approve').val();
    var application_id = $('#staff-dmanager-approve-id').val();
    var dManagerApproveText = $('#staff-dmanager-approve-text').val();
    var staffApprovePfNo = $('#staff-dmanager-approve-pfnamba').val();
    var dManagerApproveName = $('#staff-dmanager-approved-by').val();
    var dManagerApprovedOn = $('#staff-dmanager-approved-on').val();
    var staffApproveDevtype = $('#staff-dmanager-approve-devtype').val();
    var dmanagerapprovjustif = $('#dmanager-approve-justif123').val();

    if(submit  == "approve"){
        $.ajax({
            url: 'data/saving_direct_manager_approve.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffApprovePfNo:staffApprovePfNo,
                staffApproveDevtype:staffApproveDevtype,
                dManagerApproveName:dManagerApproveName,
                dManagerApproveText:dManagerApproveText,
                dManagerApprovedOn:dManagerApprovedOn,
                dmanagerapprovjustif:dmanagerapprovjustif
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-dmanager-approve').modal('hide');
                        showAllDirectManagerRequests();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in approving staff requests to direct manager');
                }
            });
    }
});


// DIRECT MANAGER REJECTS
function rejectDirectManagerRequest(applicant_id){
    $.ajax({
        url: 'data/get_direct_manager_rej_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-dmanager-reject').val(data.event);
            $('#staff-dmanager-reject-pfnamba').val(data.rejectStPFNa);
            $('#staff-dmanager-reject-id').val(data.id);
            $('.staff-dmanager-designation').html(data.rejectStDesigna+' - '+data.rejectStRegion);
            $('.staff-dmnanager-appli-date').html(data.rejectStDate);
            $('#staff-dmanager-reject-devtype').val(data.rejectStDevtype);
            $('.staff-dmanager-quantity').html(data.rejectStQuant);
            $('.staff-dmanager-reason-for').html(data.rejectStReasonF);
            $('.staff-dmanager-justif').html(data.rejectStJustifi);
            $('.staff-dmanager-fullname').html(data.rejectStFName+' '+data.rejectStMName+' '+data.rejectStLName);
            $('#modal-dmanager-reject').find('.modal-title').text(data.title);
            $('#modal-dmanager-reject').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to reject');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-reject-dmanager', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-dmanager-reject').val();
    var application_id = $('#staff-dmanager-reject-id').val();
    var staffRejectionJustif = $('#staff-dmanager-rejection-justif').val();
    var dManagerRejectText = $('#staff-dmanager-reject-text').val();
    var staffRejectPfNo = $('#staff-dmanager-reject-pfnamba').val();
    var dManagerRejectName = $('#staff-dmanager-rejected-by').val();
    var dManagerRejectdOn = $('#staff-dmanager-rejected-on').val();

    if(submit  == "reject"){
        $.ajax({
            url: 'data/saving_direct_manager_reject.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffRejectPfNo:staffRejectPfNo,
                dManagerRejectName:dManagerRejectName,
                dManagerRejectText:dManagerRejectText,
                dManagerRejectdOn:dManagerRejectdOn,
                staffRejectionJustif:staffRejectionJustif
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-dmanager-reject').modal('hide');
                    showAllDirectManagerRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting staff requests to direct manager');
            }
        });
    }
});

// WHY REJECTED COMMENTS
function checkRejectedComment(applicant_id){
    // $('#submit-item').val('add');
    $.ajax({
        url: 'data/get_rejected_comments.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-comment-reject').val(data.event);
            // $('.staff-comment-appli-date').html(data.rejectedCommentDate);
            $('#staff-comment-reject-pfnamba').val(data.commentPFNamb);
            $('#staff-comment-reject-id').val(data.commentID);
            $('.staff-comment-justif').html(data.rejectedComment);
            $('#modal-rejection-comment').find('.modal-title').text(data.title);
            $('#modal-rejection-comment').modal('show');
        },
        error: function(){
            alert('Error in fetching rejection comments');
        }
    });
}

// ALL IT SUPPORT SUPERVISOR REQUESTS
function showAllISSRequests(){
    $.ajax({
        url: 'data/all_iss_requests.php',
        success: function (data) {
            $('#all-iss-requests').html(data);
        },
        error: function(){
            alert('Error in showing IT Support Supervisor requests');
        }
    });
} 
showAllISSRequests(); 

// VERIFY IT SUPPORT SUPERVISOR REQUESTS
function verifyITSSRequest(applicant_id){
    $.ajax({
        url: 'data/get_iss_verify_requests.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id 
        },
        success: function (data) {
            $('#submit-iss-verify').val(data.event);
            $('#staff-iss-verify-pfnamba').val(data.verifyStPFNa);
            $('#staff-iss-verify-id').val(data.id);
            $('.staff-iss-designation').html(data.verifyStDesigna+' - '+data.verifyStRegion);
            $('.dmgr-appr-req-justif').html(data.verifyDMgrJustifi);
            $('.staff-iss-appli-date').html(data.verifyStDate);
            $('#staff-iss-verify-devtype').val(data.verifyStDevtype);
            $('.staff-iss-quantity').html(data.verifyStDevtype+' - '+data.verifyStQuant);
            $('.staff-iss-reason-for').html(data.verifyStReasonF);
            $('.staff-iss-justif').html(data.verifyStJustifi);
            $('.staff-iss-fullname').html(data.verifyStFName+' '+data.verifyStMName+' '+data.verifyStLName);
            $('#modal-iss-verify').find('.modal-title').text(data.title);
            $('#modal-iss-verify').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to verify');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-verify-iss', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-iss-verify').val();
    var application_id = $('#staff-iss-verify-id').val();
    var issVerifyText = $('#staff-iss-verify-text').val();
    var staffVerifyPfNo = $('#staff-iss-verify-pfnamba').val();
    var issVerifyName = $('#staff-iss-verified-by').val();
    var issVerifiedOn = $('#staff-iss-verified-on').val();
    var staffVerifyJustif = $('#staff-iss-verify-justificati').val();

    if(submit  == "verify"){
        $.ajax({
            url: 'data/saving_iss_request_verify.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffVerifyPfNo:staffVerifyPfNo,
                staffVerifyJustif:staffVerifyJustif,
                issVerifyName:issVerifyName,
                issVerifyText:issVerifyText,
                issVerifiedOn:issVerifiedOn
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-iss-verify').modal('hide');
                        showAllISSRequests();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in verifying staff requests to IT Support Supervisor');
                }
            });
    }
});

// REJECT IT SUPPORT SUPERVISOR REQUESTS
function rejectITSSRequest(applicant_id){
    $.ajax({
        url: 'data/get_iss_rej_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-iss-reject').val(data.event);
            $('#staff-iss-reject-pfnamba').val(data.rejectStPFNa);
            $('#staff-iss-reject-id').val(data.id);
            $('.staff-iss-designation').html(data.rejectStDesigna+' - '+data.rejectStRegion);
            $('.staff-iss-appli-date').html(data.rejectStDate);
            $('#staff-iss-reject-devtype').val(data.rejectStDevtype);
            $('.staff-iss-quantity').html(data.rejectStQuant);
            $('.staff-iss-reason-for').html(data.rejectStReasonF);
            $('.staff-iss-justif').html(data.rejectStJustifi);
            $('.staff-iss-fullname').html(data.rejectStFName+' '+data.rejectStMName+' '+data.rejectStLName);
            $('#modal-iss-reject').find('.modal-title').text(data.title);
            $('#modal-iss-reject').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to reject');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-reject-iss', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-iss-reject').val();
    var application_id = $('#staff-iss-reject-id').val();
    var staffRejectionJustif = $('#staff-iss-rejection-justif').val();
    var issRejectText = $('#staff-iss-reject-text').val();
    var staffRejectPfNo = $('#staff-iss-reject-pfnamba').val();
    var issRejectName = $('#staff-iss-rejected-by').val();
    var issRejectdOn = $('#staff-iss-rejected-on').val();

    if(submit  == "reject"){
        $.ajax({
            url: 'data/saving_iss_reject.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffRejectPfNo:staffRejectPfNo,
                issRejectName:issRejectName,
                issRejectText:issRejectText,
                issRejectdOn:issRejectdOn,
                staffRejectionJustif:staffRejectionJustif
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-iss-reject').modal('hide');
                    showAllISSRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting staff requests to IT Support Supervisor');
            }
        });
    }
});

// IT MANAGER REQUESTS
function showAllITManagerRequests(){
    $.ajax({
        url: 'data/all_it_manager_req.php',
        success: function (data) {
            $('#all-it-manager-requests').html(data);
        }, 
        error: function(){
            alert('Error: in showing all IT Manager requests');
        }
    });
}
showAllITManagerRequests();

// IT MANAGER APPROVE
function approveITManagerRequest(applicant_id){
    $.ajax({
        url: 'data/get_it_approve_requests.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-it-approve').val(data.event);
            $('#staff-it-approve-pfnamba').val(data.approveStPFNa);
            $('#staff-it-approve-id').val(data.id);
            $('.staff-it-designation').html(data.approveStDesigna+' - '+data.approveStRegion);
            $('.staff-it-appli-date').html(data.approveStDate);
            $('#staff-it-approve-devtype').val(data.approveStDevtype);
            $('.staff-it-quantity').html(data.approveStDevtype+' - '+data.approveStQuant);
            $('.staff-it-reason-for').html(data.approveStReasonF);
            $('.staff-it-justif').html(data.approveStJustifi);

            $('.staff-direct-mgr-justif').html(data.approveDMgerApJustifi);
            $('.it-support-superv-justif').html(data.verITSupportJustifi);

            $('.staff-it-fullname').html(data.approveStFName+' '+data.approveStMName+' '+data.approveStLName);
            $('#modal-it-approve').find('.modal-title').text(data.title);
            $('#modal-it-approve').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to approve');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-approve-it', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-it-approve').val();
    var application_id = $('#staff-it-approve-id').val();
    var itApproveText = $('#staff-it-approve-text').val();
    var staffApprovePfNo = $('#staff-it-approve-pfnamba').val();
    var itApproveName = $('#staff-it-approved-by').val();
    var itApprovedOn = $('#staff-it-approved-on').val();
    var itManagerApproJusti = $('#itmanager-approve-justif321').val();

    if(submit  == "approve"){
        $.ajax({
            url: 'data/saving_it_request_approve.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffApprovePfNo:staffApprovePfNo,
                itApproveName:itApproveName,
                itApproveText:itApproveText,
                itApprovedOn:itApprovedOn,
                itManagerApproJusti:itManagerApproJusti
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-it-approve').modal('hide');
                        showAllITManagerRequests();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in approveing staff requests to IT Manager');
                }
            });
    }
});

// IT MANAGER REJECT
function rejectITManagerRequest(applicant_id){
    $.ajax({
        url: 'data/get_it_reject_requests.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-it-reject').val(data.event);
            $('#staff-it-reject-pfnamba').val(data.rejectStPFNa);
            $('#staff-it-reject-id').val(data.id);
            $('.staff-it-designation').html(data.rejectStDesigna+' - '+data.rejectStRegion);
            $('.staff-it-appli-date').html(data.rejectStDate);
            $('#staff-it-reject-devtype').val(data.rejectStDevtype);
            $('.staff-it-quantity').html(data.rejectStDevtype+' - '+data.rejectStQuant);
            $('.staff-it-reason-for').html(data.rejectStReasonF);
            $('.staff-it-justif').html(data.rejectStJustifi);
            $('.staff-it-fullname').html(data.rejectStFName+' '+data.rejectStMName+' '+data.rejectStLName);
            $('#modal-it-reject').find('.modal-title').text(data.title);
            $('#modal-it-reject').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to reject');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-reject-it', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-it-reject').val();
    var application_id = $('#staff-it-reject-id').val();
    var itRejectText = $('#staff-it-reject-text').val();
    var staffRejectPfNo = $('#staff-it-reject-pfnamba').val();
    var itRejectName = $('#staff-it-rejected-by').val();
    var itRejectedOn = $('#staff-it-rejected-on').val();
    var itRejectJustific = $('#staff-it-rejection-justif').val();

    if(submit  == "reject"){
        $.ajax({
            url: 'data/saving_it_request_reject.php',
            type: 'post',
            dataType: 'json',
            data: {
                application_id:application_id,
                staffRejectPfNo:staffRejectPfNo,
                itRejectName:itRejectName,
                itRejectText:itRejectText,
                itRejectedOn:itRejectedOn,
                itRejectJustific:itRejectJustific
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-it-reject').modal('hide');
                    showAllITManagerRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting staff requests to IT Manager');
            }
        });
    }
});


//ISS ALLOCATION REQUESTS
function showAllISSAllocationRequests(){
    $.ajax({
        url: 'data/all_iss_allocation_requests.php',
        success: function (data) {
            $('#all-iss-allocation-requests').html(data);
        },
        error: function(){ 
            alert('Error in showing allocation requests to IT Support Supervisor');
        }
    }); 
} 
showAllISSAllocationRequests();


// IT SUPPORT SUPERVISOR ALLOCATION PROCESS
function allocateITSSRequest(applicant_id){
    // $('#submit-item').val('add');
    $.ajax({
        url: 'data/get_allocation_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicant_id:applicant_id
        },
        success: function (data) {
            $('#submit-iss-allocate').val(data.event);
            $('.staff-iss-allocated-appli-date').html(data.allocateStaffDate);
            $('#staff-iss-allocated-pfnamba').val(data.allocateStaffPF);
            $('#staff-iss-allocated-id').val(data.allocateID);
            $('.staff-allocated-fullname').html(data.allocateStaffFName+'  '+data.allocateStaffMName+'  '+data.allocateStaffLName);
            $('.allocateStaffDepart').html(data.allocateStaffDepart);
            $('.staff-allocated-designation').html(data.allocateStaffDesigna+' - '+data.allocateStaffReg);
            $('.staff-iss-allocated-asset-type').html(data.allocateStaffDevType+' - '+data.allocateStaffQuantity);
            $('.staff-allocated-iss-reason-for').html(data.allocateStaffReasonF);
            $('.staff-allocated-iss-justif').html(data.allocateStaffJustif);
            $('.staff-allocated-depart').html(data.allocateStaffDepart);


            $('.staff-allocated-dmgr-justif').html(data.dManagerApJustf);
            $('.staff-allocated-itsupport-justif').html(data.itSupportVerJustf);
            $('.staff-allocated-itmgr-justif').html(data.itMangrApprovJustf);

            $('#item-type').val(data.allocateStaffReg);
            $('#item-type').val(data.allocateStaffReg);
            $('#modal-iss-allocate').find('.modal-title').text(data.title);
            $('#modal-iss-allocate').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff allocation request');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#modal-iss-allocate', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-iss-allocate').val();
    var allocated_applicant_id = $('#staff-iss-allocated-id').val();
    var allocated_applicant_pfnamba = $('#staff-iss-allocated-pfnamba').val();
    var allocated_asset_serial_no = $('#other-spec-serial-no').val();
    var allocated_asset_cname = $('#asset-allocated-computer-name').val();
    var allocated_asset_others = $('#asset-allocated-other-devices').val();
    var allocated_asset_user_manual = $('#asset-allocated-user-manual').val();
    var allocated_asset_accepted_policy = $('#asset-allocated-accepted-policy').val();
    var allocated_asset_user_response = $('#asset-allocated-user-respons').val();
    var allocated_asset_how_to_guide= $('#asset-allocated-how-to-guide').val();
    var allocated_asset_allocated_by = $('#staff-iss-allocated-by').val();
    var allocated_asset_allocated_on = $('#staff-iss-allocated-on').val();
    var itsupportallocationjustif = $('#itsupport-allocate-justif123').val();

    if(submit  == "allocateasset"){
        $.ajax({
            url: 'data/saving_allocated_asset.php',
            type: 'post',
            dataType: 'json',
            data: {
                allocated_applicant_id:allocated_applicant_id,
                allocated_applicant_pfnamba:allocated_applicant_pfnamba,
                allocated_asset_serial_no:allocated_asset_serial_no,
                allocated_asset_cname:allocated_asset_cname,
                allocated_asset_others:allocated_asset_others,
                allocated_asset_user_manual:allocated_asset_user_manual,
                allocated_asset_accepted_policy:allocated_asset_accepted_policy,
                allocated_asset_user_response:allocated_asset_user_response,
                allocated_asset_how_to_guide:allocated_asset_how_to_guide,
                allocated_asset_allocated_by:allocated_asset_allocated_by,
                allocated_asset_allocated_on:allocated_asset_allocated_on,
                itsupportallocationjustif:itsupportallocationjustif
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-iss-allocate').modal('hide');
                    showAllISSAllocationRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in allocation asset to staff');
            }
        });
    }
});

// ALL RECORDED IT DEVICES
function showAllITAssets(){
    $.ajax({
        url: 'data/all_it_assets.php',
        success: function (data) {
            $('#all-it-assets').html(data);
        },
        error: function(){
            alert('Error in showing all IT devices');
        }
    }); 
} 
showAllITAssets();

// ALL RECORDED IT DESKTOPS
function showAllITDesktops(){
    $.ajax({
        url: 'data/all_it_desktop.php',
        success: function (data) {
            $('#all-it-desktops').html(data);
        },
        error: function(){
            alert('Error in showing all desktops');
        }
    }); 
} 
showAllITDesktops()

// ALL RECORDED IT LAPTOPS
function showAllITLaptops(){
    $.ajax({
        url: 'data/all_it_laptop.php',
        success: function (data) {
            $('#all-it-laptops').html(data);
        },
        error: function(){
            alert('Error in showing all laptops');
        }
    }); 
} 
showAllITLaptops();

// ALL RECORDED IT DESKTOPS
function showAllITPrinters(){
    $.ajax({
        url: 'data/all_it_printer.php',
        success: function (data) {
            $('#all-it-printers').html(data);
        },
        error: function(){
            alert('Error in showing all printers');
        }
    }); 
} 
showAllITPrinters()

// ALL RECORDED IT DESKTOPS
function showAllITScanners(){
    $.ajax({
        url: 'data/all_it_scanner.php',
        success: function (data) {
            $('#all-it-scanners').html(data);
        },
        error: function(){
            alert('Error in showing all scanners');
        }
    }); 
} 
showAllITScanners()

//SHOW RECORD NEW IT DEVICE
// function recordAllITAssets(){
//     $.ajax({
//         url: 'data/record_it_assets.php',
//         success: function (data) {
//             $('#all-record-it-assets1').html(data);
//         },
//         error: function(){
//             alert('Error in recording IT Devices');
//         }
//     }); 
// } 
// recordAllITAssets();

//SHOW RECORD NEW COMPUTER
function recordAllComputer(){
    $.ajax({
        url: 'data/record_it_computer.php',
        success: function (data) {
            $('#all-record-it-computer').html(data);
        },
        error: function(){
            alert('Error in recording computer');
        }
    }); 
} 
recordAllComputer();

//SHOW RECORD NEW PRINTER
function recordAllITPrinter(){
    $.ajax({
        url: 'data/record_it_printer.php',
        success: function (data) {
            $('#all-record-it-printer').html(data);
        },
        error: function(){
            alert('Error in recording IT Printer');
        }
    }); 
} 
recordAllITPrinter();

//SHOW RECORD NEW SCANNER
function recordAllITScanner(){
    $.ajax({
        url: 'data/record_it_scanner.php',
        success: function (data) {
            $('#all-record-it-scanner').html(data);
        },
        error: function(){
            alert('Error in recording IT Scanner');
        }
    }); 
} 
recordAllITScanner();





//ADD NEW COMPUTER
$(document).on('submit', '#form-record-computer', function(event) {
    event.preventDefault();
    /* Act on the event */
    var computerSerialNo = $('#computerserialNo').val();
    var computerAssetType = $('#computertype').val();
    var computerBrand = $('#computerbrand').val();
    var computerModel = $('#computermodel').val();
    var computerStatus = $('#computerstatus').val();
    var computerProcessor = $('#computerprocessor').val();
    var computerRAM = $('#computerram').val();
    var computerStorage = $('#computerstorage').val();
    var computerCapacity = $('#computercapacity').val();
    var computerMACAddress = $('#computermac').val();
    var computerPurchasedYear = $('#computeryear').val();
    var computerCDRom = $('#computercdRom').val();
    var computerOperatingSystem = $('#computeros').val();
    var computerOfficeAppli = $('#computerofficeApp').val();
    var computerAntivirus = $('#computeranti').val();
    var computerPDFReader = $('#computerpdfReader').val();
    if($('#btn_record_computer').val() == "add"){
        $.ajax({
            url: 'data/add_computer.php',
            type: 'post',
            dataType: 'json',
            data: {                
                computerRAM:computerRAM,
                computerBrand:computerBrand,
                computerModel:computerModel,
                computerCDRom:computerCDRom,
                computerStatus:computerStatus,
                computerStorage:computerStorage,
                computerCapacity:computerCapacity,
                computerSerialNo:computerSerialNo,
                computerPDFReader:computerPDFReader, 
                computerAssetType:computerAssetType,               
                computerProcessor:computerProcessor,
                computerAntivirus:computerAntivirus,
                computerMACAddress:computerMACAddress,
                computerOfficeAppli:computerOfficeAppli,
                computerPurchasedYear:computerPurchasedYear,
                computerOperatingSystem:computerOperatingSystem
            },
            success: function (data) {
                console.log(data);
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    recordAllComputer();
                    $('#modal-message').modal('show');
                    $('#btn_record_computer').val('null');
                }
            },
            error: function(){
                alert('Error in recording computer');
                }//
            });
    }
});



//ADD NEW PRINTER
$(document).on('submit', '#form-record-printer', function(event) {
    event.preventDefault();
    /* Act on the event */
    var printerSerialNo = $('#printerserialNo').val();
    var printerBrand = $('#printerbrand').val();
    var printerModel = $('#printermodel').val();
    var printerStatus = $('#printerstatus').val();
    var printerMAC = $('#printermac').val();
    var printerPYear = $('#printeryear').val();
    var printerAssetType = $('#printerassetsType').val();
    if($('#btn_record_printer').val() == "add"){
        $.ajax({
            url: 'data/add_printer.php',
            type: 'post',
            dataType: 'json',
            data: {
                printerSerialNo:printerSerialNo,
                printerBrand:printerBrand,
                printerModel:printerModel,
                printerMAC:printerMAC,
                printerStatus:printerStatus,
                printerPYear:printerPYear,
                printerAssetType:printerAssetType 
            },
            success: function (data) {
                console.log(data);
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    recordAllITPrinter();
                    $('#modal-message').modal('show');
                    $('#btn_record_printer').val('null');
                }
            },
            error: function(){
                alert('Error in recording printer');
                }//
            });
    }
});

//ADD NEW SCANNER
$(document).on('submit', '#form-record-scanner', function(event) {
    event.preventDefault();
    /* Act on the event */
    var scannerSerialNo = $('#scannerserialNo').val();
    var scannerBrand = $('#scannerbrand').val();
    var scannerModel = $('#scannermodel').val();
    var scannerStatus = $('#scannerstatus').val();
    var scannerMAC = $('#scannermac').val();
    var scannerPYear = $('#scanneryear').val();
    var scannerAssetType = $('#scannerassetsType').val();
    if($('#btn_record_scanner').val() == "add"){
        $.ajax({
            url: 'data/add_scanner.php',
            type: 'post',
            dataType: 'json',
            data: {
                scannerSerialNo:scannerSerialNo,
                scannerBrand:scannerBrand,
                scannerModel:scannerModel,
                scannerMAC:scannerMAC,
                scannerStatus:scannerStatus,
                scannerPYear:scannerPYear,
                scannerAssetType:scannerAssetType
            },
            success: function (data) {
                console.log(data);
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    recordAllITScanner();
                    $('#modal-message').modal('show');
                    $('#btn_record_scanner').val('null');
                }
            },
            error: function(){
                alert('Error in recording scanner');
                }//
            });
    }
});


// VIEW MORE ASSET SPECIFICATION
function viewmoreITAsset(assetserialnumber){
    $.ajax({
        url: 'data/get_asset_details.php',
        type: 'post',
        dataType: 'json',
        data: {
            assetserialnumber:assetserialnumber
        },
        success: function (data) {
            $('#submit-more-it-asset').val(data.event);
            $('.more-it-asset-name').html(data.moreassetname);
            $('.more-it-asset-status').html(data.moreassetstatus);
            $('.more-asset-serialnumber').html(data.moreassetserialnam);
            $('.more-it-asset-processor-speed').html(data.moreassetprocessorspeed);
            $('.more-it-asset-cdrom').html(data.moreassetcdrom);
            $('.more-it-asset-os').html(data.moreassetos);
            $('.more-it-asset-msoffice').html(data.moreassetmsoffice);
            $('.more-it-asset-recorded-on').html(data.moreassetrecordedon);
            $('.more-it-asset-recorded-by').html(data.moreassetrecordedby);
            $('.more-it-asset-updated-by').html(data.moreassetupdatedby);            
            $('.more-it-asset-updated-on').html(data.moreassetupdatedon);
            $('#modal-view-asset-details').find('.modal-title').text(data.title);
            $('#modal-view-asset-details').modal('show');
        },
        error: function(){
            alert('Error in viewing more asset details');
        }
    });
}

//DELETE IT ASSET DETAILS
function deleteITAsset(itassetdeleserialno){
    $.ajax({
        url: 'data/get_it_asset_delete.php',
        type: 'post',
        dataType: 'json',
        data: {
            itassetdeleserialno:itassetdeleserialno
        },
        success: function (data) {
            $('#submit-delete-it-asset').val(data.event);
            $('#delete-it-asset-serial-number').val(data.deleteitasset);
            $('#modal-delete-it-asset').find('.modal-title').text(data.title);
            $('#modal-delete-it-asset').modal('show');
        },
        error: function(){
            alert('Error in fetching IT Asset details to delete');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-delete-it-asset', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-delete-it-asset').val();
    var itAssetDeleteSerialNo = $('#delete-it-asset-serial-number').val();
    if(submit  == "delete"){
        $.ajax({
            url: 'data/saving_it_asset_delete.php',
            type: 'post',
            dataType: 'json',
            data: {
                itAssetDeleteSerialNo:itAssetDeleteSerialNo
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-delete-it-asset').modal('hide');
                    showAllITAssets();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in deleting IT Asset details');
            }
        });
    }
});

//UPDATE IT ASSET DETAILS
function updateComputerDetails(computerserialnumber){
	$.ajax({
			url: 'data/get_computer_details_to_update.php',
			type: 'post',
			dataType: 'json',
			data: {
				computerserialnumber:computerserialnumber
			},
			success: function (data) {
				$('#submit-update-it-asset').val(data.event);
				$('#updateITAssetassetsType').val(data.itassetupdatedevicetype);
				$('#updateITAssetserialNo').val(data.itassetupdateserialno);
                $('#updateITAssetserialNamba').val(data.itassetupdateserialno);
				$('#updateITAssetBrand').val(data.itassetupdatebrand);
				$('#updateITAssetmodel').val(data.itassetupdatemodel);
				$('#updateITAssetmac').val(data.updateitassetmacaddress);
				$('#updateITAssetyear').val(data.updateitassetpurchasedyear);
				$('#updateITAssetstorage ').val(data.updateitassetstorage);
				$('#updateITAssetcapacity').val(data.updateitassetcapacity);
				$('#updateITAssetprocessor').val(data.updateitassetprocessor);
				$('#updateITAssetram').val(data.updateitassetram);
				$('#updateITAssetos').val(data.updateitassetos);
				$('#updateITAssetcdRom').val(data.updateitassetcdrom);
				$('#updateITAssetofficeApp').val(data.updateitassetofficeappli);
				$('#updateITAssetanti').val(data.updateitassetantivirus);
				$('#updateITAssetpdfReader').val(data.updateitassetpdf);
                $('#updateITAssetstatus').val(data.itassetupdatestatus);
				$('#modal-update-asset-details').find('.modal-title').text(data.title);
				$('#modal-update-asset-details').modal('show');
			},
			error: function(){
				alert('Error in displaying computer details to update');
			}
		});
}//end editModal

//save edit modal
$(document).on('submit', '#form-update-it-asset', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-update-it-asset').val();
    var updatedcompsernowhere=$('#updateITAssetserialNamba').val();
	var compupdseralno = $('#updateITAssetserialNo').val();
	var compupdcomptype = $('#updateITAssetassetsType').val();
	var compupdassetbrand = $('#updateITAssetBrand').val();
	var compupdassetmodel = $('#updateITAssetmodel').val();
	var compupdassetyear = $('#updateITAssetyear').val();
	var compupdassetmac = $('#updateITAssetmac').val();
	var compupdassetstorage = $('#updateITAssetstorage').val();
	var compupdassetcapacity = $('#updateITAssetcapacity').val();
	var compupdassetprocessor = $('#updateITAssetprocessor').val();
	var compupdassetrom = $('#updateITAssetcdRom').val();
	var compupdassetram = $('#updateITAssetram').val();
	var compupdassetos = $('#updateITAssetos').val();
	var compupdassetofficeappli = $('#updateITAssetofficeApp').val();
	var compupdassetanti = $('#updateITAssetanti').val();
	var compupdassetpdf = $('#updateITAssetpdfReader').val();
	var compupdassetstatus = $('#updateITAssetstatus').val();

	if(submit  == "edit"){
		$.ajax({
				url: 'data/update_computer_details.php',
				type: 'post',
				dataType: 'json',
				data: {
					compupdseralno:compupdseralno,
                    updatedcompsernowhere:updatedcompsernowhere,
                    compupdcomptype:compupdcomptype,
                    compupdassetbrand:compupdassetbrand,
                    compupdassetmodel:compupdassetmodel,
                    compupdassetyear:compupdassetyear,
                    compupdassetmac:compupdassetmac,
                    compupdassetcapacity:compupdassetcapacity,
                    compupdassetstorage:compupdassetstorage,
                    compupdassetprocessor:compupdassetprocessor,
                    compupdassetrom:compupdassetrom,
                    compupdassetram:compupdassetram,
					compupdassetos:compupdassetos,
	    			compupdassetofficeappli:compupdassetofficeappli,
	    			compupdassetanti:compupdassetanti,
	    			compupdassetpdf:compupdassetpdf,
	    			compupdassetstatus:compupdassetstatus
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-update-asset-details').modal('hide');
						showAllITDesktops();
						showAllITLaptops();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					alert('Error in updating computer details');
				}
			});
	}//end submit
});


//UPDATE IT ASSET DETAILS
function updateLaptopxyzDetails(computerserialnumber){
	$.ajax({
			url: 'data/get_laptop_details_to_update.php',
			type: 'post',
			dataType: 'json',
			data: {
				computerserialnumber:computerserialnumber
			},
			success: function (data) {
				$('#submit-update-it-laptop').val(data.event);
				$('#updateITLaptopassetsType').val(data.itlaptopupdatedevicetype);
				$('#updateITLaptopserialNo').val(data.itlaptopupdateserialno);
                $('#updateITLaptopserialNamba').val(data.itlaptopupdateserialno);
				$('#updateITLaptopBrand').val(data.itlaptopupdatebrand);
				$('#updateITLaptopmodel').val(data.itlaptopupdatemodel);
				$('#updateITLaptopmac').val(data.updateitlaptopmacaddress);
				$('#updateITLaptopyear').val(data.updateitlaptoppurchasedyear);
				$('#updateITLaptopstorage ').val(data.updateitlaptopstorage);
				$('#updateITLaptopcapacity').val(data.updateitlaptopcapacity);
				$('#updateITLaptopprocessor').val(data.updateitlaptopprocessor);
				$('#updateITLaptopram').val(data.updateitlaptopram);
				$('#updateITLaptopos').val(data.updateitlaptopos);
				$('#updateITLaptopcdRom').val(data.updateitlaptopcdrom);
				$('#updateITLaptopofficeApp').val(data.updateitlaptopofficeappli);
				$('#updateITLaptopanti').val(data.updateitlaptopantivirus);
				$('#updateITLaptoppdfReader').val(data.updateitlaptoppdf);
                $('#updateITLaptopstatus').val(data.itlaptopupdatestatus);
				$('#modal-update-laptop-details').find('.modal-title').text(data.title);
				$('#modal-update-laptop-details').modal('show');
			},
			error: function(){
				alert('Error in displaying computer details to update');
			}
		});
}//end editModal

//save edit modal
$(document).on('submit', '#form-update-it-laptop', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-update-it-laptop').val();
    var updatedcompsernowhere=$('#updateITLaptopserialNamba').val();
	var compupdseralno = $('#updateITLaptopserialNo').val();
	var compupdcomptype = $('#updateITLaptopassetsType').val();
	var compupdlaptopbrand = $('#updateITLaptopBrand').val();
	var compupdlaptopmodel = $('#updateITLaptopmodel').val();
	var compupdlaptopyear = $('#updateITLaptopyear').val();
	var compupdlaptopmac = $('#updateITLaptopmac').val();
	var compupdlaptopstorage = $('#updateITLaptopstorage').val();
	var compupdlaptopcapacity = $('#updateITLaptopcapacity').val();
	var compupdlaptopprocessor = $('#updateITLaptopprocessor').val();
	var compupdlaptoprom = $('#updateITLaptopcdRom').val();
	var compupdlaptopram = $('#updateITLaptopram').val();
	var compupdlaptopos = $('#updateITLaptopos').val();
	var compupdlaptopofficeappli = $('#updateITLaptopofficeApp').val();
	var compupdlaptopanti = $('#updateITLaptopanti').val();
	var compupdlaptoppdf = $('#updateITLaptoppdfReader').val();
	var compupdlaptopstatus = $('#updateITLaptopstatus').val();

	if(submit  == "edit"){
		$.ajax({
				url: 'data/update_laptop_details.php',
				type: 'post',
				dataType: 'json',
				data: {
					compupdseralno:compupdseralno,
                    updatedcompsernowhere:updatedcompsernowhere,
                    compupdcomptype:compupdcomptype,
                    compupdlaptopbrand:compupdlaptopbrand,
                    compupdlaptopmodel:compupdlaptopmodel,
                    compupdlaptopyear:compupdlaptopyear,
                    compupdlaptopmac:compupdlaptopmac,
                    compupdlaptopcapacity:compupdlaptopcapacity,
                    compupdlaptopstorage:compupdlaptopstorage,
                    compupdlaptopprocessor:compupdlaptopprocessor,
                    compupdlaptoprom:compupdlaptoprom,
                    compupdlaptopram:compupdlaptopram,
					compupdlaptopos:compupdlaptopos,
	    			compupdlaptopofficeappli:compupdlaptopofficeappli,
	    			compupdlaptopanti:compupdlaptopanti,
	    			compupdlaptoppdf:compupdlaptoppdf,
	    			compupdlaptopstatus:compupdlaptopstatus
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-update-laptop-details').modal('hide');
						showAllITLaptops();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					alert('Error in updating computer details');
				}
			});
	}//end submit
});


//STAFF ACCEPTANCE LIST
function showAllStaffITAcceptance(){
    $.ajax({
        url: 'data/all_acceptance_form.php',
        success: function (data) {
            $('#all-staff-acceptance-form').html(data);
        },
        error: function(){
            alert('Error in fetching staff acceptance list');
        }
    });
}
showAllStaffITAcceptance();

//ATTACH ACCEPTANCE FORM
function attachAcceptanceForm(acceptance_id){
    // $('#submit-item').val('add');
    $.ajax({
        url: 'data/get_staff_acceptance.php',
        type: 'post',
        dataType: 'json',
        data: {
            acceptance_id:acceptance_id
        },
        success: function (data) {
            $('#submit-it-acceptance').val(data.event);
            $('.staff-it-acceptance-device-name').html('Device Name: '+data.acceptanceDeviceName);
            $('.staff-it-acceptance-serial-number').html('Serial No: '+data.acceptanceSerialNumber);
            $('#staff-it-acceptance-id').val(data.acceptanceID);
            $('.staff-it-acceptance-asset-type').html('Device Type: '+data.acceptanceAssetType);
                // $('#brand').val(data.acceptanceFirstName+'  '+data.acceptanceSecondName+'  '+data.acceptanceSurname);
                $('.staff-it-acceptance-asset-brand').html('Brand: '+data.acceptanceBrand+' | Model: '+data.acceptanceModel);
                $('.staff-it-acceptance-processor-speed').html('Processor Speed:'+data.acceptanceProcessor+' | RAM: '+data.acceptanceRAM);
                $('.staff-it-acceptance-storage').html('Storage: '+data.acceptanceStorage+' | Capacity: '+data.acceptanceCapacity);
                // $('#item-type').val(data.type);
                // $('#item-type').val(data.type);
                // $('#item-type').val(data.type);
                $('#modal-it-acceptance').find('.modal-title').text(data.title);
                $('#modal-it-acceptance').modal('show');
            },
            error: function(){
                alert('Error in attaching acceptance form');
            }
        });
}//end editModal

//save edit modal
$(document).on('submit', '#form-acceptance-it-asset', function(event) {
    event.preventDefault();
    $.ajax({
        url: 'data/save_acceptance_form.php',
        type: 'post',
        dataType: 'json',
        data:new FormData(this),
        cache: false, 
        contentType:false, 
        processData:false,   
        success: function (data) {
            if(data.valid == true){
                $('#modal-message').find('#msg-body').text(data.msg);
                $('#modal-it-acceptance').modal('hide');
                showAllStaffITAcceptance();
                $('#modal-message').modal('show');
            }
        },
        error: function(){
            alert('Error in attaching acceptance form');
        }
    });
});


// VIEW ATTACHED ACCEPTANCE FORM
function viewAllStaffAcceptanceForm(){
    $.ajax({
        url: 'data/view_acceptance_forms.php',
        success: function (data) {
            $('#all-iss-acceptance-forms-requests').html(data);
        },
        error: function(){
            alert('Error in retrieving all IT acceptance form requests');
        }
    });
}//end viewAllStaffAcceptanceForm
viewAllStaffAcceptanceForm();

//IT ACCEPTANCE FORM ACCEPT
function acceptITAcceptanceForm(applicantID){
    $.ajax({
        url: 'data/get_it_accept_form_requests.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicantID:applicantID
        },
        success: function (data) {
            $('#submit-accept-acceptance').val(data.event);
            $('#acceptance-id').val(data.id);
            $('#modal-accept-acceptance').find('.modal-title').text(data.title);
            $('#modal-accept-acceptance').modal('show');
        },
        error: function(){
            alert('Error in fetching IT Acceptance form attachment requests');
        }
    });
}//end editModal

//save requests edit modal
$(document).on('submit', '#form-verify', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-accept-acceptance').val();
    var applicantID = $('#acceptance-id').val();
    var acceptedname = $('#accepted-name').val();
    // var verificationJustif = $('#verificationJustif').val();
    var itAcceptanceReqTime = $('#itAcceptanceReqTime').val();
    var acceptedBy = $('#acceptedBy').val();

    if(submit  == "edit"){
        $.ajax({
            url: 'data/edit_it_accept_form_requests.php',
            type: 'post',
            dataType: 'json',
            data: {
                applicantID:applicantID,
                acceptedname:acceptedname,
                itAcceptanceReqTime:itAcceptanceReqTime,
                acceptedBy:acceptedBy
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-accept-acceptance').modal('hide');
                        viewAllStaffAcceptanceForm();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in accepted acceptance form');
                }
            });
    }//end submit
});

//IT ACCEPTANCE FORM VERIFY
function acceptITAcceptanceForm(applicantID){
    $.ajax({
        url: 'data/get_it_accept_form_requests.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicantID:applicantID
        },
        success: function (data) {
            $('#submit-accept-acceptance').val(data.event);
            $('#acceptance-attached-id').val(data.id);
            $('.staff-it-asset-attached-fullname').html(data.attachedAcceptedFirstName+'  '+data.attachedAcceptedSecondName+' '+data.attachedAcceptedSurname);
            $('.staff-it-asset-attached-designation').html(data.attachedAcceptedDesignation+' - '+data.attachedAcceptedRegion);
                // $('.staff-it-asset-attached-device-type').html(data.attachedAcceptedDevType);
                $('#modal-accept-acceptance').find('.modal-title').text(data.title);
                $('#modal-accept-acceptance').modal('show');
            },
            error: function(){
                alert('Error in fetching IT Acceptance form attachment requests');
            }
        });
}//end editModal

//save requests edit modal
$(document).on('submit', '#form-attached-acceptance-verify', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-accept-acceptance').val();
    var applicantID = $('#acceptance-attached-id').val();
    var acceptedname = $('#accepted-name').val();
    // var verificationJustif = $('#verificationJustif').val();
    var itAcceptanceReqTime = $('#itAcceptanceReqTime').val();
    var acceptedBy = $('#acceptedBy').val();

    if(submit  == "verifyingacceptance"){
        $.ajax({
            url: 'data/saving_it_accept_form_requests.php',
            type: 'post',
            dataType: 'json',
            data: {
                applicantID:applicantID,
                acceptedname:acceptedname,
                itAcceptanceReqTime:itAcceptanceReqTime,
                acceptedBy:acceptedBy
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-accept-acceptance').modal('hide');
                        viewAllStaffAcceptanceForm();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in accepted acceptance form');
                }
            });
    }
});

//IT ACCEPTANCE FORM REJECT
function rejectITAcceptanceForm(applicantID){
    $.ajax({
        url: 'data/get_it_accept_form_requests_rej.php',
        type: 'post',
        dataType: 'json',
        data: {
            applicantID:applicantID
        },
        success: function (data) {
            $('#submit-reject-acceptance').val(data.event);
            $('#acceptance-reject-id').val(data.id);
            $('.staff-it-asset-attached-rej-fullname').html(data.attachedAcceptedRejFirstName+'  '+data.attachedAcceptedRejSecondName+'  '+data.attachedAcceptedRejSurname);
            $('.staff-it-asset-attached-rej-designation').html(data.attachedAcceptedRejDesignation+'  '+data.attachedAcceptedRejRegion);
            $('#modal-reject-acceptance-form').find('.modal-title').text(data.title);
            $('#modal-reject-acceptance-form').modal('show');
        },
        error: function(){
            alert('Error in rejecting IT Acceptance form requests');
        }
    });
}//end editModal

//save requests edit modal
$(document).on('submit', '#form-reject-acceptance', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-reject-acceptance').val();
    var applicantID = $('#acceptance-reject-id').val();
    var rejectacceptancename = $('#rejected-acceptance-name').val();
    var rejectionJustif = $('#acceptRejectionJustif').val();
    var itAcceptanceRejectedTime = $('#itAcceptanceRejectedTime').val();
    var acceptanceRejectedBy = $('#acceptanceRejectedBy').val();

    if(submit  == "edit"){
        $.ajax({
            url: 'data/saving_it_accept_form_requests_rej.php',
            type: 'post',
            dataType: 'json',
            data: {
                applicantID:applicantID,
                rejectacceptancename:rejectacceptancename,
                itAcceptanceRejectedTime:itAcceptanceRejectedTime,
                rejectionJustif:rejectionJustif,
                acceptanceRejectedBy:acceptanceRejectedBy
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-reject-acceptance-form').modal('hide');
                    viewAllStaffAcceptanceForm();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting acceptance form');
            }
        });
    }
});


//STAFF'S ALLOCATED DEVICES
function showAllAllocationList(){
    $.ajax({
        url: 'data/all_allocated_staff_list.php',
        success: function (data) {
            $('#all-allocation-req-list').html(data);
        },
        error: function(){
            alert('Error in displaying staff\'s allocated devices');
        }
    });
}
showAllAllocationList();

// VIEW MORE ALLOCATED ASSET SPEC
function viewMoreAllocatedAssetSpec(asset_alloc_id){
    $.ajax({
        url: 'data/get_staff_allocated_asset_spec.php',
        type: 'post',
        dataType: 'json',
        data: {
            asset_alloc_id:asset_alloc_id
        },
        success: function (data) {
            $('#more-allocated-it-asset-submit').val(data.event);
            $('.more-allocated-it-asset-dev-name').html(data.moreAllocatedDeviceName);
            $('.more-allocated-it-asset-devtype').html(data.moreAllocatedDeviceType);
            $('#more-allocated-it-asset-ids').val(data.moreAllocatedID);
            $('.more-allocated-it-asset-capacity').html(data.moreAllocatedCapacity);
            $('.more-allocated-it-asset-staff-name').html(data.moreAllocatedFName+'  '+data.moreAllocatedSName+'  '+data.moreAllocatedSurname);
            $('.more-allocated-it-asset-serialnumber').html(data.moreAllocatedSNo);
            $('.more-allocated-it-asset-model').html(data.moreAllocatedModel);
            $('.more-allocated-it-asset-brand').html(data.moreAllocatedBrand);
            $('.more-allocated-it-asset-ram').html(data.moreAllocatedRAM);
            $('.more-allocated-it-asset-processor').html(data.moreAllocatedProcessor);
            $('.more-allocated-it-asset-storage').html(data.moreAllocatedStorage);
            $('#modal-view-staff-asset-allocated-details').find('.modal-title').text(data.title);
            $('#modal-view-staff-asset-allocated-details').modal('show');
        },
        error: function(){
            alert('Error in viewing more allocated details');
        }
    });
}


//HANDOVER LIST
function showAllStaffHandOver(){
    $.ajax({
        url: 'data/all_handover_form.php',
        success: function (data) {
            $('#all-handover-device-req').html(data);
        },
        error: function(){
            alert('Error in fetching staff handover lists');
        }
    });
}
showAllStaffHandOver();

//ATTACH HANDOVER FORM
function attachHandoverForm(handover_id){
    $.ajax({
        url: 'data/get_staff_handover.php',
        type: 'post',
        dataType: 'json',
        data: {
            handover_id:handover_id
        },
        success: function (data) {
            $('#submit-it-handover').val(data.event);
            $('.staff-it-handover-device-name').html('Device Name: '+data.handoverDeviceName);
            $('.staff-it-handover-serial-number').html('Serial No: '+data.handoverSerialNumber);
            $('#staff-it-handover-serialno').val(data.handoverSerialNumber);
            $('#staff-it-handover-id').val(data.handoverID);
            $('.staff-it-handover-asset-type').html('Device Type: '+data.handoverAssetType);
            // $('#staff-it-handover-fname').val(data.handoverFirstName);
            $('.staff-it-handover-asset-brand').html('Brand: '+data.handoverBrand+' | Model: '+data.handoverModel);
            $('.staff-it-handover-processor-speed').html('Processor Speed:'+data.handoverProcessor+' | RAM: '+data.handoverRAM);
            $('.staff-it-handover-storage').html('Storage: '+data.handoverStorage+' | Capacity: '+data.handoverCapacity);
            $('#staff-it-handover-fname').val(data.handoverFirstName);
            $('#staff-it-handover-sname').val(data.handoverSecondName);
            $('#staff-it-handover-lname').val(data.handoverSurname);
            $('#modal-it-handover').find('.modal-title').text(data.title);
            $('#modal-it-handover').modal('show');
        },
        error: function(){
            alert('Error in attaching handover form');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-handover-it-asset', function(event) {
    event.preventDefault();
    $.ajax({
        url: 'data/save_handover_form.php',
        type: 'post',
        dataType: 'json',
        data:new FormData(this),
        cache: false, 
        contentType:false, 
        processData:false,   
        success: function (data) {
            if(data.valid == true){
                $('#modal-message').find('#msg-body').text(data.msg);
                $('#modal-it-handover').modal('hide');
                showAllStaffHandOver();
                $('#modal-message').modal('show');
            }
        },
        error: function(){
            alert('Error in attaching handover form');
        }
    });
});

//STAFF HANDOVER STATUS
function showAllStaffsHandoverStatus(){
    $.ajax({
        url: 'data/all_handover_staff_status.php',
        success: function (data) {
            $('#all-staff-handover-status').html(data);
        },
        error: function(){
            alert('Error in displaying handover request status');
        }
    });
}//end showAllStaffsHandoverStatus
showAllStaffsHandoverStatus();


//VIEW HANDOVER REQUESTS
function showAllStaffsHandoverRequests(){
    $.ajax({
        url: 'data/all_staffs_handover_requests.php',
        success: function (data) {
            $('#all-staffs-handover-requests').html(data);
        },
        error: function(){
            alert('Error in displaying viewing handover request');
        }
    });
}
showAllStaffsHandoverRequests();


//APPROVE HANDOVER REQUESTS FROM STAFFS
function approveHandoverStaffRequest(handover_id){
    $.ajax({
        url: 'data/get_handover_staff_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            handover_id:handover_id
        },
        success: function (data) {
            $('#submit-staff-handover-request-approve').val(data.event);
            $('#staff-handover-request-approve-pfnamba').val(data.handoverreqstaffpfno);
            $('.staff-handover-request-appli-date').html(data.handoverreqstaffdate);
            $('.staff-handover-request-department').html(data.handoverreqstaffdepartment);
            $('#staff-handover-request-approve-id').val(data.id);
            $('#staff-handover-request-approve-current-status').val(data.handoverreqstaffcurrentdevstatus);
            $('.staff-handover-request-fullname').html(data.handoverreqstafffname+'  '+data.handoverreqstaffmname+'  '+data.handoverreqstafflname);
            $('.staff-handover-request-designation').html(data.handoverreqstaffdesignation+' - '+data.handoverreqstaffregion);
            $('.staff-handover-request-asset-type').html(data.handoverreqstaffdevtype+' - '+data.handoverreqstaffquantity);
            $('#staff-handover-request-serial-no').val(data.handoverreqstaffserialno);
            $('#modal-handover-request-approve').find('.modal-title').text(data.title);
            $('#modal-handover-request-approve').modal('show');
        },
        error: function(){
            alert('Error in fetching staff handover requests to approve');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-staff-approve-handover-request', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-staff-handover-request-approve').val();
    var handover_id = $('#staff-handover-request-approve-id').val();
    var handoverreqstaffjustif = $('#staff-handover-request-justif').val();
    var handoverreqstaffpfnamba = $('#staff-handover-request-approve-pfnamba').val();
    var handoverreqstaffcurrentdevstatus = $('#staff-handover-request-approve-current-status').val();
    var handoverreqstaffreceivedby = $('#staff-handover-request-approved-by').val();
    var handoverreqstaffreceivedon = $('#staff-handover-request-approved-on').val();
    var handoverreqstaffserialnamba = $('#staff-handover-request-serial-no').val();

    if(submit  == "approvehandoverstaffreq"){
        $.ajax({
            url: 'data/saving_approved_staff_handover_req.php',
            type: 'post',
            dataType: 'json',
            data: {
                handover_id:handover_id,
                handoverreqstaffserialnamba:handoverreqstaffserialnamba,
                handoverreqstaffjustif:handoverreqstaffjustif,
                handoverreqstaffpfnamba:handoverreqstaffpfnamba,
                handoverreqstaffcurrentdevstatus:handoverreqstaffcurrentdevstatus,
                handoverreqstaffreceivedby:handoverreqstaffreceivedby,
                handoverreqstaffreceivedon:handoverreqstaffreceivedon
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-handover-request-approve').modal('hide');
                    showAllStaffsHandoverRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in approving staff handover staff requests');
            }
        });
    }//end submit
});


//REJECT STAFF HANDOVER FORM
function rejectHandoverStaffRequest(handover_id){
    $.ajax({
        url: 'data/get_handover_staff_request_rej.php',
        type: 'post',
        dataType: 'json',
        data: {
            handover_id:handover_id
        },
        success: function (data) {
            $('#submit-staff-handover-request-reject').val(data.event);
            // $('#staff-handover-request-rej-reject-pfnamba').val(data.handoverreqrejstaffpfno);
            $('.staff-handover-request-rej-appli-date').html(data.handoverreqrejstaffdate);
            $('.staff-handover-request-rej-department').html(data.handoverreqrejstaffdepartment);
            $('#staff-handover-request-rej-reject-id').val(data.id);
            $('.staff-handover-request-rej-current-status').html(data.handoverreqrejstaffcurrentdevstatus);
            $('.staff-handover-request-rej-fullname').html(data.handoverreqrejstafffname+'  '+data.handoverreqrejstaffmname+'  '+data.handoverreqrejstafflname);
            $('.staff-handover-request-rej-designation').html(data.handoverreqrejstaffdesignation+' - '+data.handoverreqrejstaffregion);
            $('.staff-handover-request-rej-asset-type').html(data.handoverreqrejstaffdevtype+' - '+data.handoverreqrejstaffquantity);
            $('#staff-handover-request-rej-serial-no').val(data.handoverreqrejstaffserialno);
            $('#modal-handover-request-reject').find('.modal-title').text(data.title);
            $('#modal-handover-request-reject').modal('show');
        },
        error: function(){
            alert('Error in fetching handover staff details to reject');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-staff-reject-handover-request', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-staff-handover-request-reject').val();
    var handover_id = $('#staff-handover-request-rej-reject-id').val();
    // var handoverstaffrejpfnamba = $('#staff-handover-request-rej-reject-pfnamba').val();
    var handoverstaffreqrejserialno = $('#staff-handover-request-rej-serial-no').val();
    var handoverstaffreqrejrejectedby = $('#staff-handover-request-rejectd-by').val();
    var handoverstaffrejrejectedjustif = $('#staff-handover-request-rej-justif').val();

    if(submit  == "approvehandoverstaffreqrej"){
        $.ajax({
            url: 'data/saving_rejected_staff_handover_req.php',
            type: 'post',
            dataType: 'json',
            data: {
                handover_id:handover_id,
                handoverstaffreqrejserialno:handoverstaffreqrejserialno,
                handoverstaffreqrejrejectedby:handoverstaffreqrejrejectedby,
                handoverstaffrejrejectedjustif:handoverstaffrejrejectedjustif
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-handover-request-reject').modal('hide');
                    showAllStaffsHandoverRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting staff handover requests');
            }
        });
    }
});

//ALL MOVEMENT 
function showAllStaffMovement(){
    $.ajax({
        url: 'data/all_movement_list.php',
        success: function (data) {
            $('#all-staff-device-movement').html(data);
        },
        error: function(){
            alert('Error in showing staff device movement');
        }
    });
}
showAllStaffMovement();

function attachMovementForm(movement_id){
    $.ajax({
        url: 'data/get_movement_request.php',
        type: 'post',
        dataType: 'json',
        data: {
            movement_id:movement_id
        },
        success: function (data) {
            $('#submit-staff-it-movement').val(data.event);
            $('.staff-it-movement-fname').html('Full Name: '+data.staffmovementfname+' '+data.staffmovementmname+' '+data.staffmovementlname);
            $('.staff-it-movement-desination').html('Designation: '+data.staffmovementdesign+'-'+data.staffmovementregion);
            $('#staff-it-movement-id').val(data.id);
            $('#staff-it-movement-serialno').val(data.staffmovementserialno);
            $('#staff-it-movement-duty-station').val(data.staffmovementfromdutystation);
            $('#staff-it-movement-devtype-one').val(data.staffmovementdevtype);
            $('#staff-it-movement-department-one').val(data.staffmovementdepartment);
            $('#staff-it-movement-designation-one').val(data.staffmovementdesign);
            $('#staff-it-movement-fname-one').val(data.staffmovementfname);
            $('#staff-it-movement-sname-one').val(data.staffmovementmname);
            $('#staff-it-movement-lname-one').val(data.staffmovementlname);
            // $('#staff-it-movement-id').val(data.id);
            // $('#staff-it-movement-id').val(data.id);
            $('.staff-it-movement-department').html('Department: '+data.staffmovementdepartment);
            $('.staff-it-movement-asset-device-type').html('Device type: '+data.staffmovementdevtype+'-'+data.staffmovementquantity);
            $('.staff-it-movement-brand').html('Brand: '+data.staffmovementbrand+' |  Model: '+data.staffmovementmodel);
            $('#modal-it-movement-device').find('.modal-title').text(data.title);
            $('#modal-it-movement-device').modal('show');
        },
        error: function(){
            alert('Error in fetching device movement details');
        }
    });
}

//save movement request modal
$(document).on('submit', '#form-movement-it-asset', function(event) {
    event.preventDefault();
    $.ajax({
        url: 'data/save_movement_form.php',
        type: 'post',
        dataType: 'json',
        data:new FormData(this),
        cache: false, 
        contentType:false, 
        processData:false,   
        success: function (data) {
            if(data.valid == true){
                $('#modal-message').find('#msg-body').text(data.msg);
                $('#modal-it-movement-device').modal('hide');
                showAllStaffMovement();
                $('#modal-message').modal('show');
            }
        },
        error: function(){
            alert('Error in attaching movement form');
        }
    });
});


//DEVICE MOVEMENT STATUS
function showAllDevicesMovementStatus(){
    $.ajax({
        url: 'data/all_staffs_movement_status.php',
        success: function (data) {
            $('#all-staff-device-movement-status').html(data);
        },
        error: function(){
            alert('Error in retriving device movement status');
        }
    });
}
showAllDevicesMovementStatus();


//CONFIRM DEVICE MOVEMENT---STAFF PART
function showAllDeviceMovementConfirm(){
    $.ajax({
        url: 'data/all_device_movement_confirm.php',
        success: function (data) {
            $('#all-staff-device-movement-confirm').html(data);
        },
        error: function(){
            alert('Error in staff cofirming device movement');
        }
    });
}
showAllDeviceMovementConfirm();


function showAllDeviceMovementITSupport(){
    $.ajax({
        url: 'data/all_device_it_support_requests.php',
        success: function (data) {
            $('#all-device-it-support-requests').html(data);
        },
        error: function(){
            alert('Error in retrieving IT Support Supervisor request');
        }
    });
}
showAllDeviceMovementITSupport();

function approveMovementITSupportRequest(movement_id){
    $.ajax({
        url: 'data/get_staff_movement_to_iss.php',
        type: 'post',
        dataType: 'json',
        data: {
            movement_id:movement_id
        },
        success: function (data) {
            $('#submit-movement-staff-req-itss-approve').val(data.event);
            $('#staff-movement-staff-req-itss-approve-serialno').val(data.devicemovemstaffreqserialno);
            $('.staff-movement-staff-req-itss-appli-date').html(data.devicemovemstaffreqmovdate);
            $('#staff-movement-staff-req-itss-approve-id').val(data.id);
            $('.staff-movement-staff-req-itss-fullname').html(data.devicemovemstaffreqfname+'  '+data.devicemovemstaffreqmname+'  '+data.devicemovemstaffreqlname);
            $('.staff-movement-staff-req-itss-movem-justif').html(data.devicemovemstaffreqmovrejectcomm);
            $('.staff-movement-staff-req-itss-to-fullname').html(data.devicemovemstaffreqtofname+'  '+data.devicemovemstaffreqtomname+'  '+data.devicemovemstaffreqtolname);
            // $('#item-type').val(data.type);
            $('#modal-movement-staff-req-itss-approve').find('.modal-title').text(data.title);
            $('#modal-movement-staff-req-itss-approve').modal('show');
        },
        error: function(){
            alert('Error in fetching movement staff details to approve');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-approve-movement-staff-req-itss', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-movement-staff-req-itss-approve').val();
    var movement_serialno = $('#staff-movement-staff-req-itss-approve-serialno').val();
    var movement_approved_by = $('#staff-movement-staff-req-itss-approved-by').val();
    var movement_approved_on = $('#staff-movement-staff-req-itss-approved-on').val();
    var movement_id = $('#staff-movement-staff-req-itss-approve-id').val();
    var movement_sits = $('#staff-movement-staff-req-itss-approve-text-sits').val();
    var movement_itse = $('#staff-movement-staff-req-itss-approve-text-itse').val();
    var movement_rpam = $('#staff-movement-staff-req-itss-approve-text-rpam').val();

    if(submit  == "devicemovementstaffreq"){
        $.ajax({
            url: 'data/saving_movement_request_approve.php',
            type: 'post',
            dataType: 'json',
            data: {
                movement_id:movement_id,
                movement_sits:movement_sits,
                movement_itse:movement_itse,
                movement_rpam:movement_rpam,
                movement_serialno:movement_serialno,
                movement_approved_by:movement_approved_by,
                movement_approved_on:movement_approved_on
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-movement-staff-req-itss-approve').modal('hide');
                        showAllDeviceMovementITSupport();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in approvinng staff movent request');
                }
            });
    }
});


//STAFF MOVEMENT CONFIRM
function confirmMovemRequest(movement_id){
    $.ajax({
        url: 'data/get_staff_movement_req_to_confirm.php',
        type: 'post',
        dataType: 'json',
        data: {
            movement_id:movement_id
        },
        success: function (data) {
            $('#submit-movement-staff-req-itss-confirm').val(data.event);
            // $('#item-name').val(data.name);
            $('#staff-movement-staff-req-itss-confirm-pfnamba').val(data.devicemovementstaffpfno);
            $('#staff-movement-staff-req-itss-confirm-id').val(data.id);
            $('#modal-movement-staff-req-itss-confirm').find('.modal-title').text(data.title);
            $('#modal-movement-staff-req-itss-confirm').modal('show');
        },
        error: function(){
            alert('Error in retrieving staff request to confirm');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-confirm-movement-staff-req-itss', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-movement-staff-req-itss-confirm').val();
    var movement_id = $('#staff-movement-staff-req-itss-confirm-id').val();
    var movement_pfnamba = $('#staff-movement-staff-req-itss-confirm-pfnamba').val();
    var mov_cofirmed_on = $('#staff-movement-staff-req-itss-confirmed-on').val();
    var mov_cofirmed_by = $('#staff-movement-staff-req-itss-confirmed-by').val();
    // var iType = $('#staff-movement-staff-req-itss-confirm-pfnamba').val();

    if(submit  == "confirmdevicemovement"){
        $.ajax({
            url: 'data/saving_staff_movement_cofirmation.php',
            type: 'post',
            dataType: 'json',
            data: {
                movement_id:movement_id,
                movement_pfnamba:movement_pfnamba,
                mov_cofirmed_on:mov_cofirmed_on,
                mov_cofirmed_by:mov_cofirmed_by
                // code:code,
                // brand:brand,
                // grams:grams
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-movement-staff-req-itss-confirm').modal('hide');
                    showAllDeviceMovementConfirm();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in cofirming staff movement');
            }
        });
    }//end submit
});

//FINALIZE STAFF MOVEMENT
function showAllFinalizeDeviceMovement(){
    $.ajax({
        url: 'data/all_finalize_movement.php',
        success: function (data) {
            $('#all-finalize-device-it-support').html(data);
        },
        error: function(){
            alert('Error in fetching final staff movement request');
        }
    });
}
showAllFinalizeDeviceMovement();

function finalizeMovemRequest(movement_id){
    $.ajax({
        url: 'data/get_finalize_movement_final.php',
        type: 'post',
        dataType: 'json',
        data: {
            movement_id:movement_id
        },
        success: function (data) {
            $('#submit-it-finalize-final').val(data.event);
            $('#staff-it-finalize-to-pfnamba').val(data.finalmovementstafftopfno);
            $('#staff-it-finalize-id').val(data.id);
            $('#staff-it-finalize-to-fname').val(data.finalmovementstafftofname);
            $('#staff-it-finalize-to-mname').val(data.finalmovementstafftomname);
            $('#staff-it-finalize-to-lname').val(data.finalmovementstafftolname);
            $('#staff-it-finalize-to-offbuild').val(data.finalmovementstafftooffbuild);
            $('#staff-it-finalize-to-designation').val(data.finalmovementstafftodesignation);
            $('#staff-it-finalize-to-department').val(data.finalmovementstafftodepartment);
            $('#staff-it-finalize-to-region').val(data.finalmovementstafftoregion);
            $('#staff-it-finalize-to-directmanager').val(data.finalmovementstafftodirectmanager);

                // $('#brand').val(data.finalmovementstafftoconfirmeddate);
                $('#staff-it-finalize-pfnamba').val(data.finalmovementstafffrompf);
                $('#staff-it-finalize-to-serialno').val(data.finalmovementstafffromserialno);
                $('#modal-it-finalize').find('.modal-title').text(data.title);
                $('#modal-it-finalize').modal('show');
            },
            error: function(){
                alert('Error in retrieving fimal movement lists');
            }
        });
}//end editModal

//save edit modal
$(document).on('submit', '#form-finalize-it', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-it-finalize-final').val();
    var movem_id = $('#staff-it-finalize-id').val();
    var movem_from_id = $('#staff-it-finalize-from-id').val();
    var movem_frompfnamba = $('#staff-it-finalize-pfnamba').val();
    var movem_serialno = $('#staff-it-finalize-to-serialno').val();
    var movem_devstatus = $('#staff-it-finalize-devstatus').val();
    var movem_date = $('#staff-it-finalized-on').val();
    var movem_by = $('#staff-it-finalized-by').val();
    var movem_topfnamba= $('#staff-it-finalize-to-pfnamba').val();

    var moveto_fname = $('#staff-it-finalize-to-fname').val();
    var moveto_mname = $('#staff-it-finalize-to-mname').val();
    var moveto_lname = $('#staff-it-finalize-to-lname').val();
    var moveto_offbuild = $('#staff-it-finalize-to-offbuild').val();
    var moveto_designation = $('#staff-it-finalize-to-designation').val();
    var moveto_department = $('#staff-it-finalize-to-department').val();
    var moveto_region = $('#staff-it-finalize-to-region').val();
    var moveto_dmanager = $('#staff-it-finalize-to-directmanager').val();
    // var moveto_ = $('#grams').val();
    // var moveto_ = $('#grams').val();

    if(submit  == "finalizedevmovement"){
        $.ajax({
            url: 'data/saving_final_movement_request.php',
            type: 'post',
            dataType: 'json',
            data: {
                movem_id:movem_id,
                moveto_region:moveto_region,
                movem_frompfnamba:movem_frompfnamba,
                movem_serialno:movem_serialno,
                movem_devstatus:movem_devstatus,
                movem_date:movem_date,
                movem_by:movem_by,
                moveto_dmanager:moveto_dmanager,
                movem_topfnamba:movem_topfnamba,
                moveto_fname:moveto_fname,
                moveto_mname:moveto_mname,
                moveto_offbuild:moveto_offbuild,
                moveto_lname:moveto_lname,
                moveto_department:moveto_department,
                moveto_designation:moveto_designation
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-it-finalize').modal('hide');
                        showAllFinalizeDeviceMovement();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in finalize staff device movement ');
                }
            });
    }//end submit
});


//RECORD TONNER
function showAllTonnerRecordForm(){
    $.ajax({
        url: 'data/all_record_tonner_cartridge.php',
        success: function (data) {
            $('#all-record-tonner-cartridge').html(data);
        },
        error: function(){
            alert('Error in fetching tonner cartridge form');
        }
    });
}
showAllTonnerRecordForm();

// ADD TONER DETAILS TO DB
$(document).on('submit', '#form-record-toner-cartridge', function(event) {
    event.preventDefault();
    /* Act on the event */ 
    var initialtonerqty= $('#recordtonercartridgeqty').val();
    var tonnerbrand = $('#recordtonercartridgetonerbrand').val();
    var tonermodel = $('#recordtonercartridgetonermodel').val();
    var tonerstatus = $('#recordtonercartridgetonerstatus').val();
    var toneraddedby = $('#record-toner-cartridge-recorded-by').val();
    var toneraddedon = $('#record-toner-cartridge-recorded-on').val();

    if($('#submit-record-toner-cartridge').val() == "add"){
        $.ajax({
            url: 'data/add_toner_details.php',
            type: 'post',
            dataType: 'json',
            data: {
                initialtonerqty:initialtonerqty,
                tonnerbrand:tonnerbrand,
                tonermodel:tonermodel,
                tonerstatus:tonerstatus,
                toneraddedby:toneraddedby,
                toneraddedon:toneraddedon
            },
            success: function (data) {
                console.log(data);
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    showAllTonnerRecordForm();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in adding toner details');
            }
        });
    }
});


// VIEW ALL TONER CARTRIDGES
function showAllTonerCartridge(){
    $.ajax({
        url: 'data/all_toner_cartridge.php',
        success: function (data) {
            $('#all-toner-cartridge-lists').html(data);
        },
        error: function(){
            alert('Error in retrieving all toner cartridge lists');
        }
    });
}
showAllTonerCartridge();

function updateTonerCartridge(toner_id){
    $.ajax({
        url: 'data/get_toner_details.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_id:toner_id
        },
        success: function (data) {
            $('#submit-toner-cartridge-update').val(data.event);
            $('#toner-cartridge-brand').val(data.tonerbrand);
            $('#toner-cartridge-status').val(data.tonerstatus);
            $('#toner-cartridge-id').val(data.id);
            $('#toner-cartridge-model').val(data.tonermodel);
            $('.toner-cartridge-updated-by').html(data.tonerupdatedby);
            $('.toner-cartridge-up-appli-date').html(data.tonerupdatedon);
            $('.toner-cartridge-recorded-by').html(data.toneraddedby);
            $('.toner-cartridge-appli-date').html(data.toneraddedon);
            $('#modal-toner-cartridge-update').find('.modal-title').text(data.title);
            $('#modal-toner-cartridge-update').modal('show');
        },
        error: function(){
            alert('Error in reftrieving toner details to update');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-update-toner-cartridge', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-toner-cartridge-update').val();
    var toner_id = $('#toner-cartridge-id').val();
    var uptonerstatus = $('#toner-cartridge-status').val();
    var uptonermodel = $('#toner-cartridge-model').val();
    var updatedtoneron = $('#toner-cartridge-up-appli-date-one').val();
    var uptonerbrand = $('#toner-cartridge-brand').val();
    var updatedtonerby = $('#toner-cartridge-updated-by1').val();

    if(submit  == "updatetoner"){
        $.ajax({
            url: 'data/saving_updated_tonner_details.php',
            type: 'post',
            dataType: 'json',
            data: {
                uptonerstatus:uptonerstatus,
                toner_id:toner_id,
                uptonermodel:uptonermodel,
                uptonerbrand:uptonerbrand,
                updatedtonerby:updatedtonerby,
                updatedtoneron:updatedtoneron
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-toner-cartridge-update').modal('hide');
                    showAllTonerCartridge();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in updating toner details');
            }
        });
    }
});

//DELETE TONER CARTRIDGE DETAILS
function deleteTonerCartridge(toner_id){
    $.ajax({
        url: 'data/get_cartridge_to_delete.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_id:toner_id
        },
        success: function (data) {
            $('#submit-toner-cartridge-delete').val(data.event);
            $('#delete-toner-cartridge-id').val(data.id);
            $('#modal-delete-toner-cartridge').find('.modal-title').text(data.title);
            $('#modal-delete-toner-cartridge').modal('show');
        },
        error: function(){
            alert('Error in fetching toner details to delete');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-delete-tonner-cartridge', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-toner-cartridge-delete').val();
    var toner_id = $('#delete-toner-cartridge-id').val();

    if(submit  == "updatetonerdelete"){
        $.ajax({
            url: 'data/saving_deleted_cartridge.php',
            type: 'post',
            dataType: 'json',
            data: {
                toner_id:toner_id
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-delete-toner-cartridge').modal('hide');
                    showAllTonerCartridge();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in deleting toner details');
            }
        });
    }
});

//SHOW TONER CARTRIDGES REQUEST FORM
function showTonerRequestForm(){
    $.ajax({
        url: 'data/all_toner_request_form.php',
        success: function (data) {
            $('#all-toner-request-form').html(data);
        },
        error: function(){
            alert('Error in showing toner request form');
        }
    });
}
showTonerRequestForm();


function showAllTonerStock(){
    $.ajax({
        url: 'data/all_toner_stocklist.php',
        type: 'post',
        success: function (data) {
            $('#all-update-toner-cartridge-stock').html(data);
        },
        error: function(){
            alert('Error in fetching toner stock');
        }
    });
}
showAllTonerStock();


//ADD TONER STOCK
function addNewStock(toner_id){
    $.ajax({
        url: 'data/get_toner_to_stock.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_id:toner_id
        },
        success: function (data) {
            $('#submit-new-toner-stock').val(data.event);
            $('#new-toner-stock-id').val(data.id);
            $('#last-toner-stock-qty').val(data.lastqtyentered);
            $('.last-toner-stock-added-on').html(data.laststockaddeddate);
            $('#modal-add-new-toner-stock').find('.modal-title').text(data.title);
            $('#modal-add-new-toner-stock').modal('show');
        },
        error: function(){
            alert('Error in retrieving toner details  to stock addition');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-new-toner-stock', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-new-toner-stock').val();
    var toner_id = $('#new-toner-stock-id').val();
    var lastqty= $('#last-toner-stock-qty').val();
    var newstockaddedby = $('#new-toner-stock-added-by').val();
    var newstockaddedon = $('#new-toner-stock-added-on').val();
    var newstockquantity = $('#new-toner-stock-quantity').val();



    if (newstockquantity< 0) {
        alert('Quantity entered is not enough');
    }else{

        if(submit  == "addtonerstock"){
            $.ajax({
                url: 'data/saving_toner_stock_added.php',
                type: 'post',
                dataType: 'json',
                data: {
                    toner_id:toner_id,
                    newstockaddedby:newstockaddedby,
                    newstockaddedon:newstockaddedon,
                    lastqty:lastqty,
                    newstockquantity:newstockquantity
                },
                success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-add-new-toner-stock').modal('hide');
                        // $('#modal-add-new-toner-stock').reload();
                        showAllTonerStock();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in saving tonner stock');
                }
            });
        } 
    }
});


//DELETING TONER CARTRIDGE STOCK
function deleteNewStock(toner_id){
    $.ajax({
        url: 'data/get_toner_stock_to_delete.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_id:toner_id
        },
        success: function (data) {
            $('#submit-remove-toner-stock').val(data.event);
            $('.remove-toner-stock-model-name').html(data.removedtonermodelname);
            $('#remove-toner-stock-id').val(data.id);
            $('#remove-toner-stock-model').val(data.removedtonermodel);
            $('#modal-remove-toner-stock').find('.modal-title').text(data.title);
            $('#modal-remove-toner-stock').modal('show');
        },
        error: function(){
            alert('Error in retrieving toner stock details to remove');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-remove-toner-stock', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-remove-toner-stock').val();
    var toner_id = $('#remove-toner-stock-id').val();
    var toner_model = $('#remove-toner-stock-model').val();
    var toner_reset = $('#remove-toner-stock-reset').val();

    if(submit  == "removetonerstock"){
        $.ajax({
            url: 'data/saving_removed_toner_stock.php',
            type: 'post',
            dataType: 'json',
            data: {
                toner_id:toner_id,
                toner_model:toner_model,
                toner_reset:toner_reset
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-remove-toner-stock').modal('hide');
                    showAllTonerStock();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in removing toner stock');
            }
        });
    }
});

//VIEW TONER STOCK
function showAllTonerCartridgeStock(){
    $.ajax({
        url: 'data/all_toner_recorded_stock.php',
        success: function (data) {
            $('#all-toner-cartridge-stock').html(data);
        },
        error: function(){
            alert('Error in showing toner cartridge stock');
        }
    });
}
showAllTonerCartridgeStock();

//SEND TONER REQUEST
$(document).on('submit', '#tonnerRequestForm', function(event) {
    event.preventDefault();
    /* Act on the event */
    var tonerreqfirstname = $('#tonerFirstName').val();
    var tonerreqmiddlename = $('#tonerMiddleName').val();
    var tonerreqlastname = $('#tonerLastName').val();
    var tonerreqpfno = $('#tonerStaffPFNo').val();
    var tonerreqdesignation = $('#tonerStaffDesignation').val();
    var tonerreqdepartment = $('#tonerStaffDepartment').val();
    var tonerreqoffbuild = $('#tonerStaffOfficeBuilding').val();
    var tonerreqregion = $('#tonerStaffRegion').val();
    var tonerreqdirectmanager = $('#tonerStaffDirectManager').val();
    var tonerreqmodel = $('#tonerCModel').val();
    var tonerwherereqmodel = $('#tonerCModel').val();
    var tonerreqqty = $('#tonerQuantity').val();
    var tonerreqdate = $('#tonerAppliedOn').val();

    if($('#tonerSubmitRequest').val() == "addtonerreq"){
        $.ajax({
            url: 'data/add_toner_cartridge_request.php',
            type: 'post',
            dataType: 'json',
            data: {
                tonerwherereqmodel:tonerwherereqmodel,
                tonerreqdate:tonerreqdate,
                tonerreqqty:tonerreqqty,
                tonerreqmodel:tonerreqmodel,
                tonerreqregion:tonerreqregion,
                tonerreqoffbuild:tonerreqoffbuild,
                tonerreqdepartment:tonerreqdepartment,
                tonerreqdesignation:tonerreqdesignation,
                tonerreqpfno:tonerreqpfno,
                tonerreqlastname:tonerreqlastname,
                tonerreqmiddlename:tonerreqmiddlename,
                tonerreqfirstname:tonerreqfirstname,
                tonerreqdirectmanager:tonerreqdirectmanager
            },
            success: function (data) {
                console.log(data);
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    showTonerRequestForm();
                    $('#modal-message').modal('show');
                    $('#tonerSubmitRequest').val('null');
                }if(data.valid == false){
                    $('#modal-message-error').find('#msg-body-error').text(data.msgerror);
                    showTonerRequestForm();
                    $('#modal-message-error').modal('show');
                    $('#tonerSubmitRequest').val('null');
                }
            },
            error: function(){
                alert('Error in sending toner request');
            }
        });
    }
});


//STAFF TONER REQUEST STATUS
function showAllTonerRequestStatus(){
    $.ajax({
        url: 'data/all_toner_request_status.php',
        success: function (data) {
            $('#all-staff-toner-request-status').html(data);
        },
        error: function(){
            alert('Error in showing toner request status');
        }
    });
}
showAllTonerRequestStatus();


//STAFF VIEW AVAILABLE TONER CARTRIDGES
function showAvailableTonerCartridgeStock(){
    $.ajax({
        url: 'data/available_toners.php',
        success: function (data) {
            $('#all-available-toners').html(data);
        },
        error: function(){
            alert('Error in showing toner cartridge available');
        }
    });
}
showAvailableTonerCartridgeStock();

//DELETE APPLICANT TONER REQUESTS
function deleteTonerStaffRequest(toner_applicant_id){
    $.ajax({
        url: 'data/get_toner_application_to_delete.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_applicant_id:toner_applicant_id
        },
        success: function (data) {
            $('#submit-delete-toner-request').val(data.event);
            $('#delete-toner-request-id').val(data.id);
            $('#delete-toner-request-pfno').val(data.deletedstaffappli);
            $('#modal-delete-toner-request').find('.modal-title').text(data.title);
            $('#modal-delete-toner-request').modal('show');
        },
        error: function(){
            alert('Error in fetching toner applicant to delete');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-delete-toner-request', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-delete-toner-request').val();
    var toner_id = $('#delete-toner-request-id').val();
    var toner_pfno = $('#delete-toner-request-pfno').val();

    if(submit  == "deletetonerapplicant"){
        $.ajax({
            url: 'data/saving_deleted_toner_application.php',
            type: 'post',
            dataType: 'json',
            data: {
                toner_id:toner_id,
                toner_pfno:toner_pfno
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-delete-toner-request').modal('hide');
                        showAllTonerRequestStatus();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in deleting toner application');
                }
            });
    }
});


//ALL TONNER REQUEST
function showAllTonerAppliRequests(){
    $.ajax({
        url: 'data/all_staff_toner_requests.php',
        success: function (data) {
            $('#all-staffs-toner-cartridge-requests').html(data);
        },
        error: function(){
            alert('Error in showing all staff toner requests');
        }
    });
}
showAllTonerAppliRequests();


//APPROVE STAFF TONER REQUEST
function approveTonerStaffReq(toner_appli_id){
    $.ajax({
        url: 'data/get_staff_toner_appli_req.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_appli_id:toner_appli_id
        },
        success: function (data) {
            $('#submit-staff-toner-req-approve').val(data.event);
            $('.staff-staff-toner-req-appli-date').html(data.tonercartstaffdate);
            $('.staff-staff-toner-req-fullname').html(data.tonercartstafffirstname+'  '+data.tonercartstaffsecondname+'  '+data.tonercartstafflastname);
            $('#staff-staff-toner-req-approve-id').val(data.id);
            $('.staff-staff-toner-req-designation').html(data.tonercartstaffdesignation+' - '+data.tonercartstaffregion);
            $('#staff-staff-toner-req-approve-pfnamba').val(data.tonercartstaffreqpfno);
            $('.staff-staff-toner-req-model').html(data.tonercartstaffmodel);
            $('.staff-staff-toner-req-quantity').html(data.tonercartstaffquantity);
            $('.staff-staff-toner-req-department').html(data.tonercartstaffdepartment);
            $('#modal-staff-toner-req-approve').find('.modal-title').text(data.title);
            $('#modal-staff-toner-req-approve').modal('show');
        },
        error: function(){
            alert('Error in showing staff toner request to approve');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-approve-staff-toner-req', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-staff-toner-req-approve').val();
    var appli_toner_id = $('#staff-staff-toner-req-approve-id').val();
    var appli_toner_pfno = $('#staff-staff-toner-req-approve-pfnamba').val();
    var appli_toner_text = $('#staff-staff-toner-req-approve-text').val();
    var appli_toner_approved_by = $('#staff-staff-toner-req-approved-by').val();
    var appli_toner_approved_on = $('#staff-staff-toner-req-approved-on').val();

    if(submit  == "approvetonerreq"){
        $.ajax({
            url: 'data/saving_approving_toner_requests.php',
            type: 'post',
            dataType: 'json',
            data: {
                appli_toner_id:appli_toner_id,
                appli_toner_pfno:appli_toner_pfno,
                appli_toner_text:appli_toner_text,
                appli_toner_approved_by:appli_toner_approved_by,
                appli_toner_approved_on:appli_toner_approved_on
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-staff-toner-req-approve').modal('hide');
                    showAllTonerAppliRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in approving staff toner request');
            }
        });
    }
});

//REJECT STAFF TONER REQUEST
function rejectTonerStaffReq(toner_appli_id){
    $.ajax({
        url: 'data/get_staff_toner_appli_reject.php',
        type: 'post',
        dataType: 'json',
        data: {
            toner_appli_id:toner_appli_id
        },
        success: function (data) {
            $('#submit-staff-toner-requ-rej').val(data.event);
            $('.staff-staff-toner-requ-rej-appli-date').html(data.tonercartristaffdate);
            $('.staff-staff-toner-requ-rej-fullname').html(data.tonercartristafffirstname+'  '+data.tonercartristaffsecondname+'  '+data.tonercartristafflastname);
            $('#staff-staff-toner-requ-rej-id').val(data.id);
            $('.staff-staff-toner-requ-rej-designation').html(data.tonercartristaffdesignation+' - '+data.tonercartristaffregion);
            $('#staff-staff-toner-requ-rej-pfnamba').val(data.tonercartristaffreqpfno);
            $('.staff-staff-toner-requ-rej-model').html(data.tonercartristaffmodel);
            $('#staff-staff-toner-requ-rej-mod').val(data.tonercartristaffmodel);
            $('.staff-staff-toner-requ-rej-quantity').html(data.tonercartristaffquantity);
            $('#staff-staff-toner-requ-rej-qty').val(data.tonercartristaffquantity);
            $('.staff-staff-toner-requ-rej-department').html(data.tonercartristaffdepartment);
            $('#modal-staff-toner-requ-rej-reject').find('.modal-title').text(data.title);
            $('#modal-staff-toner-requ-rej-reject').modal('show');
        },
        error: function(){
            alert('Error in showing staff toner request to reject');
        }
    });
}

//save edit modal
$(document).on('submit', '#form-reject-staff-toner-requ', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-staff-toner-requ-rej').val();
    var appli_toner_rid = $('#staff-staff-toner-requ-rej-id').val();
    var appli_toner_rpfno = $('#staff-staff-toner-requ-rej-pfnamba').val();
    var appli_toner_rtext = $('#staff-staff-toner-requ-rej-text').val();
    var appli_toner_rejected_by = $('#staff-staff-toner-requ-rejected-by').val();
    var appli_toner_rejected_on = $('#staff-staff-toner-requ-rejected-on').val();    
    var appli_toner_rjustif= $('#staff-staff-toner-requ-justif').val();
    var appli_toner_qty= $('#staff-staff-toner-requ-rej-qty').val();
    var appli_toner_mod=$('#staff-staff-toner-requ-rej-mod').val();

    if(submit  == "approvetonerreject"){
        $.ajax({
            url: 'data/saving_rejected_toner_requests.php',
            type: 'post',
            dataType: 'json',
            data: {
                appli_toner_rjustif:appli_toner_rjustif,
                appli_toner_rid:appli_toner_rid,
                appli_toner_rpfno:appli_toner_rpfno,
                appli_toner_rtext:appli_toner_rtext,
                appli_toner_rejected_by:appli_toner_rejected_by,
                appli_toner_rejected_on:appli_toner_rejected_on,
                appli_toner_qty:appli_toner_qty,
                appli_toner_mod:appli_toner_mod
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-staff-toner-requ-rej-reject').modal('hide');
                    showAllTonerAppliRequests();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in rejecting staff toner request');
            }
        });
    }
});

//STAFF TONER ALLOCATION LIST
function showAllStaffTonerAllocation(){
    $.ajax({
        url: 'data/all_toner_staff_confirmation.php',
        success: function (data) {
            $('#all-confirm-toner-cartridge-allocation').html(data);
        },
        error: function(){
            alert('Error in showing toner allocation list');
        }
    });
}
showAllStaffTonerAllocation();

//STAFF TONER ALLOCATION CONFIRMATION
function confirmTonerStaffAlloc(staff_toner_id){
    $.ajax({
        url: 'data/get_toner_allocation_confirm.php',
        type: 'post',
        dataType: 'json',
        data: {
            staff_toner_id:staff_toner_id
        },
        success: function (data) {
            $('#submit-confirm-toner-allocation').val(data.event);
            $('#confirm-toner-allocation-model').val(data.tonerConfirmModel);
            $('.confirm-toner-allocation-model-display').html(data.tonerConfirmModel);
            $('.confirm-toner-allocation-model-quantity').html(data.tonerConfirmQty);
            $('#confirm-toner-allocation-id').val(data.id);
            $('.confirm-toner-allocation-appli-date').html(data.tonerAllocated);
            // $('#brand').val(data.tonerConfirmRegion);
            $('#confirm-toner-allocation-pfnamba').val(data.tonerConfirmPFNo);
            $('#modal-confirm-toner-allocation').find('.modal-title').text(data.title);
            $('#modal-confirm-toner-allocation').modal('show');
        },
        error: function(){
            alert('Error in retrieving toner allocation request');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-confirm-toner-allocation', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-confirm-toner-allocation').val();
    var toner_staff_alloc_id = $('#confirm-toner-allocation-id').val();
    var toner_staff_alloc_pfnamba = $('#confirm-toner-allocation-pfnamba').val();
    var toner_staff_alloc_model = $('#confirm-toner-allocation-model').val();
    var toner_staff_alloc_text = $('#confirm-toner-allocation-text').val();
    var toner_staff_alloc_text_date = $('#confirm-toner-allocation-date').val();
    // var grams = $('#grams').val();
    // var grams = $('#grams').val();

    if(submit  == "stafftonerallocconfirm"){
        $.ajax({
            url: 'data/saving_confirm_allocation.php',
            type: 'post',
            dataType: 'json',
            data: {
                toner_staff_alloc_id:toner_staff_alloc_id,
                toner_staff_alloc_pfnamba:toner_staff_alloc_pfnamba,
                toner_staff_alloc_model:toner_staff_alloc_model,
                toner_staff_alloc_text:toner_staff_alloc_text,
                toner_staff_alloc_text_date:toner_staff_alloc_text_date
            },
            success: function (data) {
                if(data.valid == true){
                    $('#modal-message').find('#msg-body').text(data.msg);
                    $('#modal-confirm-toner-allocation').modal('hide');
                    showAllStaffTonerAllocation();
                    $('#modal-message').modal('show');
                }
            },
            error: function(){
                alert('Error in showing toner to confirm');
            }
        });
    }
});


//FINALIZE TONNER ALLOCATION PROCESS
function showAllFinalizeTonerRequest(){
    $.ajax({
        url: 'data/all_finalize_toner_req.php',
        success: function (data) {
            $('#all-finalize-toner-req').html(data);
        },
        error: function(){
            alert('Error in showing all toner request');
        }
    });
}
showAllFinalizeTonerRequest();

//FINALIZE TONNER BUTTON
function finalizeTonerStaffAlloc(staff_toner_id){
    $.ajax({
        url: 'data/get_finalize_toner.php',
        type: 'post',
        dataType: 'json',
        data: {
            staff_toner_id:staff_toner_id
        },
        success: function (data) {
            $('#submit-finalize-toner').val(data.event);
            $('#finalize-toner-pfnamba1').val(data.tonerfinalpfnumber);
            // $('.item-name').html(data.tonerfinalpfnumberf);
            $('#finalize-toner-id').val(data.id);
            $('#finalize-toner-model1').val(data.tonerfinalmodelf);
            $('.finalize-toner-model').html(data.tonerfinalmodel);
            $('.finalize-toner-quantity').html(data.tonerfinalquantity);
            $('.finalize-toner-fullname').html(data.tonerfinalfname+'  '+data.tonerfinalmname+' '+data.tonerfinallname);
            $('#modal-it-finalize-toner').find('.modal-title').text(data.title);
            $('#modal-it-finalize-toner').modal('show');
        },
        error: function(){
            alert('Error in fetching final staff toner details');
        }
    });
}//end editModal

//save edit modal
$(document).on('submit', '#form-finalize-toner', function(event) {
    event.preventDefault();
    /* Act on the event */
    var submit = $('#submit-finalize-toner').val();
    var toner_id = $('#finalize-toner-id').val();
    var toner_fpno = $('#finalize-toner-pfnamba1').val();
    var toner_allocated_on = $('#finalize-tonerallocated-on').val();
    var toner_alloc_yes = $('#finalize-toner-text').val();
    var toner_alloc_model = $('#finalize-toner-model1').val();

    if(submit  == "finalizetoner"){
        $.ajax({
            url: 'data/saving_finalize_toner.php',
            type: 'post',
            dataType: 'json',
            data: {
                toner_id:toner_id,
                toner_fpno:toner_fpno,
                toner_allocated_on:toner_allocated_on,
                toner_alloc_yes:toner_alloc_yes,
                toner_alloc_model:toner_alloc_model
            },
            success: function (data) {
                    // console.log(data);
                    if(data.valid == true){
                        $('#modal-message').find('#msg-body').text(data.msg);
                        $('#modal-it-finalize-toner').modal('hide');
                        showAllFinalizeTonerRequest();
                        $('#modal-message').modal('show');
                    }
                },
                error: function(){
                    alert('Error in finalize staff toner request');
                }
            });
    }
});

//ALLOCATED TONER STAFFS
function showAllTonerStaffAllocation(){
    $.ajax({
        url: 'data/all_staff_toner_allocation.php',
        success: function (data) {
            $('#all-staff-allocated-toners').html(data);
        },
        error: function(){
            alert('Error in showing all toner allocation');
        }
    });
}
showAllTonerStaffAllocation();

function showAllStaffAllocatedToner(){
    $.ajax({
        url: 'data/all_staff_allocated_toners.php',
        success: function (data) {
            $('#all-staff-toners-alloc').html(data);
        },
        error: function(){
            alert('Error in showing all toner allocation');
        }
    });
}
showAllStaffAllocatedToner();


//RECORD MANTAINED DEVICES
function showAllRecordMantainedDevices(){
    $.ajax({
        url: 'data/all_record_mantained_devices.php',
        success: function (data) {
            $('#all-mantained-assets').html(data);
        },
        error: function(){
            alert('Error in showing mantained devices form');
        }
    });
}
showAllRecordMantainedDevices();


//ALL DEVICE ALLOCATION LIST
function showAlAllocationListsStaff(){
    $.ajax({
        url: 'data/all_allocation_list.php',
        success: function (data) {
            $('#all-staffs-device-alloc').html(data);
        },
        error: function(){
            alert('Error: in showing all total allocation staffs with devices');
        }
    });
}//end showAlAllocationListsStaff
showAlAllocationListsStaff();


function viewOtherAllocatedAssetSpec(staff_appli_id){
    $.ajax({
        url: 'data/get_all_alloc_asset_spec.php',
        type: 'post',
        dataType: 'json',
        data: {
            staff_appli_id:staff_appli_id
        },
        success: function (data) {
            $('#more-alloc-it-asset-submit').val(data.event);
            $('.more-alloc-it-asset-desgnation').html(data.moreallocDesignation+' - '+data.moreallocRegion);
            $('.more-alloc-it-asset-staff-department').html(data.moreallocDepartment);
            $('.more-alloc-it-asset-dev-name').html(data.moreallocDeviceName);
            $('.more-alloc-it-asset-devtype').html(data.moreallocDeviceType);
            $('#more-alloc-it-asset-ids').val(data.moreallocID);
            $('.more-alloc-it-asset-capacity').html(data.moreallocCapacity);
            $('.more-alloc-it-asset-staff-name').html(data.moreallocFName+'  '+data.moreallocSName+'  '+data.moreallocSurname);
            $('.more-alloc-it-asset-serialnumber').html(data.moreallocSNo);
            $('.more-alloc-it-asset-model').html(data.moreallocModel);
            $('.more-alloc-it-asset-brand').html(data.moreallocBrand);
            $('.more-alloc-it-asset-ram').html(data.moreallocRAM);
            $('.more-alloc-it-asset-processor').html(data.moreallocProcessor);
            $('.more-alloc-it-asset-storage').html(data.moreallocStorage);
            $('#modal-view-staff-asset-alloc-details').find('.modal-title').text(data.title);
            $('#modal-view-staff-asset-alloc-details').modal('show');
        },
        error: function(){
            alert('Error in viewing more allocation details');
        }
    });
}


// VIEW STAFF'S STATUS ACCROSS HIS DEPARTMENT
function showAllDeptStaffsStatus()
{
    $.ajax({
            url: 'data/all_dept_staffs_status.php',
            success: function (data) {
                $('#all-staffs-status-dept').html(data);
            },
            error: function(){
                alert('Error: in showing requests status of staffs on your department');
            }
        });
}//end showAllDeptStaffsStatus
showAllDeptStaffsStatus();

// ALL DASHBOARD
function showAllDashboard(){
    $.ajax({
            url: 'data/all_dashboard.php',
            success: function (data) {
                $('#all-dashboard').html(data);
            },
            error: function(){
                // alert('Error in showing dashboard');
            }
        });
}//end showAlldASHBOARD
showAllDashboard();
