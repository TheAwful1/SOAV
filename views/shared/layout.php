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
    <a href="#" id="btnLogin">Iniciar Sesion</a>
    <a href="#" id="btnRegister">Registrarme</a>
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
