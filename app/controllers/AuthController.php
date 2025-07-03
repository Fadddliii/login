<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findUser($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=dashboard");
                exit;
            } else {
                $error = "Login gagal!";
                require __DIR__ . '/../views/login.php';
            }
        } else {
            require __DIR__ . '/../views/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm  = $_POST['confirm'];

            if ($password !== $confirm) {
                $error = "Konfirmasi password tidak cocok.";
                require __DIR__ . '/../views/register.php';
                return;
            }

            $userModel = new User();
            $success = $userModel->createUser($username, $password);

            if ($success) {
                header("Location: index.php?action=login");
                exit;
            } else {
                $error = "Username sudah dipakai!";
                require __DIR__ . '/../views/register.php';
            }
        } else {
            require __DIR__ . '/../views/register.php';
        }
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }

        $user = $_SESSION['user'];
        require __DIR__ . '/../views/dashboard.php';
    }
}
