function validar_registro() {
    
    validar_registro_nombre();
    validar_registro_apellidos();
    validar_registro_email();
    validar_registro_contraseña();
    validar_registro_contraseña_repetida();
    
    if (validar_registro_nombre() == false || validar_registro_apellidos() == false || validar_registro_email() == false || validar_registro_contraseña() == false || validar_registro_contraseña_repetida() == false) {
        // No hacer nada
    } else {
        
        let email = document.getElementById("email").value;
        
        $.ajax({

            url: "/validar-registro-ajax",
            type: "POST",
            data: {'email': email},
            success: function (respuesta) {
                
                if (respuesta == "registroExito") {
                    document.getElementsByClassName("error_general")[0].innerHTML = "";
                    document.forms['form_registro'].submit();
                    
                } else {
                    document.getElementById("email").style.borderColor = "rgba(255, 0, 0, 0.6)";
                    document.getElementsByClassName("error_general")[0].innerHTML = respuesta;
                }
            }
        });
    }
}

function validar_registro_nombre() {
    
    try {
        let nombre = document.getElementById("nombre").value;
    
        if (nombre) {
            
            let patron = /^.+$/;
            
            if(patron.test(nombre)) {
                document.getElementById("nombre").style.borderColor = "";
                document.getElementsByClassName("error_nombre")[0].innerHTML = "";
                return true;
                
            } else {
                throw "Escribe un nombre válido";
            }
            
        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("nombre").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_nombre")[0].innerHTML = error;
        return false;
    }
    
    
}

function validar_registro_apellidos() {
    
    try {
        let apellidos = document.getElementById("apellidos").value;
        
        if (apellidos) {
            
            let patron = /^.+$/;
            
            if(patron.test(apellidos)) {
                document.getElementById("apellidos").style.borderColor = "";
                document.getElementsByClassName("error_apellidos")[0].innerHTML = "";
                return true;
            } else {
                throw "Escribe unos apellidos válidos";
            }
            
        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("apellidos").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_apellidos")[0].innerHTML = error;
        return false;
    }
    
    
}

function validar_registro_email() {
    
    try {
        let email = document.getElementById("email").value;
        
        if (email) {
            
            let patron = /^.+@.+\..+$/;
            
            if(patron.test(email)) {
                
                document.getElementById("email").style.borderColor = "";
                document.getElementsByClassName("error_email")[0].innerHTML = "";
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

// Validar contraseña
function validar_registro_contraseña() {
    
    try {
        let contraseña = document.getElementById("contraseña").value;
    
        if (contraseña) {
            
            let patron = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,25}$/;
            
            if(patron.test(contraseña)) {
                document.getElementById("contraseña").style.borderColor = "";
                document.getElementsByClassName("error_contraseña")[0].innerHTML = "";
                return true;
                
            } else {
                throw "Mínimo 8 carácters, 1 mínuscula, 1 mayúscula y 1 número";
            }
            
        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("contraseña").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_contraseña")[0].innerHTML = error;
        return false;
    }
    
    
}

// Validar contraseña repetida
function validar_registro_contraseña_repetida() {
    
    try {
        let contraseña = document.getElementById("contraseña").value;
        let contraseña_repetida = document.getElementById("contraseña_repetida").value;

        // Si no esta vacía
        if (contraseña_repetida) {
            
            if (contraseña == contraseña_repetida) {
                document.getElementById("contraseña_repetida").style.borderColor = "";
                document.getElementsByClassName("error_contraseña_repetida")[0].innerHTML = "";
                return true;

            } else {
                throw "La contraseña no coincide";
            }

        } else {
            throw "Este campo es obligatorio";
        }
        
    } catch(error) {
        document.getElementById("contraseña_repetida").style.borderColor = "rgba(255, 0, 0, 0.6)";
        document.getElementsByClassName("error_contraseña_repetida")[0].innerHTML = error;
        return false;
    }
}