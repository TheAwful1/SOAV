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
 <?php if (!$user): ?>
            <!-- GUEST -->
            <a href="#" onclick="cargarVista('Auth','ViewLogin')">Iniciar sesión</a>
            <a href="#" onclick="cargarVista('Auth','ViewRegister')">Registrarse</a>

        <?php elseif ($user['role'] === 'user'): ?>
            <!-- USER -->
            <a href="#" onclick="cargarVista('User','account')">Mi cuenta</a>
            <a href="#" onclick="cargarVista('Reservas','Reservar')">Reservar</a>
            <a href="#" onclick="cargarVista('Payment','PagoVehiculo')">Pagos</a>
            <a href="#" onclick="logout()">Cerrar sesión</a>

        <?php elseif ($user['role'] === 'admin'): ?>
            <!-- ADMIN -->
            <a href="#" onclick="cargarVista('Admin','dashboard')">Dashboard</a>
            <a href="#" onclick="cargarVista('Admin','vehicles')">Vehículos</a>
            <a href="#" onclick="cargarVista('Admin','bookings')">Reservas</a>
            <a href="#" onclick="cargarVista('Admin','usuarios')">Usuarios</a>
            <a href="#" onclick="cargarVista('Admin','reports')">Reportes</a>
            <a href="#" onclick="logout()">Cerrar sesión</a>
        <?php endif; ?>
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
