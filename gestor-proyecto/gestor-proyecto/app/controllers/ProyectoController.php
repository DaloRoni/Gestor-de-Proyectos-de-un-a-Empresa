<?php
require_once __DIR__ . '/../models/ProyectoModel.php';

class ProyectoController
{
    protected $model;
    public function __construct(){
        $this->model = new ProyectoModel();
    }

    protected function authRequired()
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: index.php?route=login'); exit;
        }
    }

    public function index()
    {
        $this->authRequired();
        $page = max(1, (int)($_GET['p'] ?? 1));
        $per = 10;
        $offset = ($page - 1) * $per;
        $items = $this->model->all($per, $offset);
        $total = $this->model->count();
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/proyecto/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create()
    {
        $this->authRequired();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            if (empty($data['nombre'])) {
                $_SESSION['error'] = 'Nombre es obligatorio.';
                header('Location: index.php?route=proyecto_create'); exit;
            }
            $this->model->create($data);
            $_SESSION['success'] = 'Proyecto creado.';
            header('Location: index.php?route=proyectos'); exit;
        }
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/proyecto/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit()
    {
        $this->authRequired();
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->find($id);
        if (!$item) { $_SESSION['error'] = 'No encontrado.'; header('Location: index.php?route=proyectos'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            $_SESSION['success'] = 'Actualizado.';
            header('Location: index.php?route=proyectos'); exit;
        }
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/proyecto/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function show()
    {
        $this->authRequired();
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->find($id);
        if (!$item) { $_SESSION['error'] = 'No encontrado.'; header('Location: index.php?route=proyectos'); exit; }
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/proyecto/show.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete()
    {
        $this->authRequired();
        $id = (int)($_GET['id'] ?? 0);
        if ($id) {
            $this->model->delete($id);
            $_SESSION['success'] = 'Eliminado.';
        }
        header('Location: index.php?route=proyectos'); exit;
    }
}
