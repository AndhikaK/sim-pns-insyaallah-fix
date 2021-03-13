<?php

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
    protected $table = 'bagian';
    protected $primaryKey = 'id_bagian';
    protected $allowedFields = ['id_bagian', 'nama_bagian'];
}
