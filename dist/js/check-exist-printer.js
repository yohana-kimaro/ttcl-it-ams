function serialNoPrinterAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check/check_serial_no_printer_availability.php",
      data:'printerserialNo='+$("#printerserialNo").val(),
      type: "POST",
      success:function(data){
        $("#printer-availability-serial-no").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }