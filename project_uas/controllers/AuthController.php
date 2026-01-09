<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->login($username, $password);

            if ($user) {
                // SIMPAN SESSION
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role']    = $user['role'];

                // REDIRECT WAJIB
                header('Location: /project_uas/dashboard/index');
                exit;
            }

            // GAGAL LOGIN
            header('Location: /project_uas/auth/login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /project_uas/auth/login');
        exit;
    }
}
