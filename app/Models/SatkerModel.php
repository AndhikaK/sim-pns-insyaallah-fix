<?php

namespace App\Models;

use CodeIgniter\Model;

class SatkerModel extends Model
{
    protected $table = 'satker';
    protected $primaryKey = 'id_satker';
    protected $allowedFields = ['id_satker', 'nama_satker'];
}
