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

function validateTel() {
    if (document.getElementById("num_tlf").value.length > 9 || document.getElementById("num_tlf").value.length < 9) {
        document.getElementById("tel_error").innerHTML = "Introduce un formato de teléfono valido";
    } else {
        document.getElementById("tel_error").innerHTML = "";
    }
}

function validateData() {
    var fecha = document.getElementById("fecha").value;
    calcularEdad(fecha);
    var edad = calcularEdad(fecha);

    if (edad > 110) {
        // aqui haces lo que quieras con la validacion de si es mayor a 15
        document.getElementById("data_error").innerHTML = "Introduce una edad valida";
    } else if (edad < 16) {
        document.getElementById("data_error").innerHTML = "No puedes ser menor de 15 años";
    } else {
        document.getElementById("data_error").innerHTML = "";
    }

    function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }

        return edad;
    }
}