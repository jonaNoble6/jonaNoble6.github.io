function validarRegistro() {
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var contrasena = document.getElementById('contrasena').value;
    var rol = document.getElementById('rol').value;

    if (nombre.trim() === '' || email.trim() === '' || contrasena.trim() === '' || rol.trim() === '') {
        alert('Todos los campos son obligatorios. Por favor, complete todos los campos.');
        event.preventDefault(); 
        return false;
    }

    var nombreRegex = /^[a-zA-Z\s]*$/;
    if (!nombreRegex.test(nombre)) {
        alert('El nombre solo puede contener letras y espacios.');
        event.preventDefault(); 
        return false;
    }

    if (contrasena.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(contrasena)) {
        alert('La contraseña debe tener al menos 8 caracteres y contener al menos un caracter especial.');
        event.preventDefault(); 
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingrese un correo electrónico válido.');
        event.preventDefault(); 
        return false;
    }

    if (rol !== '1' && rol !== '2' && rol !== '3') {
        alert('El número de rol debe ser 1, 2 o 3.');
        event.preventDefault();
        return false;
    }

    return true;
}