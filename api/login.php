<?php
// api/login.php
session_start();
include_once '../includes/db.php';
include_once '../includes/functions.php';

echo "Login.php ejecutado";  // Agregar este mensaje para ver si se ejecuta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Solicitud POST recibida";  // Ver si llega la solicitud POST

    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Usuario: $username";  // Mostrar el nombre de usuario recibido

    if (verify_user($username, $password)) {
        $_SESSION['username'] = $username;
        echo "Usuario verificado";  // Confirmación de verificación
        header('Location: ../public/dashboard.php');
        exit();
    } else {
        echo "Error: credenciales inválidas";  // Mensaje en caso de fallo
        header('Location: ../public/login.php?error=invalid_credentials');
        exit();
    }
}
?>
