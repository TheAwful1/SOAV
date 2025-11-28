<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Mi Aplicación" ?></title>
    <link rel="stylesheet" href="/SOAV/public/css/styles.css">
</head>

<body>

<header>
    <h1>SOAV</h1>
</header>

<nav>
    <a href="/public/index.php">Inicio</a>
    <a href="/views/User/login.php">Iniciar Sesion</a>
    <a href="/views/User/register.php">Registrarme</a>
</nav>

<main>
    <?= $content ?>   <!-- Aquí se inyecta la vista -->
</main>

<footer>
    <p>© 2025 - Awful Industries</p>
</footer>

</body>
</html>
