<?php

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost','root','root','proyecto_8a');

    if(!$db){
        echo'Error no se pudo conectar';
        exit;
    }

    return $db;
}