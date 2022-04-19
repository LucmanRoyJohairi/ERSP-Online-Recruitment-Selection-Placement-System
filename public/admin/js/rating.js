// console.log('userID' + $(".userID").val());


// $(document).ready(function(){
var current =  $('.step.active').length;

if(current == 3){
  shortlists = $(".myformsz").length;

calc = JSON.parse($(".userID").val());
// $().show();
console.log('here'+ calc.length);

$('.show4').click(function(){
// $("#id-" + 6).toggle();
$(".educheck").attr("disabled", true);

  for (var i = 0; i < calc.length; i++) {
  console.log('i is'+ calc[i]);

    
    btnRate = "rate-btn-" + calc[i];

    if (this.id == btnRate) {
      totalScores = [];
      tswScores = [];
      expScores = [];
      potentialScores = [];
      interviewScore = 0;
      teachingDemoScore = 0;
      totalScores = [];
      eduScore = [];
      finalScore = 0;


      //education
      $("input:radio[name=educationRadio-" + calc[i] + "]").change(function(){
        if(parseInt($(this).val()) != 20){
          $(".educheck").attr("disabled", true);

        }else{
          $(".educheck").attr("disabled", false);
        }
        eduTotal = 0;
        eduScore = [];
        eduTotal += parseInt($(this).val());
        $("input:radio[name=educationRadio2-" + calc[i] + "]").change(function(){
          eduTotal += parseInt($("input:radio[name=educationRadio2-" + calc[i] + "]").val());

        });
        console.log(eduTotal);
        eduScore.push(eduTotal)

      });

      // $("input:checkbox[name=edu-check-" + calc[i] + "]" ).change({ calc: calc[i] }, function(event){

      //   eduTotal = 0;
      //   eduScore = [];
      //   here = 'input:checkbox[name=edu-check-' + event.data.calc + ']:checked';

      //   $('input:checkbox[name=edu-check-' + event.data.calc + ']:checked').each(function(){

      //     eduScore.push(parseInt($(this).val()));

      //   });
      
      // });
        //experience
      $("input:radio[name=experienceRadio-" + calc[i] + "]").change(function(){
        expScores = [];

        expScore = 0;
        expScore += parseInt($(this).val());
        expScores.push(expScore)
        
      });

        //training/seminar/workshop
        $("input:radio[name=tswradio-" +  calc[i] + "]").change(function(){
          tswScores = [];

          tswScore = 0;
          tswScore += parseInt($(this).val());
          tswScores.push(tswScore)
          
            
        });

        //interview
        $("#interview-submit-" + calc[i]).click({calc: calc[i]},function(event){
          interviewScore = 0;
          interviewScore += parseInt($("input[name=interviewScore-" + event.data.calc +"]").val());
        });

        //teaching-demo
        $("#teaching-demo-submit-"+ calc[i]).click({calc: calc[i]}, function(event){
          teachingDemoScore = 0;
          teachingDemoScore += parseInt($("input[name=teachingDemoScore-" + event.data.calc + "]").val());
        });

        //potential
        $("input:radio[name=potentialRadio-" + calc[i] + "]").change(function(){
          potentialScores = [];


          potentialScore = 0;
          potentialScore += parseInt($(this).val());
          potentialScores.push(potentialScore)
            
        });

        //toggle rate form
      $("#id-" + calc[i]).toggle();
      $('#calculate-score-' + calc[i]).click({calc: calc[i]},function(event){
        totalScores = [];
          totalScores.push(interviewScore);
          totalScores.push(teachingDemoScore);
          subTotal = 0;
          eduTotal = 0;


          for (var i = 0; i < eduScore.length; i++) {
              eduTotal += eduScore[i];
          }
          totalScores.push(eduTotal)

          //experience
          for (var i = 0; i < expScores.length; i++) {
            totalScores.push(expScores[i]);
          }

          //training/seminar/workshop
          for (var i = 0; i < tswScores.length; i++) {
            totalScores.push(tswScores[i]);
          }

          for (var i = 0; i < potentialScores.length; i++) {
            totalScores.push(potentialScores[i]);
          }

          for (var i = 0; i < totalScores.length; i++) {
            subTotal += totalScores[i];
          }
          finalScore = subTotal;

          $('#t-score-' + event.data.calc).text(subTotal);
        
      });// calculate score

      $('#post-score-'+ calc[i]).click({calc: calc[i]}, function(event){
        shortlistId = $('#shortlistId-' + event.data.calc).val()
      
        $.ajax({
          url: "process/rate",
          type:"POST",
          data:{
            shortlistId: shortlistId,
            score: finalScore,
          },
          success:function(response2){
            location.reload();

            console.log(response2);
            // if(response2) {
            //   $('.success').text(response2.success);
            
            // }
          },
          error: function(error) {
          console.log(error);
          }
        });
    
      })
    }//if
  }//for

});//rate-click



  
// });

}
