<?php


namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login'); // Show login form
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Load the UserModel
        $userModel = new UserModel();

        // Check if the user exists
        $user = $userModel->getUserByUsername($username);

        if ($user && $userModel->validatePassword($password, $user['password'])) {
            // Password is correct, log the user in
            session()->set('isLoggedIn', true);
            session()->set('username', $username);

            return redirect()->to('/admin'); // Redirect to the admin dashboard
        } else {
            // Invalid credentials
            return redirect()->to('/login')->with('error', 'Invalid username or password');
        }
    }

    public function register()
    {
        return view('auth/register'); // Show register form
    }

    public function registerPost()
    {
        // Handle registration logic here
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
