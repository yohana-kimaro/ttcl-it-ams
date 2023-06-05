
function serialNoAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check/check_serial_no_availability.php",
      data:'computerserialNo='+$("#computerserialNo").val(),
      type: "POST",
      success:function(data){
        $("#serialno-availability-serial-no").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }