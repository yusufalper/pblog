$("#showbutton").on("click", function() {
    if($('#com').css('display') == 'none'){
      $('#com').css('display','block');
      $("#showbutton").html('Hide Comment Area');
    }else{
      $('#com').css('display','none');
      $("#showbutton").html('Add a comment');
    }
  })
  