<?php
// app/Models/UserModel.php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];
    protected $useTimestamps = true;

    // Method to check user credentials (login)
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    // Method to check email during registration
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
?>