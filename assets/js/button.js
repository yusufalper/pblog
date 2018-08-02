$("#showbutton").on("click", function () {
  if ($('#com').css('display') == 'none') {
    $('#com').css('display', 'block');
    $("#showbutton").html('Hide Comment Area');
  } else {
    $('#com').css('display', 'none');
    $("#showbutton").html('Add a comment');
  }
})

$("#showbuttonup").on("click", function () {
  if ($('#comup').css('display') == 'none') {
    $('#comup').css('display', 'block');
    $("#showbuttonup").html('Hide Update Area');
  } else {
    $('#comup').css('display', 'none');
    $("#showbuttonup").html('Update Content');
  }
})