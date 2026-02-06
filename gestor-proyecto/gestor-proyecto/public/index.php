<?php
session_start();
require_once __DIR__ . '/../app/config/config.php';

// Rutas simples mediante query param 'route'
$route = $_GET['route'] ?? '';

switch ($route) {
    case 'register':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $c = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') $c->register(); else $c->showRegister();
        break;
    case 'login':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $c = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') $c->login(); else $c->showLogin();
        break;
    case 'logout':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $c = new AuthController(); $c->logout(); break;
    case 'dashboard':
        require_once __DIR__ . '/../app/controllers/DashboardController.php';
        $d = new DashboardController(); $d->index(); break;
    case 'proyectos':
        require_once __DIR__ . '/../app/controllers/ProyectoController.php';
        $p = new ProyectoController(); $p->index(); break;
    case 'proyecto_create':
        require_once __DIR__ . '/../app/controllers/ProyectoController.php';
        $p = new ProyectoController(); $p->create(); break;
    case 'proyecto_edit':
        require_once __DIR__ . '/../app/controllers/ProyectoController.php';
        $p = new ProyectoController(); $p->edit(); break;
    case 'proyecto_show':
        require_once __DIR__ . '/../app/controllers/ProyectoController.php';
        $p = new ProyectoController(); $p->show(); break;
    case 'proyecto_delete':
        require_once __DIR__ . '/../app/controllers/ProyectoController.php';
        $p = new ProyectoController(); $p->delete(); break;
    default:
        // landing público
        require __DIR__ . '/../app/views/layouts/header.php';
        echo "<h1>Gestor de Proyectos - Landing</h1>";
        echo "<p>Página pública. Inicie sesión para acceder al dashboard.</p>";
        require __DIR__ . '/../app/views/layouts/footer.php';
}
