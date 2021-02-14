window.onload = function () {
    
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
}
