<?php
class DashboardController
{
    public function index()
    {
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/dashboard/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
