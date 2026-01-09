<?php

class DashboardController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /project_uas/auth/login');
            exit;
        }

        require __DIR__ . '/../views/dashboard.php';
    }
}
