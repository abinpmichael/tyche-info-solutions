<?php
// app/Models/UserModel.php


namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Name of your users table
    protected $primaryKey = 'id'; // Primary key column
    protected $allowedFields = ['username', 'password']; // Fields that can be updated

    // Hash password for storing securely
    public function getUserByUsername($username)
    {
        $user= $this->where('username', $username)->first();  // Query the database for the username
           log_message('debug', $this->db->getLastQuery()->getQuery()); 
           return $user; // Return the user data
    }

    public function validatePassword($inputPassword, $storedPassword)
    {
        return password_verify($inputPassword, $storedPassword); // Verify password
    }
}

?>