<?php

namespace App\Models;

use CodeIgniter\Model;

class SubbagModel extends Model
{
    protected $table = 'subbag';
    protected $primaryKey = 'id_subbag';
    protected $allowedFields = ['id_subbag', 'nama_subbag'];
}
