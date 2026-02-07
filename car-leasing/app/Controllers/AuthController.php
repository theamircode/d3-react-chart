<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Core\Auth;
use Core\Controller;

final class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login');
    }

    public function showRegister(): void
    {
        $this->view('auth/register');
    }

    public function register(): void
    {
        if (!Auth::verifyCsrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            echo 'Invalid CSRF token';
            return;
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($name === '' || $email === '' || $password === '') {
            $this->view('auth/register', ['error' => 'تمام فیلدها الزامی است.']);
            return;
        }

        $user = new User();
        $user->create($name, $email, $password);

        $this->redirect('/login');
    }

    public function login(): void
    {
        if (!Auth::verifyCsrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            echo 'Invalid CSRF token';
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = new User();
        $record = $user->findByEmail($email);

        if (!$record || !password_verify($password, $record['password'])) {
            $this->view('auth/login', ['error' => 'اطلاعات ورود نادرست است.']);
            return;
        }

        Auth::login((int) $record['id'], $record['role']);
        $this->redirect('/');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/');
    }
}
