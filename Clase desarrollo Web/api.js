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

    // Limpiar la lista antes de agregar nuevos elementos
    listaPersonajes.innerHTML = '';

    // Iterar sobre cada personaje en el array "personajes"
    personajes.forEach(personaje => {
        var li = document.createElement('li');
        li.innerHTML = `
            <strong>${personaje.name}</strong> (ID: ${personaje.id})<br>
            <img src="${personaje.image}" alt="${personaje.name}" style="max-width: 100px;">
        `;
        listaPersonajes.appendChild(li);
    });

    // Mostrar la lista después de cargar los personajes
    listaPersonajes.style.display = 'block';
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
