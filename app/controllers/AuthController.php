<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;

class AuthController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        $this->startSession();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->admin->findByUsername($username);
            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                header('Location: /');
                exit();
            } else {
                $error = 'Invalid username or password';
                $this->view('auth/login', compact('error'));
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function register()
    {
        $this->startSession();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->admin->create(['username' => $username, 'password' => $password])) {
                header('Location: /login');
                exit();
            } else {
                $error = 'Registration failed';
                $this->view('auth/register', compact('error'));
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function logout()
    {
        $this->startSession();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
