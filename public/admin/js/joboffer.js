var current =  $('.step.active').length;
console.log(current);
rankedId = [];

if(current == 4){
  calc = JSON.parse($(".userID").val());
  for (var i = 0; i < calc.length; i++) {

      $("input:checkbox[name=applicant-" + calc[i] + "]" ).change({calc: calc[i]}, function(event){

      // console.log('input:checkbox[name=applicant-' + event.data.calc + ']:checked');
  
          $('input:checkbox[name=applicant-' + event.data.calc + ']:checked').each(function(){
              // rankedId = [];
  
              rankedId.push(parseInt($(this).val()));
              //wlay value si check box 
              
          });
      });
  }
  
  $('#joboffer-click').click(function(){
    $('#joboffer-click').attr("disabled", true);
      message = $('#messageBody').val();
      console.log(message);
      $.ajax({
          url: "process/joboffer/send",
          type:"POST",
          data:{
            userID : rankedId,
            message : message,
          },
          success:function(response){
            console.log(response);
            $('#joboffer-click').attr("disabled", false);

            location.reload();
          },
          error: function(error) {
          console.log(error);
          }
        });
  });
}
