<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'password', 'role', 'status'];
}
