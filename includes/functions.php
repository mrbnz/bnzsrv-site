<?php
// includes/functions.php

function verify_user($username, $password) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch();
    if ($user && $password === $user['password']) {
        return true;
    }
    return false;
}

?>
