
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

                const li = document.createElement('li');
                const img = document.createElement('img');
                img.src = personaje.image;
                img.alt = personaje.name;

                const texto = document.createElement('span');
                texto.textContent = `${personaje.name} - ${personaje.species}`;

                li.appendChild(img);
                li.appendChild(texto);
                personajesLista.appendChild(li);
            })
            .catch(error => console.error('Error al obtener datos:', error));
    }

    function limpiarLista() {
        personajesLista.innerHTML = '';
    }
