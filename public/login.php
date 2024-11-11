<?php
session_start();
// Si ja hi ha una sessió activa, redirigeix directament al dashboard
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessió - bnzsrv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../public/img/favicon.ico" sizes="512x512">

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            background-color: #1a1a1a;
            color: #ffffff;
        }
        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-control {
            background-color: #2b2b2b;
            border-color: #404040;
            color: #ffffff;
        }
        .form-control:focus {
            background-color: #2b2b2b;
            border-color: #0d6efd;
            color: #ffffff;
        }
        .form-floating label {
            color: #999;
        }
        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            color: #0d6efd;
        }
        .text-body-secondary {
            color: #999 !important;
        }
        a {
            color: #0d6efd;
        }
        a:hover {
            color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form id="loginForm" class="text-center">
                <img class="mb-4" src="img/favicon.ico" alt="Logotip" width="72">
                <h3 class="h3 mb-3 fw-normal text-white font-monospace">Iniciar Sessió - bnzsrv</h3>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" required>
                    <label for="floatingInput">Nom d'usuari</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password" required>
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <div class="form-check text-start my-3">
                </div>

                <button type="submit" class="btn btn-primary">Iniciar sesión</button>

                <div class="mt-3">
                    <a href="#" class="text-decoration-none" onclick="alert('Si has oblidat la contrasenya, si us plau, contacta amb l\'administrador.');">Has oblidat la contrasenya?</a>
                </div>

                <div class="mt-3">
                    <a href="index.html" class="text-decoration-none">Torna a l'index</a>
                </div>

                <p class="mt-5 mb-3 text-body-secondary">© 2024 bnzsrv - Tots els drets reservats</p>
            </form>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>