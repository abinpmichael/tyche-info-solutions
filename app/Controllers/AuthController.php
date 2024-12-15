<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class AuthController extends Controller
{
    public function login()
    {
        // If the user is already logged in, redirect to dashboard
        if (session()->has('user_id')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    public function loginPost()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Basic validation
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Passwords do not match');
            return redirect()->to('/register');
        }

        $userModel = new UserModel();

        // Check if email or username already exists
        if ($userModel->getUserByUsername($username) || $userModel->getUserByEmail($email)) {
            session()->setFlashdata('error', 'Username or email already taken');
            return redirect()->to('/register');
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create new user
        $userModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        session()->setFlashdata('success', 'Registration successful, you can log in now');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
