<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyDikbangumModel extends Model
{
    protected $table = 'riwayat_dikbangum';
    protected $primaryKey = 'id_riwayat_dikbangum';
    protected $allowedFields = ['nip', 'nama_dikbangum', 'tahun_lulus'];

    public function getOrderedData($nip)
    { }
}
