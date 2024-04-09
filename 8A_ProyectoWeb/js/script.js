
    const agregarBtn = document.getElementById('agregarBtn');
    const personajesLista = document.getElementById('personajesLista');

    agregarBtn.addEventListener('click', agregarPersonaje);
    limpiarBtn.addEventListener('click', limpiarLista);

    function agregarPersonaje() {
        fetch('https://rickandmortyapi.com/api/character/')
            .then(response => response.json())
            .then(data => {
                const personajes = data.results;
                const randomIndex = Math.floor(Math.random() * personajes.length);
                const personaje = personajes[randomIndex];
    
                // Crear un contenedor para la tarjeta de personaje
                const characterCard = document.createElement('div');
                characterCard.classList.add('character-container'); // Agregar clase para la tarjeta de personaje
    
                // Crear la imagen del personaje
                const img = document.createElement('img');
                img.src = personaje.image;
                img.classList.add('character-img'); // Agregar clase para la imagen del personaje
    
                // Agregar la imagen a la tarjeta de personaje
                characterCard.appendChild(img);
    
                // Crear un div para contener la información del personaje
                const infoContainer = document.createElement('div');
                infoContainer.classList.add('character-info'); // Agregar clase para el contenedor de información del personaje
    
                // Crear el texto con la información del personaje
                infoContainer.innerHTML = `
                    <strong>ID: ${personaje.id}</strong><br>
                    Nombre: ${personaje.name}<br>
                    Estado: ${personaje.status}<br>que 
                    Origen: ${personaje.origin.name}<br>
                    Episodios: ${personaje.episode.length}
                `;
    
                // Agregar el contenedor de información a la tarjeta de personaje
                characterCard.appendChild(infoContainer);
    
                // Agregar la tarjeta de personaje a la lista de personajes
                personajesLista.appendChild(characterCard);
            })
            .catch(error => console.error('Error al obtener datos:', error));
    }
    function limpiarLista() {
        personajesLista.innerHTML = '';
    }
