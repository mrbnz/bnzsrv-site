<?php
// includes/auth.php

function is_logged_in() {
    return isset($_SESSION['username']);
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
}
?>
