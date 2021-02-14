window.onload = function() {
    
    // CHANGE DROPDOWN DIRECTION
    if (document.getElementById("dropdown_usuario")) {
        
        let dropdown_usuario = document.getElementById("dropdown_usuario");
        
        if (window.innerWidth < 768) {
            
            if (dropdown_usuario.classList.contains("dropleft")) {
                dropdown_usuario.classList.remove("dropleft")
            }
            
        } else {
            
            if (!dropdown_usuario.classList.contains("dropleft")) {
                dropdown_usuario.classList.add("dropleft");
            }
        }
    }
    
    // CHANGE DROPDOWN DIRECTION ON RESIZE
    window.addEventListener("resize", function () {
        
        if (document.getElementById("dropdown_usuario")) {
            
            let dropdown_usuario = document.getElementById("dropdown_usuario");
            
            if (this.innerWidth < 768) {
                
                if (dropdown_usuario.classList.contains("dropleft")) {
                    dropdown_usuario.classList.remove("dropleft")
                }
                
            } else {
                if (!dropdown_usuario.classList.contains("dropleft")) {
                    dropdown_usuario.classList.add("dropleft");
                }
            }
        }
    });
    
    // ALERT CLOSE
    if (document.getElementsByClassName("alert").length >= 1) {
        
        let arr_alert = document.getElementsByClassName("alert");
        
        for (let i = 0; i < arr_alert.length; i++) {
            
            arr_alert[i].addEventListener("click", function () {
                $(this).hide(1000, function () {
                    $(this).remove();
                });
            });
            
            // arr_alert[i].style.WebkitAnimation = "esconder_alert 0s 6s ease 1 forwards";
            // arr_alert[i].style.animation = "esconder_alert 0s 6s ease 1 forwards";
            
            arr_alert[i].classList.add("esconder_alert");
            
            arr_alert[i].addEventListener("webkitAnimationEnd", function() {
                $(this).hide(1000, function () {
                    $(this).remove();
                });
            });
            
            arr_alert[i].addEventListener("animationend", function() {
                $(this).hide(1000, function () {
                    $(this).remove();
                });
            });
        }
    }
}