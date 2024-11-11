<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../includes/config.php';

try {
    // Configuració de la connexió sense dades sensibles
    $dsn = "mysql:host=HOST;dbname=DB_NAME;charset=utf8mb4"; // Substituir HOST i DB_NAME
    $pdo = new PDO($dsn, 'USER', 'PASS'); // Substituir USER i PASS
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexió exitosa!";
    
    // Intentar una consulta simple
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $count = $stmt->fetchColumn();
    echo "<br>Número d'usuaris a la base de dades: " . $count;
    
} catch (PDOException $e) {
    echo "Error de connexió: " . $e->getMessage();
    die();
}