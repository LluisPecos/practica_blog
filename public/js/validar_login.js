function validar_login() {
    
    validar_login_email();
    validar_login_contraseña();
    
    if (validar_login_email() == false || validar_login_contraseña() == false) {
        // No hacer nada
    } else {
        
        let email = document.getElementById("email").value;
        let contraseña = document.getElementById("contraseña").value;
        
        $.ajax({
            
            url: "/validar-login-ajax",
            type: "POST",
            data: {'email': email, 'contraseña': contraseña},
            success: function (respuesta) {

                if (respuesta == "loginExito") {
                    document.getElementsByClassName("error_general")[0].innerHTML = "";
                    document.forms["form_login"].submit();
                    
                } else if(respuesta == "Dirección de email no registrada") {
                    document.getElementById("email").style.borderColor = "rgba(255, 0, 0, 0.6)";
                    document.getElementsByClassName("error_general")[0].innerHTML = respuesta;
                } else {
                    document.getElementById("contraseña").style.borderColor = "rgba(255, 0, 0, 0.6)";
                    document.getElementsByClassName("error_general")[0].innerHTML = respuesta;
                }
            }
        });
    }
}

function validar_login_email() {
    
    try {
        
        let email = document.getElementById("email").value;
        
        if (email) {
            
            let patron = /^.+@.+\..+$/;
            
            if(patron.test(email)) {
                
                document.getElementById("email").style.borderColor = "";
                document.getElementsByClassName("error_email")[0].innerHTML = "";
                validar_login_contraseña();
                return true;
                
            } else {
                throw "Introduce un email válido";
            }
            
        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("email").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_email")[0].innerHTML = error;
        return false;
    }
}

function validar_login_contraseña() {
    
    try {
        
        let email = document.getElementById("email").value;
        let contraseña = document.getElementById("contraseña").value;
        
        if (contraseña) {
            
            document.getElementById("contraseña").style.borderColor = "";
            document.getElementsByClassName("error_contraseña")[0].innerHTML = "";
            return true;
            
        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("contraseña").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_contraseña")[0].innerHTML = error;
        return false;
    }
}