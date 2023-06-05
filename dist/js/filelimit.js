$('#lostRep').on('change',function(){
  for(var i=0; i< $(this).get(0).files.length; ++i){
    var file1 = $(this).get(0).files[i].size;
    if(file1){
      var file_size = $(this).get(0).files[i].size;
      if(file_size > 2000000){
        $('#error-message-loss-report').html("File uploaded size is larger than 2MB");
        $('#error-message-loss-report').css("display","block");
        $('#error-message-loss-report').css("color","red");
        $('#submit-request').prop('disabled',true);
      }else{
        $('#error-message-loss-report').css("display","none");
        $('#submit-request').prop('disabled',false);
      }
    }
  }
});