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
       // print_r($user);
       // print_r($userModel->validatePassword($password, $user['password']));
        // Debugging: print the hashed password
//echo $user['password'];  // Check if this is a hashed value


        if ($user && $userModel->validatePassword($password, $user['password'])) {
            // Password is correct, log the user in
            session()->set('isLoggedIn', true);
            session()->set('username', $username);
            session()->set('user_id', $user['id']);

            return redirect()->to(base_url('dashboard')); // Redirect to admin dashboard
        } else {
            // Invalid credentials
            return redirect()->to(base_url('login'))->with('error', 'Invalid username or password');
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
        return redirect()->to(base_url('login'));
    }
}
