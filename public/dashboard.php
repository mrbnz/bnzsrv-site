<?php
session_start();

// Verifica si hi ha una sessió activa
if (isset($_SESSION['username'])) {
    // Si ja està autenticat, continua amb el dashboard
} else {
    // Si no hi ha sessió, redirigeix a login
    header('Location: login.php');
    exit();
}

// Funció per obtenir els últims logs
function getLogs($num_lines = 10) {
    $log_file = '../logs/access.log';
    if (!file_exists($log_file)) {
        return [];
    }
    $logs = file($log_file);
    return array_slice($logs, -$num_lines);
}

// Funció per registrar la informació de l'usuari
function registrarAcces() {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $username = $_SESSION['username'];
    $data_acces = date('Y-m-d H:i:s');
    
    // Format del registre
    $log_entry = sprintf(
        "[%s] User: %s | IP: %s\n",
        $data_acces,
        $username,
        $ip_address
    );
    
    // Ruta al fitxer de log
    $log_file = '../logs/access.log';
    
    // Comprova si el directori existeix
    $log_dir = dirname($log_file);
    if (!is_dir($log_dir)) {
        mkdir($log_dir, 0755, true);
    }
    
    // Registra la informació
    file_put_contents($log_file, $log_entry, FILE_APPEND);
}

// Crida la funció
registrarAcces();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registre d'Accessos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" sizes="512x512">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Registre d'IPs</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../api/logout.php" onclick="return confirm('Estàs segur que vols tancar la sessió?');">Tancar Sessió</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Últims Accessos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Usuari</th>
                                        <th>IP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $logs = getLogs();
                                    foreach ($logs as $log) {
                                        if (preg_match('/\[(.*?)\] User: (.*?) \| IP: (.*?)$/', $log, $matches)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($matches[1]) . "</td>";
                                            echo "<td>" . htmlspecialchars($matches[2]) . "</td>";
                                            echo "<td>" . htmlspecialchars($matches[3]) . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
