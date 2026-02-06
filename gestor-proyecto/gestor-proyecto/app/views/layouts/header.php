<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gestor de Proyectos</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/main.js" defer></script>
 </head>
<body>
<header class="site-header">
    <nav>
        <a href="/">Inicio</a>
        <?php if (!empty($_SESSION['user_id'])): ?>
            <a href="index.php?route=dashboard">Dashboard</a>
            <a href="index.php?route=proyectos">Proyectos</a>
            <a href="index.php?route=logout">Cerrar sesión (<?php echo htmlspecialchars($_SESSION['user_name']); ?>)</a>
        <?php else: ?>
            <a href="index.php?route=login">Iniciar sesión</a>
            <a href="index.php?route=register">Registro</a>
        <?php endif; ?>
    </nav>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>
</header>
<main class="container">
