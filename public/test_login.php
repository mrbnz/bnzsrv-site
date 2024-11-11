<?php
include_once '../includes/db.php';
include_once '../includes/functions.php';

$username = ''; // Nom d'usuari a verificar
$password = ''; // La contrasenya no s'ha de mostrar en text pla

if (verify_user($username, $password)) {
    echo "Usuari verificat correctament";
} else {
    echo "Fallo en la verificació";
}
