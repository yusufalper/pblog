function showFunction() {
  var x = document.getElementById("com");
  if (x.style.display === "none") {
      x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
// <script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/control.js" language="javascript"></script>

var password = document.getElementById("newpassword")
  , cpassword = document.getElementById("cnewpassword");

function validatePassword(){
  if(password.value != cpassword.value) {
    cpassword.setCustomValidity("Passwords Don't Match");
  } else {
    cpassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
cpassword.onkeyup = validatePassword;