<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyDikumModel extends Model
{
    protected $table = 'riwayat_dikum';
    protected $primaryKey = 'id_riwayat_dikum';
    protected $allowedFields = ['nip', 'jenjang', 'tahun_lulus'];

    public function getOrderedData($nip)
    { }
}
