<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Mi Aplicación" ?></title>
    <link rel="stylesheet" href="/SOAV/public/css/styles.css">
</head>

<body>

<header>
<h1><a href="#" id="btnHome">SOAV</a></h1> <!-- Reemplazar con una imagen mas adelante-->
</header>

<nav>
    <a href="#" id="btnDashboard">Dashboard</a>
    <a href="#" id="btnSolicitudes">Solicitudes</a>    
    <a href="#" id="btnReportes">Reportes</a>    
    <a href="#" id="btnSolicitudes">Usuarios</a>    <!--El admin tiene acceso a las reservas de la pagina de cada usuario -->
    <a href="#" id="btnSolicitudes">Vehiculos</a>
</nav>

<main id="content">
    <?= $content ?>   <!-- Aquí se inyecta la vista -->
</main>

<footer>
    <p>© 2025 - Awful Industries</p>
</footer>

<script src="/SOAV/public/app.js"></script>
</body>
</html>
