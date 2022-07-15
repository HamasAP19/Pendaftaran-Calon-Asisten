<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function loginUser($email, $password)
    {
        $this->select('*');
        $this->where('email', $email);
        $this->where('password', $password);
        if ($query = $this->get()) {
            return $query->getRowArray();
        } else {
            return false;
        }
    }
}
