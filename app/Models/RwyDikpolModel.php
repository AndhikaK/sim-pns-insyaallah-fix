<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyDikpolModel extends Model
{
    protected $table = 'riwayat_dikpol';
    protected $primaryKey = 'id_riwayat_dikpol';
    protected $allowedFields = ['nip', 'nama_dikpol', 'tahun_lulus'];

    public function getOrderedData($nip)
    { }
}
