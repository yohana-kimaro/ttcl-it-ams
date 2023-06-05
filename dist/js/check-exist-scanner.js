function serialNoScannerAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check/check_serial_availability_sc.php",
      data:'scannerserialNo='+$("#scannerserialNo").val(),
      type: "POST",
      success:function(data){
        $("#scanner-availability-serial-no").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }