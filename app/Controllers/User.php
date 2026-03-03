<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    /**
     * Display registration form
     */
    public function register()
    {
        // Redirect if already logged in
        if ($this->session->has('user_id')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/register');
    }

    /**
     * Process registration
     */
    public function processRegister()
    {
        // Validation rules
        $rules = [
            'name'     => 'required|string|min_length[3]|max_length[255]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get validated data
        $data = $this->validator->getValidated();

        // Register user
        if ($this->userModel->registerUser($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
        } else {
            return redirect()->back()->with('error', 'Registration failed! Please try again.');
        }
    }

    /**
     * Display login form
     */
    public function login()
    {
        // Redirect if already logged in
        if ($this->session->has('user_id')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    /**
     * Process login
     */
    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validate input
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email and password are required!');
        }

        // Verify user
        $user = $this->userModel->verifyUser($email, $password);

        if ($user) {
            // Set session
            $this->session->set([
                'user_id'   => $user['id'],
                'user_name' => $user['name'],
                'user_email' => $user['email'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password!');
        }
    }

    /**
     * Display dashboard
     */
    public function dashboard()
    {
        // Check if user is logged in
        if (!$this->session->has('user_id')) {
            return redirect()->to('/login')->with('error', 'Please login first!');
        }

        $data = [
            'user_name' => $this->session->get('user_name'),
        ];

        return view('dashboard', $data);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully!');
    }
}
