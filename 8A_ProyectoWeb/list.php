<?php
    include'./includes/templates/header.php';

?>
<body class="list-page">
    <h1>Rick y Morty API</h1>
        <button class="btn btn-success" onclick="return mostrarLista()"> MOSTRAR TODOS</button> <!-- manda  a llamar el evento mostrarLista del archivo js -->

        <h1>Personajes de Rick and Morty</h1>
    <button class="btn btn-success" onclick="return mostrarLista()">Mostrar Lista</button>
    <button class="btn btn-success" onclick=" agregarPersonaje()">Agregar Personaje</button>
    <button class="btn btn-success" onclick="borrarLista()">Borrar Lista</button>
    <ul id="personajes" class="list-unstyled"></ul>
    <ul id="personajesLista" class="list-unstyled"></ul>
</body>
</html>