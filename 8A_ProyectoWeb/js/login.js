function validarLogin() {
    var email = document.getElementById('email').value;
    var contrasena = document.getElementById('contrasena').value;

    // Verificar si algún campo está vacío
    if (email.trim() === '' || contrasena.trim() === '') {
        alert('Ambos campos son obligatorios. Por favor, complete todos los campos.');
        event.preventDefault(); // previene que se envie la peticion al servidor
        return false;
    }

    // Verificar longitud mínima y caracter especial en la contraseña
    if (contrasena.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(contrasena)) {
        alert('La contraseña debe tener al menos 8 caracteres y contener al menos un caracter especial.');
        event.preventDefault(); // previene que se envie la peticion al servidor
        return false;
        
    }

    // Verificar si el email tiene un formato válido (usando una expresión regular simple)
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingrese un correo electrónico válido.');
        event.preventDefault(); // previene que se envie la peticion al servidor
        return false;
        
    }

    // Si todas las validaciones pasan, permitir el envío del formulario
    
    return true;
}
