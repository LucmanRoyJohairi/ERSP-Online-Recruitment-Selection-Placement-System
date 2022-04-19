

$(document).ready(function(){
  
  
  $.ajaxSetup({
    
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  
  
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current =  $('.step.active').length;
  var steps = $(".active").length;
  let active = $(".active").length;
  setProgressBar(current);
  current_fs = $(this).parent();

  $(".next").click(function(){
    // $('.spinner').show();
  var spinner = '<div class="spinner-border" role="status"><span class="sr-only"></span></div>';
  $(".next").html(spinner);
  let active = $(".step.active").length;
      
  next_fs = $(this).parent().next();

  $("#progressbar li").eq(active).addClass("active");

  next_fs.show();
  current_fs.animate({opacity: 0}, {
  step: function(now) {
  opacity = 1 - now;

  current_fs.css({
  'display': 'none',
  'position': 'relative'
  });
  next_fs.css({'opacity': opacity});
  },
  duration: 500
  });
  setProgressBar(++current);
  if(active == 1){
    // shortlist filter
    var tableData = [];
    let appIds = [];

    $("#shortlistTable tbody tr").each(function(){
      appIds = [];

      var currRow = $(this);
      var col1 = currRow.find("td:eq(0)").text();
      var obj = {};
      obj.id = col1;
      tableData.push(obj);
      for(var i=0; i<tableData.length; i++){
        appIds.push(tableData[i].id);
      }



    });//each

    $.ajax({
      url: "process/next/shortlist/add",
      type:"POST",
      data:{
        appID: appIds,
      },
      success:function(response){
        console.log(response);
        // if(response) {
        //   $('.success').text(response.success);
        
        // }
      },
      error: function(error) {
      console.log(error);
      }
    });//ajax
  }
  $("input[name='next']").attr("disabled", true);
  
  
        $.ajax({
          url: "process/next",
          type:"POST",
          data:{
            numOfActive: active + 1,
            
          },
          success:function(response){
            console.log(response);
            $("input[name='next']").attr("disabled", false);
            // $(".next").html('');

            // $('.spinner').hide();
            location.reload();

            // if(response) {
            //   $('.success').text(response.success);
            
            // }
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
          
        });
        
  });//next

 

  function setProgressBar(curStep){
  var percent = parseFloat(100 / 6) * curStep;

  percent = percent.toFixed();
  $(".progress-bar")
  .css("width",percent+"%")
  }

  $(".submit").click(function(){
  return false;
  })
    
  });//doc ready

  
 

//checklist
// if(current == 2){

  //Step 2 screening
  var checks = document.getElementsByName('checkme');
  var checkBoxList = document.getElementById('checkBoxList');
  var sendbtn = document.getElementById('sendNewSms');

  // function allTrue(nodeList) {
  //   for (var i = 0; i < nodeList.length; i++) {
  //     if (nodeList[i].checked === false) return false;
  //   }
  //   return true;
  // }

  $('.checklists').change(function() {
    if ($('.checklists:checked').length == $('.checklists').length) {
      //do something
    sendbtn.disabled = false;

  }else{
    sendbtn.disabled = true;

  }
  });


  //Step 5
  var btn;

  // var changed = function() {
  //   //get the length of non checked boxes
  //   var disbl = $('input[id^=f_agree]:not(:checked)').length;
  //   btn.prop('disabled', disbl);//disable if true, else enable
  // };


  // $(function() {
  //   btn = $('#acceptbtn');
  //   $('input[id^=f_agree]').on('change', changed).trigger('change');
  // });
// }

function initializeAjaxRequest(url, method, callback){
  $.ajax({
          
    url: url,
    type:method,
    data:{
      numOfActive: active + 1,
      
    },
    success:function(response){
      callback(response);
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
    
  });
}