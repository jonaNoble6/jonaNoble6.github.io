// main.js
var personajesGuardados = [];  // Almacena los personajes agregados

function obtenerDatos() {
    var url = 'https://rickandmortyapi.com/api/character/?page=19';

    return fetch(url)
        .then(response => response.json())
        .then(data => data.results)
        
        .catch(error => {
            console.error('Error:', error);
            return [];
        });
        
    
}


function mostrarPersonajes(personajes) {
    var listaPersonajes = document.getElementById('personajes');
    personajes.forEach(personaje => {
        var div = document.createElement('div'); // Cambiar 'li' por 'div'
        div.classList.add('character-container'); // Agregar la clase para el contenedor de personaje
        var img = document.createElement('img');
        img.src = personaje.image;
        img.classList.add('character-img'); // Agregar la clase para la imagen del personaje
    
        var info = document.createElement('div');
        info.classList.add('character-info'); // Clase para la información del personaje
        var colorTexto = '';
        switch (personaje.status) {
            case 'Alive':
                colorTexto = 'lightgreen';
                break;
            case 'Unknown':
                colorTexto = 'gray';
                break;
            case 'Dead':
                colorTexto = 'red';
                break;
            default:
                colorTexto = 'white';
        }
        info.innerHTML = `
            <strong>ID: ${personaje.id}</strong><br>
            <strong>Nombre: </strong>${personaje.name}<br>
            <strong>Estado: <span style="color: ${colorTexto}; display: inline-block;"> ${personaje.status}</span></strong><br>
            <strong>Origen: </strong>${personaje.origin.name}<br>
            <strong>Episodios: </strong>${personaje.episode.length}
            
        `;
        
        //personaje.status.style.color === 'Alive' ? 'green' : 'black';
        div.appendChild(img); // Cambiar 'li' por 'div'
        div.appendChild(info); // Cambiar 'li' por 'div'
        listaPersonajes.appendChild(div); // Cambiar 'li' por 'div'
    });

    // Mostrar la lista después de cargar los personajes
    listaPersonajes.style.display = 'flex'; // Cambiar 'block' por 'flex'

}


function mostrarLista() {
    obtenerDatos()
        .then(personajes => {
            // Guardar personajes en la lista global
            personajesGuardados = personajes;
            mostrarPersonajes(personajesGuardados);
        })
        .catch(error => console.error('Error al obtener datos:', error));
}



function borrarLista() {
    // Limpiar la lista y resetear el array de personajes guardados
    var listaPersonajes = document.getElementById('personajes');
    var listaPersonajes2 = document.getElementById('personajesLista');
    listaPersonajes.innerHTML = '';
    listaPersonajes2.innerHTML = '';
    personajesGuardados = [];
    listaPersonajes.style.display = 'none';

}
