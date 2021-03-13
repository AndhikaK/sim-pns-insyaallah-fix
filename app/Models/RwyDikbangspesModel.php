<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyDikbangspesModel extends Model
{
    protected $table = 'riwayat_dikbangspes';
    protected $primaryKey = 'id_riwayat_dikbangspes';
    protected $allowedFields = ['nip', 'nama_dikbangspes', 'tahun_lulus'];

    public function getOrderedData($nip)
    { }
}
