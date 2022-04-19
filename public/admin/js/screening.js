var current =  $('.step.active').length;

if(current == 2){
    userId = [];
    TeachingDemoMessage = $('#teaching-demo-message').val();

    $("input:checkbox[name=user-chk]" ).change(function(){
      userId = [];


        $('input:checkbox[name=user-chk]:checked').each(function(){

            userId.push(parseInt($(this).val()));
            
        });


    });
    $('#interview-send').click(function(){
      message = $('#interview-message').val();

      screeningType = 'interview'
      $('#interview-send').attr("disabled", true);
        console.log(message);
        $.ajax({
            url: "process/screening/send",
            type:"POST",
            data:{
              userID : userId,
              message : message,
              type : screeningType,
            },
            success:function(response){
              $('#interview-send').attr("disabled", false);

  
              location.reload();
            },
            error: function(error) {
            console.log(error);
            }
          });
    });//btn

    $('#teaching-demo-send').click(function(){
      message = $('#teaching-demo-message').val();

      screeningType = 'teaching-demo'
      $('#teaching-demo-send').attr("disabled", true);
        console.log(message);
        $.ajax({
            url: "process/screening/send",
            type:"POST",
            data:{
              userID : userId,
              message : message,
              type : screeningType,
            },
            success:function(response){
              $('#teaching-demo-send').attr("disabled", false);

  
              location.reload();
            },
            error: function(error) {
            console.log(error);
            }
          });
    });//btn

    //skilltest
    $('#skill-test-send').click(function(){
      message = $('#skill-test-message').val();

      screeningType = 'skill-test'
      $('#skill-test-send').attr("disabled", true);
        console.log(message);
        $.ajax({
            url: "process/screening/send",
            type:"POST",
            data:{
              userID : userId,
              message : message,
              type : screeningType,
            },
            success:function(response){
              $('#skill-test-send').attr("disabled", false);

  
              location.reload();
            },
            error: function(error) {
            console.log(error);
            }
          });
    });//btn
    

  }
  