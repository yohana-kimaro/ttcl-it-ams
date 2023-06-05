function nambaSerialAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "../../check/check_availability_ser_desk_modal.php",
      data:'updateITLaptopserialNo='+$("#updateITLaptopserialNo").val(),
      type: "POST",
      success:function(data){
        $("#ser-namba-availability").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }