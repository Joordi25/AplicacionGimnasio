 function validatePassword() {
     if (document.getElementById("pass").value != document.getElementById("confirm_pass").value) {
         document.getElementById("password_error1").innerHTML = "Las contraseñas no coinciden";
         document.getElementById("password_error2").innerHTML = "Las contraseñas no coinciden";
     }
     if (document.getElementById("pass").value == document.getElementById("confirm_pass").value) {
         document.getElementById("password_error1").innerHTML = "";
         document.getElementById("password_error2").innerHTML = "";
     }
 }