<?php
// includes/db.php
include_once 'config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Error de connexió a la base de dades: " . $e->getMessage(), 3, "../logs/error.log");
    die("Error de connexió a la base de dades");
}
?>
